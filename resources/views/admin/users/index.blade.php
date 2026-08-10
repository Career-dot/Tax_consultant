@extends('admin.layout')

@section('title', 'Manage Users')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Manage Users</h2>
        <p>View, manage, and assign services to registered users.</p>
    </div>
    <a href="{{ route('admin.users.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Add New User
    </a>
</div>

<!-- Stats Row -->
<div style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 16px; margin-bottom: 28px;" class="anim-fade-up anim-delay-1">
    <div class="adm-card" style="padding: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
            <div style="width: 48px; height: 48px; background: var(--primary-50); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                <i class="fas fa-users" style="font-size: 20px;"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 800; color: var(--ink);">{{ $users->total() }}</div>
                <div style="font-size: 12px; color: var(--muted); font-weight: 500;">Total Users</div>
            </div>
        </div>
    </div>
    <div class="adm-card" style="padding: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
            <div style="width: 48px; height: 48px; background: var(--primary-50); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                <i class="fas fa-user-shield" style="font-size: 20px;"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 800; color: var(--ink);">{{ \App\Models\User::where('role', 'admin')->count() }}</div>
                <div style="font-size: 12px; color: var(--muted); font-weight: 500;">Admins</div>
            </div>
        </div>
    </div>
    <div class="adm-card" style="padding: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
            <div style="width: 48px; height: 48px; background: rgba(30, 70, 104, 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--accent-blue);">
                <i class="fas fa-user" style="font-size: 20px;"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 800; color: var(--ink);">{{ \App\Models\User::where('role', 'client')->count() }}</div>
                <div style="font-size: 12px; color: var(--muted); font-weight: 500;">Clients</div>
            </div>
        </div>
    </div>
    <div class="adm-card" style="padding: 20px;">
        <div style="display: flex; align-items: center; gap: 14px;">
            <div style="width: 48px; height: 48px; background: rgba(185, 137, 47, 0.1); border-radius: var(--radius-md); display: flex; align-items: center; justify-content: center; color: var(--accent-gold);">
                <i class="fas fa-link" style="font-size: 20px;"></i>
            </div>
            <div>
                <div style="font-size: 24px; font-weight: 800; color: var(--ink);">{{ \App\Models\User::with('services')->has('services')->count() }}</div>
                <div style="font-size: 12px; color: var(--muted); font-weight: 500;">With Services</div>
            </div>
        </div>
    </div>
</div>

<!-- Users Table -->
<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-header">
        <h5><i class="fas fa-users"></i> All Users</h5>
        <div style="display: flex; gap: 10px;">
            <select id="roleFilter" class="adm-form-select" style="width: auto; padding: 6px 12px; font-size: 13px;">
                <option value="">All Roles</option>
                <option value="admin">Admin</option>
                <option value="client">Client</option>
            </select>
            <select id="serviceFilter" class="adm-form-select" style="width: auto; padding: 6px 12px; font-size: 13px;">
                <option value="">All Services</option>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="adm-table-wrapper">
        <table class="adm-table" id="usersTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Role</th>
                    <th>Phone</th>
                    <th>Services</th>
                    <th>Joined</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $user)
                    <tr data-role="{{ $user->role }}" data-services="{{ $user->services->pluck('id')->implode(',') }}">
                        <td style="color: var(--muted);">{{ $user->id }}</td>
                        <td>
                            <div style="display: flex; align-items: center; gap: 12px;">
                                <div style="width: 40px; height: 40px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 700; font-size: 14px;">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: var(--ink);">{{ $user->name }}</div>
                                    <div style="font-size: 12px; color: var(--muted);">{{ $user->email }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="adm-badge {{ $user->role === 'admin' ? 'adm-badge-gold' : 'adm-badge-green' }}">
                                <span class="adm-badge-dot"></span>
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                        <td style="color: var(--muted);">{{ $user->phone ?: 'N/A' }}</td>
                        <td>
                            <div style="display: flex; flex-wrap: wrap; gap: 4px;">
                                @forelse($user->services as $service)
                                    <span style="background: var(--primary-50); color: var(--primary); padding: 2px 8px; border-radius: 4px; font-size: 11px; font-weight: 600;">{{ $service->name }}</span>
                                @empty
                                    <span style="color: var(--muted); font-size: 12px;">No services</span>
                                @endforelse
                            </div>
                        </td>
                        <td style="color: var(--muted); font-size: 13px;">{{ $user->created_at->format('M d, Y') }}</td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.users.show', $user->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="View Details">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.users.edit', $user->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this user? This will remove all service assignments.')">
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
                        <td colspan="7">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-users"></i></div>
                                <h6>No users yet</h6>
                                <p>Registered users will appear here.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if($users->hasPages())
        <div style="padding: 16px 24px; border-top: 1px solid var(--border-light);">
            {{ $users->links() }}
        </div>
    @endif
</div>

<style>
    .adm-form-select {
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: 13px;
        padding: 6px 12px;
        background: var(--surface-elevated);
        color: var(--ink);
        font-family: inherit;
        cursor: pointer;
    }
    .adm-form-select:focus {
        outline: none;
        border-color: var(--primary);
    }
</style>

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const roleFilter = document.getElementById('roleFilter');
    const serviceFilter = document.getElementById('serviceFilter');
    const rows = document.querySelectorAll('#usersTable tbody tr[data-role]');

    function filterRows() {
        const roleVal = roleFilter.value;
        const serviceVal = serviceFilter.value;

        rows.forEach(row => {
            const matchRole = !roleVal || row.dataset.role === roleVal;
            const matchService = !serviceVal || row.dataset.services.split(',').includes(serviceVal);
            row.style.display = (matchRole && matchService) ? '' : 'none';
        });
    }

    roleFilter.addEventListener('change', filterRows);
    serviceFilter.addEventListener('change', filterRows);
});
</script>
@endpush
@endsection
