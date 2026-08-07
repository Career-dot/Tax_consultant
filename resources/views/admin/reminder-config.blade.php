@extends('admin.layout')

@section('title', 'Reminder Configuration')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Reminder Configuration</h2>
        <p>Configure automated reminder timings and channels for subscribers.</p>
    </div>
</div>

<div class="row g-4">
    <div class="col-lg-6">
        <div class="adm-info-card anim-fade-up anim-delay-2">
            <div class="adm-info-card-header icon-green">
                <i class="fas fa-cog"></i>
                <h5>Reminder Timing Settings</h5>
            </div>
            <div class="adm-info-card-body">
                <form action="{{ route('admin.reminder-config.update') }}" method="POST" class="adm-form">
                    @csrf
                    @method('PUT')

                    <div class="adm-toggle">
                        <div class="adm-toggle-info">
                            <h6><i class="fas fa-envelope" style="color: var(--accent-blue); margin-right: 6px;"></i> First Reminder</h6>
                            <small>7 days before deadline &middot; Email only</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="reminder_7day" value="1" id="rem7" checked>
                        </div>
                    </div>

                    <div class="adm-toggle">
                        <div class="adm-toggle-info">
                            <h6><i class="fas fa-exclamation-triangle" style="color: var(--accent-gold); margin-right: 6px;"></i> Second Reminder</h6>
                            <small>2 days before deadline &middot; Email + SMS</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="reminder_2day" value="1" id="rem2" checked>
                        </div>
                    </div>

                    <div class="adm-toggle">
                        <div class="adm-toggle-info">
                            <h6><i class="fas fa-bell" style="color: var(--accent-coral); margin-right: 6px;"></i> Final Reminder</h6>
                            <small>On deadline day &middot; SMS only</small>
                        </div>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" name="reminder_today" value="1" id="rem0" checked>
                        </div>
                    </div>

                    <div style="padding-top: 20px;">
                        <button type="submit" class="adm-btn adm-btn-primary">
                            <i class="fas fa-save"></i> Save Configuration
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="col-lg-6">
        <div class="adm-info-card anim-fade-up anim-delay-3">
            <div class="adm-info-card-header icon-blue">
                <i class="fas fa-info-circle"></i>
                <h5>How Reminders Work</h5>
            </div>
            <div class="adm-info-card-body">
                <div class="mb-4">
                    <h6 style="font-size: 14px; font-weight: 700; margin-bottom: 8px;">
                        <i class="fas fa-envelope" style="color: var(--accent-blue); margin-right: 6px;"></i> Email Reminders
                    </h6>
                    <ul style="color: var(--muted); font-size: 13px; padding-left: 20px; margin: 0;">
                        <li>Sent to subscribers with email reminders enabled</li>
                        <li>Contains deadline details and statutory basis</li>
                        <li>Configurable intervals (7, 2, 0 days)</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h6 style="font-size: 14px; font-weight: 700; margin-bottom: 8px;">
                        <i class="fas fa-mobile-alt" style="color: var(--primary); margin-right: 6px;"></i> SMS Reminders
                    </h6>
                    <ul style="color: var(--muted); font-size: 13px; padding-left: 20px; margin: 0;">
                        <li>Sent to subscribers with SMS reminders enabled</li>
                        <li>Short message with deadline name and due date</li>
                        <li>Requires SMS API integration (Twilio, SMSGateway, etc.)</li>
                    </ul>
                </div>
                <div>
                    <h6 style="font-size: 14px; font-weight: 700; margin-bottom: 8px;">
                        <i class="fas fa-terminal" style="color: var(--accent-gold); margin-right: 6px;"></i> Command to Run
                    </h6>
                    <code style="display: block; background: var(--surface); padding: 10px 14px; border-radius: var(--radius-sm); font-size: 13px; color: var(--ink); border: 1px solid var(--border-light); margin-top: 6px;">
                        php artisan planner:send-reminders
                    </code>
                    <p style="color: var(--muted); font-size: 12px; margin-top: 6px; margin-bottom: 0;">Schedule this command daily via cron to process reminders.</p>
                </div>
            </div>
        </div>

        <div class="adm-info-card mt-4 anim-fade-up anim-delay-4">
            <div class="adm-info-card-header icon-gold">
                <i class="fas fa-broadcast-tower"></i>
                <h5>One-Off Broadcast</h5>
            </div>
            <div class="adm-info-card-body">
                <p style="color: var(--muted); font-size: 14px; margin-bottom: 16px;">Send a manual message to all or filtered subscribers (e.g., FBR deadline extension notice).</p>
                <a href="{{ route('admin.dashboard') }}#broadcast" class="adm-btn adm-btn-primary">
                    <i class="fas fa-paper-plane"></i> Send Broadcast
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
