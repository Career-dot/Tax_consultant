<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\StreamedResponse;

class DocumentController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.documents.index', [
            'documents' => $store->documents(),
            'applications' => $store->applications(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'file' => ['required', 'file', 'max:8192'],
            'name' => ['nullable', 'string', 'max:255'],
            'type' => ['required', 'string', 'in:cnic,salary_slip,bank_statement,other'],
            'application_id' => ['nullable', 'integer'],
        ]);

        $store = new DemoDataStore($request->user());
        $store->storeDocument($request->file('file'), $validated);

        return back()->with('status', 'document-uploaded');
    }

    public function download(Request $request, string $document): StreamedResponse
    {
        $store = new DemoDataStore($request->user());
        $record = $store->document($document);

        abort_if(! $record || ! $record['file_path'], Response::HTTP_NOT_FOUND);

        return Storage::disk('public')->download($record['file_path'], $record['name']);
    }

    public function destroy(Request $request, string $document): RedirectResponse
    {
        $store = new DemoDataStore($request->user());
        $store->deleteDocument($document);

        return back()->with('status', 'document-deleted');
    }
}
