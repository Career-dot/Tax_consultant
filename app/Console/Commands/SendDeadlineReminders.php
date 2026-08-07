<?php

namespace App\Console\Commands;

use App\Models\PlannerDeadline;
use App\Models\NotificationsLog;
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

        // 7-day reminders (email only)
        $this->sendReminders(7, 'email', '7-day deadline reminder');

        // 2-day reminders (email + SMS)
        $this->sendReminders(2, 'both', '2-day deadline reminder');

        // Today reminders (SMS only)
        $this->sendReminders(0, 'sms', 'Today deadline reminder');

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

            $reminderField = "reminder_{$daysAhead}day_sent";
            if ($daysAhead === 0) {
                $reminderField = 'reminder_today_sent';
            }

            if ($deadline->$reminderField) {
                continue; // Already sent
            }

            // Send email reminder
            if (in_array($channel, ['email', 'both']) && $subscription->email_reminders) {
                $this->sendEmailReminder($subscription, $deadline, $daysAhead);
            }

            // Send SMS reminder
            if (in_array($channel, ['sms', 'both']) && $subscription->sms_reminders && $subscription->phone) {
                $this->sendSmsReminder($subscription, $deadline, $daysAhead);
            }

            // Mark as sent
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
            ], function ($message) use ($subscription, $deadline) {
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

        // In production, integrate with SMS API (e.g., Twilio, SMSGateway, etc.)
        // For now, just log it
        NotificationsLog::create([
            'type' => 'deadline_reminder',
            'channel' => 'sms',
            'recipient' => $subscription->phone,
            'subject' => null,
            'message' => $message,
            'status' => 'sent',
            'sent_at' => now(),
        ]);
    }
}
