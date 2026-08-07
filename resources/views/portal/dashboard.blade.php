@extends('layouts.app')

@section('title', 'My Dashboard')

@section('content')
<style>
    .portal-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 32px 24px;
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(135deg, #0f7a4e 0%, #084b31 100%);
        color: #fff;
        border-radius: 20px;
        padding: 36px 40px;
        margin-bottom: 28px;
        position: relative;
        overflow: hidden;
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .welcome-banner::before {
        content: '';
        position: absolute;
        top: -60%;
        right: -10%;
        width: 350px;
        height: 350px;
        background: rgba(255,255,255,0.05);
        border-radius: 50%;
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        bottom: -40%;
        right: 15%;
        width: 200px;
        height: 200px;
        background: rgba(255,255,255,0.03);
        border-radius: 50%;
    }

    .welcome-text h1 {
        font-size: 26px;
        font-weight: 800;
        margin-bottom: 6px;
    }

    .welcome-text p {
        font-size: 15px;
        opacity: 0.9;
    }

    .welcome-date {
        font-size: 13px;
        opacity: 0.8;
        margin-top: 8px;
    }

    .welcome-actions {
        display: flex;
        gap: 12px;
        z-index: 1;
    }

    .welcome-actions .btn {
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 6px;
        transition: all 0.2s ease;
    }

    .btn-welcome-primary {
        background: #fff;
        color: #0f7a4e;
    }

    .btn-welcome-primary:hover {
        background: #f0fdf4;
        transform: translateY(-1px);
    }

    .btn-welcome-outline {
        background: transparent;
        border: 1.5px solid rgba(255,255,255,0.4);
        color: #fff;
    }

    .btn-welcome-outline:hover {
        border-color: #fff;
        background: rgba(255,255,255,0.1);
    }

    /* Stats Row */
    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 28px;
    }

    .stat-box {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 14px;
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all 0.2s ease;
    }

    .stat-box:hover {
        box-shadow: 0 4px 16px rgba(16, 32, 26, 0.08);
        transform: translateY(-2px);
    }

    .stat-icon {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        flex-shrink: 0;
    }

    .stat-icon.green { background: #e8f5ee; color: #0f7a4e; }
    .stat-icon.blue { background: #eef4f8; color: #1e4668; }
    .stat-icon.gold { background: #fef3c7; color: #b9892f; }
    .stat-icon.coral { background: #fef0ed; color: #ef785a; }

    .stat-content .stat-value {
        font-size: 24px;
        font-weight: 800;
        color: #10201a;
        line-height: 1;
    }

    .stat-content .stat-label {
        font-size: 13px;
        color: #60706a;
        margin-top: 4px;
    }

    /* Main Grid Layout */
    .main-grid {
        display: grid;
        grid-template-columns: 1fr 380px;
        gap: 24px;
        margin-bottom: 28px;
    }

    /* Section Cards */
    .section-card {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        overflow: hidden;
    }

    .section-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 24px;
        border-bottom: 1px solid #e8f5ee;
    }

    .section-header h3 {
        font-size: 16px;
        font-weight: 700;
        color: #10201a;
        display: flex;
        align-items: center;
        gap: 10px;
        margin: 0;
    }

    .section-header h3 i {
        color: #0f7a4e;
        font-size: 14px;
    }

    .section-body {
        padding: 20px 24px;
    }

    /* Services Grid */
    .services-grid {
        display: grid;
        gap: 16px;
    }

    .service-card {
        background: #f6faf8;
        border: 1px solid #e8f5ee;
        border-radius: 14px;
        padding: 20px;
        transition: all 0.2s ease;
    }

    .service-card:hover {
        border-color: #0f7a4e;
        box-shadow: 0 4px 12px rgba(15, 122, 78, 0.1);
    }

    .service-card-top {
        display: flex;
        justify-content: space-between;
        align-items: flex-start;
        margin-bottom: 14px;
    }

    .service-card-info {
        display: flex;
        gap: 14px;
        align-items: center;
    }

    .service-icon {
        width: 48px;
        height: 48px;
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
        font-size: 20px;
    }

    .service-name {
        font-size: 15px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 4px;
    }

    .service-status {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 12px;
        color: #60706a;
    }

    .status-dot {
        width: 7px;
        height: 7px;
        border-radius: 50%;
        background: #0f7a4e;
    }

    .status-dot.pending { background: #b9892f; }
    .status-dot.completed { background: #0f7a4e; }

    .service-percentage {
        font-size: 20px;
        font-weight: 800;
        color: #0f7a4e;
    }

    .progress-bar {
        height: 8px;
        background: #e8f5ee;
        border-radius: 4px;
        overflow: hidden;
        margin-bottom: 12px;
    }

    .progress-fill {
        height: 100%;
        background: linear-gradient(90deg, #0f7a4e, #18a66a);
        border-radius: 4px;
        transition: width 0.5s ease;
    }

    .progress-info {
        display: flex;
        justify-content: space-between;
        font-size: 12px;
        color: #60706a;
        margin-bottom: 14px;
    }

    .service-latest-update {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 8px;
        padding: 10px 12px;
        margin-bottom: 14px;
    }

    .latest-update-label {
        font-size: 11px;
        color: #7d8b86;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        margin-bottom: 4px;
    }

    .latest-update-text {
        font-size: 13px;
        color: #10201a;
        font-weight: 500;
    }

    .service-actions {
        display: flex;
        gap: 8px;
    }

    .btn {
        padding: 8px 14px;
        border-radius: 8px;
        font-size: 12px;
        font-weight: 600;
        text-decoration: none;
        display: inline-flex;
        align-items: center;
        gap: 5px;
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

    /* Documents Section */
    .documents-section {
        margin-bottom: 0;
    }

    .required-docs-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .required-docs-title {
        font-size: 14px;
        font-weight: 600;
        color: #10201a;
    }

    .required-docs-badge {
        font-size: 11px;
        background: #e8f5ee;
        color: #0f7a4e;
        padding: 3px 8px;
        border-radius: 10px;
        font-weight: 600;
    }

    .required-docs-list {
        display: grid;
        gap: 8px;
        margin-bottom: 20px;
    }

    .required-doc-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: #fef3c7;
        border: 1px solid #fde68a;
        border-radius: 8px;
        font-size: 13px;
        color: #92400e;
    }

    .required-doc-item.uploaded {
        background: #e8f5ee;
        border-color: #86efac;
        color: #166534;
    }

    .required-doc-item i {
        font-size: 14px;
        flex-shrink: 0;
    }

    .required-doc-item .check-icon {
        color: #0f7a4e;
    }

    /* Upload Area */
    .upload-area {
        border: 2px dashed #dce7e1;
        border-radius: 12px;
        padding: 24px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-bottom: 16px;
        background: #f6faf8;
    }

    .upload-area:hover {
        border-color: #0f7a4e;
        background: #e8f5ee;
    }

    .upload-area i {
        font-size: 36px;
        color: #dce7e1;
        margin-bottom: 8px;
    }

    .upload-area p {
        color: #60706a;
        font-size: 13px;
        margin: 0;
    }

    .upload-area .highlight {
        color: #0f7a4e;
        font-weight: 600;
    }

    /* Add Document Button */
    .add-doc-btn {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        width: 100%;
        padding: 12px;
        background: #0f7a4e;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 14px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        margin-bottom: 16px;
    }

    .add-doc-btn:hover {
        background: #084b31;
        transform: translateY(-1px);
    }

    /* Documents List */
    .documents-list {
        display: grid;
        gap: 10px;
        max-height: 300px;
        overflow-y: auto;
    }

    .document-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f6faf8;
        border-radius: 10px;
        transition: all 0.2s ease;
    }

    .document-item:hover {
        background: #e8f5ee;
    }

    .doc-icon {
        width: 38px;
        height: 38px;
        background: #e8f5ee;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
        font-size: 16px;
        flex-shrink: 0;
    }

    .doc-info {
        flex: 1;
        min-width: 0;
    }

    .doc-name {
        font-weight: 600;
        color: #10201a;
        font-size: 13px;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .doc-meta {
        font-size: 11px;
        color: #60706a;
    }

    .doc-actions {
        display: flex;
        gap: 6px;
    }

    .doc-actions .btn {
        padding: 5px 8px;
        font-size: 11px;
    }

    /* Notifications */
    .notifications-list {
        display: grid;
        gap: 0;
        max-height: 400px;
        overflow-y: auto;
    }

    .notification-item {
        display: flex;
        gap: 12px;
        padding: 14px 0;
        border-bottom: 1px solid #e8f5ee;
    }

    .notification-item:last-child {
        border-bottom: none;
    }

    .notif-icon {
        width: 38px;
        height: 38px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        flex-shrink: 0;
    }

    .notif-icon.info { background: #eef4f8; color: #1e4668; }
    .notif-icon.success { background: #e8f5ee; color: #0f7a4e; }
    .notif-icon.warning { background: #fef3c7; color: #b9892f; }
    .notif-icon.reminder { background: #fef3c7; color: #b9892f; }
    .notif-icon.error { background: #fef0ed; color: #ef785a; }

    .notif-content {
        flex: 1;
        min-width: 0;
    }

    .notif-title {
        font-size: 13px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 3px;
    }

    .notif-message {
        font-size: 12px;
        color: #60706a;
        line-height: 1.4;
    }

    .notif-time {
        font-size: 11px;
        color: #7d8b86;
        margin-top: 4px;
    }

    /* Planner Section */
    .planner-section {
        margin-top: 24px;
    }

    .planner-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 16px;
    }

    .planner-title {
        font-size: 14px;
        font-weight: 600;
        color: #10201a;
    }

    .deadline-list {
        display: grid;
        gap: 10px;
    }

    .deadline-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f6faf8;
        border-radius: 10px;
        border-left: 3px solid #0f7a4e;
    }

    .deadline-item.urgent {
        border-left-color: #ef785a;
        background: #fef0ed;
    }

    .deadline-item.warning {
        border-left-color: #b9892f;
        background: #fef3c7;
    }

    .deadline-icon {
        width: 36px;
        height: 36px;
        background: #fff;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
        font-size: 14px;
        flex-shrink: 0;
    }

    .deadline-item.urgent .deadline-icon { color: #ef785a; }
    .deadline-item.warning .deadline-icon { color: #b9892f; }

    .deadline-info {
        flex: 1;
    }

    .deadline-name {
        font-size: 13px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 2px;
    }

    .deadline-date {
        font-size: 11px;
        color: #60706a;
    }

    .deadline-badge {
        font-size: 11px;
        padding: 3px 8px;
        border-radius: 6px;
        font-weight: 600;
    }

    .badge-urgent { background: #fef0ed; color: #ef785a; }
    .badge-warning { background: #fef3c7; color: #b9892f; }
    .badge-normal { background: #e8f5ee; color: #0f7a4e; }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 32px;
        color: #60706a;
    }

    .empty-state i {
        font-size: 40px;
        color: #dce7e1;
        margin-bottom: 12px;
    }

    .empty-state h4 {
        font-size: 15px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 6px;
    }

    .empty-state p {
        font-size: 13px;
        margin: 0;
    }

    /* Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(16, 32, 26, 0.6);
        z-index: 99999;
        align-items: center;
        justify-content: center;
    }

    .modal-overlay.active {
        display: flex;
    }

    .custom-modal {
        background: #fff;
        border-radius: 16px;
        width: 100%;
        max-width: 520px;
        max-height: 90vh;
        overflow: hidden;
        position: relative;
        z-index: 100000;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    }

    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 24px;
        border-bottom: 1px solid #e8f5ee;
    }

    .modal-header h3 {
        font-size: 16px;
        font-weight: 700;
        color: #10201a;
        margin: 0;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        border: none;
        background: #f6faf8;
        border-radius: 8px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #60706a;
        transition: all 0.2s ease;
    }

    .modal-close:hover {
        background: #e8f5ee;
        color: #10201a;
    }

    .modal-body {
        padding: 24px;
    }

    .form-group {
        margin-bottom: 18px;
    }

    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 6px;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid #dce7e1;
        border-radius: 8px;
        font-size: 14px;
        color: #10201a;
        transition: all 0.2s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        outline: none;
        border-color: #0f7a4e;
        box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.1);
    }

    .form-hint {
        font-size: 11px;
        color: #60706a;
        margin-top: 4px;
    }

    /* Image Previews Grid */
    .image-previews {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        gap: 10px;
        margin-bottom: 16px;
    }

    .preview-item {
        position: relative;
        width: 100%;
        aspect-ratio: 1;
        border-radius: 10px;
        overflow: hidden;
        border: 2px solid #dce7e1;
    }

    .preview-item img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .preview-remove {
        position: absolute;
        top: 4px;
        right: 4px;
        width: 24px;
        height: 24px;
        background: rgba(0, 0, 0, 0.6);
        color: #fff;
        border: none;
        border-radius: 50%;
        cursor: pointer;
        font-size: 16px;
        line-height: 1;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .preview-remove:hover {
        background: #ef785a;
    }

    /* File List */
    .file-list {
        display: grid;
        gap: 8px;
    }

    .file-item {
        display: flex;
        align-items: center;
        gap: 10px;
        padding: 10px 12px;
        background: #f6faf8;
        border: 1px solid #e8f5ee;
        border-radius: 8px;
        font-size: 13px;
    }

    .file-item-name {
        flex: 1;
        font-weight: 500;
        color: #10201a;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .file-item-size {
        color: #60706a;
        font-size: 12px;
    }

    .file-item-remove {
        width: 24px;
        height: 24px;
        background: transparent;
        border: 1px solid #dce7e1;
        border-radius: 6px;
        color: #60706a;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.2s;
    }

    .file-item-remove:hover {
        background: #fef0ed;
        border-color: #ef785a;
        color: #ef785a;
    }

    /* Modal File Items */
    .file-item-modal {
        padding: 12px;
        background: #f6faf8;
        border: 1px solid #e8f5ee;
        border-radius: 10px;
        margin-bottom: 8px;
    }

    .file-item-header {
        display: flex;
        align-items: center;
        gap: 10px;
        margin-bottom: 8px;
    }

    .file-name-input {
        width: 100%;
        padding: 8px 12px;
        border: 1.5px solid #dce7e1;
        border-radius: 6px;
        font-size: 13px;
        color: #10201a;
        transition: border-color 0.2s;
    }

    .file-name-input:focus {
        outline: none;
        border-color: #0f7a4e;
    }

    .modal-footer {
        display: flex;
        gap: 10px;
        justify-content: flex-end;
        padding: 16px 24px;
        border-top: 1px solid #e8f5ee;
        background: #f6faf8;
    }

    .modal-footer .btn {
        padding: 10px 20px;
    }

    /* View All Link */
    .view-all-link {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        font-size: 13px;
        color: #0f7a4e;
        text-decoration: none;
        font-weight: 600;
    }

    .view-all-link:hover {
        text-decoration: underline;
    }

    /* Responsive */
    @media (max-width: 1200px) {
        .main-grid {
            grid-template-columns: 1fr;
        }
    }

    @media (max-width: 768px) {
        .stats-row { grid-template-columns: repeat(2, 1fr); }
        .welcome-banner {
            flex-direction: column;
            gap: 20px;
            text-align: center;
        }
        .welcome-actions { justify-content: center; }
        .portal-container { padding: 20px 16px; }
    }

    @media (max-width: 480px) {
        .stats-row { grid-template-columns: 1fr; }
    }
</style>

<div class="portal-container">
    <!-- Welcome Banner -->
    <div class="welcome-banner">
        <div class="welcome-text">
            <h1>Welcome back, {{ $user->name }}!</h1>
            <p>Manage your services, track progress, and upload documents.</p>
            <div class="welcome-date"><i class="fa fa-calendar"></i> {{ now()->format('l, F j, Y') }}</div>
        </div>
        <div class="welcome-actions">
            <a href="{{ route('portal.select-services') }}" class="btn btn-welcome-primary">
                <i class="fa fa-plus"></i> Add Service
            </a>
            <a href="{{ route('portal.payment') }}" class="btn btn-welcome-outline">
                <i class="fa fa-credit-card"></i> Make Payment
            </a>
            <a href="{{ route('portal.deadlines') }}" class="btn btn-welcome-outline">
                <i class="fa fa-calendar"></i> View Deadlines
            </a>
            <a href="{{ route('portal.history') }}" class="btn btn-welcome-outline">
                <i class="fa fa-history"></i> View History
            </a>
        </div>
    </div>

    <!-- Stats Row -->
    <div class="stats-row">
        <div class="stat-box">
            <div class="stat-icon green"><i class="fa fa-briefcase"></i></div>
            <div class="stat-content">
                <div class="stat-value">{{ $user->services->count() }}</div>
                <div class="stat-label">Active Services</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon blue"><i class="fa fa-file-text-o"></i></div>
            <div class="stat-content">
                <div class="stat-value">{{ $documents->count() }}</div>
                <div class="stat-label">Documents</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon gold"><i class="fa fa-line-chart"></i></div>
            <div class="stat-content">
                <div class="stat-value">{{ count($serviceProgress) > 0 ? round(collect($serviceProgress)->sum(function($p) { return $p['progress']['percentage']; }) / count($serviceProgress)) : 0 }}%</div>
                <div class="stat-label">Avg Progress</div>
            </div>
        </div>
        <div class="stat-box">
            <div class="stat-icon coral"><i class="fa fa-bell"></i></div>
            <div class="stat-content">
                <div class="stat-value">{{ $notifications->count() }}</div>
                <div class="stat-label">Notifications</div>
            </div>
        </div>
    </div>

    <!-- Main Grid -->
    <div class="main-grid">
        <!-- Left Column: Services & Documents -->
        <div>
            <!-- Services Section -->
            <div class="section-card" style="margin-bottom: 24px;">
                <div class="section-header">
                    <h3><i class="fa fa-briefcase"></i> My Services</h3>
                    <a href="{{ route('portal.select-services') }}" class="view-all-link">
                        <i class="fa fa-plus"></i> Add Service
                    </a>
                </div>
                <div class="section-body">
                    @if(count($serviceProgress) > 0)
                        <div class="services-grid">
                            @foreach($serviceProgress as $item)
                                <div class="service-card">
                                    <div class="service-card-top">
                                        <div class="service-card-info">
                                            <div class="service-icon">
                                                <i class="fa {{ $item['service']->icon }}"></i>
                                            </div>
                                            <div>
                                                <div class="service-name">{{ $item['service']->name }}</div>
                                                @php
                                                    $serviceStatus = $item['status'] ?? 'pending';
                                                    $statusColors = [
                                                        'pending' => ['bg' => '#fef3c7', 'color' => '#92400e', 'label' => 'Pending'],
                                                        'under-review' => ['bg' => '#eef4f8', 'color' => '#1e4668', 'label' => 'Under Review'],
                                                        'processing' => ['bg' => '#e8f5ee', 'color' => '#0f7a4e', 'label' => 'Processing'],
                                                        'complete' => ['bg' => '#d1fae5', 'color' => '#065f46', 'label' => 'Completed'],
                                                    ];
                                                    $statusInfo = $statusColors[$serviceStatus] ?? $statusColors['pending'];
                                                @endphp
                                                <span style="background: {{ $statusInfo['bg'] }}; color: {{ $statusInfo['color'] }}; padding: 3px 10px; border-radius: 12px; font-size: 11px; font-weight: 600; display: inline-flex; align-items: center; gap: 5px;">
                                                    <span style="width: 6px; height: 6px; border-radius: 50%; background: {{ $statusInfo['color'] }};"></span>
                                                    {{ $statusInfo['label'] }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="service-percentage">{{ $item['progress']['percentage'] }}%</div>
                                    </div>

                                    <div class="progress-bar">
                                        <div class="progress-fill" style="width: {{ $item['progress']['percentage'] }}%"></div>
                                    </div>

                                    <div class="progress-info">
                                        <span>Step {{ $item['progress']['current_step'] }} of {{ $item['progress']['total_steps'] }}</span>
                                        <span>{{ $item['progress']['steps'][$item['progress']['current_step']]['name'] ?? 'In Progress' }}</span>
                                    </div>

                                    @if(isset($item['progress']['steps'][$item['progress']['current_step']]['name']))
                                        <div class="service-latest-update">
                                            <div class="latest-update-label">Current Step</div>
                                            <div class="latest-update-text">{{ $item['progress']['steps'][$item['progress']['current_step']]['name'] }}</div>
                                        </div>
                                    @endif

                                    <div class="service-actions">
                                        <a href="{{ route('portal.service-progress', $item['service']->id) }}" class="btn btn-primary">
                                            <i class="fa fa-eye"></i> Details
                                        </a>
                                        <a href="{{ route('portal.upload-form', ['service_id' => $item['service']->id]) }}" class="btn btn-outline">
                                            <i class="fa fa-upload"></i> Upload
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fa fa-briefcase"></i>
                            <h4>No Services Yet</h4>
                            <p>You haven't selected any services yet.</p>
                            <a href="{{ route('portal.select-services') }}" class="btn btn-primary" style="margin-top: 12px;">
                                <i class="fa fa-plus"></i> Select Services
                            </a>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Documents Section -->
            <div class="section-card">
                <div class="section-header">
                    <h3><i class="fa fa-file-text-o"></i> My Documents</h3>
                    <span class="required-docs-badge">{{ $documents->count() }} uploaded</span>
                </div>
                <div class="section-body">
                    <!-- Required Documents List -->
                    @if($requiredDocuments->count() > 0)
                        <div class="required-docs-header">
                            <div class="required-docs-title">Required Documents</div>
                        </div>

                        @php
                            $groupedRequired = $requiredDocuments->groupBy('service.name');
                        @endphp

                        @foreach($groupedRequired as $serviceName => $docs)
                            <div style="margin-bottom: 20px;">
                                <div style="font-size: 13px; font-weight: 700; color: #0f7a4e; margin-bottom: 10px; display: flex; align-items: center; gap: 6px;">
                                    <i class="fa fa-briefcase" style="font-size: 11px;"></i> {{ $serviceName }}
                                </div>
                                <div style="display: flex; flex-direction: column; gap: 8px;">
                                    @foreach($docs as $reqDoc)
                                        @php
                                            $uploadedDoc = $documents->where('required_document_id', $reqDoc->id)->first();
                                            $isUploaded = $uploadedDoc !== null;
                                            $isRejected = $isUploaded && $uploadedDoc->status === 'rejected';
                                            $isApproved = $isUploaded && $uploadedDoc->status === 'approved';
                                        @endphp
                                        <div style="display: flex; align-items: center; justify-content: space-between; padding: 12px 16px; border-radius: 10px; border: 1.5px solid {{ $isApproved ? '#d1fae5' : ($isRejected ? '#fecdd3' : '#e5e7eb') }}; background: {{ $isApproved ? '#f0fdf4' : ($isRejected ? '#fff1f2' : '#fafafa') }}; transition: all 0.2s;">
                                            <div style="display: flex; align-items: center; gap: 10px;">
                                                @if($isApproved)
                                                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #d1fae5; color: #059669; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-check" style="font-size: 12px;"></i>
                                                    </div>
                                                @elseif($isRejected)
                                                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #fecdd3; color: #dc2626; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-times" style="font-size: 12px;"></i>
                                                    </div>
                                                @else
                                                    <div style="width: 28px; height: 28px; border-radius: 50%; background: #f3f4f6; color: #6b7280; display: flex; align-items: center; justify-content: center;">
                                                        <i class="fa fa-file-o" style="font-size: 12px;"></i>
                                                    </div>
                                                @endif
                                                <div>
                                                    <div style="font-size: 13px; font-weight: 600; color: #1f2937;">{{ $reqDoc->name }}</div>
                                                    @if($isUploaded)
                                                        <div style="font-size: 11px; color: {{ $isApproved ? '#059669' : ($isRejected ? '#dc2626' : '#b9892f') }}; font-weight: 500;">
                                                            {{ $isApproved ? 'Approved' : ($isRejected ? 'Rejected - Re-upload required' : 'Pending Review') }}
                                                            &middot; {{ $uploadedDoc->created_at->diffForHumans() }}
                                                        </div>
                                                    @endif
                                                    @if($isRejected && $uploadedDoc->rejection_reason)
                                                        <div style="font-size: 11px; color: #dc2626; margin-top: 2px;">
                                                            Reason: {{ $uploadedDoc->rejection_reason }}
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                            <div style="display: flex; align-items: center; gap: 6px;">
                                                @if($isUploaded)
                                                    <a href="{{ route('portal.documents.download', $uploadedDoc->id) }}" style="width: 32px; height: 32px; border-radius: 8px; border: 1.5px solid #e5e7eb; background: #fff; color: #6b7280; display: flex; align-items: center; justify-content: center; text-decoration: none; transition: all 0.2s;" title="Download">
                                                        <i class="fa fa-download" style="font-size: 12px;"></i>
                                                    </a>
                                                    @if($isRejected)
                                                        <form action="{{ route('portal.documents.delete', $uploadedDoc->id) }}" method="POST" style="display: none;" id="deleteDoc{{ $uploadedDoc->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                        </form>
                                                    @endif
                                                @endif
                                                <label style="width: 32px; height: 32px; border-radius: 8px; border: 1.5px solid {{ $isUploaded ? '#e5e7eb' : '#0f7a4e' }}; background: {{ $isUploaded ? '#fff' : '#0f7a4e' }}; color: {{ $isUploaded ? '#6b7280' : '#fff' }}; display: flex; align-items: center; justify-content: center; cursor: pointer; transition: all 0.2s; margin: 0;" title="{{ $isUploaded ? 'Replace' : 'Upload' }}">
                                                    <i class="fa {{ $isUploaded ? 'fa-sync' : 'fa-upload' }}" style="font-size: 12px;"></i>
                                                    <input type="file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" style="display: none;" onchange="uploadRequiredDoc(this, {{ $reqDoc->service_id }}, {{ $reqDoc->id }})">
                                                </label>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div style="text-align: center; padding: 30px; color: #6b7280;">
                            <i class="fa fa-file-circle-question" style="font-size: 36px; color: #d1d5db; margin-bottom: 12px; display: block;"></i>
                            <p style="font-size: 13px;">No required documents configured for your services yet.</p>
                        </div>
                    @endif

                    <!-- Upload Progress Indicator -->
                    <div id="uploadProgress" style="display: none; padding: 12px; background: #f0fdf4; border: 1px solid #d1fae5; border-radius: 8px; margin-top: 12px;">
                        <div style="display: flex; align-items: center; gap: 8px; color: #059669; font-size: 13px;">
                            <i class="fa fa-spinner fa-spin"></i> Uploading document...
                        </div>
                    </div>

                    <!-- General Upload Area -->
                    <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                        <div style="font-size: 13px; font-weight: 600; color: #1f2937; margin-bottom: 12px;">General Upload</div>
                        <form action="{{ route('portal.documents.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
                            @csrf
                            <input type="hidden" name="service_id" id="uploadServiceId" value="">
                            <input type="hidden" name="required_document_id" id="uploadRequiredDocId" value="">
                            <div class="upload-area" id="mainUploadArea" style="border: 2px dashed #d1d5db; border-radius: 12px; padding: 24px; text-align: center; cursor: pointer; transition: all 0.2s; background: #fafafa;">
                                <i class="fa fa-cloud-upload" style="font-size: 28px; color: #9ca3af;"></i>
                                <p style="font-size: 13px; color: #6b7280; margin: 8px 0 0;">Drag & drop files here or <span style="color: #0f7a4e; font-weight: 600;">click to browse</span></p>
                                <p style="font-size: 11px; margin: 4px 0 0; color: #9ca3af;">PDF, DOC, DOCX, JPG, PNG (Max 10MB each)</p>
                                <input type="file" name="files[]" id="mainFileInput" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" style="display: none;">
                            </div>
                            <div id="mainImagePreviews" class="image-previews" style="display: none;"></div>
                            <div id="mainFileList" class="file-list" style="display: none;"></div>
                            <button type="button" class="btn btn-primary" id="mainUploadBtn" style="display: none; margin-top: 12px; width: 100%; padding: 10px; background: #0f7a4e; color: #fff; border: none; border-radius: 8px; font-size: 13px; font-weight: 600; cursor: pointer;">
                                <i class="fa fa-upload"></i> Upload Selected Files
                            </button>
                        </form>
                    </div>

                    <!-- Documents List -->
                    @if($documents->count() > 0)
                        <div style="margin-top: 20px; padding-top: 20px; border-top: 1px solid #e5e7eb;">
                            <div style="font-size: 13px; font-weight: 600; color: #1f2937; margin-bottom: 12px;">Uploaded Documents ({{ $documents->count() }})</div>
                            <div class="documents-list">
                                @foreach($documents->take(10) as $doc)
                                    <div class="document-item" style="display: flex; align-items: center; gap: 12px; padding: 12px; border-radius: 10px; border: 1px solid #e5e7eb; margin-bottom: 8px; {{ $doc->status === 'rejected' ? 'border-left: 3px solid #ef785a; background: #fef0ed;' : ($doc->status === 'approved' ? 'border-left: 3px solid #0f7a4e;' : '') }}">
                                        <div class="doc-icon" style="width: 36px; height: 36px; border-radius: 8px; display: flex; align-items: center; justify-content: center; flex-shrink: 0; {{ $doc->status === 'approved' ? 'background: #d1fae5; color: #059669;' : ($doc->status === 'rejected' ? 'background: #fecdd3; color: #dc2626;' : 'background: #f3f4f6; color: #6b7280;') }}">
                                            @if($doc->status === 'approved')
                                                <i class="fa fa-check-circle"></i>
                                            @elseif($doc->status === 'rejected')
                                                <i class="fa fa-exclamation-circle"></i>
                                            @else
                                                <i class="fa fa-{{ $doc->file_type === 'application/pdf' ? 'file-pdf-o' : ($doc->file_type === 'image/jpeg' || $doc->file_type === 'image/png' ? 'file-image-o' : 'file-word-o') }}"></i>
                                            @endif
                                        </div>
                                        <div class="doc-info" style="flex: 1; min-width: 0;">
                                            <div class="doc-name" style="font-size: 13px; font-weight: 600; color: #1f2937; white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">{{ $doc->name }}</div>
                                            <div class="doc-meta" style="font-size: 11px; color: #9ca3af;">
                                                {{ number_format($doc->file_size / 1024, 1) }} KB &middot; {{ $doc->created_at->format('M d, Y') }}
                                                @if($doc->status === 'approved')
                                                    <span style="color: #059669; font-weight: 600;"> &middot; Approved</span>
                                                @elseif($doc->status === 'rejected')
                                                    <span style="color: #dc2626; font-weight: 600;"> &middot; Rejected</span>
                                                @else
                                                    <span style="color: #b9892f; font-weight: 600;"> &middot; Pending</span>
                                                @endif
                                            </div>
                                            @if($doc->status === 'rejected' && $doc->rejection_reason)
                                                <div style="font-size: 11px; color: #dc2626; margin-top: 2px;">
                                                    {{ $doc->rejection_reason }}
                                                </div>
                                            @endif
                                        </div>
                                        <div class="doc-actions" style="display: flex; gap: 4px; flex-shrink: 0;">
                                            <a href="{{ route('portal.documents.download', $doc->id) }}" style="width: 30px; height: 30px; border-radius: 6px; border: 1px solid #e5e7eb; background: #fff; color: #6b7280; display: flex; align-items: center; justify-content: center; text-decoration: none;" title="Download">
                                                <i class="fa fa-download" style="font-size: 11px;"></i>
                                            </a>
                                            <form action="{{ route('portal.documents.delete', $doc->id) }}" method="POST" onsubmit="return confirm('Delete this document?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" style="width: 30px; height: 30px; border-radius: 6px; border: 1px solid #e5e7eb; background: #fff; color: #dc2626; display: flex; align-items: center; justify-content: center; cursor: pointer;" title="Delete">
                                                    <i class="fa fa-trash" style="font-size: 11px;"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            @if($documents->count() > 10)
                                <a href="{{ route('portal.upload-form') }}" style="display: inline-flex; align-items: center; gap: 4px; font-size: 13px; color: #0f7a4e; font-weight: 600; text-decoration: none; margin-top: 8px;">
                                    View all {{ $documents->count() }} documents <i class="fa fa-arrow-right" style="font-size: 11px;"></i>
                                </a>
                            @endif
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Right Column: Notifications & Planner -->
        <div>
            <!-- Notifications Section -->
            <div class="section-card" style="margin-bottom: 24px;">
                <div class="section-header">
                    <h3><i class="fa fa-bell"></i> Notifications</h3>
                    <a href="{{ route('portal.notifications') }}" class="view-all-link">
                        View All <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="section-body" style="padding: 0 24px;">
                    @if($notifications->count() > 0)
                        <div class="notifications-list">
                            @foreach($notifications->take(8) as $notif)
                                <div class="notification-item">
                                    <div class="notif-icon {{ $notif->type }}">
                                        <i class="fa fa-{{ $notif->type === 'welcome' ? 'hand-paper-o' : ($notif->type === 'update' ? 'info-circle' : ($notif->type === 'reminder' ? 'clock-o' : 'bell')) }}"></i>
                                    </div>
                                    <div class="notif-content">
                                        <div class="notif-title">{{ $notif->title }}</div>
                                        <div class="notif-message">{{ Str::limit($notif->message, 80) }}</div>
                                        <div class="notif-time">{{ $notif->created_at->diffForHumans() }}</div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state" style="padding: 24px;">
                            <i class="fa fa-bell-slash"></i>
                            <h4>No Notifications</h4>
                            <p>You're all caught up!</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Planner / Deadlines Section -->
            <div class="section-card">
                <div class="section-header">
                    <h3><i class="fa fa-calendar"></i> Tax Deadlines</h3>
                    <a href="{{ route('portal.deadlines') }}" class="view-all-link">
                        View All <i class="fa fa-arrow-right"></i>
                    </a>
                </div>
                <div class="section-body">
                    @if(isset($upcomingDeadlines) && count($upcomingDeadlines) > 0)
                        <div class="deadline-list">
                            @foreach($upcomingDeadlines->take(5) as $deadline)
                                @php
                                    $daysLeft = $deadline->due_date->diffInDays(now());
                                    $urgencyClass = $daysLeft <= 3 ? 'urgent' : ($daysLeft <= 7 ? 'warning' : '');
                                    $badgeClass = $daysLeft <= 3 ? 'badge-urgent' : ($daysLeft <= 7 ? 'badge-warning' : 'badge-normal');
                                @endphp
                                <div class="deadline-item {{ $urgencyClass }}">
                                    <div class="deadline-icon">
                                        <i class="fa fa-calendar-check-o"></i>
                                    </div>
                                    <div class="deadline-info">
                                        <div class="deadline-name">{{ $deadline->name }}</div>
                                        <div class="deadline-date">Due: {{ $deadline->due_date->format('M d, Y') }}</div>
                                    </div>
                                    <span class="deadline-badge {{ $badgeClass }}">
                                        {{ $deadline->due_date->diffForHumans() }}
                                    </span>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="empty-state">
                            <i class="fa fa-calendar-check-o"></i>
                            <h4>No Upcoming Deadlines</h4>
                            <p>You have no deadlines in the next 30 days.</p>
                            <a href="{{ route('portal.deadlines') }}" class="btn btn-outline" style="margin-top: 12px;">
                                <i class="fa fa-calendar"></i> View Planner
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add Document Modal -->
<div class="modal-overlay" id="addDocModal">
    <div class="custom-modal">
        <div class="modal-header">
            <h3><i class="fa fa-plus-circle" style="color: #0f7a4e;"></i> Add Documents</h3>
            <button type="button" class="modal-close" onclick="closeAddDocModal()">
                <i class="fa fa-times"></i>
            </button>
        </div>
        <div class="modal-body" style="max-height: 60vh; overflow-y: auto;">
            <form id="addDocForm" action="{{ route('portal.documents.upload') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group">
                    <label>Related Service</label>
                    <select name="service_id" id="docServiceSelect">
                        <option value="">General (No specific service)</option>
                        @foreach($user->services as $service)
                            <option value="{{ $service->id }}">{{ $service->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label>Select Files *</label>
                    <div class="upload-area" id="modalUploadArea" style="padding: 24px;">
                        <i class="fa fa-cloud-upload" style="font-size: 32px;"></i>
                        <p>Click or drag files here</p>
                        <p style="font-size: 11px; color: #7d8b86;">Multiple files allowed</p>
                        <input type="file" name="files[]" id="modalFileInput" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png" style="display: none;">
                    </div>
                </div>

                <!-- Image Previews -->
                <div id="modalImagePreviews" class="image-previews" style="display: none;"></div>

                <!-- File List with Custom Names -->
                <div id="modalFileList" class="file-list"></div>
            </form>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline" onclick="closeAddDocModal()">Cancel</button>
            <button type="button" class="btn btn-primary" id="modalUploadBtn" onclick="submitAddDocForm()">
                <i class="fa fa-upload"></i> Upload Documents
            </button>
        </div>
    </div>
</div>

<script>
    // Modal functions
    function openAddDocModal(serviceId = null) {
        document.getElementById('addDocModal').classList.add('active');
        document.body.style.overflow = 'hidden';
        if (serviceId) {
            const select = document.getElementById('docServiceSelect');
            if (select) select.value = serviceId;
        } else {
            const select = document.getElementById('docServiceSelect');
            if (select) select.value = '';
        }
    }

    function closeAddDocModal() {
        document.getElementById('addDocModal').classList.remove('active');
        document.body.style.overflow = '';
        document.getElementById('addDocForm').reset();
        document.getElementById('modalFileList').innerHTML = '';
        document.getElementById('modalImagePreviews').innerHTML = '';
        document.getElementById('modalImagePreviews').style.display = 'none';
        selectedModalFiles = [];
    }

    function submitAddDocForm() {
        document.getElementById('addDocForm').submit();
    }

    // Close modal on overlay click
    document.getElementById('addDocModal').addEventListener('click', function(e) {
        if (e.target === this) {
            closeAddDocModal();
        }
    });

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeAddDocModal();
        }
    });

    // ============================================
    // Main Upload Area - Multiple Files
    // ============================================
    const mainUploadArea = document.getElementById('mainUploadArea');
    const mainFileInput = document.getElementById('mainFileInput');
    const mainImagePreviews = document.getElementById('mainImagePreviews');
    const mainFileList = document.getElementById('mainFileList');
    const mainUploadBtn = document.getElementById('mainUploadBtn');
    const mainUploadForm = document.getElementById('uploadForm');
    let mainSelectedFiles = [];

    mainUploadArea.addEventListener('click', () => mainFileInput.click());

    mainUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        mainUploadArea.style.borderColor = '#0f7a4e';
        mainUploadArea.style.background = '#e8f5ee';
    });

    mainUploadArea.addEventListener('dragleave', () => {
        mainUploadArea.style.borderColor = '#dce7e1';
        mainUploadArea.style.background = '#f6faf8';
    });

    mainUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        mainUploadArea.style.borderColor = '#dce7e1';
        mainUploadArea.style.background = '#f6faf8';
        handleMainFiles(e.dataTransfer.files);
    });

    mainFileInput.addEventListener('change', (e) => {
        handleMainFiles(e.target.files);
    });

    function handleMainFiles(files) {
        for (let i = 0; i < files.length; i++) {
            if (files[i].size > 10 * 1024 * 1024) {
                alert(files[i].name + ' is too large. Max 10MB allowed.');
                continue;
            }
            mainSelectedFiles.push(files[i]);
        }
        updateMainPreviews();
    }

    function updateMainPreviews() {
        mainImagePreviews.innerHTML = '';
        mainFileList.innerHTML = '';

        if (mainSelectedFiles.length === 0) {
            mainImagePreviews.style.display = 'none';
            mainFileList.style.display = 'none';
            mainUploadBtn.style.display = 'none';
            return;
        }

        mainImagePreviews.style.display = 'grid';
        mainFileList.style.display = 'grid';
        mainUploadBtn.style.display = 'flex';

        mainSelectedFiles.forEach((file, index) => {
            // Image preview
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'preview-item';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="preview-remove" onclick="removeMainFile(${index})">&times;</button>
                    `;
                    mainImagePreviews.appendChild(previewDiv);
                };
                reader.readAsDataURL(file);
            }

            // File list item
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item';
            const icon = file.type.includes('pdf') ? 'fa-file-pdf-o' :
                         file.type.includes('image') ? 'fa-file-image-o' : 'fa-file-word-o';
            fileItem.innerHTML = `
                <i class="fa ${icon}" style="color: #0f7a4e;"></i>
                <span class="file-item-name">${file.name}</span>
                <span class="file-item-size">${formatSize(file.size)}</span>
                <button type="button" class="file-item-remove" onclick="removeMainFile(${index})">
                    <i class="fa fa-times"></i>
                </button>
            `;
            mainFileList.appendChild(fileItem);
        });

        mainUploadBtn.innerHTML = `<i class="fa fa-upload"></i> Upload ${mainSelectedFiles.length} File(s)`;
    }

    function removeMainFile(index) {
        mainSelectedFiles.splice(index, 1);
        updateMainPreviews();
    }

    mainUploadBtn.addEventListener('click', () => {
        // Create a new FormData and append files
        const formData = new FormData(mainUploadForm);
        // Remove old files[] entries
        formData.delete('files[]');
        mainSelectedFiles.forEach(file => {
            formData.append('files[]', file);
        });

        // Submit via fetch
        mainUploadBtn.disabled = true;
        mainUploadBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Uploading...';

        fetch(mainUploadForm.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                'X-Requested-With': 'XMLHttpRequest'
            }
        }).then(response => {
            if (response.ok) {
                window.location.reload();
            } else {
                alert('Upload failed. Please try again.');
                mainUploadBtn.disabled = false;
                mainUploadBtn.innerHTML = '<i class="fa fa-upload"></i> Upload Selected Files';
            }
        }).catch(err => {
            alert('Upload failed. Please try again.');
            mainUploadBtn.disabled = false;
            mainUploadBtn.innerHTML = '<i class="fa fa-upload"></i> Upload Selected Files';
        });
    });

    // ============================================
    // Modal Upload Area - Multiple Files
    // ============================================
    const modalUploadArea = document.getElementById('modalUploadArea');
    const modalFileInput = document.getElementById('modalFileInput');
    const modalImagePreviews = document.getElementById('modalImagePreviews');
    const modalFileList = document.getElementById('modalFileList');
    let selectedModalFiles = [];

    modalUploadArea.addEventListener('click', () => modalFileInput.click());

    modalUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        modalUploadArea.style.borderColor = '#0f7a4e';
        modalUploadArea.style.background = '#e8f5ee';
    });

    modalUploadArea.addEventListener('dragleave', () => {
        modalUploadArea.style.borderColor = '#dce7e1';
        modalUploadArea.style.background = '#f6faf8';
    });

    modalUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        modalUploadArea.style.borderColor = '#dce7e1';
        modalUploadArea.style.background = '#f6faf8';
        handleModalFiles(e.dataTransfer.files);
    });

    modalFileInput.addEventListener('change', (e) => {
        handleModalFiles(e.target.files);
    });

    function handleModalFiles(files) {
        for (let i = 0; i < files.length; i++) {
            if (files[i].size > 10 * 1024 * 1024) {
                alert(files[i].name + ' is too large. Max 10MB allowed.');
                continue;
            }
            selectedModalFiles.push({
                file: files[i],
                name: files[i].name.replace(/\.[^/.]+$/, '') // Default name without extension
            });
        }
        updateModalPreviews();
    }

    function updateModalPreviews() {
        modalImagePreviews.innerHTML = '';
        modalFileList.innerHTML = '';

        if (selectedModalFiles.length === 0) {
            modalImagePreviews.style.display = 'none';
            return;
        }

        modalImagePreviews.style.display = 'grid';

        selectedModalFiles.forEach((item, index) => {
            // Image preview
            if (item.file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const previewDiv = document.createElement('div');
                    previewDiv.className = 'preview-item';
                    previewDiv.innerHTML = `
                        <img src="${e.target.result}" alt="Preview">
                        <button type="button" class="preview-remove" onclick="removeModalFile(${index})">&times;</button>
                    `;
                    modalImagePreviews.appendChild(previewDiv);
                };
                reader.readAsDataURL(item.file);
            }

            // File item with editable name
            const fileItem = document.createElement('div');
            fileItem.className = 'file-item-modal';
            const icon = item.file.type.includes('pdf') ? 'fa-file-pdf-o' :
                         item.file.type.includes('image') ? 'fa-file-image-o' : 'fa-file-word-o';
            fileItem.innerHTML = `
                <div class="file-item-header">
                    <i class="fa ${icon}" style="color: #0f7a4e; font-size: 18px;"></i>
                    <span class="file-item-size">${formatSize(item.file.size)}</span>
                    <button type="button" class="file-item-remove" onclick="removeModalFile(${index})">
                        <i class="fa fa-times"></i>
                    </button>
                </div>
                <input type="text" class="file-name-input" value="${item.name}"
                    placeholder="Enter document name"
                    onchange="updateModalFileName(${index}, this.value)">
            `;
            modalFileList.appendChild(fileItem);
        });
    }

    function removeModalFile(index) {
        selectedModalFiles.splice(index, 1);
        updateModalPreviews();
    }

    function updateModalFileName(index, name) {
        selectedModalFiles[index].name = name;
    }

    // ============================================
    // Utility Functions
    // ============================================
    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }

    // ============================================
    // Required Document Upload
    // ============================================
    function uploadRequiredDoc(input, serviceId, requiredDocId) {
        const file = input.files[0];
        if (!file) return;

        if (file.size > 10 * 1024 * 1024) {
            alert('File is too large. Max 10MB allowed.');
            input.value = '';
            return;
        }

        const progressEl = document.getElementById('uploadProgress');
        progressEl.style.display = 'block';

        const formData = new FormData();
        formData.append('files[]', file);
        formData.append('service_id', serviceId);
        formData.append('required_document_id', requiredDocId);
        formData.append('_token', '{{ csrf_token() }}');

        fetch('{{ route("portal.documents.upload") }}', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                progressEl.style.display = 'none';
                alert('Upload failed. Please try again.');
            }
        })
        .catch(error => {
            progressEl.style.display = 'none';
            alert('Upload failed. Please try again.');
        });

        input.value = '';
    }
</script>
@endsection
