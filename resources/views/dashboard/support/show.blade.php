@extends('layouts.dashboard')

@section('title', $ticket['reference'].' - Tax Consultant')

@section('content')
    <x-dashboard.page-header :title="$ticket['subject']" :subtitle="$ticket['reference'].' · '.$ticket['category']" :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Support Tickets', 'url' => route('dashboard.support')], ['label' => $ticket['reference']]]">
        <x-slot:actions>
            <x-dashboard.status-badge :status="$ticket['status']" />
        </x-slot:actions>
    </x-dashboard.page-header>

    <div class="pfd-card pfd-reveal">
        <div class="pfd-card-body">
            <div class="pfd-thread">
                @foreach ($ticket['messages'] as $message)
                    <div class="pfd-thread-msg is-{{ $message['from'] === 'user' ? 'user' : 'support' }}">
                        <span class="pfd-avatar">{{ strtoupper(substr($message['author'], 0, 1)) }}</span>
                        <div>
                            <div class="pfd-thread-bubble">
                                <p>{{ $message['message'] }}</p>
                            </div>
                            <span class="pfd-thread-meta">{{ $message['author'] }} · {{ \Carbon\Carbon::parse($message['at'])->diffForHumans() }}</span>
                        </div>
                    </div>
                @endforeach
            </div>

            @if ($ticket['status'] !== 'closed')
                <form action="{{ route('dashboard.support.reply', $ticket['id']) }}" method="post" style="margin-top:26px; border-top:1px solid var(--pf-line); padding-top:20px;">
                    @csrf
                    <div class="pfd-field">
                        <label for="replyMessage">Reply</label>
                        <textarea id="replyMessage" name="message" placeholder="Write your reply..." required></textarea>
                    </div>
                    <button class="pfd-btn pfd-btn-primary" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i> Send Reply</button>
                </form>
            @else
                <p style="margin-top:20px; color:var(--pf-muted); font-size:13.5px;">This ticket is closed. Open a new ticket if you need further help.</p>
            @endif
        </div>
    </div>
@endsection
