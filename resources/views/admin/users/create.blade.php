@extends('admin.layout')

@section('title', 'Create User')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <div style="display: flex; align-items: center; gap: 12px;">
            <a href="{{ route('admin.users.index') }}" class="adm-btn adm-btn-outline adm-btn-sm" style="padding: 6px 12px;">
                <i class="fas fa-arrow-left"></i>
            </a>
            <div>
                <h2>Create New User</h2>
                <p>Add a new user and optionally assign services.</p>
            </div>
        </div>
    </div>
</div>

<div class="anim-fade-up anim-delay-1">
    <form action="{{ route('admin.users.store') }}" method="POST">
        @csrf
        <div style="display: grid; grid-template-columns: 2fr 1fr; gap: 24px;">
            <!-- User Info -->
            <div class="adm-card">
                <div class="adm-card-header">
                    <h5><i class="fas fa-user"></i> User Information</h5>
                </div>
                <div class="adm-card-body">
                    @if($errors->any())
                        <div style="background: #fef2f2; color: #991b1b; padding: 12px 16px; border-radius: var(--radius-sm); border-left: 4px solid #ef4444; margin-bottom: 20px; font-size: 13px;">
                            <ul style="margin: 0; padding-left: 16px;">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div style="display: grid; gap: 16px;">
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Full Name *</label>
                            <input type="text" name="name" value="{{ old('name') }}" required
                                style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit;"
                                placeholder="Enter full name">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Email *</label>
                            <input type="email" name="email" value="{{ old('email') }}" required
                                style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit;"
                                placeholder="Enter email address">
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit;"
                                placeholder="Enter phone number">
                        </div>
                        <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 16px;">
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Password *</label>
                                <input type="password" name="password" required
                                    style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit;"
                                    placeholder="Min 8 characters">
                            </div>
                            <div>
                                <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Confirm Password *</label>
                                <input type="password" name="password_confirmation" required
                                    style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit;"
                                    placeholder="Confirm password">
                            </div>
                        </div>
                        <div>
                            <label style="display: block; font-size: 12px; font-weight: 600; color: var(--ink-secondary); margin-bottom: 6px; text-transform: uppercase; letter-spacing: 0.5px;">Role *</label>
                            <select name="role" required style="width: 100%; padding: 10px 14px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); font-size: 14px; font-family: inherit; background: var(--surface-elevated);">
                                <option value="client" {{ old('role') === 'client' ? 'selected' : '' }}>Client</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Admin</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Assign Services -->
            <div class="adm-card">
                <div class="adm-card-header">
                    <h5><i class="fas fa-link"></i> Assign Services</h5>
                </div>
                <div class="adm-card-body">
                    <p style="font-size: 13px; color: var(--muted); margin-bottom: 16px;">Select services to assign to this user.</p>
                    <div style="display: grid; gap: 10px;">
                        @foreach($services as $service)
                            <label style="display: flex; align-items: center; gap: 12px; padding: 12px; border: 1.5px solid var(--border); border-radius: var(--radius-sm); cursor: pointer; transition: all 0.15s ease;" onmouseover="this.style.borderColor='var(--primary)'" onmouseout="this.style.borderColor='var(--border)'">
                                <input type="checkbox" name="services[]" value="{{ $service->id }}" {{ in_array($service->id, old('services', [])) ? 'checked' : '' }}
                                    style="width: 18px; height: 18px; accent-color: var(--primary);">
                                <div style="width: 32px; height: 32px; background: var(--primary-50); border-radius: 6px; display: flex; align-items: center; justify-content: center; color: var(--primary); font-size: 14px;">
                                    <i class="fa {{ $service->icon }}"></i>
                                </div>
                                <div>
                                    <div style="font-weight: 600; font-size: 13px; color: var(--ink);">{{ $service->name }}</div>
                                    <div style="font-size: 11px; color: var(--muted);">{{ Str::limit($service->short_description ?? $service->description, 50) }}</div>
                                </div>
                            </label>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 24px; display: flex; gap: 12px; justify-content: flex-end;">
            <a href="{{ route('admin.users.index') }}" class="adm-btn adm-btn-outline">Cancel</a>
            <button type="submit" class="adm-btn adm-btn-primary">
                <i class="fas fa-save"></i> Create User
            </button>
        </div>
    </form>
</div>
@endsection
