@extends('layouts.dashboard')

@section('title', 'My Profile - Tax Consultant')

@section('content')
    @php $user = auth()->user(); @endphp

    <x-dashboard.page-header title="My Profile" subtitle="Keep your personal details up to date for smoother filings." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'My Profile']]" />

    <div class="pfd-grid pfd-grid-2" style="align-items:start;">
        <div class="pfd-card pfd-reveal pfd-span-2">
            <div class="pfd-card-header">
                <div>
                    <h2>Personal Information</h2>
                    <p>Used across all your applications and invoices.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                <form action="{{ route('dashboard.profile.update') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div style="display:flex; align-items:center; gap:20px; margin-bottom:26px;">
                        <span class="pfd-avatar pfd-avatar-lg">
                            @if ($user->avatarUrl())
                                <img src="{{ $user->avatarUrl() }}" alt="{{ $user->name }}">
                            @else
                                {{ $user->initials() }}
                            @endif
                        </span>
                        <div>
                            <label class="pfd-btn pfd-btn-outline pfd-btn-sm" for="avatarInput" style="cursor:pointer;">
                                <i class="fa fa-camera" aria-hidden="true"></i> Change Photo
                            </label>
                            <input id="avatarInput" type="file" name="avatar" accept="image/*" style="display:none" onchange="this.form.querySelector('[data-avatar-filename]').textContent = this.files[0]?.name || ''">
                            <p class="pfd-help" data-avatar-filename></p>
                            @error('avatar')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <div class="pfd-grid pfd-grid-2">
                        <div class="pfd-field">
                            <label for="profileName">Full name</label>
                            <input id="profileName" name="name" type="text" value="{{ old('name', $user->name) }}" class="{{ $errors->has('name') ? 'is-invalid' : '' }}" required>
                            @error('name')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="profilePhone">Phone number</label>
                            <input id="profilePhone" name="phone" type="tel" value="{{ old('phone', $user->phone) }}" class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" required>
                            @error('phone')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="profileEmail">Email address</label>
                            <input id="profileEmail" name="email" type="email" value="{{ old('email', $user->email) }}" class="{{ $errors->has('email') ? 'is-invalid' : '' }}" required>
                            @error('email')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="profileCnic">CNIC <span>(optional)</span></label>
                            <input id="profileCnic" name="cnic" type="text" value="{{ old('cnic', $user->cnic) }}" placeholder="xxxxx-xxxxxxx-x">
                            @error('cnic')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="profileCity">City</label>
                            <input id="profileCity" name="city" type="text" value="{{ old('city', $user->city) }}">
                            @error('city')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                        <div class="pfd-field">
                            <label for="profileAddress">Address</label>
                            <input id="profileAddress" name="address" type="text" value="{{ old('address', $user->address) }}">
                            @error('address')<span class="pfd-error">{{ $message }}</span>@enderror
                        </div>
                    </div>

                    <button class="pfd-btn pfd-btn-primary" type="submit">Save Changes</button>
                </form>
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Change Password</h2>
                    <p>Use a strong, unique password.</p>
                </div>
            </div>
            <div class="pfd-card-body">
                <form action="{{ route('dashboard.profile.password') }}" method="post">
                    @csrf
                    @method('PUT')

                    <div class="pfd-field">
                        <label for="currentPassword">Current password</label>
                        <input id="currentPassword" name="current_password" type="password" class="{{ $errors->has('current_password') ? 'is-invalid' : '' }}" required>
                        @error('current_password')<span class="pfd-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="pfd-field">
                        <label for="newPassword">New password</label>
                        <input id="newPassword" name="password" type="password" minlength="8" class="{{ $errors->has('password') ? 'is-invalid' : '' }}" required>
                        @error('password')<span class="pfd-error">{{ $message }}</span>@enderror
                    </div>
                    <div class="pfd-field">
                        <label for="newPasswordConfirmation">Confirm new password</label>
                        <input id="newPasswordConfirmation" name="password_confirmation" type="password" minlength="8" required>
                    </div>

                    <button class="pfd-btn pfd-btn-primary" type="submit">Update Password</button>
                </form>
            </div>
        </div>

        <div class="pfd-card pfd-reveal">
            <div class="pfd-card-header">
                <div>
                    <h2>Profile Completion</h2>
                    <p>Complete your profile for faster filing approvals.</p>
                </div>
            </div>
            <div class="pfd-card-body" style="display:flex; align-items:center; gap:20px;">
                <div class="pfd-ring" data-ring="{{ $stats['profile_completion'] }}"><span>{{ $stats['profile_completion'] }}%</span></div>
                <p style="margin:0; color:var(--pf-muted); font-size:13.5px;">Add your CNIC, address, and a profile photo to reach 100%.</p>
            </div>
        </div>
    </div>
@endsection
