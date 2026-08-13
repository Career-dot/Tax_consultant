<?php

namespace App\Jobs;

use App\Models\Document;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendDocumentStatusEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public int $tries = 3;
    public int $timeout = 30;
    public int $backoff = 60;

    public function __construct(
        public Document $document,
        public string $status,
        public ?string $rejectionReason = null
    ) {
    }

    public function handle(): void
    {
        $template = $this->status === 'approved' ? 'emails.document_approved' : 'emails.document_rejected';
        $subject = $this->status === 'approved'
            ? "Document Approved: {$this->document->name} - FINANIC"
            : "Document Requires Revision: {$this->document->name} - FINANIC";

        Mail::send($template, [
            'user' => $this->document->user,
            'document' => $this->document,
        ], function ($message) use ($subject) {
            $message->to($this->document->user->email)
                ->subject($subject);
        });
    }

    public function failed(\Throwable $exception): void
    {
        \Log::error("Document status email failed for document {$this->document->id}: {$exception->getMessage()}");
    }
}
