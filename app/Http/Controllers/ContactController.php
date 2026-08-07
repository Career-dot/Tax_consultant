<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

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

        // Send acknowledgement email to visitor
        try {
            Mail::send('emails.contact_acknowledgement', ['contact' => $contact], function ($message) use ($contact) {
                $message->to($contact->email)
                    ->subject('Thank you for contacting FINANIC Business Consultants');
            });
        } catch (\Exception $e) {
            // Log error but don't fail the request
            \Log::error('Failed to send contact acknowledgement: ' . $e->getMessage());
        }

        // Send notification to firm
        try {
            Mail::send('emails.new_lead', ['contact' => $contact], function ($message) {
                $message->to(config('mail.from.address'))
                    ->subject('New Contact Form Submission - FINANIC');
            });
        } catch (\Exception $e) {
            \Log::error('Failed to send lead notification: ' . $e->getMessage());
        }

        return redirect()->back()->with('success', 'Thank you for your message. We will get back to you shortly.');
    }
}
