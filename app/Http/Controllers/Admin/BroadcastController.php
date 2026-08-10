<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationsLog;
use App\Models\PlannerSubscription;
use Illuminate\Http\Request;

class BroadcastController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
            'channel' => 'required|in:email,sms,both',
            'filter_type' => 'nullable|in:all,email_only,sms_only',
        ]);

        $query = PlannerSubscription::where('is_active', true);

        if ($validated['filter_type'] === 'email_only') {
            $query->where('email_reminders', true);
        } elseif ($validated['filter_type'] === 'sms_only') {
            $query->where('sms_reminders', true);
        }

        $subscriptions = $query->get();

        $sentCount = 0;
        foreach ($subscriptions as $subscription) {
            if (in_array($validated['channel'], ['email', 'both']) && $subscription->email_reminders) {
                NotificationsLog::create([
                    'type' => 'broadcast',
                    'channel' => 'email',
                    'recipient' => $subscription->email,
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'status' => 'queued',
                ]);
                $sentCount++;
            }

            if (in_array($validated['channel'], ['sms', 'both']) && $subscription->sms_reminders && $subscription->phone) {
                NotificationsLog::create([
                    'type' => 'broadcast',
                    'channel' => 'sms',
                    'recipient' => $subscription->phone,
                    'subject' => $validated['subject'],
                    'message' => $validated['message'],
                    'status' => 'queued',
                ]);
                $sentCount++;
            }
        }

        return redirect()->back()->with('success', "Broadcast queued for {$sentCount} recipients.");
    }
}
