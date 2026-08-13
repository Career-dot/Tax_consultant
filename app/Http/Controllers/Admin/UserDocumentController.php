<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\NotificationsLog;
use App\Models\Payment;
use App\Models\PlannerSubscription;
use App\Jobs\SendDocumentStatusEmail;
use App\Jobs\SendPaymentStatusEmail;
use Illuminate\Http\Request;

class UserDocumentController extends Controller
{
    public function index(Request $request)
    {
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

        if ($request->filled('user_id')) {
            $query->where('users.id', $request->user_id);
        }

        $users = $query->latest()->paginate(20);
        $allUsers = \App\Models\User::where('role', 'client')->orderBy('name')->get();

        $stats = [
            'total' => Document::count(),
            'pending' => Document::where('status', 'pending')->count(),
            'approved' => Document::where('status', 'approved')->count(),
            'rejected' => Document::where('status', 'rejected')->count(),
        ];

        return view('admin.user-documents', compact('users', 'allUsers', 'stats'));
    }

    public function show(\App\Models\User $user)
    {
        $user->load('services');

        $documents = Document::with(['service', 'requiredDocument'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();

        $serviceIds = $user->services->pluck('id')->toArray();
        $requiredDocuments = \App\Models\RequiredDocument::with('service')
            ->whereIn('service_id', $serviceIds)
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->get();

        foreach ($requiredDocuments as $reqDoc) {
            $reqDoc->is_uploaded = $documents->where('required_document_id', $reqDoc->id)->isNotEmpty();
            $reqDoc->uploaded_doc = $documents->where('required_document_id', $reqDoc->id)->first();
        }

        $services = \App\Models\Service::orderBy('name')->get();

        return view('admin.user-documents-show', compact('user', 'documents', 'services', 'requiredDocuments'));
    }

    public function requestDocuments(Request $request, \App\Models\User $user)
    {
        $request->validate([
            'required_document_ids' => 'required|array|min:1',
            'required_document_ids.*' => 'exists:required_documents,id',
            'message' => 'nullable|string|max:1000',
        ]);

        $requiredDocs = \App\Models\RequiredDocument::with('service')
            ->whereIn('id', $request->required_document_ids)
            ->get();

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

        \App\Models\Notification::create([
            'user_id' => $user->id,
            'service_id' => $requiredDocs->first()->service_id ?? null,
            'title' => 'Document Upload Required',
            'message' => $fullMessage,
            'type' => 'reminder',
        ]);

        return redirect()->back()->with('success', 'Document request sent to ' . $user->name . '.');
    }

    public function previewDocument(Document $document)
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

        $fullPath = \Illuminate\Support\Facades\Storage::disk('local')->path($document->file_path);

        return response()->file($fullPath, [
            'Content-Type' => $mimeType,
            'Content-Disposition' => 'inline; filename="' . $document->name . '"',
        ]);
    }

    public function approveDocument(Document $document)
    {
        $document->update(['status' => 'approved', 'rejection_reason' => null]);

        \App\Models\Notification::create([
            'user_id' => $document->user_id,
            'service_id' => $document->service_id,
            'title' => 'Document Approved',
            'message' => "Your document '{$document->name}' has been approved by our team.",
            'type' => 'success',
        ]);

        SendDocumentStatusEmail::dispatch($document, 'approved');

        return redirect()->back()->with('success', 'Document approved successfully.');
    }

    public function rejectDocument(Request $request, Document $document)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);

        $document->update([
            'status' => 'rejected',
            'rejection_reason' => $request->rejection_reason,
        ]);

        \App\Models\Notification::create([
            'user_id' => $document->user_id,
            'service_id' => $document->service_id,
            'title' => 'Document Rejected',
            'message' => "Your document '{$document->name}' has been rejected. Reason: {$request->rejection_reason}. Please re-upload the correct document.",
            'type' => 'error',
        ]);

        SendDocumentStatusEmail::dispatch($document, 'rejected', $request->rejection_reason);

        return redirect()->back()->with('success', 'Document rejected. User has been notified.');
    }

    public function downloadDocument(Document $document)
    {
        if (!\Illuminate\Support\Facades\Storage::disk('local')->exists($document->file_path)) {
            abort(404);
        }

        return \Illuminate\Support\Facades\Storage::disk('local')->download($document->file_path, $document->name);
    }
}
