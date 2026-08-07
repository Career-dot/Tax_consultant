@extends('admin.layout')

@section('title', 'User Documents')
@section('page-title', 'User Documents')

@section('content')
<style>
    .stats-row {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 16px;
        margin-bottom: 24px;
    }
    .stat-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px;
        display: flex;
        align-items: center;
        gap: 16px;
        transition: all var(--transition-normal);
    }
    .stat-card:hover {
        box-shadow: var(--shadow-md);
        transform: translateY(-2px);
    }
    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: var(--radius-md);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .stat-icon.green { background: var(--primary-50); color: var(--primary); }
    .stat-icon.blue { background: var(--accent-blue-50); color: var(--accent-blue); }
    .stat-icon.gold { background: var(--accent-gold-50); color: var(--accent-gold); }
    .stat-icon.coral { background: var(--accent-coral-50); color: var(--accent-coral); }
    .stat-value { font-size: 24px; font-weight: 800; color: var(--ink); }
    .stat-label { font-size: 13px; color: var(--muted); }
    .filter-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        padding: 20px;
        margin-bottom: 24px;
    }
    .filter-form {
        display: flex;
        gap: 12px;
        align-items: flex-end;
        flex-wrap: wrap;
    }
    .filter-group {
        flex: 1;
        min-width: 200px;
    }
    .filter-group label {
        display: block;
        font-size: 12px;
        font-weight: 600;
        color: var(--ink-secondary);
        margin-bottom: 6px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    .filter-group select {
        width: 100%;
        padding: 10px 14px;
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: 13px;
        color: var(--ink);
        background: var(--surface);
    }
    .filter-group select:focus {
        outline: none;
        border-color: var(--primary);
        box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.1);
    }
    .btn-filter {
        padding: 10px 20px;
        background: var(--primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        display: flex;
        align-items: center;
        gap: 6px;
    }
    .btn-filter:hover { background: var(--primary-dark); }
    .documents-card {
        background: var(--surface-elevated);
        border: 1px solid var(--border);
        border-radius: var(--radius-lg);
        overflow: hidden;
    }
    .documents-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 18px 24px;
        border-bottom: 1px solid var(--border-light);
    }
    .documents-header h3 {
        font-size: 16px;
        font-weight: 700;
        color: var(--ink);
        margin: 0;
    }
    .documents-table {
        width: 100%;
        border-collapse: collapse;
    }
    .documents-table th {
        padding: 12px 16px;
        text-align: left;
        font-size: 12px;
        font-weight: 600;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: 0.5px;
        background: var(--surface);
        border-bottom: 1px solid var(--border);
    }
    .documents-table td {
        padding: 16px;
        border-bottom: 1px solid var(--border-light);
        vertical-align: middle;
    }
    .documents-table tr:hover { background: var(--surface); }
    .user-info {
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: var(--primary-50);
        color: var(--primary);
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 15px;
        flex-shrink: 0;
    }
    .user-name { font-weight: 600; color: var(--ink); font-size: 14px; }
    .user-email { font-size: 12px; color: var(--muted); }
    .doc-count {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 4px 10px;
        border-radius: var(--radius-full);
        font-size: 12px;
        font-weight: 600;
    }
    .doc-count.total { background: var(--primary-50); color: var(--primary); }
    .doc-count.pending { background: var(--accent-gold-50); color: #b45309; }
    .doc-count.approved { background: #d1fae5; color: #065f46; }
    .doc-count.rejected { background: var(--accent-coral-50); color: #c2410c; }
    .btn-view-user {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 8px 16px;
        background: var(--primary);
        color: #fff;
        border: none;
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 600;
        text-decoration: none;
        transition: all var(--transition-fast);
    }
    .btn-view-user:hover { background: var(--primary-dark); color: #fff; }
    .pagination {
        display: flex;
        justify-content: center;
        gap: 6px;
        padding: 20px;
    }
    .pagination a, .pagination span {
        padding: 8px 14px;
        border-radius: var(--radius-sm);
        font-size: 13px;
        font-weight: 500;
        text-decoration: none;
        color: var(--ink);
        background: var(--surface);
        border: 1px solid var(--border);
    }
    .pagination a:hover { background: var(--primary-50); border-color: var(--primary); color: var(--primary); }
    .pagination .active { background: var(--primary); color: #fff; border-color: var(--primary); }
    .empty-state { text-align: center; padding: 60px 20px; color: var(--muted); }
    .empty-state i { font-size: 48px; color: var(--border); margin-bottom: 16px; display: block; }
    @media (max-width: 768px) {
        .stats-row { grid-template-columns: repeat(2, 1fr); }
        .filter-form { flex-direction: column; }
    }
</style>

<!-- Stats -->
<div class="stats-row">
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-file-alt"></i></div>
        <div>
            <div class="stat-value">{{ $stats['total'] }}</div>
            <div class="stat-label">Total Documents</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon gold"><i class="fas fa-clock"></i></div>
        <div>
            <div class="stat-value">{{ $stats['pending'] }}</div>
            <div class="stat-label">Pending Review</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon green"><i class="fas fa-check-circle"></i></div>
        <div>
            <div class="stat-value">{{ $stats['approved'] }}</div>
            <div class="stat-label">Approved</div>
        </div>
    </div>
    <div class="stat-card">
        <div class="stat-icon coral"><i class="fas fa-times-circle"></i></div>
        <div>
            <div class="stat-value">{{ $stats['rejected'] }}</div>
            <div class="stat-label">Rejected</div>
        </div>
    </div>
</div>

<!-- Filters -->
<div class="filter-card">
    <form action="{{ route('admin.user-documents.index') }}" method="GET" class="filter-form">
        <div class="filter-group">
            <label>Filter by User</label>
            <select name="user_id">
                <option value="">All Users</option>
                @foreach($allUsers as $u)
                    <option value="{{ $u->id }}" {{ request('user_id') == $u->id ? 'selected' : '' }}>
                        {{ $u->name }} ({{ $u->email }})
                    </option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn-filter">
            <i class="fas fa-filter"></i> Filter
        </button>
    </form>
</div>

<!-- Users Table -->
<div class="documents-card">
    <div class="documents-header">
        <h3><i class="fas fa-users" style="color: var(--primary);"></i> Users with Documents</h3>
        <span style="font-size: 13px; color: var(--muted);">{{ $users->total() }} users found</span>
    </div>

    @if($users->count() > 0)
        <table class="documents-table">
            <thead>
                <tr>
                    <th>User</th>
                    <th>Total Docs</th>
                    <th>Pending</th>
                    <th>Approved</th>
                    <th>Rejected</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>
                            <div class="user-info">
                                <div class="user-avatar">{{ strtoupper(substr($user->name ?? 'U', 0, 1)) }}</div>
                                <div>
                                    <div class="user-name">{{ $user->name }}</div>
                                    <div class="user-email">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="doc-count total">
                                <i class="fas fa-file-alt"></i> {{ $user->total_documents }}
                            </span>
                        </td>
                        <td>
                            <span class="doc-count pending">
                                <i class="fas fa-clock"></i> {{ $user->pending_documents }}
                            </span>
                        </td>
                        <td>
                            <span class="doc-count approved">
                                <i class="fas fa-check"></i> {{ $user->approved_documents }}
                            </span>
                        </td>
                        <td>
                            <span class="doc-count rejected">
                                <i class="fas fa-times"></i> {{ $user->rejected_documents }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('admin.user-documents.show', $user->id) }}" class="btn-view-user">
                                <i class="fas fa-eye"></i> View Documents
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class="pagination">
            {{ $users->withQueryString()->links() }}
        </div>
    @else
        <div class="empty-state">
            <i class="fas fa-file-alt"></i>
            <h4>No Users with Documents</h4>
            <p>No users have uploaded documents yet.</p>
        </div>
    @endif
</div>
@endsection
