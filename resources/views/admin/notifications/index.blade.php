@extends('admin.layout')

@section('title', 'Notifications Log')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Notifications Log</h2>
        <p>Track all sent email and SMS notifications to subscribers.</p>
    </div>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Type</th>
                    <th>Channel</th>
                    <th>Recipient</th>
                    <th>Subject</th>
                    <th>Status</th>
                    <th>Sent At</th>
                </tr>
            </thead>
            <tbody>
                @forelse($notifications as $notif)
                    <tr>
                        <td>
                            <span class="adm-badge adm-badge-purple">
                                {{ str_replace('_', ' ', ucfirst($notif->type)) }}
                            </span>
                        </td>
                        <td>
                            <span class="adm-badge adm-badge-blue">
                                <i class="fas fa-{{ $notif->channel === 'email' ? 'envelope' : ($notif->channel === 'sms' ? 'sms' : 'paper-plane') }}" style="font-size: 10px;"></i>
                                {{ ucfirst($notif->channel) }}
                            </span>
                        </td>
                        <td>{{ $notif->recipient }}</td>
                        <td>{{ $notif->subject ?? '-' }}</td>
                        <td>
                            <span class="adm-badge {{ $notif->status === 'sent' ? 'adm-badge-green' : ($notif->status === 'failed' ? 'adm-badge-red' : 'adm-badge-gold') }}">
                                <span class="adm-badge-dot"></span>
                                {{ ucfirst($notif->status) }}
                            </span>
                            @if($notif->error_message)
                                <div style="font-size: 11px; color: #dc2626; margin-top: 4px; max-width: 200px;">
                                    {{ Str::limit($notif->error_message, 50) }}
                                </div>
                            @endif
                        </td>
                        <td>{{ $notif->sent_at ? $notif->sent_at->diffForHumans() : '-' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-bell-slash"></i></div>
                                <h6>No notifications logged</h6>
                                <p>Sent notifications will appear here for tracking.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($notifications, 'links'))
        <div style="padding: 16px 24px; border-top: 1px solid var(--border-light);">
            <style>
                nav[role="navigation"] svg { width: 20px; height: 20px; }
            </style>
            {{ $notifications->links() }}
        </div>
    @endif
</div>
@endsection
