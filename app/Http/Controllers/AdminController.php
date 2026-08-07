<?php

namespace App\Http\Controllers;

use App\Models\DeadlineRule;
use App\Models\PlannerSubscription;
use App\Models\Contact;
use App\Models\TaxUpdate;
use App\Models\Faq;
use App\Models\Service;
use App\Models\TeamMember;
use App\Models\Testimonial;
use App\Models\Industry;
use App\Models\NotificationsLog;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if (!auth()->check() || !auth()->user()->isAdmin()) {
                abort(403);
            }
            return $next($request);
        });
    }

    public function dashboard()
    {
        $stats = [
            'contacts' => Contact::count(),
            'pending_contacts' => Contact::where('status', 'pending')->count(),
            'subscriptions' => PlannerSubscription::where('is_active', true)->count(),
            'services' => Service::count(),
            'faqs' => Faq::count(),
            'tax_updates' => TaxUpdate::count(),
            'team_members' => TeamMember::count(),
            'industries' => Industry::count(),
            'deadline_rules' => DeadlineRule::where('is_active', true)->count(),
            'notifications_sent' => NotificationsLog::where('status', 'sent')->count(),
            'notifications_failed' => NotificationsLog::where('status', 'failed')->count(),
            'total_users' => User::count(),
            'total_admins' => User::where('role', 'admin')->count(),
            'total_clients' => User::where('role', 'client')->count(),
            'users_with_services' => User::with('services')->has('services')->count(),
        ];

        // Per-service user counts
        $serviceStats = Service::withCount(['users as active_users_count' => function ($query) {
            $query->where('service_user.status', 'active');
        }])->orderBy('sort_order')->get();

        $recentContacts = Contact::latest()->take(5)->get();
        $recentSubscriptions = PlannerSubscription::latest()->take(5)->get();

        // Upcoming deadlines (next 30 days)
        $upcomingDeadlines = PlannerSubscription::where('is_active', true)
            ->with('deadlines')
            ->get()
            ->pluck('deadlines')
            ->flatten()
            ->where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays(30))
            ->sortBy('due_date')
            ->take(10);

        // ===== CHART DATA =====

        // Contacts per month (last 6 months)
        $contactsChart = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $contactsChart[] = [
                'label' => $date->format('M'),
                'count' => Contact::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        // Notifications by status
        $notificationsChart = [
            'sent' => NotificationsLog::where('status', 'sent')->count(),
            'failed' => NotificationsLog::where('status', 'failed')->count(),
            'queued' => NotificationsLog::where('status', 'queued')->count(),
        ];

        // Contacts by status
        $contactStatusChart = [
            'pending' => Contact::where('status', 'pending')->count(),
            'contacted' => Contact::where('status', 'contacted')->count(),
            'resolved' => Contact::where('status', 'resolved')->count(),
        ];

        // Subscribers per month (last 6 months)
        $subscribersChart = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $subscribersChart[] = [
                'label' => $date->format('M'),
                'count' => PlannerSubscription::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        return view('admin.dashboard', compact(
            'stats', 'recentContacts', 'recentSubscriptions', 'upcomingDeadlines',
            'contactsChart', 'notificationsChart', 'contactStatusChart', 'subscribersChart', 'serviceStats'
        ));
    }

    // ===== DEADLINE RULES =====
    public function deadlineRules()
    {
        $rules = DeadlineRule::orderBy('taxpayer_type')->orderBy('name')->get();
        return view('admin.deadline-rules.index', compact('rules'));
    }

    public function createDeadlineRule()
    {
        return view('admin.deadline-rules.create');
    }

    public function storeDeadlineRule(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'requires_sales_tax' => 'boolean',
            'requires_withholding_agent' => 'boolean',
            'sector' => 'nullable|string|max:255',
            'deadline_type' => 'required|in:monthly_sales_tax,withholding_statement,advance_tax,annual_return,wealth_statement',
            'frequency' => 'required|in:monthly,quarterly,annually',
            'day_of_month' => 'nullable|string|max:10',
            'month_of_quarter' => 'nullable|string|max:10',
            'custom_date_rule' => 'nullable|string',
            'statutory_basis' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        DeadlineRule::create($validated);

        return redirect()->route('admin.deadline-rules.index')
            ->with('success', 'Deadline rule created successfully.');
    }

    public function editDeadlineRule(DeadlineRule $deadlineRule)
    {
        return view('admin.deadline-rules.edit', ['rule' => $deadlineRule]);
    }

    public function updateDeadlineRule(Request $request, DeadlineRule $deadlineRule)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'requires_sales_tax' => 'boolean',
            'requires_withholding_agent' => 'boolean',
            'sector' => 'nullable|string|max:255',
            'deadline_type' => 'required|in:monthly_sales_tax,withholding_statement,advance_tax,annual_return,wealth_statement',
            'frequency' => 'required|in:monthly,quarterly,annually',
            'day_of_month' => 'nullable|string|max:10',
            'month_of_quarter' => 'nullable|string|max:10',
            'custom_date_rule' => 'nullable|string',
            'statutory_basis' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $deadlineRule->update($validated);

        return redirect()->route('admin.deadline-rules.index')
            ->with('success', 'Deadline rule updated successfully.');
    }

    public function deleteDeadlineRule(DeadlineRule $deadlineRule)
    {
        $deadlineRule->delete();
        return redirect()->route('admin.deadline-rules.index')
            ->with('success', 'Deadline rule deleted successfully.');
    }

    // ===== REMINDER CONFIG =====
    public function reminderConfig()
    {
        $config = [
            'reminder_7day' => config('planner.reminder_7day', true),
            'reminder_2day' => config('planner.reminder_2day', true),
            'reminder_today' => config('planner.reminder_today', true),
        ];
        return view('admin.reminder-config', compact('config'));
    }

    public function updateReminderConfig(Request $request)
    {
        // In production, save to config or database
        // For now, just redirect with success
        return redirect()->route('admin.reminder-config')
            ->with('success', 'Reminder configuration updated successfully.');
    }

    // ===== BROADCAST =====
    public function sendBroadcast(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'channel' => 'required|in:email,sms,both',
            'filter_type' => 'nullable|in:all,email_only,sms_only',
        ]);

        $query = PlannerSubscription::where('is_active', true);

        if ($validated['filter_type'] === 'email_only') {
            $query->where('email_reminders', true);
        } elseif ($validated['filter_type'] === 'sms_only') {
            $query->where('sms_reminders', true);
        }

        $subscriptions = $query->get();

        $sentCount = 0;
        foreach ($subscriptions as $subscription) {
            if (in_array($validated['channel'], ['email', 'both']) && $subscription->email_reminders) {
                NotificationsLog::create([
                    'type' => 'broadcast',
                    'channel' => 'email',
                    'recipient' => $subscription->email,
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'status' => 'queued',
                ]);
                $sentCount++;
            }

            if (in_array($validated['channel'], ['sms', 'both']) && $subscription->sms_reminders && $subscription->phone) {
                NotificationsLog::create([
                    'type' => 'broadcast',
                    'channel' => 'sms',
                    'recipient' => $subscription->phone,
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'status' => 'queued',
                ]);
                $sentCount++;
            }
        }

        return redirect()->back()->with('success', "Broadcast queued for {$sentCount} recipients.");
    }

    // ===== CONTACTS =====
    public function contacts()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function showContact(Contact $contact)
    {
        return view('admin.contacts.show', ['contact' => $contact]);
    }

    public function updateContactStatus(Request $request, Contact $contact)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,contacted,resolved',
        ]);

        $contact->update($validated + [
            'contacted_at' => $validated['status'] === 'contacted' ? now() : $contact->contacted_at,
        ]);

        return redirect()->back()->with('success', 'Contact status updated.');
    }

    // ===== SUBSCRIBERS =====
    public function subscribers()
    {
        $subscribers = PlannerSubscription::latest()->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }

    // ===== NOTIFICATIONS LOG =====
    public function notifications()
    {
        $notifications = NotificationsLog::latest()->paginate(50);
        return view('admin.notifications.index', compact('notifications'));
    }

    // ===== SERVICES CRUD =====
    public function services()
    {
        $services = Service::withCount('users')->orderBy('sort_order')->get();
        return view('admin.services.index', compact('services'));
    }

    public function createService()
    {
        return view('admin.services.create');
    }

    public function storeService(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug',
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        Service::create($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service created successfully.');
    }

    public function editService(Service $service)
    {
        return view('admin.services.edit', ['service' => $service]);
    }

    public function updateService(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:services,slug,' . $service->id,
            'description' => 'nullable|string',
            'short_description' => 'nullable|string|max:500',
            'icon' => 'nullable|string|max:50',
            'price' => 'nullable|numeric|min:0',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $service->update($validated);

        return redirect()->route('admin.services.index')
            ->with('success', 'Service updated successfully.');
    }

    public function deleteService(Service $service)
    {
        $service->delete();
        return redirect()->route('admin.services.index')
            ->with('success', 'Service deleted successfully.');
    }

    // ===== REQUIRED DOCUMENTS MANAGEMENT =====
    public function requiredDocuments(Service $service)
    {
        $requiredDocuments = $service->requiredDocuments()->get();
        return view('admin.services.required-documents', compact('service', 'requiredDocuments'));
    }

    public function storeRequiredDocument(Request $request, Service $service)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $service->requiredDocuments()->create($validated);

        return redirect()->route('admin.services.required-documents', $service->id)
            ->with('success', 'Required document added successfully.');
    }

    public function updateRequiredDocument(Request $request, \App\Models\RequiredDocument $requiredDocument)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string|max:500',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $requiredDocument->update($validated);

        return redirect()->route('admin.services.required-documents', $requiredDocument->service_id)
            ->with('success', 'Required document updated successfully.');
    }

    public function deleteRequiredDocument(\App\Models\RequiredDocument $requiredDocument)
    {
        $serviceId = $requiredDocument->service_id;
        $requiredDocument->delete();

        return redirect()->route('admin.services.required-documents', $serviceId)
            ->with('success', 'Required document deleted successfully.');
    }

    // ===== USER MANAGEMENT =====
    public function users()
    {
        $users = User::with('services')->latest()->paginate(20);
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.index', compact('users', 'services'));
    }

    public function showUser(User $user)
    {
        $user->load('services');
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.show', compact('user', 'services'));
    }

    public function createUser()
    {
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.create', compact('services'));
    }

    public function storeUser(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:20',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|in:admin,client',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'password' => Hash::make($validated['password']),
            'role' => $validated['role'],
        ]);

        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $serviceId) {
                $user->services()->attach($serviceId, [
                    'assigned_at' => now(),
                    'status' => 'active',
                ]);
            }
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User created successfully.');
    }

    public function editUser(User $user)
    {
        $user->load('services');
        $services = Service::where('is_active', true)->orderBy('sort_order')->get();
        return view('admin.users.edit', compact('user', 'services'));
    }

    public function updateUser(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:8|confirmed',
            'role' => 'required|in:admin,client',
            'services' => 'nullable|array',
            'services.*' => 'exists:services,id',
        ]);

        $updateData = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'] ?? null,
            'role' => $validated['role'],
        ];

        if (!empty($validated['password'])) {
            $updateData['password'] = Hash::make($validated['password']);
        }

        $user->update($updateData);

        // Sync services
        $user->services()->sync([]);
        if (!empty($validated['services'])) {
            foreach ($validated['services'] as $serviceId) {
                $user->services()->attach($serviceId, [
                    'assigned_at' => now(),
                    'status' => 'active',
                ]);
            }
        }

        return redirect()->route('admin.users.index')
            ->with('success', 'User updated successfully.');
    }

    public function deleteUser(User $user)
    {
        $user->services()->detach();
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('success', 'User deleted successfully.');
    }

    public function assignService(Request $request, User $user)
    {
        $validated = $request->validate([
            'service_id' => 'required|exists:services,id',
            'notes' => 'nullable|string|max:500',
        ]);

        $user->services()->syncWithoutDetaching([
            $validated['service_id'] => [
                'assigned_at' => now(),
                'status' => 'active',
                'notes' => $validated['notes'] ?? null,
            ]
        ]);

        return redirect()->back()->with('success', 'Service assigned to user successfully.');
    }

    public function removeService(User $user, Service $service)
    {
        $user->services()->detach($service->id);
        return redirect()->back()->with('success', 'Service removed from user.');
    }

    public function updateServiceStatus(Request $request, User $user, Service $service)
    {
        $validated = $request->validate([
            'status' => 'required|in:active,paused,cancelled',
        ]);

        $user->services()->updateExistingPivot($service->id, [
            'status' => $validated['status'],
        ]);

        return redirect()->back()->with('success', 'Service status updated.');
    }

    // ===== FAQs CRUD =====
    public function faqs()
    {
        $faqs = Faq::orderBy('category')->orderBy('sort_order')->get();
        return view('admin.faqs.index', compact('faqs'));
    }

    public function createFaq()
    {
        return view('admin.faqs.create');
    }

    public function storeFaq(Request $request)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|in:general,income_tax,sales_tax,withholding_tax,litigation',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        Faq::create($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ created successfully.');
    }

    public function editFaq(Faq $faq)
    {
        return view('admin.faqs.edit', ['faq' => $faq]);
    }

    public function updateFaq(Request $request, Faq $faq)
    {
        $validated = $request->validate([
            'question' => 'required|string|max:500',
            'answer' => 'required|string',
            'category' => 'required|in:general,income_tax,sales_tax,withholding_tax,litigation',
            'sort_order' => 'integer',
            'is_active' => 'boolean',
        ]);

        $faq->update($validated);

        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ updated successfully.');
    }

    public function deleteFaq(Faq $faq)
    {
        $faq->delete();
        return redirect()->route('admin.faqs.index')
            ->with('success', 'FAQ deleted successfully.');
    }

    // ===== TAX UPDATES CRUD =====
    public function taxUpdates()
    {
        $updates = TaxUpdate::latest()->paginate(20);
        return view('admin.tax-updates.index', compact('updates'));
    }

    public function createTaxUpdate()
    {
        return view('admin.tax-updates.create');
    }

    public function storeTaxUpdate(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tax_updates,slug',
            'content' => 'required|string',
            'category' => 'nullable|in:income_tax,sales_tax,withholding_tax,litigation,general',
            'tags' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['is_published'])) {
            $validated['published_at'] = now();
        }
        $validated['author_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('tax-updates', 'public');
        } else {
            unset($validated['featured_image']);
        }

        TaxUpdate::create($validated);

        return redirect()->route('admin.tax-updates.index')
            ->with('success', 'Tax update created successfully.');
    }

    public function editTaxUpdate(TaxUpdate $taxUpdate)
    {
        return view('admin.tax-updates.edit', ['update' => $taxUpdate]);
    }

    public function updateTaxUpdate(Request $request, TaxUpdate $taxUpdate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tax_updates,slug,' . $taxUpdate->id,
            'content' => 'required|string',
            'category' => 'nullable|in:income_tax,sales_tax,withholding_tax,litigation,general',
            'tags' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['is_published']) && !$taxUpdate->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            // Delete old image if exists
            if ($taxUpdate->featured_image) {
                Storage::disk('public')->delete($taxUpdate->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('tax-updates', 'public');
        } else {
            unset($validated['featured_image']);
        }

        $taxUpdate->update($validated);

        return redirect()->route('admin.tax-updates.index')
            ->with('success', 'Tax update updated successfully.');
    }

    public function deleteTaxUpdate(TaxUpdate $taxUpdate)
    {
        $taxUpdate->delete();
        return redirect()->route('admin.tax-updates.index')
            ->with('success', 'Tax update deleted successfully.');
    }

    // ===== USER DOCUMENTS MANAGEMENT =====
    public function userDocuments(Request $request)
    {
        // Group documents by user - show one row per user
        $query = \App\Models\User::with(['documents', 'documents.service'])
            ->whereHas('documents')
            ->withCount('documents as total_documents')
            ->withCount(['documents as pending_documents' => function ($q) {
                $q->where('status', 'pending');
            }])
            ->withCount(['documents as approved_documents' => function ($q) {
                $q->where('status', 'approved');
            }])
            ->withCount(['documents as rejected_documents' => function ($q) {
                $q->where('status', 'rejected');
            }]);

        // Filter by user
        if ($request->filled('user_id')) {
            $query->where('users.id', $request->user_id);
        }

        $users = $query->latest()->paginate(20);
        $allUsers = \App\Models\User::where('role', 'client')->orderBy('name')->get();

        // Get stats
        $stats = [
            'total' => \App\Models\Document::count(),
            'pending' => \App\Models\Document::where('status', 'pending')->count(),
            'approved' => \App\Models\Document::where('status', 'approved')->count(),
            'rejected' => \App\Models\Document::where('status', 'rejected')->count(),
        ];

        return view('admin.user-documents', compact('users', 'allUsers', 'stats'));
    }

    public function showUserDocuments(User $user)
    {
        $user->load('services');

        $documents = \App\Models\Document::with(['service', 'requiredDocument'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        // Get required documents for user's services with upload status
        $serviceIds = $user->services->pluck('id')->toArray();
        $requiredDocuments = \App\Models\RequiredDocument::with('service')
            ->whereIn('service_id', $serviceIds)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        // Mark which required docs are uploaded
        foreach ($requiredDocuments as $reqDoc) {
            $reqDoc->is_uploaded = $documents->where('required_document_id', $reqDoc->id)->isNotEmpty();
            $reqDoc->uploaded_doc = $documents->where('required_document_id', $reqDoc->id)->first();
        }

        $services = \App\Models\Service::orderBy('name')->get();

        return view('admin.user-documents-show', compact('user', 'documents', 'services', 'requiredDocuments'));
    }

    public function requestDocuments(Request $request, User $user)
    {
        $request->validate([
            'required_document_ids' => 'required|array|min:1',
            'required_document_ids.*' => 'exists:required_documents,id',
            'message' => 'nullable|string|max:1000',
        ]);

        $requiredDocs = \App\Models\RequiredDocument::with('service')
            ->whereIn('id', $request->required_document_ids)
            ->get();

        // Group by service
        $grouped = $requiredDocs->groupBy('service.name');
        $docList = '';
        foreach ($grouped as $serviceName => $docs) {
            $docList .= "\n{$serviceName}:\n";
            foreach ($docs as $doc) {
                $docList .= "  - {$doc->name}\n";
            }
        }

        $customMessage = $request->message ?: 'Please upload the following required documents for your assigned services:';
        $fullMessage = "{$customMessage}\n\nMissing Documents:{$docList}";

        // Create notification for user
        \App\Models\Notification::create([
            'user_id' => $user->id,
            'service_id' => $requiredDocs->first()->service_id ?? null,
            'title' => 'Document Upload Required',
            'message' => $fullMessage,
            'type' => 'reminder',
        ]);

        return redirect()->back()->with('success', 'Document request sent to ' . $user->name . '.');
    }

    public function previewDocument(\App\Models\Document $document)
    {
        if (!\Illuminate\Support\Facades\Storage::disk('local')->exists($document->file_path)) {
            abort(404);
        }

        $mimeTypes = [
            'pdf' => 'application/pdf',
            'jpg' => 'image/jpeg',
            'jpeg' => 'image/jpeg',
            'png' => 'image/png',
            'doc' => 'application/msword',
            'docx' => 'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
        ];

        $ext = strtolower(pathinfo($document->name, PATHINFO_EXTENSION));
        $mimeType = $mimeTypes[$ext] ?? 'application/octet-stream';

        $fullPath = Storage::disk('local')->path($document->file_path);

        return response()->file($fullPath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $document->name . '"',
        ]);
    }

    public function approveDocument(\App\Models\Document $document)
    {
        $document->update(['status' => 'approved', 'rejection_reason' => null]);

        // Create notification for user
        \App\Models\Notification::create([
            'user_id' => $document->user_id,
            'service_id' => $document->service_id,
            'title' => 'Document Approved',
            'message' => "Your document '{$document->name}' has been approved by our team.",
            'type' => 'success',
        ]);

        // Send email notification
        try {
            Mail::send('emails.document_approved', [
                'user' => $document->user,
                'document' => $document,
            ], function ($message) use ($document) {
                $message->to($document->user->email)
                    ->subject('Document Approved: ' . $document->name . ' - FINANIC');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send document approved email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Document approved successfully.');
    }

    public function rejectDocument(Request $request, \App\Models\Document $document)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $document->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        // Create notification for user
        \App\Models\Notification::create([
            'user_id' => $document->user_id,
            'service_id' => $document->service_id,
            'title' => 'Document Rejected',
            'message' => "Your document '{$document->name}' has been rejected. Reason: {$request->rejection_reason}. Please re-upload the correct document.",
            'type' => 'error',
        ]);

        // Send email notification
        try {
            Mail::send('emails.document_rejected', [
                'user' => $document->user,
                'document' => $document,
            ], function ($message) use ($document) {
                $message->to($document->user->email)
                    ->subject('Document Requires Revision: ' . $document->name . ' - FINANIC');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send document rejected email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Document rejected. User has been notified.');
    }

    public function downloadDocument(\App\Models\Document $document)
    {
        if (!\Illuminate\Support\Facades\Storage::disk('local')->exists($document->file_path)) {
            abort(404);
        }

        return \Illuminate\Support\Facades\Storage::disk('local')->download($document->file_path, $document->name);
    }

    // ===== PAYMENT MANAGEMENT =====
    public function payments()
    {
        $payments = \App\Models\Payment::with(['user', 'service'])->latest()->paginate(20);
        return view('admin.payments', compact('payments'));
    }

    public function approvePayment(\App\Models\Payment $payment)
    {
        $payment->update(['status' => 'approved', 'verified_at' => now()]);

        // Send email notification
        try {
            Mail::send('emails.payment_approved', [
                'user' => $payment->user,
                'payment' => $payment,
            ], function ($message) use ($payment) {
                $message->to($payment->user->email)
                    ->subject('Payment Confirmed - FINANIC');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send payment approved email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    public function rejectPayment(Request $request, \App\Models\Payment $payment)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:500',
        ]);

        $payment->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
        ]);

        // Send email notification
        try {
            Mail::send('emails.payment_rejected', [
                'user' => $payment->user,
                'payment' => $payment,
            ], function ($message) use ($payment) {
                $message->to($payment->user->email)
                    ->subject('Payment Not Verified - FINANIC');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send payment rejected email: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Payment rejected.');
    }
}
