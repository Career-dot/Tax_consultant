<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\RequiredDocument;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        $documents = Document::where('user_id', $user->id)
            ->with(['service', 'requiredDocument'])
            ->latest()
            ->get();

        $services = $user->services()->wherePivot('status', 'active')->get();
        $requiredDocuments = RequiredDocument::whereIn('service_id', $services->pluck('id'))
            ->where('is_active', true)
            ->with('service')
            ->orderBy('sort_order')
            ->get();

        foreach ($requiredDocuments as $reqDoc) {
            $reqDoc->is_uploaded = $documents->where('required_document_id', $reqDoc->id)->isNotEmpty();
            $reqDoc->uploaded_doc = $documents->where('required_document_id', $reqDoc->id)->first();
        }

        return view('dashboard.documents.index', [
            'documents' => $documents,
            'requiredDocuments' => $requiredDocuments,
            'services' => $services,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => ['required', 'file', 'max:10240'],
            'name' => ['nullable', 'string', 'max:255'],
            'required_document_id' => ['nullable', 'exists:required_documents,id'],
            'service_id' => ['required', 'exists:services,id'],
        ]);

        $file = $request->file('file');
        $fileName = $file->getClientOriginalName();
        $path = $file->store('documents/' . $request->user()->id, 'local');

        Document::create([
            'user_id' => $request->user()->id,
            'service_id' => $validated['service_id'],
            'required_document_id' => $validated['required_document_id'] ?? null,
            'name' => $validated['name'] ?? $fileName,
            'file_path' => $path,
            'file_type' => $file->getMimeType(),
            'file_size' => $file->getSize(),
            'status' => 'pending',
        ]);

        return back()->with('status', 'document-uploaded');
    }

    public function download(Request $request, Document $document): StreamedResponse
    {
        abort_unless(
            $document->user_id === $request->user()->id || $request->user()->isAdmin(),
            Response::HTTP_FORBIDDEN
        );

        abort_unless(
            Storage::disk('local')->exists($document->file_path),
            Response::HTTP_NOT_FOUND
        );

        return Storage::disk('local')->download($document->file_path, $document->name);
    }

    public function destroy(Request $request, Document $document): RedirectResponse
    {
        abort_unless($document->user_id === $request->user()->id, Response::HTTP_FORBIDDEN);

        if (Storage::disk('local')->exists($document->file_path)) {
            Storage::disk('local')->delete($document->file_path);
        }

        $document->delete();

        return back()->with('status', 'document-deleted');
    }
}
