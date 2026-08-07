@extends('admin.layout')

@section('title', 'Deadline Rules')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Deadline Rules</h2>
        <p>Manage tax compliance deadline rules for different taxpayer types.</p>
    </div>
    <a href="{{ route('admin.deadline-rules.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Add New Rule
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Taxpayer Type</th>
                    <th>Frequency</th>
                    <th>Deadline Type</th>
                    <th>Sales Tax</th>
                    <th>Withholding</th>
                    <th>Status</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($rules as $rule)
                    <tr>
                        <td>
                            <strong style="color: var(--ink);">{{ $rule->name }}</strong>
                        </td>
                        <td>
                            <span class="adm-badge adm-badge-blue">
                                {{ str_replace('_', ' ', ucfirst($rule->taxpayer_type)) }}
                            </span>
                        </td>
                        <td>{{ ucfirst($rule->frequency) }}</td>
                        <td>{{ str_replace('_', ' ', ucfirst($rule->deadline_type)) }}</td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $rule->requires_sales_tax ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $rule->requires_sales_tax ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $rule->requires_sales_tax ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <div style="width: 28px; height: 28px; border-radius: 6px; display: flex; align-items: center; justify-content: center; background: {{ $rule->requires_withholding_agent ? 'var(--primary-50)' : '#fef2f2' }}; color: {{ $rule->requires_withholding_agent ? 'var(--primary)' : '#dc2626' }};">
                                <i class="fas fa-{{ $rule->requires_withholding_agent ? 'check' : 'times' }}" style="font-size: 11px;"></i>
                            </div>
                        </td>
                        <td>
                            <span class="adm-badge {{ $rule->is_active ? 'adm-badge-green' : 'adm-badge-red' }}">
                                <span class="adm-badge-dot"></span>
                                {{ $rule->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.deadline-rules.edit', $rule->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.deadline-rules.delete', $rule->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this rule?')">
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
                        <td colspan="8">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-calendar-alt"></i></div>
                                <h6>No deadline rules yet</h6>
                                <p>Create rules to help subscribers track their tax deadlines.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
