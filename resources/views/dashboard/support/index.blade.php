@extends('layouts.dashboard')

@section('title', 'Support Tickets - Tax Consultant')

@section('content')
    @php
        $faqs = [
            ['q' => 'How long does a personal tax filing take?', 'a' => 'Most personal tax returns are reviewed and filed within 1-3 working days after all documents are received.'],
            ['q' => 'How do I upload additional documents?', 'a' => 'Go to Uploaded Documents from the sidebar, choose a document type, and upload your file — you can optionally link it to an application.'],
            ['q' => 'How can I pay an outstanding invoice?', 'a' => 'Visit the Payments page and click "Pay Now" next to any pending payment.'],
            ['q' => 'How do I track my application status?', 'a' => 'Open My Applications from the sidebar and click any application to see its full status timeline.'],
        ];
    @endphp

    <x-dashboard.page-header title="Support Tickets" subtitle="Get help from our tax consultants." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Support Tickets']]" />

    <div class="pfd-grid " style="align-items:start;">
        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Your Tickets</h2>
                    <p>{{ count($tickets) }} ticket(s) on record.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                @if (count($tickets))
                    <div style="display:flex; flex-direction:column; gap:12px;">
                        @foreach ($tickets as $ticket)
                            <a class="pfd-app-card" href="{{ route('dashboard.support.show', $ticket['id']) }}" style="text-decoration:none;">
                                <span class="pfd-app-card-icon"><i class="pe-7s-ticket" aria-hidden="true"></i></span>
                                <div class="pfd-app-card-body">
                                    <h3>{{ $ticket['subject'] }}</h3>
                                    <p>{{ $ticket['reference'] }} · {{ $ticket['category'] }}</p>
                                </div>
                                <x-dashboard.status-badge :status="$ticket['status']" />
                            </a>
                        @endforeach
                    </div>
                @else
                    <x-dashboard.empty-state icon="pe-7s-ticket" title="No tickets yet" text="Open your first support ticket using the form." />
                @endif
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Open a New Ticket</h2>
                    <p>Our team typically replies within one business day.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                <form action="{{ route('dashboard.support.store') }}" method="post">
                    @csrf
                    <div class="pfd-field">
                        <label for="ticketSubject">Subject</label>
                        <input id="ticketSubject" name="subject" type="text" value="{{ old('subject') }}" class="{{ $errors->has('subject') ? 'is-invalid' : '' }}" required>
                        @error('subject')<span class="pfd-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="pfd-grid pfd-grid-2">
                        <div class="pfd-field">
                            <label for="ticketCategory">Category</label>
                            <select id="ticketCategory" name="category" required>
                                <option>Tax Filing</option>
                                <option>Business Registration</option>
                                <option>Payments &amp; Invoices</option>
                                <option>Documents</option>
                                <option>General</option>
                            </select>
                        </div>
                        <div class="pfd-field">
                            <label for="ticketPriority">Priority</label>
                            <select id="ticketPriority" name="priority" required>
                                <option>Low</option>
                                <option selected>Normal</option>
                                <option>High</option>
                                <option>Urgent</option>
                            </select>
                        </div>
                    </div>
                    <div class="pfd-field">
                        <label for="ticketMessage">Message</label>
                        <textarea id="ticketMessage" name="message" placeholder="Describe your issue..." class="{{ $errors->has('message') ? 'is-invalid' : '' }}" required>{{ old('message') }}</textarea>
                        @error('message')<span class="pfd-error">{{ $message }}</span>@enderror
                    </div>
                    <button class="pfd-btn pfd-btn-primary" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>

    <div class="pfd-card pfd-reveal" style="margin-top: var(--pfd-gap);">
        <div class="pfd-card-header">
            <div>
                <h2>Frequently Asked Questions</h2>
                <p>Quick answers before you open a ticket.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            @foreach ($faqs as $faq)
                <div class="pfd-faq-item" data-faq-item>
                    <button class="pfd-faq-question" type="button" data-faq-toggle>
                        {{ $faq['q'] }}
                        <i class="fa fa-angle-down" aria-hidden="true"></i>
                    </button>
                    <div class="pfd-faq-answer">
                        <p>{{ $faq['a'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="pfd-chat-widget pfd-no-print">
        <button class="pfd-chat-bubble" type="button" title="Chat with support (coming soon)" aria-label="Chat with support">
            <i class="fa fa-comments" aria-hidden="true"></i>
        </button>
    </div>
@endsection

@push('scripts')
    <script>
        document.querySelectorAll('[data-faq-toggle]').forEach((btn) => {
            btn.addEventListener('click', () => {
                btn.closest('[data-faq-item]').classList.toggle('is-open');
            });
        });
    </script>
@endpush
