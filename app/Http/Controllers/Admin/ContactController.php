<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        $contacts = Contact::latest()->paginate(20);
        return view('admin.contacts.index', compact('contacts'));
    }

    public function show(Contact $contact)
    {
        return view('admin.contacts.show', compact('contact'));
    }

    public function updateStatus(Contact $contact)
    {
        $validated = request()->validate([
            'status' => 'required|in:pending,contacted,resolved',
        ]);

        $contact->update($validated);

        return redirect()->route('admin.contacts.show', $contact->id)
            ->with('success', 'Contact status updated.');
    }
}
