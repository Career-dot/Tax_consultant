<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.support.index', [
            'tickets' => $store->tickets(),
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'subject' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'priority' => ['required', 'string', 'in:Low,Normal,High,Urgent'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $store = new DemoDataStore($request->user());
        $ticket = $store->createTicket($validated);

        return redirect()->route('dashboard.support.show', $ticket['id'])->with('status', 'ticket-created');
    }

    public function show(Request $request, string $ticket)
    {
        $store = new DemoDataStore($request->user());
        $record = $store->ticket($ticket);

        abort_if(! $record, Response::HTTP_NOT_FOUND);

        return view('dashboard.support.show', [
            'ticket' => $record,
        ]);
    }

    public function reply(Request $request, string $ticket): RedirectResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        $store = new DemoDataStore($request->user());
        $store->replyToTicket($ticket, $validated['message']);

        return back()->with('status', 'reply-sent');
    }
}
