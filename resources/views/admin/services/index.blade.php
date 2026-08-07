@extends('admin.layout')

@section('title', 'Manage Services')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Manage Services</h2>
        <p>Create, edit, and manage the services offered on your website.</p>
    </div>
    <a href="{{ route('admin.services.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Add New Service
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Icon</th>
                    <th>Users</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($services as $service)
                    <tr>
                        <td style="color: var(--muted);">{{ $service->id }}</td>
                        <td>
                            <strong style="color: var(--ink);">{{ $service->name }}</strong>
                        </td>
                        <td>
                            <code style="background: var(--surface); padding: 3px 8px; border-radius: 4px; font-size: 12px; color: var(--muted);">{{ $service->slug }}</code>
                        </td>
                        <td>
                            <strong style="color: var(--ink);">{{ $service->price ? 'Rs. ' . number_format($service->price, 0) : 'Not set' }}</strong>
                        </td>
                        <td>
                            <div style="width: 36px; height: 36px; background: var(--primary-50); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                                <i class="fa {{ $service->icon }}"></i>
                            </div>
                        </td>
                        <td>
                            <span style="background: var(--primary-50); color: var(--primary); padding: 4px 10px; border-radius: var(--radius-full); font-size: 12px; font-weight: 600;">
                                {{ $service->users_count ?? $service->users->count() }} users
                            </span>
                        </td>
                        <td>{{ $service->sort_order }}</td>
                        <td>
                            <span class="adm-badge {{ $service->is_active ? 'adm-badge-green' : 'adm-badge-red' }}">
                                <span class="adm-badge-dot"></span>
                                {{ $service->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.services.required-documents', $service->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Required Documents">
                                    <i class="fas fa-file-alt"></i>
                                </a>
                                <a href="{{ route('admin.users.index') }}?service={{ $service->id }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="View Users">
                                    <i class="fas fa-users"></i>
                                </a>
                                <a href="{{ route('admin.services.edit', $service->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.services.delete', $service->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this service?')">
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
                        <td colspan="9">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-briefcase"></i></div>
                                <h6>No services yet</h6>
                                <p>Create your first service to get started.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
