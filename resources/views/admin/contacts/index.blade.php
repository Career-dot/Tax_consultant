@extends('admin.layout')

@section('title', 'Contacts')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Contact Submissions</h2>
        <p>Manage incoming contact form submissions from your website.</p>
    </div>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Service Interest</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($contacts as $contact)
                    <tr>
                        <td>
                            <strong style="color: var(--ink);">{{ $contact->name }}</strong>
                        </td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone ?? '-' }}</td>
                        <td>
                            @if($contact->service_interest)
                                <span class="adm-badge adm-badge-purple">{{ $contact->service_interest }}</span>
                            @else
                                <span style="color: var(--muted-light);">-</span>
                            @endif
                        </td>
                        <td>
                            <span class="adm-badge {{ $contact->status === 'pending' ? 'adm-badge-gold' : ($contact->status === 'contacted' ? 'adm-badge-blue' : 'adm-badge-green') }}">
                                <span class="adm-badge-dot"></span>
                                {{ ucfirst($contact->status) }}
                            </span>
                        </td>
                        <td>{{ $contact->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.contacts.show', $contact->id) }}" class="adm-btn adm-btn-outline adm-btn-sm">
                                    <i class="fas fa-eye"></i> View
                                </a>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-envelope-open"></i></div>
                                <h6>No contacts yet</h6>
                                <p>Contact submissions will appear here when visitors reach out.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($contacts, 'links'))
        <div style="padding: 16px 24px; border-top: 1px solid var(--border-light);">
            {{ $contacts->links() }}
        </div>
    @endif
</div>
@endsection
