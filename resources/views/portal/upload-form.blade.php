@extends('layouts.app')

@section('title', 'Upload Document' . ($service ? ' - ' . $service->name : ''))

@section('content')
<style>
    .portal-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 40px 20px;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 8px;
        color: #60706a;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 24px;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #0f7a4e;
    }

    .page-header {
        display: flex;
        align-items: center;
        gap: 20px;
        margin-bottom: 32px;
    }

    .service-icon-lg {
        width: 72px;
        height: 72px;
        background: #e8f5ee;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
        font-size: 32px;
    }

    .page-info h1 {
        font-size: 28px;
        font-weight: 800;
        color: #10201a;
        margin-bottom: 4px;
    }

    .page-info p {
        font-size: 14px;
        color: #60706a;
    }

    .upload-card {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 24px;
    }

    .upload-card h3 {
        font-size: 18px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 24px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .upload-card h3 i {
        color: #0f7a4e;
    }

    .form-group {
        margin-bottom: 20px;
    }

    .form-group label {
        display: block;
        font-size: 14px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 8px;
    }

    .form-group .hint {
        font-size: 12px;
        color: #60706a;
        margin-top: 4px;
    }

    .file-upload-area {
        border: 2px dashed #dce7e1;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s;
        background: #f6faf8;
    }

    .file-upload-area:hover {
        border-color: #0f7a4e;
        background: #e8f5ee;
    }

    .file-upload-area.dragover {
        border-color: #0f7a4e;
        background: #e8f5ee;
    }

    .file-upload-area i {
        font-size: 48px;
        color: #0f7a4e;
        margin-bottom: 16px;
    }

    .file-upload-area p {
        font-size: 16px;
        color: #10201a;
        margin-bottom: 8px;
    }

    .file-upload-area span {
        font-size: 13px;
        color: #60706a;
    }

    .file-input {
        display: none;
    }

    .file-preview {
        display: none;
        margin-top: 16px;
        padding: 12px;
        background: #e8f5ee;
        border-radius: 8px;
        text-align: left;
    }

    .file-preview.show {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .file-preview i {
        font-size: 24px;
        color: #0f7a4e;
        margin-bottom: 0;
    }

    .file-preview .file-info {
        flex: 1;
    }

    .file-preview .file-name {
        font-weight: 600;
        font-size: 14px;
        color: #10201a;
    }

    .file-preview .file-size {
        font-size: 12px;
        color: #60706a;
    }

    .btn-upload {
        width: 100%;
        padding: 14px;
        background: #0f7a4e;
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 16px;
        font-weight: 600;
        cursor: pointer;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn-upload:hover {
        background: #0d6a42;
    }

    .btn-upload:disabled {
        background: #a0b8af;
        cursor: not-allowed;
    }

    .documents-list {
        margin-top: 16px;
    }

    .doc-item {
        display: flex;
        align-items: center;
        gap: 12px;
        padding: 12px;
        background: #f6faf8;
        border-radius: 10px;
        margin-bottom: 8px;
    }

    .doc-icon {
        width: 40px;
        height: 40px;
        background: #e8f5ee;
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #0f7a4e;
    }

    .doc-info {
        flex: 1;
    }

    .doc-name {
        font-weight: 600;
        font-size: 14px;
        color: #10201a;
    }

    .doc-meta {
        font-size: 12px;
        color: #60706a;
    }

    .alert {
        padding: 12px 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 14px;
    }

    .alert-success {
        background: #e8f5ee;
        color: #0f7a4e;
        border: 1px solid #c5e4d5;
    }

    .alert-error {
        background: #fde8e8;
        color: #c53030;
        border: 1px solid #f5c6c6;
    }
</style>

<div class="portal-container">
    <a href="{{ route('portal.dashboard') }}" class="back-link">
        <i class="fa fa-arrow-left"></i> Back to Dashboard
    </a>

    <div class="page-header">
        <div class="service-icon-lg">
            <i class="fa fa-cloud-upload-alt"></i>
        </div>
        <div class="page-info">
            <h1>Upload Document</h1>
            <p>{{ $service ? 'Upload documents for ' . $service->name : 'Upload your documents' }}</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-error">
            <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <div class="upload-card">
        <h3><i class="fa fa-file-upload"></i> Select File to Upload</h3>

        <form action="{{ route('portal.documents.upload') }}" method="POST" enctype="multipart/form-data" id="uploadForm">
            @csrf
            @if($serviceId)
                <input type="hidden" name="service_id" value="{{ $serviceId }}">
            @endif

            <div class="form-group">
                <label for="name">Document Name (Optional)</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="Enter document name" value="{{ old('name') }}">
                <div class="hint">Leave empty to use the original file name</div>
            </div>

            <div class="form-group">
                <label>Upload File</label>
                <div class="file-upload-area" id="dropArea">
                    <i class="fa fa-cloud-upload-alt"></i>
                    <p>Drag & drop your file here</p>
                    <span>or click to browse</span>
                    <input type="file" name="file" id="fileInput" class="file-input" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                </div>
                <div class="hint">Accepted formats: PDF, DOC, DOCX, JPG, JPEG, PNG (Max 10MB)</div>
                <div class="file-preview" id="filePreview">
                    <i class="fa fa-file-alt"></i>
                    <div class="file-info">
                        <div class="file-name" id="fileName"></div>
                        <div class="file-size" id="fileSize"></div>
                    </div>
                </div>
                @error('file')
                    <div class="hint" style="color: #c53030;">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn-upload" id="uploadBtn" disabled>
                <i class="fa fa-upload"></i> Upload Document
            </button>
        </form>
    </div>

    @if($documents->count() > 0)
        <div class="upload-card">
            <h3><i class="fa fa-file-alt"></i> Previously Uploaded Documents</h3>
            <div class="documents-list">
                @foreach($documents as $doc)
                    <div class="doc-item">
                        <div class="doc-icon">
                            <i class="fa fa-file-alt"></i>
                        </div>
                        <div class="doc-info">
                            <div class="doc-name">{{ $doc->name }}</div>
                            <div class="doc-meta">{{ number_format($doc->file_size / 1024, 1) }} KB &middot; {{ $doc->created_at->diffForHumans() }}</div>
                        </div>
                        <a href="{{ route('portal.documents.download', $doc->id) }}" class="btn btn-outline" style="padding: 6px 12px; text-decoration: none;">
                            <i class="fa fa-download"></i>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    @endif
</div>

<script>
    const dropArea = document.getElementById('dropArea');
    const fileInput = document.getElementById('fileInput');
    const filePreview = document.getElementById('filePreview');
    const fileName = document.getElementById('fileName');
    const fileSize = document.getElementById('fileSize');
    const uploadBtn = document.getElementById('uploadBtn');

    dropArea.addEventListener('click', () => fileInput.click());

    dropArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        dropArea.classList.add('dragover');
    });

    dropArea.addEventListener('dragleave', () => {
        dropArea.classList.remove('dragover');
    });

    dropArea.addEventListener('drop', (e) => {
        e.preventDefault();
        dropArea.classList.remove('dragover');
        fileInput.files = e.dataTransfer.files;
        handleFile(fileInput.files[0]);
    });

    fileInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleFile(e.target.files[0]);
        }
    });

    function handleFile(file) {
        if (file) {
            fileName.textContent = file.name;
            fileSize.textContent = formatSize(file.size);
            filePreview.classList.add('show');
            uploadBtn.disabled = false;
        }
    }

    function formatSize(bytes) {
        if (bytes < 1024) return bytes + ' B';
        if (bytes < 1024 * 1024) return (bytes / 1024).toFixed(1) + ' KB';
        return (bytes / (1024 * 1024)).toFixed(1) + ' MB';
    }
</script>
@endsection
