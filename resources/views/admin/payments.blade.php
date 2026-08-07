@extends('admin.layout')

@section('title', 'Payment Management')
@section('page-title', 'Payment Management')

@section('content')
<style>
    .stats-row { display: grid; grid-template-columns: repeat(3, 1fr); gap: 16px; margin-bottom: 24px; }
    .stat-card { background: var(--surface-elevated); border: 1px solid var(--border); border-radius: var(--radius-lg); padding: 20px; display: flex; align-items: center; gap: 16px; }
    .stat-icon { width: 48px; height: 48px; border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; font-size: 20px; }
    .stat-icon.gold { background: var(--accent-gold-50); color: var(--accent-gold); }
    .stat-icon.green { background: var(--primary-50); color: var(--primary); }
    .stat-icon.coral { background: var(--accent-coral-50); color: var(--accent-coral); }
    .stat-value { font-size: 24px; font-weight: 800; color: var(--ink); }
    .stat-label { font-size: 13px; color: var(--muted); }
    .documents-card { background: var(--surface-elevated); border: 1px solid var(--border); border-radius: var(--radius-lg); overflow: hidden; }
    .documents-header { display: flex; justify-content: space-between; align-items: center; padding: 18px 24px; border-bottom: 1px solid var(--border-light); }
    .documents-header h3 { font-size: 16px; font-weight: 700; color: var(--ink); margin: 0; }
    .documents-table { width: 100%; border-collapse: collapse; }
    .documents-table th { padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600; color: var(--muted); text-transform: uppercase; letter-spacing: 0.5px; background: var(--surface); border-bottom: 1px solid var(--border); }
    .documents-table td { padding: 16px; border-bottom: 1px solid var(--border-light); vertical-align: middle; }
    .documents-table tr:hover { background: var(--surface); }
    .user-info { display: flex; align-items: center; gap: 10px; }
    .user-avatar { width: 36px; height: 36px; border-radius: 50%; background: var(--primary-50); color: var(--primary); display: flex; align-items: center; justify-content: center; font-weight: 700; font-size: 14px; }
    .user-name { font-weight: 600; color: var(--ink); font-size: 14px; }
    .user-email { font-size: 12px; color: var(--muted); }
    .status-badge { display: inline-flex; align-items: center; gap: 5px; padding: 5px 12px; border-radius: var(--radius-full); font-size: 12px; font-weight: 600; }
    .status-pending { background: var(--accent-gold-50); color: #b45309; }
    .status-approved { background: var(--primary-50); color: var(--primary); }
    .status-rejected { background: var(--accent-coral-50); color: #c2410c; }
    .action-buttons { display: flex; gap: 6px; }
    .btn-action { width: 34px; height: 34px; border: none; border-radius: var(--radius-sm); cursor: pointer; display: flex; align-items: center; justify-content: center; font-size: 14px; transition: all 0.2s; }
    .btn-approve { background: var(--primary-50); color: var(--primary); }
    .btn-approve:hover { background: var(--primary); color: #fff; }
    .btn-reject { background: var(--accent-coral-50); color: var(--accent-coral); }
    .btn-reject:hover { background: var(--accent-coral); color: #fff; }
    .btn-preview { border: 1px solid var(--border); background: transparent; color: var(--muted); }
    .btn-preview:hover { border-color: var(--primary); color: var(--primary); }
    .screenshot-thumb { width: 50px; height: 50px; border-radius: 8px; object-fit: cover; border: 1px solid var(--border); cursor: pointer; }
    .modal-overlay { display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(16, 32, 26, 0.6); z-index: 99999; align-items: center; justify-content: center; }
    .modal-overlay.active { display: flex; }
    .custom-modal { background: #fff; border-radius: var(--radius-lg); width: 100%; max-width: 500px; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3); }
    .modal-header { display: flex; align-items: center; justify-content: space-between; padding: 18px 24px; border-bottom: 1px solid var(--border-light); }
    .modal-header h3 { font-size: 16px; font-weight: 700; color: var(--ink); margin: 0; }
    .modal-close { width: 32px; height: 32px; border: none; background: var(--surface); border-radius: var(--radius-sm); cursor: pointer; display: flex; align-items: center; justify-content: center; color: var(--muted); }
    .modal-body { padding: 24px; }
    .modal-footer { display: flex; gap: 10px; justify-content: flex-end; padding: 16px 24px; border-top: 1px solid var(--border-light); background: var(--surface); }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px; }
    .form-group textarea { width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; resize: vertical; min-height: 80px; }
    .btn { padding: 10px 20px; border-radius: var(--radius-sm); font-size: 13px; font-weight: 600; cursor: pointer; border: none; }
    .btn-outline { background: transparent; border: 1.5px solid var(--border); color: var(--ink); }
    .btn-primary { background: var(--primary); color: #fff; }
    .preview-modal { max-width: 800px; }
    .preview-modal img { max-width: 100%; border-radius: 8px; }
    .empty-state { text-align: center; padding: 60px 20px; color: var(--muted); }
    .empty-state i { font-size: 48px; color: var(--border); margin-bottom: 16px; display: block; }
</style>

<!-- Stats -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon gold"><i class="fas fa-clock"></i></div>
        <div>
            <div class="stat-value">{{ $payments->where('status', 'pending')->count() }}</div>
            <div class="stat-label">Pending</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
        <div>
            <div class="stat-value">{{ $payments->where('status', 'approved')->count() }}</div>
            <div class="stat-label">Approved</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon coral"><i class="fas fa-times-circle"></i></div>
        <div>
            <div class="stat-value">{{ $payments->where('status', 'rejected')->count() }}</div>
            <div class="stat-label">Rejected</div>
        </div>
    </div>
</div>

<!-- Payments Table -->
<div class="documents-card">
    <div class="documents-header">
        <h3><i class="fas fa-credit-card" style="color: var(--primary);"></i> Payment Requests</h3>
        <span style="font-size: 13px; color: var(--muted);">{{ $payments->total() }} payments found</span>
    </div>

    @if($payments->count() > 0)
        <table class="documents-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Service</th>
                    <th>Amount</th>
                    <th>Screenshot</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($payments as $payment)
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">{{ strtoupper(substr($payment->user->name ?? 'U', 0, 1)) }}</div>
                                <div>
                                    <div class="user-name">{{ $payment->user->name ?? 'Deleted User' }}</div>
                                    <div class="user-email">{{ $payment->user->email ?? '' }}</div>
                                </div>
                            </div>
                        </td>
                        <td style="font-size: 13px;">{{ $payment->service->name ?? 'General' }}</td>
                        <td style="font-weight: 600;">Rs {{ number_format($payment->amount, 2) }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $payment->screenshot_path) }}" 
                                 class="screenshot-thumb" 
                                 alt="Payment Screenshot"
                                 onclick="previewScreenshot('{{ asset('storage/' . $payment->screenshot_path) }}')">
                        </td>
                        <td>
                            <span class="status-badge status-{{ $payment->status }}">
                                @if($payment->status === 'pending')
                                    <i class="fas fa-clock"></i> Pending
                                @elseif($payment->status === 'approved')
                                    <i class="fas fa-check"></i> Approved
                                @else
                                    <i class="fas fa-times"></i> Rejected
                                @endif
                            </span>
                            @if($payment->admin_notes)
                                <div style="font-size: 12px; color: var(--accent-coral); margin-top: 4px; font-style: italic;">{{ $payment->admin_notes }}</div>
                            @endif
                        </td>
                        <td style="font-size: 13px; color: var(--muted);">{{ $payment->created_at->format('M d, Y') }}</td>
                        <td>
                            @if($payment->status === 'pending')
                                <div class="action-buttons">
                                    <button class="btn-action btn-approve" title="Approve" onclick="approvePayment({{ $payment->id }})">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn-action btn-reject" title="Reject" onclick="openRejectModal({{ $payment->id }})">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            @else
                                <span style="font-size: 12px; color: var(--muted);">Processed</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: center; gap: 6px; padding: 20px;">
            {{ $payments->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-credit-card"></i>
            <h4>No Payment Requests</h4>
            <p>No payment requests found.</p>
        </div>
    @endif
</div>

<!-- Reject Modal -->
<div class="modal-overlay" id="rejectModal">
    <div class="custom-modal">
        <div class="modal-header">
            <h3><i class="fas fa-times-circle" style="color: var(--accent-coral);"></i> Reject Payment</h3>
            <button class="modal-close" onclick="closeRejectModal()"><i class="fas fa-times"></i></button>
        </div>
        <form id="rejectForm" method="POST">
            @csrf
            <div class="modal-body">
                <div class="form-group">
                    <label>Reason for Rejection *</label>
                    <textarea name="admin_notes" id="rejectReason" required placeholder="Explain why this payment is being rejected..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeRejectModal()">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background: var(--accent-coral);">Reject Payment</button>
            </div>
        </form>
    </div>
</div>

<!-- Screenshot Preview Modal -->
<div class="modal-overlay" id="previewModal">
    <div class="custom-modal preview-modal">
        <div class="modal-header">
            <h3><i class="fas fa-image" style="color: var(--primary);"></i> Payment Screenshot</h3>
            <button class="modal-close" onclick="closePreviewModal()"><i class="fas fa-times"></i></button>
        </div>
        <div class="modal-body" style="text-align: center;">
            <img id="previewImage" src="" alt="Payment Screenshot" style="max-width: 100%; border-radius: 8px;">
        </div>
    </div>
</div>

<script>
    function approvePayment(id) {
        if (confirm('Are you sure you want to approve this payment?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/payments/${id}/approve`;
            const csrf = document.createElement('input');
            csrf.type = 'hidden';
            csrf.name = '_token';
            csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function openRejectModal(id) {
        document.getElementById('rejectForm').action = `/admin/payments/${id}/reject`;
        document.getElementById('rejectModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.remove('active');
        document.body.style.overflow = '';
        document.getElementById('rejectReason').value = '';
    }

    function previewScreenshot(url) {
        document.getElementById('previewImage').src = url;
        document.getElementById('previewModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closePreviewModal() {
        document.getElementById('previewModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    document.querySelectorAll('.modal-overlay').forEach(modal => {
        modal.addEventListener('click', function(e) {
            if (e.target === this) {
                this.classList.remove('active');
                document.body.style.overflow = '';
            }
        });
    });

    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            document.querySelectorAll('.modal-overlay.active').forEach(m => {
                m.classList.remove('active');
            });
            document.body.style.overflow = '';
        }
    });
</script>
@endsection
