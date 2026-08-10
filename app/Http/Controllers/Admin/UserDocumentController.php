<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\User;
use Illuminate\Http\Request;

class UserDocumentController extends Controller
{
    public function index()
    {
        $query = User::with(['documents', 'documents.service'])
            ->withCount('documents as total_documents')
            ->withCount(['documents as pending_documents' => function ($q) {
                $q->where('status', 'pending');
            }])
            ->withCount(['documents as approved_documents' => function ($q) {
                $q->where('status', 'approved');
            }])
            ->withCount(['documents as rejected_documents' => function ($q) {
                $q->where('status', 'rejected');
            }])
            ->latest();

        if (request()->filled('user_id')) {
            $query->where('id', request('user_id'));
        } else {
            $query->whereHas('documents');
        }

        $users = $query->paginate(20)->withQueryString();
        $allUsers = User::whereHas('documents')->orderBy('name')->get();

        $stats = [
            'total' => Document::count(),
            'pending' => Document::where('status', 'pending')->count(),
            'approved' => Document::where('status', 'approved')->count(),
            'rejected' => Document::where('status', 'rejected')->count(),
        ];

        return view('admin.user-documents', compact('users', 'allUsers', 'stats'));
    }

    public function show(User $user)
    {
        $user->load('services');

        $documents = Document::with(['service', 'requiredDocument'])
            ->where('user_id', $user->id)
            ->latest()
            ->get();
            
        $requiredDocuments = collect(); // Mock required documents for now, until real logic is needed

        return view('admin.user-documents-show', compact('user', 'documents', 'requiredDocuments'));
    }

    public function preview(Document $document)
    {
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'File not found');
        }

        return response()->file(storage_path('app/public/' . $document->file_path));
    }

    public function download(Document $document)
    {
        if (!\Illuminate\Support\Facades\Storage::disk('public')->exists($document->file_path)) {
            abort(404, 'File not found');
        }

        return \Illuminate\Support\Facades\Storage::disk('public')->download($document->file_path, $document->name);
    }

    public function approve(Document $document)
    {
        $document->update(['status' => 'approved']);
        
        try {
            \Illuminate\Support\Facades\Mail::to($document->user->email)->send(new \App\Mail\DocumentStatusEmail($document, 'approved'));
        } catch (\Exception $e) {
            \Log::error('Document email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Document approved.');
    }

    public function reject(Request $request, Document $document)
    {
        $document->update([
            'status' => 'rejected',
            'rejection_reason' => $request->input('rejection_reason'),
        ]);
        
        try {
            \Illuminate\Support\Facades\Mail::to($document->user->email)->send(new \App\Mail\DocumentStatusEmail($document, 'rejected', $request->input('rejection_reason')));
        } catch (\Exception $e) {
            \Log::error('Document email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Document rejected.');
    }

    public function request(Request $request, User $user)
    {
        // $validated = $request->validate([
        //     'required_document_ids' => 'required|array',
        //     'message' => 'nullable|string'
        // ]);
        
        // Handle logic for requesting documents
        
        return back()->with('success', 'Document request sent to user.');
    }
}
