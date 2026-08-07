@extends('layouts.app')

@section('title', 'My Notifications')

@section('content')
<style>
    .portal-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #60706a;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 24px;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #0f7a4e;
    }

    .page-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
    }

    .page-icon {
        width: 72px;
        height: 72px;
        background: #e8f5ee;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
        font-size: 32px;
    }

    .page-info h1 {
        font-size: 28px;
        font-weight: 800;
        color: #10201a;
        margin-bottom: 4px;
    }

    .page-info p {
        font-size: 14px;
        color: #60706a;
    }

    .notifications-card {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        overflow: hidden;
    }

    .notification-item {
        display: flex;
        gap: 16px;
        padding: 20px 24px;
        border-bottom: 1px solid #e8f5ee;
        transition: background 0.2s;
    }

    .notification-item:hover {
        background: #f6faf8;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notification-item.unread {
        background: #f0fdf4;
    }

    .notif-icon {
        width: 44px;
        height: 44px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 18px;
        flex-shrink: 0;
    }

    .notif-icon.welcome { background: #e8f5ee; color: #0f7a4e; }
    .notif-icon.update { background: #eef4f8; color: #1e4668; }
    .notif-icon.reminder { background: #fef3c7; color: #b9892f; }
    .notif-icon.success { background: #e8f5ee; color: #0f7a4e; }
    .notif-icon.error { background: #fef0ed; color: #ef785a; }

    .notif-content {
        flex: 1;
    }

    .notif-header {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 6px;
    }

    .notif-title {
        font-size: 15px;
        font-weight: 700;
        color: #10201a;
    }

    .notif-time {
        font-size: 12px;
        color: #7d8b86;
        white-space: nowrap;
    }

    .notif-message {
        font-size: 14px;
        color: #60706a;
        line-height: 1.5;
        margin-bottom: 8px;
    }

    .notif-service {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #0f7a4e;
        background: #e8f5ee;
        padding: 3px 10px;
        border-radius: 6px;
        font-weight: 500;
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #60706a;
    }

    .empty-state i {
        font-size: 56px;
        color: #dce7e1;
        margin-bottom: 16px;
    }

    .empty-state h3 {
        font-size: 18px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 8px;
    }

    .empty-state p {
        font-size: 14px;
        margin: 0;
    }

    .btn {
        padding: 8px 16px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
        border: none;
        cursor: pointer;
    }

    .btn-primary {
        background: #0f7a4e;
        color: #fff;
    }

    .btn-primary:hover {
        background: #084b31;
    }

    .btn-outline {
        background: transparent;
        border: 1.5px solid #dce7e1;
        color: #60706a;
    }

    .btn-outline:hover {
        border-color: #0f7a4e;
        color: #0f7a4e;
    }
</style>

<div class="portal-container">
    <a href="{{ route('portal.dashboard') }}" class="back-link">
        <i class="fa fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="page-header">
        <div class="page-icon">
            <i class="fa fa-bell"></i>
        </div>
        <div class="page-info">
            <h1>Notifications</h1>
            <p>Stay updated on your services and deadlines</p>
        </div>
    </div>

    <div class="notifications-card">
        @if($notifications->count() > 0)
            @foreach($notifications as $notif)
                <div class="notification-item {{ !$notif->is_read ? 'unread' : '' }}">
                    <div class="notif-icon {{ $notif->type }}">
                        @if($notif->type === 'welcome')
                            <i class="fa fa-hand-peace-o"></i>
                        @elseif($notif->type === 'reminder')
                            <i class="fa fa-clock-o"></i>
                        @elseif($notif->type === 'success')
                            <i class="fa fa-check-circle"></i>
                        @elseif($notif->type === 'error')
                            <i class="fa fa-exclamation-circle"></i>
                        @else
                            <i class="fa fa-info-circle"></i>
                        @endif
                    </div>
                    <div class="notif-content">
                        <div class="notif-header">
                            <div class="notif-title">{{ $notif->title }}</div>
                            <div class="notif-time">{{ $notif->created_at->diffForHumans() }}</div>
                        </div>
                        <div class="notif-message">{{ $notif->message }}</div>
                        @if($notif->service)
                            <span class="notif-service">
                                <i class="fa fa-briefcase"></i> {{ $notif->service->name }}
                            </span>
                        @endif
                    </div>
                </div>
            @endforeach

            <div style="padding: 16px 24px; text-align: center;">
                {{ $notifications->links() }}
            </div>
        @else
            <div class="empty-state">
                <i class="fa fa-bell-slash"></i>
                <h3>No Notifications</h3>
                <p>You're all caught up! Notifications about your services will appear here.</p>
                <a href="{{ route('portal.dashboard') }}" class="btn btn-primary" style="margin-top: 16px;">
                    <i class="fa fa-home"></i> Back to Dashboard
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
