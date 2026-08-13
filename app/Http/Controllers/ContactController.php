<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Jobs\SendContactAcknowledgement;
use App\Jobs\SendLeadNotification;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'service_interest' => 'nullable|string|max:255',
            'preferred_contact_method' => 'nullable|in:email,phone,whatsapp',
            'message' => 'required|string|max:5000',
        ]);

        $contact = Contact::create($validated);

        SendContactAcknowledgement::dispatch($contact);
        SendLeadNotification::dispatch($contact);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Thank you for your message. We will get back to you shortly.']);
        }

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you shortly.');
    }
}
