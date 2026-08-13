<?php

namespace App\Console\Commands;

use App\Models\PlannerDeadline;
use App\Models\NotificationsLog;
use App\Models\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;

class SendDeadlineReminders extends Command
{
    protected $signature = 'planner:send-reminders';
    protected $description = 'Send deadline reminders to planner subscribers';

    public function handle()
    {
        $this->info('Starting deadline reminder processing...');

        $reminder7dayEnabled = Setting::get('reminder_7day', '1') === '1';
        $reminder2dayEnabled = Setting::get('reminder_2day', '1') === '1';
        $reminderTodayEnabled = Setting::get('reminder_today', '1') === '1';

        $reminder7dayDays = (int) Setting::get('reminder_7day_days', '7');
        $reminder2dayDays = (int) Setting::get('reminder_2day_days', '2');

        if ($reminder7dayEnabled) {
            $this->sendReminders($reminder7dayDays, 'email', '7-day deadline reminder');
        }

        if ($reminder2dayEnabled) {
            $this->sendReminders($reminder2dayDays, 'both', '2-day deadline reminder');
        }

        if ($reminderTodayEnabled) {
            $this->sendReminders(0, 'sms', 'Today deadline reminder');
        }

        $this->info('Deadline reminder processing completed.');
        return Command::SUCCESS;
    }

    private function sendReminders($daysAhead, $channel, $type)
    {
        $targetDate = Carbon::now()->addDays($daysAhead)->toDateString();

        $deadlines = PlannerDeadline::where('due_date', $targetDate)
            ->where('is_completed', false)
            ->with('subscription')
            ->get();

        foreach ($deadlines as $deadline) {
            $subscription = $deadline->subscription;
            if (!$subscription || !$subscription->is_active) {
                continue;
            }

            $reminderField = $daysAhead === 0 ? 'reminder_today_sent' : "reminder_{$daysAhead}day_sent";

            if ($deadline->$reminderField) {
                continue;
            }

            if (in_array($channel, ['email', 'both']) && $subscription->email_reminders) {
                $this->sendEmailReminder($subscription, $deadline, $daysAhead);
            }

            if (in_array($channel, ['sms', 'both']) && $subscription->sms_reminders && $subscription->phone) {
                $this->sendSmsReminder($subscription, $deadline, $daysAhead);
            }

            $deadline->update([$reminderField => true]);
        }
    }

    private function sendEmailReminder($subscription, $deadline, $daysAhead)
    {
        try {
            Mail::send('emails.deadline_reminder', [
                'subscription' => $subscription,
                'deadline' => $deadline,
                'daysUntil' => $daysAhead,
            ], function ($message) use ($subscription, $deadline, $daysAhead) {
                $message->to($subscription->email)
                    ->subject("Reminder: {$deadline->name} due in " . ($daysAhead === 0 ? 'TODAY' : "{$daysAhead} days"));
            });

            NotificationsLog::create([
                'type' => 'deadline_reminder',
                'channel' => 'email',
                'recipient' => $subscription->email,
                'subject' => "Reminder: {$deadline->name}",
                'message' => "Your deadline '{$deadline->name}' is due on {$deadline->due_date->format('F j, Y')}.",
                'status' => 'sent',
                'sent_at' => now(),
            ]);
        } catch (\Exception $e) {
            NotificationsLog::create([
                'type' => 'deadline_reminder',
                'channel' => 'email',
                'recipient' => $subscription->email,
                'subject' => "Reminder: {$deadline->name}",
                'message' => "Failed to send",
                'status' => 'failed',
                'error_message' => $e->getMessage(),
            ]);
        }
    }

    private function sendSmsReminder($subscription, $deadline, $daysAhead)
    {
        $message = "FINANIC Reminder: {$deadline->name}";
        if ($daysAhead === 0) {
            $message .= " is due TODAY!";
        } else {
            $message .= " is due in {$daysAhead} days ({$deadline->due_date->format('M j, Y')}).";
        }

        NotificationsLog::create([
            'type' => 'deadline_reminder',
            'channel' => 'sms',
            'recipient' => $subscription->phone,
            'subject' => null,
            'message' => $message,
            'status' => 'queued',
            'sent_at' => now(),
        ]);
    }
}
