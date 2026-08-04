<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.settings.index', [
            'stats' => $store->stats(),
            'preferences' => $request->user()->notification_preferences ?? [
                'application_updates' => true,
                'payment_reminders' => true,
                'document_alerts' => true,
                'marketing_emails' => false,
            ],
        ]);
    }

    public function updateNotificationPreferences(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'application_updates' => ['nullable', 'boolean'],
            'payment_reminders' => ['nullable', 'boolean'],
            'document_alerts' => ['nullable', 'boolean'],
            'marketing_emails' => ['nullable', 'boolean'],
        ]);

        $request->user()->update([
            'notification_preferences' => [
                'application_updates' => $request->boolean('application_updates'),
                'payment_reminders' => $request->boolean('payment_reminders'),
                'document_alerts' => $request->boolean('document_alerts'),
                'marketing_emails' => $request->boolean('marketing_emails'),
            ],
        ]);

        return back()->with('status', 'preferences-updated');
    }
}
