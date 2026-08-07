@extends('admin.layout')

@section('title', 'Manage Tax Updates')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Tax Updates / Blog</h2>
        <p>Manage tax-related articles and news updates.</p>
    </div>
    <a href="{{ route('admin.tax-updates.create') }}" class="adm-btn adm-btn-primary">
        <i class="fas fa-plus"></i> New Article
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-table-wrapper">
        <table class="adm-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th style="text-align: right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($updates as $update)
                    <tr>
                        <td>
                            <strong style="color: var(--ink);">{{ Str::limit($update->title, 50) }}</strong>
                        </td>
                        <td>
                            <span class="adm-badge adm-badge-purple">
                                {{ str_replace('_', ' ', ucfirst($update->category ?? 'general')) }}
                            </span>
                        </td>
                        <td>
                            <span class="adm-badge {{ $update->is_published ? 'adm-badge-green' : 'adm-badge-gold' }}">
                                <span class="adm-badge-dot"></span>
                                {{ $update->is_published ? 'Published' : 'Draft' }}
                            </span>
                        </td>
                        <td>{{ $update->created_at->diffForHumans() }}</td>
                        <td>
                            <div class="adm-actions" style="justify-content: flex-end;">
                                <a href="{{ route('admin.tax-updates.edit', $update->id) }}" class="adm-btn adm-btn-outline adm-btn-sm adm-btn-icon" title="Edit">
                                    <i class="fas fa-pen"></i>
                                </a>
                                <form action="{{ route('admin.tax-updates.delete', $update->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this article?')">
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
                                <div class="adm-empty-icon"><i class="fas fa-newspaper"></i></div>
                                <h6>No tax updates yet</h6>
                                <p>Create your first article to share tax news.</p>
                            </div>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    @if(method_exists($updates, 'links'))
        <div style="padding: 16px 24px; border-top: 1px solid var(--border-light);">
            {{ $updates->links() }}
        </div>
    @endif
</div>
@endsection
