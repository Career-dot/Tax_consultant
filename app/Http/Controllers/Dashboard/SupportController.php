<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SupportController extends Controller
{
    public function index(Request $request)
    {
        $tickets = collect([]);

        return view('dashboard.support.index', [
            'tickets' => $tickets,
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

        \App\Models\Notification::create([
            'user_id' => $request->user()->id,
            'title' => 'Support Ticket: ' . $validated['subject'],
            'message' => $validated['message'],
            'type' => 'info',
        ]);

        return redirect()->route('dashboard.support')->with('status', 'ticket-created');
    }

    public function show(Request $request, string $ticket)
    {
        abort(Response::HTTP_NOT_FOUND);
    }

    public function reply(Request $request, string $ticket): RedirectResponse
    {
        $validated = $request->validate([
            'message' => ['required', 'string', 'max:2000'],
        ]);

        return back()->with('status', 'reply-sent');
    }
}
