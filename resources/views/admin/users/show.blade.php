@extends('admin.layout')

@section('title', 'User Details - ' . $user->name)

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('admin.users.index') }}" class="adm-btn adm-btn-outline adm-btn-sm" style="padding: 6px 12px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2>{{ $user->name }}</h2>
                <p>User details and service management.</p>
            </div>
        </div>
    </div>
    <div style="display: flex; gap: 10px;">
        <a href="{{ route('admin.users.edit', $user->id) }}" class="adm-btn adm-btn-outline">
            <i class="fas fa-pen"></i> Edit User
        </a>
    </div>
</div>

<div style="display: grid; grid-template-columns: 1fr 1fr; gap: 24px;" class="anim-fade-up anim-delay-1">
    <!-- User Info Card -->
    <div class="adm-card">
        <div class="adm-card-header">
            <h5><i class="fas fa-user"></i> User Information</h5>
        </div>
        <div class="adm-card-body">
            <div style="display: flex; align-items: center; gap: 20px; margin-bottom: 24px;">
                <div style="width: 72px; height: 72px; background: linear-gradient(135deg, var(--primary), var(--primary-dark)); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; font-weight: 800; font-size: 28px; box-shadow: 0 4px 12px rgba(15, 122, 78, 0.3);">
                    {{ strtoupper(substr($user->name, 0, 1)) }}
                </div>
                <div>
                    <h3 style="margin: 0; font-size: 22px;">{{ $user->name }}</h3>
                    <span class="adm-badge {{ $user->role === 'admin' ? 'adm-badge-gold' : 'adm-badge-green' }}" style="margin-top: 4px;">
                        <span class="adm-badge-dot"></span>
                        {{ ucfirst($user->role) }}
                    </span>
                </div>
            </div>

            <div style="display: grid; gap: 16px;">
                <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--surface); border-radius: var(--radius-sm);">
                    <i class="fas fa-envelope" style="color: var(--primary); width: 20px;"></i>
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase; font-weight: 600;">Email</div>
                        <div style="font-size: 14px; color: var(--ink);">{{ $user->email }}</div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--surface); border-radius: var(--radius-sm);">
                    <i class="fas fa-phone" style="color: var(--primary); width: 20px;"></i>
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase; font-weight: 600;">Phone</div>
                        <div style="font-size: 14px; color: var(--ink);">{{ $user->phone ?: 'Not provided' }}</div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--surface); border-radius: var(--radius-sm);">
                    <i class="fas fa-calendar" style="color: var(--primary); width: 20px;"></i>
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase; font-weight: 600;">Joined</div>
                        <div style="font-size: 14px; color: var(--ink);">{{ $user->created_at->format('F d, Y \a\t h:i A') }}</div>
                    </div>
                </div>
                <div style="display: flex; align-items: center; gap: 12px; padding: 12px; background: var(--surface); border-radius: var(--radius-sm);">
                    <i class="fas fa-link" style="color: var(--primary); width: 20px;"></i>
                    <div>
                        <div style="font-size: 11px; color: var(--muted); text-transform: uppercase; font-weight: 600;">Assigned Services</div>
                        <div style="font-size: 14px; color: var(--ink); font-weight: 600;">{{ $user->services->count() }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Assign Service Card -->
    <div class="adm-card">
        <div class="adm-card-header">
            <h5><i class="fas fa-plus-circle"></i> Assign New Service</h5>
        </div>
        <div class="adm-card-body">
            <form action="{{ route('admin.users.assign-service', $user->id) }}" method="POST">
                @csrf
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Select Service</label>
                    <select name="service_id" required class="adm-form-select" style="width: 100%; padding: 10px 14px;">
                        <option value="">Choose a service...</option>
                        @foreach($services as $service)
                            @unless($user->services->contains($service->id))
                                <option value="{{ $service->id }}">{{ $service->name }}</option>
                            @endunless
                        @endforeach
                    </select>
                </div>
                <div style="margin-bottom: 16px;">
                    <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Notes (Optional)</label>
                    <textarea name="notes" rows="3" placeholder="Add any notes about this assignment..." style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 13px; font-family: inherit; resize: vertical;"></textarea>
                </div>
                <button type="submit" class="adm-btn adm-btn-primary" style="width: 100%;">
                    <i class="fas fa-link"></i> Assign Service
                </button>
            </form>
        </div>
    </div>
</div>

<!-- Assigned Services -->
<div class="adm-card anim-fade-up anim-delay-2" style="margin-top: 24px;">
    <div class="adm-card-header">
        <h5><i class="fas fa-list"></i> Assigned Services ({{ $user->services->count() }})</h5>
    </div>
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Service</th>
                    <th>Status</th>
                    <th>Assigned Date</th>
                    <th>Notes</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user->services as $service)
                    <tr>
                        <td>
                            <div style="display: flex; align-items: center; gap: 10px;">
                                <div style="width: 36px; height: 36px; background: var(--primary-50); border-radius: var(--radius-sm); display: flex; align-items: center; justify-content: center; color: var(--primary);">
                                    <i class="fa {{ $service->icon }}"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 600; color: var(--ink);">{{ $service->name }}</div>
                                    <div style="font-size: 12px; color: var(--muted);">{{ $service->slug }}</div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div style="display: flex; gap: 4px; flex-direction: column;">
                                <span class="adm-badge {{ $service->pivot->status === 'active' ? 'adm-badge-green' : ($service->pivot->status === 'paused' ? 'adm-badge-gold' : 'adm-badge-red') }}">
                                    <span class="adm-badge-dot"></span>
                                    Access: {{ ucfirst($service->pivot->status) }}
                                </span>
                                
                                <form action="{{ route('admin.users.services.status', [$user->id, $service->id]) }}" method="POST" style="margin-top: 5px;">
                                    @csrf
                                    <select name="service_status" class="adm-form-select" onchange="this.form.submit()" style="padding: 2px 5px; font-size: 11px;">
                                        <option value="pending" {{ ($service->pivot->service_status ?? 'pending') === 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="under_review" {{ ($service->pivot->service_status ?? 'pending') === 'under_review' ? 'selected' : '' }}>Under Review</option>
                                        <option value="processing" {{ ($service->pivot->service_status ?? 'pending') === 'processing' ? 'selected' : '' }}>Processing</option>
                                        <option value="complete" {{ ($service->pivot->service_status ?? 'pending') === 'complete' ? 'selected' : '' }}>Complete</option>
                                    </select>
                                </form>
                            </div>
                        </td>
                        <td style="color: var(--muted); font-size: 13px;">
                            {{ $service->pivot->assigned_at ? \Carbon\Carbon::parse($service->pivot->assigned_at)->format('M d, Y') : 'N/A' }}
                        </td>
                        <td style="color: var(--muted); font-size: 13px; max-width: 200px;">
                            {{ $service->pivot->notes ?: 'No notes' }}
                        </td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end; gap: 6px;">
                                @if($service->pivot->status !== 'active')
                                    <form action="{{ route('admin.users.update-service-status', [$user->id, $service->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="active">
                                        <button type="submit" class="adm-btn adm-btn-outline adm-btn-sm" title="Activate" style="padding: 4px 10px; font-size: 11px;">
                                            <i class="fas fa-play"></i> Activate
                                        </button>
                                    </form>
                                @endif
                                @if($service->pivot->status !== 'paused')
                                    <form action="{{ route('admin.users.update-service-status', [$user->id, $service->id]) }}" method="POST" style="display: inline;">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="paused">
                                        <button type="submit" class="adm-btn adm-btn-outline adm-btn-sm" title="Pause" style="padding: 4px 10px; font-size: 11px;">
                                            <i class="fas fa-pause"></i> Pause
                                        </button>
                                    </form>
                                @endif
                                <form action="{{ route('admin.users.remove-service', [$user->id, $service->id]) }}" method="POST" class="d-inline" onsubmit="return confirm('Remove this service from user?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="adm-btn adm-btn-danger adm-btn-sm" title="Remove" style="padding: 4px 10px; font-size: 11px;">
                                        <i class="fas fa-times"></i> Remove
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-link"></i></div>
                                <h6>No services assigned</h6>
                                <p>Assign a service to this user using the form above.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<style>
    .adm-form-select {
        border: 1.5px solid var(--border);
        border-radius: var(--radius-sm);
        font-size: 13px;
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
@endsection
