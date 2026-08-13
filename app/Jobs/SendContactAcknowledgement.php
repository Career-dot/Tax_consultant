<?php

namespace App\Jobs;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendContactAcknowledgement implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 30;
    public int $backoff = 60;

    public function __construct(public Contact $contact)
    {
    }

    public function handle(): void
    {
        Mail::send('emails.contact_acknowledgement', ['contact' => $this->contact], function ($message) {
            $message->to($this->contact->email)
                ->subject('Thank you for contacting FINANIC Business Consultants');
        });
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Contact acknowledgement email failed for contact {$this->contact->id}: {$exception->getMessage()}");
    }
}
