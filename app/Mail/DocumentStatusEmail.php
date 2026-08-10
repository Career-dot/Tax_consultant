<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Attachment;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;

class DocumentStatusEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $document;
    public $status;
    public $rejectionReason;

    public function __construct($document, $status, $rejectionReason = null)
    {
        $this->document = $document;
        $this->status = $status;
        $this->rejectionReason = $rejectionReason;
    }

    public function envelope(): Envelope
    {
        return new Envelope(
            subject: 'Document ' . ucfirst($this->status) . ' - FINANIC',
        );
    }

    public function content(): Content
    {
        return new Content(
            html: 'emails.document_status',
        );
    }

    public function attachments(): array
    {
        return [];
    }
}
