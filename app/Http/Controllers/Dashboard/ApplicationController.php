<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $services = $user->services()->withPivot('status', 'assigned_at', 'service_status')->get();

        return view('dashboard.applications.index', [
            'applications' => $services,
            'stats' => [
                'active_applications' => $services->where('pivot.status', 'active')->count(),
                'completed_applications' => $services->where('pivot.status', 'completed')->count(),
            ],
        ]);
    }

    public function show(Request $request, Service $application)
    {
        $user = $request->user();
        $pivot = $user->services()->where('services.id', $application->id)->first();

        abort_unless($pivot, Response::HTTP_NOT_FOUND);

        $documents = $user->documents()->where('service_id', $application->id)->get();
        $requiredDocuments = $application->requiredDocuments()->where('is_active', true)->orderBy('sort_order')->get();

        foreach ($requiredDocuments as $reqDoc) {
            $reqDoc->is_uploaded = $documents->where('required_document_id', $reqDoc->id)->isNotEmpty();
            $reqDoc->uploaded_doc = $documents->where('required_document_id', $reqDoc->id)->first();
        }

        return view('dashboard.applications.show', [
            'application' => $application,
            'pivot' => $pivot,
            'documents' => $documents,
            'requiredDocuments' => $requiredDocuments,
        ]);
    }

    public function create(Request $request, string $service)
    {
        $serviceModel = Service::where('slug', $service)->where('is_active', true)->firstOrFail();

        return view('dashboard.filing.create', [
            'service' => $serviceModel,
        ]);
    }

    public function store(Request $request, string $service): RedirectResponse
    {
        $serviceModel = Service::where('slug', $service)->where('is_active', true)->firstOrFail();

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'string', 'max:20'],
            'contact_number' => ['required', 'string', 'max:30'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $user = $request->user();

        $user->services()->syncWithoutDetaching([
            $serviceModel->id => [
                'assigned_at' => now(),
                'status' => 'active',
                'notes' => $validated['notes'] ?? null,
            ]
        ]);

        \App\Models\Notification::create([
            'user_id' => $user->id,
            'service_id' => $serviceModel->id,
            'title' => 'Service Application Started',
            'message' => "Your {$serviceModel->name} application has been submitted. Our team will review it shortly.",
            'type' => 'update',
        ]);

        return redirect()->route('dashboard.applications.show', $serviceModel->id)
            ->with('status', 'application-started');
    }
}
