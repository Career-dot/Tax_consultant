@extends('admin.layout')

@section('title', 'Manage FAQs')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Manage FAQs</h2>
        <p>Create and manage frequently asked questions for your website.</p>
    </div>
    <a href="{{ route('admin.faqs.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> Add New FAQ
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Category</th>
                    <th>Order</th>
                    <th>Status</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($faqs as $faq)
                    <tr>
                        <td>
                            <strong style="color: var(--ink);">{{ Str::limit($faq->question, 60) }}</strong>
                        </td>
                        <td>
                            <span class="adm-badge adm-badge-purple">
                                {{ str_replace('_', ' ', ucfirst($faq->category)) }}
                            </span>
                        </td>
                        <td>{{ $faq->sort_order }}</td>
                        <td>
                            <span class="adm-badge {{ $faq->is_active ? 'adm-badge-green' : 'adm-badge-red' }}">
                                <span class="adm-badge-dot"></span>
                                {{ $faq->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.faqs.edit', $faq->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.faqs.delete', $faq->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this FAQ?')">
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
                        <td colspan="5">
                            <div class="adm-empty">
                                <div class="adm-empty-icon"><i class="fas fa-question-circle"></i></div>
                                <h6>No FAQs yet</h6>
                                <p>Create your first FAQ to help visitors find answers.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
