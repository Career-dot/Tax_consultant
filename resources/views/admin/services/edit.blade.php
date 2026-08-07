@extends('admin.layout')

@section('title', 'Edit Service')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Edit Service</h2>
        <p>Update the details for <strong>{{ $service->name }}</strong>.</p>
    </div>
    <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Services
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.services.update', $service->id) }}" method="POST" class="adm-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $service->name) }}" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $service->slug) }}" required>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="{{ old('short_description', $service->short_description) }}" placeholder="Brief description of the service">
            </div>
            <div class="mb-4">
                <label class="form-label">Full Description</label>
                <textarea name="description" class="form-control" rows="6">{{ old('description', $service->description) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Price (Rs)</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $service->price) }}" placeholder="e.g., 999" min="0" step="0.01">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Icon <span class="label-hint">(Font Awesome)</span></label>
                    <input type="text" name="icon" class="form-control" value="{{ old('icon', $service->icon) }}" placeholder="e.g., fa-file-invoice-dollar">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $service->sort_order) }}">
                </div>
            </div>
            <div class="mb-4">
                <div class="form-check form-switch">
                    <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ old('is_active', $service->is_active) ? 'checked' : '' }}>
                    <label class="form-check-label" for="isActive">Active (visible on site)</label>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Update Service
                </button>
                <a href="{{ route('admin.services.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
