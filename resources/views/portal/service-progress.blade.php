@extends('layouts.app')

@section('title', $service->name . ' - Progress')

@section('content')
<style>
    .portal-container {
        max-width: 1000px;
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

    .service-icon-lg {
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

    .page-info .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 4px 12px;
        background: #e8f5ee;
        color: #0f7a4e;
        border-radius: 20px;
        font-size: 13px;
        font-weight: 600;
    }

    .progress-section {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 24px;
    }

    .progress-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 24px;
    }

    .progress-percentage {
        font-size: 48px;
        font-weight: 800;
        color: #0f7a4e;
    }

    .progress-label {
        font-size: 14px;
        color: #60706a;
    }

    .progress-bar-lg {
        height: 12px;
        background: #e8f5ee;
        border-radius: 6px;
        overflow: hidden;
        margin-bottom: 32px;
    }

    .progress-fill-lg {
        height: 100%;
        background: linear-gradient(90deg, #0f7a4e, #18a66a);
        border-radius: 6px;
        transition: width 0.5s ease;
    }

    .steps-list {
        display: grid;
        gap: 0;
    }

    .step-item {
        display: flex;
        gap: 16px;
        padding: 16px 0;
        position: relative;
    }

    .step-item:not(:last-child)::after {
        content: '';
        position: absolute;
        left: 19px;
        top: 56px;
        bottom: 0;
        width: 2px;
        background: #e8f5ee;
    }

    .step-item.completed::after {
        background: #0f7a4e;
    }

    .step-icon {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 16px;
        flex-shrink: 0;
        z-index: 1;
    }

    .step-icon.completed {
        background: #0f7a4e;
        color: #fff;
    }

    .step-icon.current {
        background: #18a66a;
        color: #fff;
        box-shadow: 0 0 0 4px rgba(24, 166, 106, 0.2);
    }

    .step-icon.pending {
        background: #e8f5ee;
        color: #60706a;
    }

    .step-content h4 {
        font-size: 16px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 4px;
    }

    .step-content p {
        font-size: 13px;
        color: #60706a;
    }

    .content-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px;
    }

    .info-card {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        padding: 24px;
    }

    .info-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 16px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .info-card h3 i {
        color: #0f7a4e;
    }

    .info-row {
        display: flex;
        justify-content: space-between;
        padding: 12px 0;
        border-bottom: 1px solid #e8f5ee;
    }

    .info-row:last-child {
        border-bottom: none;
    }

    .info-label {
        font-size: 14px;
        color: #60706a;
    }

    .info-value {
        font-size: 14px;
        font-weight: 600;
        color: #10201a;
    }

    .documents-grid {
        display: grid;
        gap: 12px;
        margin-top: 16px;
    }

    .doc-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f6faf8;
        border-radius: 10px;
    }

    .doc-icon {
        width: 40px;
        height: 40px;
        background: #e8f5ee;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
    }

    .doc-info {
        flex: 1;
    }

    .doc-name {
        font-weight: 600;
        font-size: 14px;
        color: #10201a;
    }

    .doc-meta {
        font-size: 12px;
        color: #60706a;
    }

    @media (max-width: 768px) {
        .content-grid { grid-template-columns: 1fr; }
        .progress-percentage { font-size: 36px; }
    }
</style>

