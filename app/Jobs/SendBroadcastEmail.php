<?php

namespace App\Jobs;

use App\Models\NotificationsLog;
use App\Models\PlannerSubscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendBroadcastEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 60;
    public int $backoff = 60;

    public function __construct(
        public string $subject,
        public string $message,
        public string $recipientEmail,
        public int $subscriptionId
    ) {
    }

    public function handle(): void
    {
        $log = NotificationsLog::create([
            'type' => 'broadcast',
            'channel' => 'email',
            'recipient' => $this->recipientEmail,
            'subject' => $this->subject,
            'message' => $this->message,
            'status' => 'queued',
        ]);

        try {
            Mail::send('emails.broadcast', [
                'subject' => $this->subject,
                'message' => $this->message,
            ], function ($message) {
                $message->to($this->recipientEmail)
                    ->subject($this->subject);
            });

            $log->update(['status' => 'sent', 'sent_at' => now()]);
        } catch (\Exception $e) {
            $log->update(['status' => 'failed', 'error_message' => $e->getMessage()]);
            throw $e;
        }
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Broadcast email failed for {$this->recipientEmail}: {$exception->getMessage()}");
    }
}
