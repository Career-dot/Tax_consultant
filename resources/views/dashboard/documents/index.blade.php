@extends('layouts.dashboard')

@section('title', 'Document Center - Tax Consultant')

@section('content')
    <x-dashboard.page-header title="Document Center" subtitle="Upload, preview, and manage the documents behind your filings." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Uploaded Documents']]" />

    <div class="pfd-card pfd-reveal" style="margin-bottom: var(--pfd-gap);">
        <div class="pfd-card-header">
            <div>
                <h2>Upload a Document</h2>
                <p>PDF, JPG, or PNG up to 8MB.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            <form action="{{ route('dashboard.documents.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="pfd-grid pfd-grid-2" style="margin-bottom:18px;">
                    <div class="pfd-field" style="margin-bottom:0;">
                        <label for="docType">Document type</label>
                        <select id="docType" name="type" required>
                            <option value="cnic">CNIC</option>
                            <option value="salary_slip">Salary Slip / Certificate</option>
                            <option value="bank_statement">Bank Statement</option>
                            <option value="other">Other</option>
                        </select>
                    </div>
                    <div class="pfd-field" style="margin-bottom:0;">
                        <label for="docApplication">Link to application <span>(optional)</span></label>
                        <select id="docApplication" name="application_id">
                            <option value="">Not linked</option>
                            @foreach ($applications as $application)
                                <option value="{{ $application['id'] }}">{{ $application['title'] }} — {{ $application['reference'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <label class="pfd-dropzone" data-dropzone for="documentFile">
                    <i class="fa fa-cloud-upload" aria-hidden="true"></i>
                    <strong>Click to browse or drag a file here</strong>
                    <span>PDF, JPG, PNG — max 8MB</span>
                    <span class="pfd-help" data-dropzone-filename hidden></span>
                    <input id="documentFile" type="file" name="file" accept=".pdf,.jpg,.jpeg,.png" required>
                </label>
                @error('file')<span class="pfd-error">{{ $message }}</span>@enderror

                <button class="pfd-btn pfd-btn-primary" type="submit" style="margin-top:18px;"><i class="fa fa-upload" aria-hidden="true"></i> Upload Document</button>
            </form>
        </div>
    </div>

    <div class="pfd-card pfd-reveal">
        <div class="pfd-card-header">
            <div>
                <h2>Your Documents</h2>
                <p>{{ count($documents) }} document(s) on file.</p>
            </div>
        </div>
        <div class="pfd-card-body">
            @if (count($documents))
                <div class="pfd-grid pfd-grid-2">
                    @foreach ($documents as $document)
                        <div class="pfd-doc-card">
                            <span class="pfd-doc-card-icon"><i class="fa fa-file-text-o" aria-hidden="true"></i></span>
                            <div class="pfd-doc-card-body">
                                <p>{{ $document['name'] }}</p>
                                <span>{{ number_format(($document['size'] ?? 0) / 1024) }} KB · Uploaded {{ \Carbon\Carbon::parse($document['uploaded_at'])->format('d M Y') }}</span>
                                <div style="margin-top:6px;"><x-dashboard.status-badge :status="$document['status']" /></div>
                            </div>
                            <div class="pfd-doc-card-actions">
                                @if ($document['file_path'])
                                    <a class="pfd-icon-btn" href="{{ route('dashboard.documents.download', $document['id']) }}" title="Download" aria-label="Download {{ $document['name'] }}"><i class="fa fa-download" aria-hidden="true"></i></a>
                                @endif
                                <form action="{{ route('dashboard.documents.destroy', $document['id']) }}" method="post" data-confirm="Remove this document?">
                                    @csrf
                                    @method('DELETE')
                                    <button class="pfd-icon-btn" type="submit" title="Delete" aria-label="Delete {{ $document['name'] }}"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <x-dashboard.empty-state icon="pe-7s-cloud-upload" title="No documents uploaded yet" text="Upload your first document using the form above." />
            @endif
        </div>
    </div>
@endsection
