@extends('admin.layout')

@section('title', 'Contact Details')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Contact Details</h2>
        <p>Review and manage this contact submission.</p>
    </div>
    <a href="{{ route('admin.contacts.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Contacts
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-8">
        <div class="adm-card anim-fade-up anim-delay-2">
            <div class="adm-card-header">
                <h5><i class="fas fa-user"></i> Message from {{ $contact->name }}</h5>
                <span class="adm-badge {{ $contact->status === 'pending' ? 'adm-badge-gold' : ($contact->status === 'contacted' ? 'adm-badge-blue' : 'adm-badge-green') }}">
                    <span class="adm-badge-dot"></span>
                    {{ ucfirst($contact->status) }}
                </span>
            </div>
            <div class="adm-card-body">
                <div class="adm-detail-list">
                    <div class="row g-4">
                        <div class="col-sm-6">
                            <div class="adm-detail-item">
                                <label><i class="fas fa-envelope" style="margin-right: 4px;"></i> Email</label>
                                <span>{{ $contact->email }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="adm-detail-item">
                                <label><i class="fas fa-phone" style="margin-right: 4px;"></i> Phone</label>
                                <span>{{ $contact->phone ?? 'Not provided' }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="adm-detail-item">
                                <label><i class="fas fa-briefcase" style="margin-right: 4px;"></i> Service Interest</label>
                                <span>{{ $contact->service_interest ?? 'Not specified' }}</span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="adm-detail-item">
                                <label><i class="fas fa-comment" style="margin-right: 4px;"></i> Preferred Contact</label>
                                <span>{{ ucfirst($contact->preferred_contact_method ?? 'Email') }}</span>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="adm-detail-item">
                                <label><i class="fas fa-calendar" style="margin-right: 4px;"></i> Submitted</label>
                                <span>{{ $contact->created_at->format('F j, Y g:i A') }}</span>
                            </div>
                        </div>
                    </div>
                </div>
                <hr style="margin: 24px 0; border-color: var(--border-light);">
                <div class="adm-detail-item">
                    <label><i class="fas fa-comment-dots" style="margin-right: 4px;"></i> Message</label>
                    <div class="adm-message-box" style="margin-top: 8px;">
                        {!! nl2br(e($contact->message)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="adm-card anim-fade-up anim-delay-3">
            <div class="adm-card-header">
                <h5><i class="fas fa-cog"></i> Actions</h5>
            </div>
            <div class="adm-card-body">
                <form action="{{ route('admin.contacts.status', $contact->id) }}" method="POST" class="adm-form">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="form-label">Update Status</label>
                        <select name="status" class="form-select">
                            <option value="pending" {{ $contact->status === 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="contacted" {{ $contact->status === 'contacted' ? 'selected' : '' }}>Contacted</option>
                            <option value="resolved" {{ $contact->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
                        </select>
                    </div>
                    <button type="submit" class="adm-btn adm-btn-primary w-100 mb-3">
                        <i class="fas fa-save"></i> Update Status
                    </button>
                </form>
                <hr style="margin: 16px 0; border-color: var(--border-light);">
                <a href="mailto:{{ $contact->email }}" class="adm-btn adm-btn-outline w-100 mb-2">
                    <i class="fas fa-envelope"></i> Send Email
                </a>
                @if($contact->phone)
                    <a href="tel:{{ $contact->phone }}" class="adm-btn adm-btn-outline w-100">
                        <i class="fas fa-phone"></i> Call
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
