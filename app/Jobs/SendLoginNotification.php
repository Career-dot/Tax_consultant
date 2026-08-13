<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendLoginNotification implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 30;
    public int $backoff = 60;

    public function __construct(public $user)
    {
    }

    public function handle(): void
    {
        Mail::send('emails.login_notification', ['user' => $this->user], function ($message) {
            $message->to($this->user->email)
                ->subject('Login Notification - FINANIC');
        });
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Login notification email failed for user {$this->user->id}: {$exception->getMessage()}");
    }
}
