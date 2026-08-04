<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Symfony\Component\HttpFoundation\Response;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.applications.index', [
            'applications' => $store->applications(),
            'serviceMeta' => DemoDataStore::serviceMeta(),
            'stats' => $store->stats(),
        ]);
    }

    public function show(Request $request, string $application)
    {
        $store = new DemoDataStore($request->user());
        $record = $store->application($application);

        abort_if(! $record, Response::HTTP_NOT_FOUND);

        return view('dashboard.applications.show', [
            'application' => $record,
            'documents' => collect($store->documents())->where('application_id', $record['id'])->values()->all(),
            'serviceMeta' => DemoDataStore::serviceMeta(),
        ]);
    }

    public function create(Request $request, string $service)
    {
        $meta = DemoDataStore::serviceMeta();

        abort_unless(array_key_exists($service, $meta), Response::HTTP_NOT_FOUND);

        return view('dashboard.filing.create', [
            'service' => $service,
            'meta' => $meta[$service],
        ]);
    }

    public function store(Request $request, string $service): RedirectResponse
    {
        $meta = DemoDataStore::serviceMeta();
        abort_unless(array_key_exists($service, $meta), Response::HTTP_NOT_FOUND);

        $validated = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'cnic' => ['required', 'string', 'max:20'],
            'contact_number' => ['required', 'string', 'max:30'],
            'notes' => ['nullable', 'string', 'max:1000'],
        ]);

        $store = new DemoDataStore($request->user());
        $application = $store->createApplication($service, $validated);

        return redirect()
            ->route('dashboard.applications.show', $application['id'])
            ->with('status', 'application-started');
    }
}