<div class="portal-container">
    <a href="{{ route('portal.dashboard') }}" class="back-link">
        <i class="fa fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="page-header">
        <div class="service-icon-lg">
            <i class="fa {{ $service->icon }}"></i>
        </div>
        <div class="page-info">
            <h1>{{ $service->name }}</h1>
            <span class="status-badge">
                <i class="fa fa-circle" style="font-size: 8px;"></i>
                {{ ucfirst($userService->pivot->status) }}
            </span>
        </div>
    </div>

    <!-- Progress Section -->
    <div class="progress-section">
        <div class="progress-header">
            <div>
                <div class="progress-percentage">{{ $progress['percentage'] }}%</div>
                <div class="progress-label">Complete</div>
            </div>
            <div style="text-align: right;">
                <div style="font-size: 18px; font-weight: 700; color: #10201a;">Step {{ $progress['current_step'] }} of {{ $progress['total_steps'] }}</div>
                <div class="progress-label">Current Step</div>
            </div>
        </div>

        <div class="progress-bar-lg">
            <div class="progress-fill-lg" style="width: {{ $progress['percentage'] }}%"></div>
        </div>

        <div class="steps-list">
            @foreach($progress['steps'] as $stepNum => $step)
                <div class="step-item {{ $step['completed'] ? 'completed' : ($stepNum === $progress['current_step'] ? 'current' : '') }}">
                    <div class="step-icon {{ $step['completed'] ? 'completed' : ($stepNum === $progress['current_step'] ? 'current' : 'pending') }}">
                        @if($step['completed'])
                            <i class="fa fa-check"></i>
                        @elseif($stepNum === $progress['current_step'])
                            <i class="fa fa-spinner"></i>
                        @else
                            {{ $stepNum }}
                        @endif
                    </div>
                    <div class="step-content">
                        <h4>{{ $step['name'] }}</h4>
                        <p>
                            @if($step['completed'])
                                Completed
                            @elseif($stepNum === $progress['current_step'])
                                In Progress
                            @else
                                Pending
                            @endif
                        </p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
        <!-- Service Info -->
        <div class="info-card">
            <h3><i class="fa fa-info-circle"></i> Service Details</h3>
            <div class="info-row">
                <span class="info-label">Assigned Date</span>
                <span class="info-value">{{ $userService->pivot->assigned_at ? \Carbon\Carbon::parse($userService->pivot->assigned_at)->format('M d, Y') : 'N/A' }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Status</span>
                <span class="info-value">{{ ucfirst($userService->pivot->status) }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Service Type</span>
                <span class="info-value">{{ $service->name }}</span>
            </div>
            @if($userService->pivot->notes)
                <div style="margin-top: 16px;">
                    <span class="info-label">Notes</span>
                    <p style="margin-top: 8px; font-size: 14px; color: #10201a;">{{ $userService->pivot->notes }}</p>
                </div>
            @endif
        </div>

        <!-- Recent Notifications -->
        <div class="info-card">
            <h3><i class="fa fa-bell"></i> Updates</h3>
            @if($notifications->count() > 0)
                @foreach($notifications->take(5) as $notif)
                    <div style="padding: 12px 0; border-bottom: 1px solid #e8f5ee;">
                        <div style="font-weight: 600; font-size: 14px; color: #10201a;">{{ $notif->title }}</div>
                        <div style="font-size: 13px; color: #60706a; margin-top: 4px;">{{ Str::limit($notif->message, 100) }}</div>
                        <div style="font-size: 12px; color: #7d8b86; margin-top: 4px;">{{ $notif->created_at->diffForHumans() }}</div>
                    </div>
                @endforeach
            @else
                <div class="empty-state">
                    <p>No updates yet for this service.</p>
                </div>
            @endif
        </div>
    </div>

    <!-- Documents for this service -->
    <div class="info-card" style="margin-top: 24px;">
        <h3><i class="fa fa-file-alt"></i> Documents</h3>
        @if($documents->count() > 0)
            <div class="documents-grid">
                @foreach($documents as $doc)
                    <div class="doc-item">
                        <div class="doc-icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <div class="doc-info">
                            <div class="doc-name">{{ $doc->name }}</div>
                            <div class="doc-meta">{{ number_format($doc->file_size / 1024, 1) }} KB</div>
                        </div>
                        <a href="{{ route('portal.documents.download', $doc->id) }}" class="btn btn-outline" style="padding: 6px 12px;">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="empty-state">
                <p>No documents uploaded for this service yet.</p>
                <a href="{{ route('portal.dashboard') }}" class="btn btn-primary" style="margin-top: 12px;">
                    <i class="fa fa-upload"></i> Upload Document
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
