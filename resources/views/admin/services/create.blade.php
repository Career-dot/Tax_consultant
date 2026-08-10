@extends('admin.layout')

@section('title', 'Create Service')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Create New Service</h2>
        <p>Add a new service to your website.</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Services
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.services.store') }}" method="POST" class="adm-form">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g., Personal Tax Filing">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" required placeholder="personal-tax-filing">
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Short Description <span class="label-hint">(max 500 chars)</span></label>
                <input type="text" name="short_description" class="form-control" value="{{ old('short_description') }}" placeholder="Brief description shown on listing pages" maxlength="500">
            </div>
            <div class="mb-4">
                <label class="form-label">Full Description</label>
                <textarea name="description" class="form-control" rows="6" placeholder="Detailed description of the service...">{{ old('description') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-3 mb-4">
                    <label class="form-label">Price (Rs)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price') }}" placeholder="e.g., 999" min="0" step="0.01">
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">Deadline</label>
                    <input type="date" name="deadline_date" class="form-control" value="{{ old('deadline_date') }}">
                </div>
                <div class="col-md-3 mb-4">
                    <label class="form-label">Icon <span class="label-hint">(Font Awesome class)</span></label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon') }}" placeholder="e.g., fa-file-invoice-dollar">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', 0) }}" placeholder="0">
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Create Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
