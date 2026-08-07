@extends('admin.layout')

@section('title', 'Documents - ' . $user->name)
@section('page-title', $user->name . "'s Documents")

@section('content')
<style>
    .back-link {
        display: inline-flex; align-items: center; gap: 6px;
        color: var(--muted); text-decoration: none; font-size: 14px; font-weight: 500;
        margin-bottom: 20px; transition: color 0.2s;
    }
    .back-link:hover { color: var(--primary); }
    .user-header {
        background: var(--surface-elevated); border: 1px solid var(--border);
        border-radius: var(--radius-lg); padding: 24px; margin-bottom: 24px;
        display: flex; align-items: center; justify-content: space-between; gap: 20px;
    }
    .user-header-left { display: flex; align-items: center; gap: 20px; }
    .user-avatar-lg {
        width: 60px; height: 60px; border-radius: 50%;
        background: var(--primary-50); color: var(--primary);
        display: flex; align-items: center; justify-content: center;
        font-weight: 700; font-size: 24px; flex-shrink: 0;
    }
    .user-details h2 { margin: 0 0 4px; font-size: 20px; font-weight: 700; color: var(--ink); }
    .user-details p { margin: 0; font-size: 14px; color: var(--muted); }
    .documents-card {
        background: var(--surface-elevated); border: 1px solid var(--border);
        border-radius: var(--radius-lg); overflow: hidden; margin-bottom: 24px;
    }
    .documents-header {
        display: flex; justify-content: space-between; align-items: center;
        padding: 18px 24px; border-bottom: 1px solid var(--border-light);
    }
    .documents-header h3 { font-size: 16px; font-weight: 700; color: var(--ink); margin: 0; }
    .documents-table { width: 100%; border-collapse: collapse; }
    .documents-table th {
        padding: 12px 16px; text-align: left; font-size: 12px; font-weight: 600;
        color: var(--muted); text-transform: uppercase; letter-spacing: 0.5px;
        background: var(--surface); border-bottom: 1px solid var(--border);
    }
    .documents-table td {
        padding: 16px; border-bottom: 1px solid var(--border-light); vertical-align: middle;
    }
    .documents-table tr:hover { background: var(--surface); }
    .doc-name { font-weight: 600; color: var(--ink); font-size: 14px; }
    .doc-meta { font-size: 12px; color: var(--muted); }
    .service-badge {
        display: inline-flex; align-items: center; gap: 5px; padding: 4px 10px;
        background: var(--primary-50); color: var(--primary);
        border-radius: var(--radius-full); font-size: 12px; font-weight: 500;
    }
    .status-badge {
        display: inline-flex; align-items: center; gap: 5px;
        padding: 5px 12px; border-radius: var(--radius-full); font-size: 12px; font-weight: 600;
    }
    .status-pending { background: var(--accent-gold-50); color: #b45309; }
    .status-approved { background: var(--primary-50); color: var(--primary); }
    .status-rejected { background: var(--accent-coral-50); color: #c2410c; }
    .action-buttons { display: flex; gap: 6px; }
    .btn-action {
        width: 34px; height: 34px; border: none; border-radius: var(--radius-sm);
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        transition: all var(--transition-fast); font-size: 14px;
    }
    .btn-approve { background: var(--primary-50); color: var(--primary); }
    .btn-approve:hover { background: var(--primary); color: #fff; }
    .btn-reject { background: var(--accent-coral-50); color: var(--accent-coral); }
    .btn-reject:hover { background: var(--accent-coral); color: #fff; }
    .btn-download { border: 1px solid var(--border); background: transparent; color: var(--muted); }
    .btn-download:hover { border-color: var(--accent-blue); color: var(--accent-blue); }
    .btn-preview { border: 1px solid var(--border); background: transparent; color: var(--muted); }
    .btn-preview:hover { border-color: var(--primary); color: var(--primary); }
    .rejection-reason { font-size: 12px; color: var(--accent-coral); margin-top: 4px; font-style: italic; }
    .empty-state { text-align: center; padding: 60px 20px; color: var(--muted); }
    .empty-state i { font-size: 48px; color: var(--border); margin-bottom: 16px; display: block; }
    .modal-overlay {
        display: none; position: fixed; top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(16, 32, 26, 0.6); z-index: 99999;
        align-items: center; justify-content: center;
    }
    .modal-overlay.active { display: flex; }
    .custom-modal {
        background: #fff; border-radius: var(--radius-lg); width: 100%;
        max-width: 560px; box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    }
    .modal-header {
        display: flex; align-items: center; justify-content: space-between;
        padding: 18px 24px; border-bottom: 1px solid var(--border-light);
    }
    .modal-header h3 { font-size: 16px; font-weight: 700; color: var(--ink); margin: 0; }
    .modal-close {
        width: 32px; height: 32px; border: none; background: var(--surface);
        border-radius: var(--radius-sm); cursor: pointer;
        display: flex; align-items: center; justify-content: center; color: var(--muted);
    }
    .modal-body { padding: 24px; max-height: 60vh; overflow-y: auto; }
    .modal-footer {
        display: flex; gap: 10px; justify-content: flex-end;
        padding: 16px 24px; border-top: 1px solid var(--border-light); background: var(--surface);
    }
    .form-group { margin-bottom: 16px; }
    .form-group label { display: block; font-size: 13px; font-weight: 600; color: var(--ink); margin-bottom: 6px; }
    .form-group textarea {
        width: 100%; padding: 10px 14px; border: 1.5px solid var(--border);
        border-radius: var(--radius-sm); font-size: 14px; color: var(--ink);
        resize: vertical; min-height: 80px; font-family: inherit;
    }
    .form-group textarea:focus { outline: none; border-color: var(--primary); box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.08); }
    .btn { padding: 10px 20px; border-radius: var(--radius-sm); font-size: 13px; font-weight: 600; cursor: pointer; border: none; transition: all 0.2s; }
    .btn-outline { background: transparent; border: 1.5px solid var(--border); color: var(--ink); }
    .btn-outline:hover { border-color: var(--primary); color: var(--primary); }
    .btn-primary { background: var(--primary); color: #fff; }
    .btn-primary:hover { background: var(--primary-dark); }
    .req-doc-item {
        display: flex; align-items: center; gap: 10px; padding: 10px 14px;
        border-radius: 8px; margin-bottom: 6px; border: 1.5px solid var(--border-light);
        transition: all 0.2s; cursor: pointer;
    }
    .req-doc-item:hover { border-color: var(--primary); background: var(--primary-50); }
    .req-doc-item.missing { border-color: #fecdd3; background: #fff1f2; }
    .req-doc-item.uploaded { border-color: #d1fae5; background: #f0fdf4; }
    .req-doc-item input[type="checkbox"] { width: 16px; height: 16px; accent-color: var(--primary); cursor: pointer; }
    .req-doc-label { font-size: 13px; font-weight: 500; color: var(--ink); flex: 1; }
    .req-doc-service { font-size: 11px; color: var(--muted); }
</style>

<a href="{{ route('admin.user-documents.index') }}" class="back-link">
    <i class="fas fa-arrow-left"></i> Back to Users List
</a>

<!-- User Header -->
<div class="user-header">
    <div class="user-header-left">
        <div class="user-avatar-lg">{{ strtoupper(substr($user->name, 0, 1)) }}</div>
        <div class="user-details">
            <h2>{{ $user->name }}</h2>
            <p>{{ $user->email }} @if($user->phone) &middot; {{ $user->phone }} @endif</p>
        </div>
    </div>
    @if($requiredDocuments->where('is_uploaded', false)->count() > 0)
        <button class="adm-btn adm-btn-primary" onclick="openRequestModal()">
            <i class="fas fa-paper-plane"></i> Request Missing Documents ({{ $requiredDocuments->where('is_uploaded', false)->count() }})
        </button>
    @endif
</div>

<!-- Required Documents Status -->
@if($requiredDocuments->count() > 0)
    <div class="documents-card">
        <div class="documents-header">
            <h3><i class="fas fa-clipboard-list" style="color: var(--primary);"></i> Required Documents ({{ $requiredDocuments->where('is_uploaded', true)->count() }}/{{ $requiredDocuments->count() }} uploaded)</h3>
        </div>
        <div style="padding: 16px 24px;">
            @php
                $groupedRequired = $requiredDocuments->groupBy('service.name');
            @endphp
            @foreach($groupedRequired as $serviceName => $docs)
                <div style="margin-bottom: 16px;">
                    <div style="font-size: 12px; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 8px;">
                        <i class="fas fa-briefcase" style="font-size: 10px;"></i> {{ $serviceName }}
                    </div>
                    @foreach($docs as $reqDoc)
                        <div style="display: flex; align-items: center; gap: 10px; padding: 10px 14px; border-radius: 8px; margin-bottom: 4px; border: 1px solid {{ $reqDoc->is_uploaded ? '#d1fae5' : '#fecdd3' }}; background: {{ $reqDoc->is_uploaded ? '#f0fdf4' : '#fff1f2' }};">
                            <div style="width: 24px; height: 24px; border-radius: 50%; display: flex; align-items: center; justify-content: center; flex-shrink: 0; {{ $reqDoc->is_uploaded ? 'background: #d1fae5; color: #059669;' : 'background: #fecdd3; color: #dc2626;' }}">
                                <i class="fas fa-{{ $reqDoc->is_uploaded ? 'check' : 'times' }}" style="font-size: 10px;"></i>
                            </div>
                            <div style="flex: 1;">
                                <span style="font-size: 13px; font-weight: 500; color: var(--ink);">{{ $reqDoc->name }}</span>
                                @if($reqDoc->is_uploaded && $reqDoc->uploaded_doc)
                                    <span style="font-size: 11px; color: var(--muted); margin-left: 8px;">• {{ $reqDoc->uploaded_doc->name }}</span>
                                @endif
                            </div>
                            @if($reqDoc->is_uploaded && $reqDoc->uploaded_doc)
                                <span class="status-badge status-{{ $reqDoc->uploaded_doc->status }}" style="font-size: 11px; padding: 3px 8px;">
                                    {{ ucfirst($reqDoc->uploaded_doc->status) }}
                                </span>
                            @else
                                <span style="font-size: 11px; color: #dc2626; font-weight: 600;">Missing</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>
@endif

<!-- Uploaded Documents Table -->
<div class="documents-card">
    <div class="documents-header">
        <h3><i class="fas fa-file-alt" style="color: var(--primary);"></i> Uploaded Documents ({{ $documents->count() }})</h3>
    </div>

    @if($documents->count() > 0)
        <table class="documents-table">
            <thead>
                <tr>
                    <th>Document</th>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Uploaded</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($documents as $doc)
                    <tr>
                        <td>
                            <div class="doc-name">{{ $doc->name }}</div>
                            <div class="doc-meta">{{ number_format($doc->file_size / 1024, 1) }} KB &middot; {{ strtoupper(pathinfo($doc->name, PATHINFO_EXTENSION)) }}</div>
                        </td>
                        <td>
                            @if($doc->service)
                                <span class="service-badge">
                                    <i class="fas fa-briefcase"></i> {{ $doc->service->name }}
                                </span>
                            @else
                                <span style="color: var(--muted); font-size: 13px;">General</span>
                            @endif
                        </td>
                        <td>
                            <span class="status-badge status-{{ $doc->status }}">
                                @if($doc->status === 'pending')
                                    <i class="fas fa-clock"></i> Pending
                                @elseif($doc->status === 'approved')
                                    <i class="fas fa-check"></i> Approved
                                @else
                                    <i class="fas fa-times"></i> Rejected
                                @endif
                            </span>
                            @if($doc->rejection_reason)
                                <div class="rejection-reason">"{{ $doc->rejection_reason }}"</div>
                            @endif
                        </td>
                        <td style="font-size: 13px; color: var(--muted);">
                            {{ $doc->created_at->format('M d, Y') }}
                        </td>
                        <td>
                            <div class="action-buttons">
                                <a href="{{ route('admin.user-documents.preview', $doc->id) }}" target="_blank" class="btn-action btn-preview" title="Preview">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.user-documents.download', $doc->id) }}" class="btn-action btn-download" title="Download">
                                    <i class="fas fa-download"></i>
                                </a>
                                @if($doc->status === 'pending' || $doc->status === 'rejected')
                                    <button class="btn-action btn-approve" title="Approve" onclick="approveDocument({{ $doc->id }})">
                                        <i class="fas fa-check"></i>
                                    </button>
                                    <button class="btn-action btn-reject" title="Reject" onclick="openRejectModal({{ $doc->id }}, '{{ addslashes($doc->name) }}')">
                                        <i class="fas fa-times"></i>
                                    </button>
                                @endif
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <div class="empty-state">
            <i class="fas fa-file-alt"></i>
            <h4>No Documents Uploaded</h4>
            <p>This user hasn't uploaded any documents yet.</p>
        </div>
    @endif
</div>

<!-- Request Documents Modal -->
<div class="modal-overlay" id="requestModal">
    <div class="custom-modal">
        <div class="modal-header">
            <h3><i class="fas fa-paper-plane" style="color: var(--primary);"></i> Request Documents</h3>
            <button class="modal-close" onclick="closeRequestModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="requestForm" method="POST" action="{{ route('admin.user-documents.request', $user->id) }}">
            @csrf
            <div class="modal-body">
                <p style="font-size: 13px; color: var(--muted); margin-bottom: 16px;">
                    Select the missing documents to request from <strong>{{ $user->name }}</strong>. A notification will be sent to the user.
                </p>

                @php
                    $missingDocs = $requiredDocuments->where('is_uploaded', false);
                    $groupedMissing = $missingDocs->groupBy('service.name');
                @endphp

                @if($missingDocs->count() > 0)
                    <div style="margin-bottom: 12px;">
                        <label style="display: flex; align-items: center; gap: 8px; padding: 8px 12px; background: var(--surface); border-radius: 8px; cursor: pointer; font-size: 13px; font-weight: 600; color: var(--ink);">
                            <input type="checkbox" id="selectAll" onchange="toggleAll(this)" style="width: 16px; height: 16px; accent-color: var(--primary);">
                            Select All Missing Documents
                        </label>
                    </div>

                    @foreach($groupedMissing as $serviceName => $docs)
                        <div style="margin-bottom: 12px;">
                            <div style="font-size: 11px; font-weight: 700; color: var(--primary); text-transform: uppercase; letter-spacing: 0.5px; margin-bottom: 6px; padding-left: 4px;">
                                {{ $serviceName }}
                            </div>
                            @foreach($docs as $reqDoc)
                                <label class="req-doc-item missing">
                                    <input type="checkbox" name="required_document_ids[]" value="{{ $reqDoc->id }}" class="doc-checkbox">
                                    <div>
                                        <div class="req-doc-label">{{ $reqDoc->name }}</div>
                                        @if($reqDoc->description)
                                            <div class="req-doc-service">{{ $reqDoc->description }}</div>
                                        @endif
                                    </div>
                                </label>
                            @endforeach
                        </div>
                    @endforeach

                    <div class="form-group" style="margin-top: 16px;">
                        <label>Custom Message (optional)</label>
                        <textarea name="message" placeholder="e.g., Please upload these documents at your earliest convenience so we can proceed with your tax filing..."></textarea>
                    </div>
                @else
                    <div style="text-align: center; padding: 30px; color: var(--muted);">
                        <i class="fas fa-check-circle" style="font-size: 36px; color: #059669; margin-bottom: 12px; display: block;"></i>
                        <p style="font-size: 14px; font-weight: 600; color: var(--ink);">All Required Documents Uploaded!</p>
                        <p style="font-size: 13px;">This user has uploaded all required documents.</p>
                    </div>
                @endif
            </div>
            @if($missingDocs->count() > 0)
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline" onclick="closeRequestModal()">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane"></i> Send Request
                    </button>
                </div>
            @endif
        </form>
    </div>
</div>

<!-- Reject Modal -->
<div class="modal-overlay" id="rejectModal">
    <div class="custom-modal">
        <div class="modal-header">
            <h3><i class="fas fa-times-circle" style="color: var(--accent-coral);"></i> Reject Document</h3>
            <button class="modal-close" onclick="closeRejectModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="rejectForm" method="POST">
            @csrf
            <div class="modal-body">
                <p style="font-size: 14px; color: var(--muted); margin-bottom: 16px;">
                    You are rejecting: <strong id="rejectDocName"></strong>
                </p>
                <div class="form-group">
                    <label>Reason for Rejection *</label>
                    <textarea name="rejection_reason" id="rejectionReason" required
                        placeholder="Please explain why this document is incorrect or needs to be re-uploaded..."></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline" onclick="closeRejectModal()">Cancel</button>
                <button type="submit" class="btn btn-primary" style="background: var(--accent-coral);">
                    <i class="fas fa-times"></i> Reject Document
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    function approveDocument(id) {
        if (confirm('Are you sure you want to approve this document?')) {
            const form = document.createElement('form');
            form.method = 'POST';
            form.action = `/admin/user-documents/${id}/approve`;
            const csrf = document.createElement('input');
            csrf.type = 'hidden'; csrf.name = '_token'; csrf.value = '{{ csrf_token() }}';
            form.appendChild(csrf);
            document.body.appendChild(form);
            form.submit();
        }
    }

    function openRejectModal(id, name) {
        document.getElementById('rejectDocName').textContent = name;
        document.getElementById('rejectForm').action = `/admin/user-documents/${id}/reject`;
        document.getElementById('rejectModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRejectModal() {
        document.getElementById('rejectModal').classList.remove('active');
        document.body.style.overflow = '';
        document.getElementById('rejectionReason').value = '';
    }

    function openRequestModal() {
        document.getElementById('requestModal').classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeRequestModal() {
        document.getElementById('requestModal').classList.remove('active');
        document.body.style.overflow = '';
    }

    function toggleAll(source) {
        document.querySelectorAll('.doc-checkbox').forEach(cb => cb.checked = source.checked);
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
                document.body.style.overflow = '';
            });
        }
    });
</script>
@endsection
