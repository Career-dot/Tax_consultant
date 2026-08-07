<?php

namespace App\Http\Controllers;

use App\Models\Document;
use App\Models\PlannerSubscription;
use App\Models\Service;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ClientPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('service.selected')->except(['selectServices', 'storeServices']);
    }

    public function dashboard()
    {
        $user = Auth::user()->load('services');
        $subscriptions = $user->plannerSubscriptions()->with('deadlines')->get();
        $documents = $user->documents()->latest()->get();
        
        // Get service progress for each service
        $serviceProgress = [];
        foreach ($user->services as $service) {
            $serviceProgress[$service->id] = [
                'service' => $service,
                'status' => $service->pivot->status,
                'assigned_at' => $service->pivot->assigned_at,
                'notes' => $service->pivot->notes,
                'progress' => $this->getServiceProgress($service->id, $user->id),
            ];
        }

        // Get required documents for user's services
        $serviceIds = $user->services->pluck('id')->toArray();
        $requiredDocuments = \App\Models\RequiredDocument::with('service')
            ->whereIn('service_id', $serviceIds)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Get recent notifications
        $notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->take(10)
            ->get();

        // Get upcoming deadlines (next 30 days) from planner subscriptions
        $upcomingDeadlines = $subscriptions->pluck('deadlines')
            ->flatten()
            ->filter(function ($deadline) use ($serviceIds) {
                $isUpcoming = $deadline->due_date->gte(now()) && $deadline->due_date->lte(now()->addDays(30));
                $belongsToService = empty($deadline->service_id) || in_array($deadline->service_id, $serviceIds);
                return $isUpcoming && $belongsToService;
            })
            ->sortBy('due_date')
            ->take(5);

        return view('portal.dashboard', compact('user', 'subscriptions', 'documents', 'serviceProgress', 'notifications', 'upcomingDeadlines', 'requiredDocuments'));
    }

    public function selectServices()
    {
        $user = Auth::user();
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        $userServices = $user->services->pluck('id')->toArray();

        return view('portal.select-services', compact('services', 'userServices'));
    }

    public function storeServices(Request $request)
    {
        $validated = $request->validate([
            'services' => 'required|array|min:1',
            'services.*' => 'exists:services,id',
        ]);

        $user = Auth::user();

        // Sync services
        $user->services()->sync([]);
        foreach ($validated['services'] as $serviceId) {
            $user->services()->attach($serviceId, [
                'assigned_at' => now(),
                'status' => 'active',
            ]);
        }

        // Auto-create planner subscription so user gets deadline reminders
        $this->ensurePlannerSubscription($user);

        // Create welcome notification
        Notification::create([
            'user_id' => $user->id,
            'title' => 'Welcome to FINANIC!',
            'message' => 'Thank you for selecting our services. Our team will contact you shortly to discuss your requirements.',
            'type' => 'welcome',
            'service_id' => $validated['services'][0],
        ]);

        return redirect()->route('portal.dashboard')->with('success', 'Services selected successfully! Welcome to FINANIC.');
    }

    private function ensurePlannerSubscription($user)
    {
        // Check if user already has an active planner subscription
        $existing = $user->plannerSubscriptions()->where('is_active', true)->first();
        if ($existing) {
            return $existing;
        }

        // Map user role to taxpayer type
        $taxpayerType = 'salaried_individual';
        if ($user->role === 'trader') {
            $taxpayerType = 'business_individual';
        } elseif ($user->role === 'corporate') {
            $taxpayerType = 'company';
        }

        // Check if user has business-related services
        $serviceNames = $user->services->pluck('name')->map(fn($n) => strtolower($n))->toArray();
        $hasSalesTax = collect($serviceNames)->contains(fn($n) => str_contains($n, 'gst') || str_contains($n, 'sales tax'));
        $hasWithholding = collect($serviceNames)->contains(fn($n) => str_contains($n, 'withholding'));

        // Create planner subscription
        $subscription = \App\Models\PlannerSubscription::create([
            'user_id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'phone' => $user->phone,
            'taxpayer_type' => $taxpayerType,
            'has_sales_tax' => $hasSalesTax,
            'has_withholding_agent' => $hasWithholding,
            'email_reminders' => true,
            'sms_reminders' => false,
            'is_active' => true,
            'session_token' => session()->token(),
        ]);

        // Generate deadlines for this subscription
        $this->generateDeadlinesForSubscription($subscription);

        return $subscription;
    }

    private function generateDeadlinesForSubscription($subscription)
    {
        $rules = \App\Models\DeadlineRule::where('is_active', true)
            ->forTaxpayer($subscription->taxpayer_type);

        if ($subscription->has_sales_tax) {
            $rules->withSalesTax();
        }

        if ($subscription->has_withholding_agent) {
            $rules->withWithholdingAgent();
        }

        if ($subscription->sector) {
            $rules->forSector($subscription->sector);
        }

        $rules = $rules->get();

        foreach ($rules as $rule) {
            $nextDate = $this->getNextDeadlineDate($rule, \Carbon\Carbon::now());
            if ($nextDate) {
                \App\Models\PlannerDeadline::create([
                    'planner_subscription_id' => $subscription->id,
                    'deadline_rule_id' => $rule->id,
                    'name' => $rule->name,
                    'due_date' => $nextDate,
                    'description' => $rule->description,
                ]);
            }
        }
    }

    private function getNextDeadlineDate($rule, $from)
    {
        switch ($rule->frequency) {
            case 'monthly':
                $next = $from->copy()->addMonth();
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(18);
                }
                if ($next->lte($from)) {
                    $next->addMonth();
                }
                return $next;

            case 'quarterly':
                $next = $from->copy()->addMonth();
                while ($next->month % 3 !== 0) {
                    $next->addMonth();
                }
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(15);
                }
                if ($next->lte($from)) {
                    $next->addMonths(3);
                    while ($next->month % 3 !== 0) {
                        $next->addMonth();
                    }
                    if ($rule->day_of_month) {
                        $next->day((int) $rule->day_of_month);
                    } else {
                        $next->day(15);
                    }
                }
                return $next;

            case 'annually':
                $next = $from->copy()->addYear();
                $next->month(9);
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(30);
                }
                if ($next->lte($from)) {
                    $next->addYear();
                }
                return $next;

            default:
                return null;
        }
    }

    public function serviceProgress(Service $service)
    {
        $user = Auth::user();
        $userService = $user->services()->where('service_id', $service->id)->first();

        if (!$userService) {
            return redirect()->back()->with('error', 'You are not subscribed to this service.');
        }

        $documents = $user->documents()->where('service_id', $service->id)->latest()->get();
        $notifications = Notification::where('user_id', $user->id)
            ->where('service_id', $service->id)
            ->latest()
            ->get();

        $progress = $this->getServiceProgress($service->id, $user->id);

        return view('portal.service-progress', compact('service', 'userService', 'documents', 'notifications', 'progress'));
    }

    private function getServiceProgress($serviceId, $userId)
    {
        $user = \App\Models\User::find($userId);
        $serviceUser = $user->services()->where('service_id', $serviceId)->first();
        
        $serviceStatus = $serviceUser->pivot->service_status ?? 'pending';
        $documentCount = $user->documents()->where('service_id', $serviceId)->count();
        $approvedDocs = $user->documents()->where('service_id', $serviceId)->where('status', 'approved')->count();
        
        $steps = [
            1 => ['name' => 'Service Selected', 'completed' => true],
            2 => ['name' => 'Payment Verified', 'completed' => $serviceStatus !== 'pending'],
            3 => ['name' => 'Documents Uploaded', 'completed' => $documentCount > 0],
            4 => ['name' => 'Under Review', 'completed' => in_array($serviceStatus, ['under-review', 'processing', 'complete'])],
            5 => ['name' => 'Completed', 'completed' => $serviceStatus === 'complete'],
        ];
        
        $completedSteps = collect($steps)->where('completed', true)->count();
        $totalSteps = count($steps);
        $percentage = round(($completedSteps / $totalSteps) * 100);
        
        $currentStep = 1;
        foreach ($steps as $stepNum => $step) {
            if (!$step['completed']) {
                $currentStep = $stepNum;
                break;
            }
            $currentStep = $stepNum;
        }
        
        return [
            'current_step' => $currentStep,
            'total_steps' => $totalSteps,
            'steps' => $steps,
            'percentage' => $percentage,
        ];
    }

    public function uploadDocument(Request $request)
    {
        $request->validate([
            'files' => 'required|array|min:1',
            'files.*' => 'required|file|max:10240|mimes:pdf,doc,docx,jpg,jpeg,png',
            'service_id' => 'nullable|exists:services,id',
            'required_document_id' => 'nullable|exists:required_documents,id',
        ]);

        $serviceId = $request->input('service_id');
        $requiredDocumentId = $request->input('required_document_id');
        $uploadedCount = 0;

        foreach ($request->file('files') as $file) {
            $fileName = $file->getClientOriginalName();
            $path = $file->store('documents/' . Auth::id(), 'local');

            Document::create([
                'user_id' => Auth::id(),
                'service_id' => $serviceId,
                'required_document_id' => $requiredDocumentId,
                'name' => $fileName,
                'file_path' => $path,
                'file_type' => $file->getMimeType(),
                'file_size' => $file->getSize(),
            ]);

            $uploadedCount++;
        }

        if ($request->ajax()) {
            return response()->json(['success' => true, 'count' => $uploadedCount]);
        }

        return redirect()->back()->with('success', "{$uploadedCount} document(s) uploaded successfully.");
    }

    public function downloadDocument(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403);
        }

        return Storage::disk('local')->download($document->file_path, $document->name);
    }

    public function deleteDocument(Document $document)
    {
        if ($document->user_id !== Auth::id()) {
            abort(403);
        }

        Storage::disk('local')->delete($document->file_path);
        $document->delete();

        return redirect()->back()->with('success', 'Document deleted successfully.');
    }

    public function uploadForm(Request $request)
    {
        $serviceId = $request->query('service_id');
        $user = Auth::user();
        $service = null;

        if ($serviceId) {
            $service = $user->services()->where('service_id', $serviceId)->first();
            if (!$service) {
                return redirect()->route('portal.dashboard')->with('error', 'Service not found.');
            }
        }

        $documents = $user->documents();
        if ($serviceId) {
            $documents = $documents->where('service_id', $serviceId);
        }
        $documents = $documents->latest()->get();

        return view('portal.upload-form', compact('service', 'serviceId', 'documents'));
    }

    public function myDeadlines()
    {
        $user = Auth::user();
        $serviceIds = $user->services->pluck('id')->toArray();
        
        $subscriptions = $user->plannerSubscriptions()->with(['deadlines' => function ($query) use ($serviceIds) {
            $query->upcoming()->orderBy('due_date');
            // Filter by service if service_id exists on deadline
            if (!empty($serviceIds)) {
                $query->where(function ($q) use ($serviceIds) {
                    $q->whereNull('service_id')->orWhereIn('service_id', $serviceIds);
                });
            }
        }])->get();

        return view('portal.deadlines', compact('subscriptions'));
    }

    public function notifications()
    {
        $user = Auth::user();
        $notifications = Notification::where('user_id', $user->id)
            ->latest()
            ->paginate(20);

        return view('portal.notifications', compact('notifications'));
    }

    public function markNotificationRead(Notification $notification)
    {
        if ($notification->user_id !== Auth::id()) {
            abort(403);
        }

        $notification->update(['is_read' => true]);

        return redirect()->back()->with('success', 'Notification marked as read.');
    }

    public function paymentForm()
    {
        $user = Auth::user();
        $services = $user->services;
        $payments = $user->payments()->with('service')->latest()->get();

        return view('portal.payment', compact('services', 'payments'));
    }

    public function submitPayment(Request $request)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'screenshot' => 'required|image|mimes:jpg,jpeg,png|max:5120',
        ]);

        $user = Auth::user();
        
        // Verify user has this service
        if (!$user->services()->where('service_id', $validated['service_id'])->exists()) {
            return redirect()->back()->with('error', 'You are not subscribed to this service.');
        }

        // Get price from service (auto-filled, not from user input)
        $service = \App\Models\Service::findOrFail($validated['service_id']);
        $amount = $service->price ?? 0;

        $path = $request->file('screenshot')->store('payments/' . $user->id, 'local');

        \App\Models\Payment::create([
            'user_id' => $user->id,
            'service_id' => $validated['service_id'],
            'amount' => $amount,
            'screenshot_path' => $path,
        ]);

        return redirect()->route('portal.payment')
            ->with('success', 'Payment screenshot submitted successfully. Please wait for verification (within 24 hours).');
    }

    public function history()
    {
        $user = Auth::user();

        // Services with pivot data
        $services = $user->services()
            ->withPivot('assigned_at', 'status', 'service_status')
            ->get();

        // Compute service progress for each service
        $serviceProgress = [];
        foreach ($services as $service) {
            $serviceProgress[$service->id] = $this->getServiceProgress($service->id, $user->id);
        }

        // Payments with service relation
        $payments = $user->payments()
            ->with('service')
            ->orderByDesc('created_at')
            ->get();

        // Documents with service relation
        $documents = $user->documents()
            ->with('service')
            ->orderByDesc('created_at')
            ->get();

        return view('portal.history', compact('user', 'services', 'payments', 'documents', 'serviceProgress'));
    }
}
