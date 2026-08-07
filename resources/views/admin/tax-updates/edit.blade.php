@extends('admin.layout')

@section('title', 'Edit Tax Update')

@section('content')
<style>
    .image-upload-area {
        border: 2px dashed var(--border);
        border-radius: var(--radius-md);
        padding: 32px 24px;
        text-align: center;
        cursor: pointer;
        transition: all var(--transition-fast);
        background: var(--surface);
        position: relative;
    }

    .image-upload-area:hover {
        border-color: var(--primary);
        background: var(--primary-50);
    }

    .image-upload-area.has-image {
        padding: 0;
        border-style: solid;
        border-color: var(--primary);
    }

    .image-upload-area input[type="file"] {
        position: absolute;
        inset: 0;
        opacity: 0;
        cursor: pointer;
        z-index: 5;
    }

    .image-upload-area .upload-icon {
        font-size: 36px;
        color: var(--muted-light);
        margin-bottom: 12px;
    }

    .image-upload-area .upload-text {
        font-size: 14px;
        color: var(--muted);
        font-weight: 500;
    }

    .image-upload-area .upload-hint {
        font-size: 12px;
        color: var(--muted-light);
        margin-top: 4px;
    }

    .image-preview {
        max-width: 100%;
        max-height: 220px;
        border-radius: var(--radius-md);
        object-fit: cover;
    }

    .image-remove-btn {
        position: absolute;
        top: 8px;
        right: 8px;
        width: 32px;
        height: 32px;
        background: #ef4444;
        color: #fff;
        border: none;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        font-size: 14px;
        box-shadow: 0 2px 8px rgba(239, 68, 68, 0.3);
        transition: all var(--transition-fast);
        z-index: 10;
    }

    .image-remove-btn:hover {
        transform: scale(1.1);
        background: #dc2626;
    }

    .current-image-label {
        font-size: 12px;
        color: var(--muted);
        margin-top: 8px;
        display: block;
    }
</style>

<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Edit Tax Update</h2>
        <p>Update the article: <strong>{{ Str::limit($update->title, 60) }}</strong></p>
    </div>
    <a href="{{ route('admin.tax-updates.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Updates
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.tax-updates.update', $update->id) }}" method="POST" enctype="multipart/form-data" class="adm-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-8 mb-4">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title', $update->title) }}" required>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug', $update->slug) }}" required>
                </div>
            </div>

            <!-- Featured Image Upload -->
            <div class="mb-4">
                <label class="form-label">Featured Image <span class="label-hint">(optional, max 2MB)</span></label>
                <div class="image-upload-area {{ $update->featured_image ? 'has-image' : '' }}" id="imageUploadArea">
                    <input type="file" name="featured_image" accept="image/jpeg,image/png,image/webp" id="imageInput">
                    <div id="uploadPlaceholder" style="{{ $update->featured_image ? 'display: none;' : '' }}">
                        <div class="upload-icon"><i class="fas fa-cloud-upload-alt"></i></div>
                        <div class="upload-text">Click or drag image here to upload</div>
                        <div class="upload-hint">JPG, PNG or WebP &middot; Max 2MB</div>
                    </div>
                    @if($update->featured_image)
                        <img id="imagePreview" class="image-preview" src="{{ asset('storage/' . $update->featured_image) }}" style="display: block;">
                        <button type="button" class="image-remove-btn" id="removeImage" style="display: flex;">
                            <i class="fas fa-times"></i>
                        </button>
                    @else
                        <img id="imagePreview" class="image-preview" style="display: none;">
                        <button type="button" class="image-remove-btn" id="removeImage" style="display: none;">
                            <i class="fas fa-times"></i>
                        </button>
                    @endif
                </div>
                @if($update->featured_image)
                    <span class="current-image-label"><i class="fas fa-image"></i> Current: {{ basename($update->featured_image) }}</span>
                @endif
            </div>

            <div class="mb-4">
                <label class="form-label">Content</label>
                <textarea name="content" class="form-control" rows="12" required>{{ old('content', $update->content) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select">
                        <option value="general" {{ old('category', $update->category) === 'general' ? 'selected' : '' }}>General</option>
                        <option value="income_tax" {{ old('category', $update->category) === 'income_tax' ? 'selected' : '' }}>Income Tax</option>
                        <option value="sales_tax" {{ old('category', $update->category) === 'sales_tax' ? 'selected' : '' }}>Sales Tax</option>
                        <option value="withholding_tax" {{ old('category', $update->category) === 'withholding_tax' ? 'selected' : '' }}>Withholding Tax</option>
                        <option value="litigation" {{ old('category', $update->category) === 'litigation' ? 'selected' : '' }}>Litigation</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Tags</label>
                    <input type="text" name="tags" class="form-control" value="{{ old('tags', $update->tags) }}">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2" style="padding-top: 8px;">
                        <input type="checkbox" name="is_published" value="1" class="form-check-input" id="isPublished" {{ old('is_published', $update->is_published) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isPublished">Published</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Update Article
                </button>
                <a href="{{ route('admin.tax-updates.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const uploadArea = document.getElementById('imageUploadArea');
    const imageInput = document.getElementById('imageInput');
    const imagePreview = document.getElementById('imagePreview');
    const uploadPlaceholder = document.getElementById('uploadPlaceholder');
    const removeBtn = document.getElementById('removeImage');

    imageInput.addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            if (file.size > 2 * 1024 * 1024) {
                alert('Image must be less than 2MB');
                imageInput.value = '';
                return;
            }
            const reader = new FileReader();
            reader.onload = function(ev) {
                imagePreview.src = ev.target.result;
                imagePreview.style.display = 'block';
                uploadPlaceholder.style.display = 'none';
                removeBtn.style.display = 'flex';
                uploadArea.classList.add('has-image');
            };
            reader.readAsDataURL(file);
        }
    });

    removeBtn.addEventListener('click', function(e) {
        e.preventDefault();
        e.stopPropagation();
        imageInput.value = '';
        imagePreview.style.display = 'none';
        imagePreview.src = '';
        uploadPlaceholder.style.display = 'block';
        removeBtn.style.display = 'none';
        uploadArea.classList.remove('has-image');
    });
});
</script>
@endpush
