@extends('admin.layout')

@section('title', 'Required Documents - ' . $service->name)

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Required Documents</h2>
        <p>Manage required documents for <strong>{{ $service->name }}</strong>.</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Services
    </a>
</div>

<div class="row">
    <!-- Add New Required Document -->
    <div class="col-md-4">
        <div class="adm-card anim-fade-up">
            <div class="adm-card-header">
                <h5><i class="fas fa-plus-circle"></i> Add Required Document</h5>
            </div>
            <div class="adm-card-body">
                <form action="{{ route('admin.services.store-required-document', $service->id) }}" method="POST" class="adm-form">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Document Name *</label>
                        <input type="text" name="name" class="form-control" required placeholder="e.g., CNIC copy">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" placeholder="Optional description..."></textarea>
                    </div>
                    <div class="row">
                        <div class="col-6 mb-3">
                            <label class="form-label">Sort Order</label>
                            <input type="number" name="sort_order" class="form-control" value="0">
                        </div>
                        <div class="col-6 mb-3">
                            <label class="form-label">Status</label>
                            <div class="form-check form-switch mt-2" style="padding-top: 8px;">
                                <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" checked>
                                <label class="form-check-label" for="isActive">Active</label>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="adm-btn adm-btn-primary" style="width: 100%;">
                        <i class="fas fa-plus"></i> Add Document
                    </button>
                </form>
            </div>
        </div>
    </div>

    <!-- Required Documents List -->
    <div class="col-md-8">
        <div class="adm-card anim-fade-up anim-delay-2">
            <div class="adm-card-header">
                <h5><i class="fas fa-list"></i> Required Documents ({{ $requiredDocuments->count() }})</h5>
            </div>
            <div class="adm-table-wrapper">
                <table class="adm-table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Document Name</th>
                            <th>Description</th>
                            <th>Order</th>
                            <th>Status</th>
                            <th style="text-align: right;">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($requiredDocuments as $doc)
                            <tr>
                                <td style="color: var(--muted);">{{ $doc->id }}</td>
                                <td>
                                    <strong style="color: var(--ink);">{{ $doc->name }}</strong>
                                </td>
                                <td style="color: var(--muted); font-size: 13px; max-width: 200px;">
                                    {{ $doc->description ?: '-' }}
                                </td>
                                <td>{{ $doc->sort_order }}</td>
                                <td>
                                    <span class="adm-badge {{ $doc->is_active ? 'adm-badge-green' : 'adm-badge-red' }}">
                                        <span class="adm-badge-dot"></span>
                                        {{ $doc->is_active ? 'Active' : 'Inactive' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="adm-actions" style="justify-content: flex-end; gap: 6px;">
                                        <button class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit" onclick="openEditModal({{ $doc->id }}, '{{ addslashes($doc->name) }}', '{{ addslashes($doc->description ?? '') }}', {{ $doc->sort_order }}, {{ $doc->is_active ? 'true' : 'false' }})">
                                            <i class="fas fa-pen"></i>
                                        </button>
                                        <form action="{{ route('admin.services.delete-required-document', $doc->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this required document?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="adm-btn adm-btn-danger adm-btn-sm adm-btn-icon" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6">
                                    <div class="adm-empty">
                                        <div class="adm-empty-icon"><i class="fas fa-file-alt"></i></div>
                                        <h6>No required documents</h6>
                                        <p>Add required documents for this service using the form.</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Edit Modal -->
<div class="modal-overlay" id="editModal">
    <div class="custom-modal" style="max-width: 480px;">
        <div class="modal-header">
            <h3><i class="fas fa-pen" style="color: var(--primary);"></i> Edit Required Document</h3>
            <button class="modal-close" onclick="closeEditModal()">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <form id="editForm" method="POST">
            @csrf
            @method('PUT')
            <div class="modal-body" style="padding: 24px;">
                <div class="form-group" style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Document Name *</label>
                    <input type="text" name="name" id="editName" class="form-control" required style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px;">
                </div>
                <div class="form-group" style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Description</label>
                    <textarea name="description" id="editDescription" rows="3" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; resize: vertical;"></textarea>
                </div>
                <div class="row">
                    <div class="col-6" style="margin-bottom: 16px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Sort Order</label>
                        <input type="number" name="sort_order" id="editSortOrder" class="form-control" value="0" style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px;">
                    </div>
                    <div class="col-6" style="margin-bottom: 16px;">
                        <label style="display: block; font-size: 13px; font-weight: 600; margin-bottom: 6px;">Status</label>
                        <div class="form-check form-switch" style="padding-top: 8px;">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="editIsActive">
                            <label class="form-check-label" for="editIsActive">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display: flex; gap: 10px; justify-content: flex-end; padding: 16px 24px; border-top: 1px solid var(--border-light); background: var(--surface);">
                <button type="button" class="adm-btn adm-btn-ghost" onclick="closeEditModal()">Cancel</button>
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Update
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    .modal-overlay {
        display: none;
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background: rgba(16, 32, 26, 0.6);
        z-index: 99999;
        align-items: center;
        justify-content: center;
    }
    .modal-overlay.active { display: flex; }
    .custom-modal {
        background: #fff;
        border-radius: var(--radius-lg);
        width: 100%;
        box-shadow: 0 25px 60px rgba(0, 0, 0, 0.3);
    }
    .modal-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 24px;
        border-bottom: 1px solid var(--border-light);
    }
    .modal-header h3 { font-size: 16px; font-weight: 700; color: var(--ink); margin: 0; }
    .modal-close {
        width: 32px; height: 32px; border: none;
        background: var(--surface); border-radius: var(--radius-sm);
        cursor: pointer; display: flex; align-items: center; justify-content: center;
        color: var(--muted);
    }
</style>

<script>
    function openEditModal(id, name, description, sortOrder, isActive) {
        document.getElementById('editForm').action = '/admin/required-documents/' + id;
        document.getElementById('editName').value = name;
        document.getElementById('editDescription').value = description;
        document.getElementById('editSortOrder').value = sortOrder;
        document.getElementById('editIsActive').checked = isActive;
        document.getElementById('editModal').classList.add('active');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.remove('active');
    }

    document.getElementById('editModal').addEventListener('click', function(e) {
        if (e.target === this) closeEditModal();
    });
</script>
@endsection
