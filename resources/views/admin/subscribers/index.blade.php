@extends('admin.layout')

@section('title', 'Subscribers')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Planner Subscribers</h2>
        <p>View all users who have subscribed to the tax compliance planner.</p>
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
                    <th>Taxpayer Type</th>
                    <th>Sales Tax</th>
                    <th>Withholding</th>
                    <th>Email</th>
                    <th>SMS</th>
                    <th>Status</th>
                    <th>Joined</th>
                </tr>
            </thead>
            <tbody>
                @forelse($subscribers as $sub)
                    <tr>
                        <td>
                            <strong style="color: var(--ink);">{{ $sub->name }}</strong>
                        </td>
                        <td>{{ $sub->email }}</td>
                        <td>{{ $sub->phone ?? '-' }}</td>
                        <td>
                            <span class="adm-badge adm-badge-blue">
                                {{ str_replace('_', ' ', ucfirst($sub->taxpayer_type)) }}
                            </span>
                        </td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $sub->has_sales_tax ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $sub->has_sales_tax ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $sub->has_sales_tax ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $sub->has_withholding_agent ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $sub->has_withholding_agent ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $sub->has_withholding_agent ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $sub->email_reminders ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $sub->email_reminders ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $sub->email_reminders ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $sub->sms_reminders ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $sub->sms_reminders ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $sub->sms_reminders ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <span class="adm-badge {{ $sub->is_active ? 'adm-badge-green' : 'adm-badge-red' }}">
                                <span class="adm-badge-dot"></span>
                                {{ $sub->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>{{ $sub->created_at->diffForHumans() }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="10">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-users"></i></div>
                                <h6>No subscribers yet</h6>
                                <p>Subscribers will appear here when users sign up for the planner.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($subscribers, 'links'))
        <div style="padding: 16px 24px; border-top: 1px solid var(--border-light);">
            {{ $subscribers->links() }}
        </div>
    @endif
</div>
@endsection
