@extends('layouts.app')

@section('title', 'My History')

@section('content')
<style>
    .portal-container {
        max-width: 1400px;
        margin: 0 auto;
        padding: 32px 24px;
    }

    .page-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 28px;
    }

    .page-header h1 {
        font-size: 24px;
        font-weight: 800;
        color: #1a2e1f;
        margin: 0;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .page-header h1 i {
        color: #0f7a4e;
    }

    .btn-back {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 10px 20px;
        border-radius: 10px;
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        background: #f0fdf4;
        color: #0f7a4e;
        border: 1.5px solid #dce7e1;
        transition: all 0.2s ease;
    }

    .btn-back:hover {
        background: #e8f5ee;
        border-color: #0f7a4e;
    }

    /* Tabs */
    .tabs-container {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        overflow: hidden;
    }

    .tabs-nav {
        display: flex;
        border-bottom: 2px solid #dce7e1;
        background: #f6faf8;
    }

    .tab-btn {
        flex: 1;
        padding: 16px 24px;
        border: none;
        background: transparent;
        font-size: 14px;
        font-weight: 600;
        color: #60706a;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        transition: all 0.2s ease;
        border-bottom: 3px solid transparent;
        margin-bottom: -2px;
    }

    .tab-btn:hover {
        color: #0f7a4e;
        background: rgba(15, 122, 78, 0.04);
    }

    .tab-btn.active {
        color: #0f7a4e;
        border-bottom-color: #0f7a4e;
        background: #fff;
    }

    .tab-btn .tab-count {
        background: #e8f5ee;
        color: #0f7a4e;
        font-size: 11px;
        font-weight: 700;
        padding: 2px 8px;
        border-radius: 10px;
        min-width: 24px;
        text-align: center;
    }

    .tab-btn.active .tab-count {
        background: #0f7a4e;
        color: #fff;
    }

    .tab-panel {
        display: none;
        padding: 24px;
    }

    .tab-panel.active {
        display: block;
    }

    /* Table */
    .history-table {
        width: 100%;
        border-collapse: collapse;
    }

    .history-table th {
        text-align: left;
        padding: 12px 16px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 0.5px;
        color: #60706a;
        background: #f6faf8;
        border-bottom: 2px solid #dce7e1;
    }

    .history-table td {
        padding: 14px 16px;
        font-size: 14px;
        color: #1a2e1f;
        border-bottom: 1px solid #f0f4f2;
        vertical-align: middle;
    }

    .history-table tbody tr:hover {
        background: #f6faf8;
    }

    .history-table tbody tr:last-child td {
        border-bottom: none;
    }

    .service-name {
        font-weight: 600;
        color: #1a2e1f;
    }

    .service-icon {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        font-size: 14px;
        margin-right: 10px;
        vertical-align: middle;
    }

    .service-icon.green { background: #e8f5ee; color: #0f7a4e; }
    .service-icon.blue { background: #eff6ff; color: #2563eb; }
    .service-icon.purple { background: #f3e8ff; color: #9333ea; }
    .service-icon.orange { background: #fff7ed; color: #ea580c; }
    .service-icon.teal { background: #f0fdfa; color: #0d9488; }

    .date-text {
        color: #60706a;
        font-size: 13px;
    }

    .amount-text {
        font-weight: 600;
        color: #1a2e1f;
    }

    /* Status Badges */
    .status-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }

    .status-badge i { font-size: 10px; }

    .badge-pending { background: #fef9c3; color: #92400e; }
    .badge-active { background: #dbeafe; color: #1e40af; }
    .badge-complete { background: #d1fae5; color: #065f46; }
    .badge-cancelled { background: #fee2e2; color: #991b1b; }
    .badge-approved { background: #d1fae5; color: #065f46; }
    .badge-rejected { background: #fee2e2; color: #991b1b; }
    .badge-under-review { background: #fef3c7; color: #92400e; }
    .badge-processing { background: #e0e7ff; color: #3730a3; }

    .progress-bar-mini {
        width: 80px;
        height: 6px;
        background: #e8f5ee;
        border-radius: 3px;
        overflow: hidden;
        display: inline-block;
        margin-right: 8px;
        vertical-align: middle;
    }

    .progress-bar-mini .fill {
        height: 100%;
        background: #0f7a4e;
        border-radius: 3px;
        transition: width 0.3s ease;
    }

    .progress-text {
        font-size: 12px;
        font-weight: 600;
        color: #0f7a4e;
    }

    .screenshot-thumb {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        object-fit: cover;
        border: 1px solid #dce7e1;
        cursor: pointer;
    }

    .screenshot-thumb:hover {
        border-color: #0f7a4e;
        transform: scale(1.1);
    }

    .empty-state {
        text-align: center;
        padding: 48px 24px;
        color: #60706a;
    }

    .empty-state i {
        font-size: 48px;
        color: #dce7e1;
        margin-bottom: 12px;
    }

    .empty-state h3 {
        font-size: 16px;
        font-weight: 600;
        color: #1a2e1f;
        margin-bottom: 4px;
    }

    .empty-state p {
        font-size: 13px;
    }

    .doc-name {
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .doc-name i {
        color: #60706a;
        font-size: 16px;
    }

    /* Screenshot Modal */
    .modal-overlay {
        display: none;
        position: fixed;
        inset: 0;
        background: rgba(0,0,0,0.6);
        z-index: 9999;
        align-items: center;
        justify-content: center;
    }

    .modal-overlay.show {
        display: flex;
    }

    .modal-box {
        background: #fff;
        border-radius: 16px;
        max-width: 600px;
        width: 90%;
        max-height: 90vh;
        overflow: hidden;
        box-shadow: 0 20px 60px rgba(0,0,0,0.3);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 16px 20px;
        border-bottom: 1px solid #dce7e1;
    }

    .modal-header h4 {
        margin: 0;
        font-size: 16px;
        font-weight: 700;
    }

    .modal-close {
        width: 32px;
        height: 32px;
        border-radius: 8px;
        border: none;
        background: #f6faf8;
        color: #60706a;
        font-size: 16px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-close:hover { background: #fee2e2; color: #991b1b; }

    .modal-body {
        padding: 20px;
        text-align: center;
    }

    .modal-body img {
        max-width: 100%;
        max-height: 70vh;
        border-radius: 8px;
    }

    @media (max-width: 768px) {
        .page-header { flex-direction: column; gap: 12px; align-items: flex-start; }
        .tabs-nav { flex-direction: column; }
        .tab-btn { border-bottom: none; border-left: 3px solid transparent; margin-bottom: 0; margin-left: -2px; }
        .tab-btn.active { border-left-color: #0f7a4e; border-bottom-color: transparent; }
        .history-table { font-size: 12px; }
        .history-table th, .history-table td { padding: 10px 8px; }
    }
</style>

<div class="portal-container">
    <div class="page-header">
        <h1><i class="fa fa-history"></i> My History</h1>
        <a href="{{ route('portal.dashboard') }}" class="btn-back">
            <i class="fa fa-arrow-left"></i> Back to Dashboard
        </a>
    </div>

    <div class="tabs-container">
        <div class="tabs-nav">
            <button class="tab-btn active" onclick="switchTab('services')">
                <i class="fa fa-briefcase"></i> Services
                <span class="tab-count">{{ $services->count() }}</span>
            </button>
            <button class="tab-btn" onclick="switchTab('payments')">
                <i class="fa fa-credit-card"></i> Payments
                <span class="tab-count">{{ $payments->count() }}</span>
            </button>
            <button class="tab-btn" onclick="switchTab('documents')">
                <i class="fa fa-file-alt"></i> Documents
                <span class="tab-count">{{ $documents->count() }}</span>
            </button>
        </div>

        <!-- Services Tab -->
        <div id="tab-services" class="tab-panel active">
            @if($services->isEmpty())
                <div class="empty-state">
                    <i class="fa fa-briefcase"></i>
                    <h3>No Services Yet</h3>
                    <p>You haven't selected any services yet.</p>
                </div>
            @else
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Assigned Date</th>
                            <th>Status</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $iconColors = ['green', 'blue', 'purple', 'orange', 'teal'];
                            $iconClasses = ['fa-briefcase', 'fa-file-invoice', 'fa-calculator', 'fa-chart-line', 'fa-hand-holding-usd'];
                        @endphp
                        @foreach($services as $index => $service)
                            @php
                                $color = $iconColors[$index % count($iconColors)];
                                $icon = $iconClasses[$index % count($iconClasses)];
                                $status = $service->pivot->service_status ?? 'pending';
                                $statusClass = 'badge-' . $status;
                                $progress = $serviceProgress[$service->id]['percentage'] ?? 0;
                            @endphp
                            <tr>
                                <td>
                                    <span class="service-icon {{ $color }}"><i class="fa {{ $icon }}"></i></span>
                                    <span class="service-name">{{ $service->name }}</span>
                                </td>
                                <td class="date-text">
                                    {{ $service->pivot->assigned_at ? \Carbon\Carbon::parse($service->pivot->assigned_at)->format('M d, Y') : 'N/A' }}
                                </td>
                                <td>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fa fa-circle"></i> {{ ucfirst(str_replace('-', ' ', $status)) }}
                                    </span>
                                </td>
                                <td>
                                    <div class="progress-bar-mini"><div class="fill" style="width: {{ $progress }}%"></div></div>
                                    <span class="progress-text">{{ $progress }}%</span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Payments Tab -->
        <div id="tab-payments" class="tab-panel">
            @if($payments->isEmpty())
                <div class="empty-state">
                    <i class="fa fa-credit-card"></i>
                    <h3>No Payments Yet</h3>
                    <p>You haven't made any payments yet.</p>
                </div>
            @else
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Amount</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Screenshot</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payments as $payment)
                            @php
                                $statusClass = 'badge-' . $payment->status;
                            @endphp
                            <tr>
                                <td class="service-name">{{ $payment->service->name ?? 'N/A' }}</td>
                                <td class="amount-text">Rs. {{ number_format($payment->amount, 0) }}</td>
                                <td class="date-text">{{ $payment->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fa fa-circle"></i> {{ ucfirst($payment->status) }}
                                    </span>
                                </td>
                                <td>
                                    @if($payment->screenshot_path)
                                        <img src="{{ asset('storage/' . $payment->screenshot_path) }}"
                                             class="screenshot-thumb"
                                             alt="Payment Screenshot"
                                             onclick="openScreenshotModal('{{ asset('storage/' . $payment->screenshot_path) }}')">
                                    @else
                                        <span class="date-text">No screenshot</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>

        <!-- Documents Tab -->
        <div id="tab-documents" class="tab-panel">
            @if($documents->isEmpty())
                <div class="empty-state">
                    <i class="fa fa-file-alt"></i>
                    <h3>No Documents Yet</h3>
                    <p>You haven't uploaded any documents yet.</p>
                </div>
            @else
                <table class="history-table">
                    <thead>
                        <tr>
                            <th>Service</th>
                            <th>Document</th>
                            <th>Uploaded</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($documents as $document)
                            @php
                                $statusClass = $document->status === 'approved' ? 'badge-approved' : ($document->status === 'rejected' ? 'badge-rejected' : 'badge-pending');
                            @endphp
                            <tr>
                                <td class="service-name">{{ $document->service->name ?? 'N/A' }}</td>
                                <td>
                                    <div class="doc-name">
                                        <i class="fa fa-file-pdf"></i>
                                        {{ $document->file_name }}
                                    </div>
                                </td>
                                <td class="date-text">{{ $document->created_at->format('M d, Y') }}</td>
                                <td>
                                    <span class="status-badge {{ $statusClass }}">
                                        <i class="fa fa-circle"></i> {{ ucfirst($document->status) }}
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
</div>

<!-- Screenshot Modal -->
<div id="screenshotModal" class="modal-overlay" onclick="closeScreenshotModal(event)">
    <div class="modal-box" onclick="event.stopPropagation()">
        <div class="modal-header">
            <h4>Payment Screenshot</h4>
            <button class="modal-close" onclick="closeScreenshotModal()">&times;</button>
        </div>
        <div class="modal-body">
            <img id="screenshotImage" src="" alt="Payment Screenshot">
        </div>
    </div>
</div>

<script>
    function switchTab(tabName) {
        document.querySelectorAll('.tab-btn').forEach(btn => btn.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(panel => panel.classList.remove('active'));

        event.currentTarget.classList.add('active');
        document.getElementById('tab-' + tabName).classList.add('active');
    }

    function openScreenshotModal(src) {
        document.getElementById('screenshotImage').src = src;
        document.getElementById('screenshotModal').classList.add('show');
    }

    function closeScreenshotModal(e) {
        if (!e || e.target === document.getElementById('screenshotModal')) {
            document.getElementById('screenshotModal').classList.remove('show');
        }
    }
</script>
@endsection
