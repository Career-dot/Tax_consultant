<?php

namespace App\Jobs;

use App\Models\Payment;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendPaymentStatusEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 30;
    public int $backoff = 60;

    public function __construct(
        public Payment $payment,
        public string $status
    ) {
    }

    public function handle(): void
    {
        $template = $this->status === 'approved' ? 'emails.payment_approved' : 'emails.payment_rejected';
        $subject = $this->status === 'approved'
            ? 'Payment Confirmed - FINANIC'
            : 'Payment Not Verified - FINANIC';

        Mail::send($template, [
            'user' => $this->payment->user,
            'payment' => $this->payment,
        ], function ($message) use ($subject) {
            $message->to($this->payment->user->email)
                ->subject($subject);
        });
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Payment status email failed for payment {$this->payment->id}: {$exception->getMessage()}");
    }
}
