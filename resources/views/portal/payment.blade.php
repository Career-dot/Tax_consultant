@extends('layouts.app')

@section('title', 'Payment - FINANIC')

@section('content')
<style>
    .payment-container {
        max-width: 900px;
        margin: 0 auto;
        padding: 32px 24px;
    }
    .payment-header {
        text-align: center;
        margin-bottom: 32px;
    }
    .payment-header h1 {
        font-size: 28px;
        font-weight: 800;
        color: #10201a;
        margin-bottom: 8px;
    }
    .payment-header p {
        color: #60706a;
        font-size: 15px;
    }
    .payment-card {
        background: #fff;
        border: 1px solid #dce7e1;
        border-radius: 16px;
        padding: 32px;
        margin-bottom: 24px;
    }
    .payment-card h2 {
        font-size: 18px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .payment-card h2 i {
        color: #0f7a4e;
    }
    .form-group {
        margin-bottom: 20px;
    }
    .form-group label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #10201a;
        margin-bottom: 8px;
    }
    .form-group select,
    .form-group input {
        width: 100%;
        padding: 12px 16px;
        border: 1.5px solid #dce7e1;
        border-radius: 10px;
        font-size: 14px;
        color: #10201a;
        transition: all 0.2s ease;
    }
    .form-group select:focus,
    .form-group input:focus {
        outline: none;
        border-color: #0f7a4e;
        box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.1);
    }
    .upload-area {
        border: 2px dashed #dce7e1;
        border-radius: 12px;
        padding: 40px;
        text-align: center;
        cursor: pointer;
        transition: all 0.2s ease;
        background: #f6faf8;
    }
    .upload-area:hover {
        border-color: #0f7a4e;
        background: #e8f5ee;
    }
    .upload-area i {
        font-size: 48px;
        color: #dce7e1;
        margin-bottom: 12px;
    }
    .upload-area p {
        color: #60706a;
        font-size: 14px;
        margin: 0;
    }
    .upload-area .highlight {
        color: #0f7a4e;
        font-weight: 600;
    }
    .preview-container {
        margin-top: 16px;
        display: none;
    }
    .preview-container img {
        max-width: 100%;
        max-height: 300px;
        border-radius: 8px;
        border: 1px solid #dce7e1;
    }
    .submit-btn {
        width: 100%;
        padding: 14px;
        background: linear-gradient(135deg, #0f7a4e, #084b31);
        color: #fff;
        border: none;
        border-radius: 10px;
        font-size: 15px;
        font-weight: 700;
        cursor: pointer;
        transition: all 0.2s ease;
    }
    .submit-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 24px rgba(15, 122, 78, 0.25);
    }
    .submit-btn:disabled {
        opacity: 0.6;
        cursor: not-allowed;
        transform: none;
    }
    .payment-history {
        margin-top: 32px;
    }
    .payment-history h2 {
        font-size: 18px;
        font-weight: 700;
        color: #10201a;
        margin-bottom: 16px;
    }
    .payment-item {
        display: flex;
        align-items: center;
        gap: 16px;
        padding: 16px;
        background: #f6faf8;
        border-radius: 12px;
        margin-bottom: 12px;
        border: 1px solid #e8f5ee;
    }
    .payment-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 20px;
        flex-shrink: 0;
    }
    .payment-icon.pending { background: #fef3c7; color: #b9892f; }
    .payment-icon.approved { background: #e8f5ee; color: #0f7a4e; }
    .payment-icon.rejected { background: #fef0ed; color: #ef785a; }
    .payment-info { flex: 1; }
    .payment-service { font-weight: 600; color: #10201a; font-size: 14px; }
    .payment-amount { font-size: 13px; color: #60706a; }
    .payment-date { font-size: 12px; color: #7d8b86; }
    .payment-status {
        padding: 5px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
    }
    .payment-status.pending { background: #fef3c7; color: #92400e; }
    .payment-status.approved { background: #d1fae5; color: #065f46; }
    .payment-status.rejected { background: #fef0ed; color: #991b1b; }
    .empty-state {
        text-align: center;
        padding: 40px;
        color: #60706a;
    }
    .empty-state i {
        font-size: 48px;
        color: #dce7e1;
        margin-bottom: 12px;
    }
    .info-box {
        background: #eef4f8;
        border: 1px solid #b8d4e8;
        border-radius: 10px;
        padding: 16px;
        margin-bottom: 20px;
        font-size: 13px;
        color: #1e4668;
    }
    .info-box i {
        margin-right: 6px;
    }
    .alert-success {
        background: #d1fae5;
        border: 1px solid #86efac;
        border-radius: 10px;
        padding: 14px 18px;
        margin-bottom: 20px;
        color: #065f46;
        font-size: 14px;
    }
    .alert-error {
        background: #fef0ed;
        border: 1px solid #fca5a5;
        border-radius: 10px;
        padding: 14px 18px;
        margin-bottom: 20px;
        color: #991b1b;
        font-size: 14px;
    }
</style>

<div class="payment-container">
    <div class="payment-header">
        <h1>Make a Payment</h1>
        <p>Upload your payment screenshot to verify your payment</p>
    </div>

    @if(session('success'))
        <div class="alert-success">
            <i class="fa fa-check-circle"></i> {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="alert-error">
            <i class="fa fa-exclamation-circle"></i> {{ session('error') }}
        </div>
    @endif

    <!-- Payment Form -->
    <div class="payment-card">
        <h2><i class="fa fa-credit-card"></i> Upload Payment Screenshot</h2>
        
        <div class="info-box">
            <i class="fa fa-info-circle"></i>
            After making payment, please upload the screenshot/evidence below. Our team will verify your payment within 24 hours.
        </div>

        <form action="{{ route('portal.payment.submit') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
            @csrf
            
            <div class="form-group">
                <label>Select Service *</label>
                <select name="service_id" id="serviceSelect" required>
                    <option value="">Choose a service...</option>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" data-price="{{ $service->price ?? 0 }}">
                            {{ $service->name }}{{ $service->price ? ' (Rs. ' . number_format($service->price, 0) . ')' : '' }}
                        </option>
                    @endforeach
                </select>
                @error('service_id')
                    <span style="color: #ef785a; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Amount (Rs) *</label>
                <input type="number" name="amount" id="amountInput" placeholder="Select a service to see amount" min="1" step="0.01" readonly required>
                @error('amount')
                    <span style="color: #ef785a; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group">
                <label>Payment Screenshot *</label>
                <div class="upload-area" id="uploadArea">
                    <i class="fa fa-cloud-upload"></i>
                    <p>Click or drag your payment screenshot here</p>
                    <p style="font-size: 12px; margin-top: 8px; color: #7d8b86;">JPG, PNG (Max 5MB)</p>
                    <input type="file" name="screenshot" id="screenshotInput" accept="image/*" style="display: none;" required>
                </div>
                <div class="preview-container" id="previewContainer">
                    <img id="previewImage" src="" alt="Payment Screenshot Preview">
                </div>
                @error('screenshot')
                    <span style="color: #ef785a; font-size: 12px; margin-top: 4px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="submit-btn" id="submitBtn" disabled>
                <i class="fa fa-upload"></i> Submit Payment Screenshot
            </button>
        </form>
    </div>

    <!-- Payment History -->
    @if($payments->count() > 0)
        <div class="payment-history">
            <h2><i class="fa fa-history" style="color: #0f7a4e;"></i> Payment History</h2>
            
            @foreach($payments as $payment)
                <div class="payment-item">
                    <div class="payment-icon {{ $payment->status }}">
                        @if($payment->status === 'pending')
                            <i class="fa fa-clock"></i>
                        @elseif($payment->status === 'approved')
                            <i class="fa fa-check"></i>
                        @else
                            <i class="fa fa-times"></i>
                        @endif
                    </div>
                    <div class="payment-info">
                        <div class="payment-service">{{ $payment->service->name ?? 'General Payment' }}</div>
                        <div class="payment-amount">Rs {{ number_format($payment->amount, 2) }}</div>
                        <div class="payment-date">{{ $payment->created_at->format('M d, Y') }}</div>
                        @if($payment->admin_notes && $payment->status === 'rejected')
                            <div style="font-size: 12px; color: #ef785a; margin-top: 4px;">
                                <i class="fa fa-info-circle"></i> {{ $payment->admin_notes }}
                            </div>
                        @endif
                    </div>
                    <span class="payment-status {{ $payment->status }}">
                        {{ ucfirst($payment->status) }}
                    </span>
                </div>
            @endforeach
        </div>
    @endif
</div>

<script>
    const uploadArea = document.getElementById('uploadArea');
    const screenshotInput = document.getElementById('screenshotInput');
    const previewContainer = document.getElementById('previewContainer');
    const previewImage = document.getElementById('previewImage');
    const submitBtn = document.getElementById('submitBtn');
    const serviceSelect = document.getElementById('serviceSelect');
    const amountInput = document.getElementById('amountInput');

    // Auto-fill amount when service is selected
    serviceSelect.addEventListener('change', function() {
        const selectedOption = this.options[this.selectedIndex];
        const price = selectedOption.getAttribute('data-price') || 0;
        amountInput.value = price > 0 ? price : '';
        checkFormValid();
    });

    // Auto-select service if only one service exists
    if (serviceSelect.options.length === 2) {
        serviceSelect.selectedIndex = 1;
        serviceSelect.dispatchEvent(new Event('change'));
    }

    uploadArea.addEventListener('click', () => screenshotInput.click());

    uploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#0f7a4e';
        uploadArea.style.background = '#e8f5ee';
    });

    uploadArea.addEventListener('dragleave', () => {
        uploadArea.style.borderColor = '#dce7e1';
        uploadArea.style.background = '#f6faf8';
    });

    uploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        uploadArea.style.borderColor = '#dce7e1';
        uploadArea.style.background = '#f6faf8';
        if (e.dataTransfer.files.length > 0) {
            screenshotInput.files = e.dataTransfer.files;
            handleFileSelect(e.dataTransfer.files[0]);
        }
    });

    screenshotInput.addEventListener('change', (e) => {
        if (e.target.files.length > 0) {
            handleFileSelect(e.target.files[0]);
        }
    });

    function handleFileSelect(file) {
        if (!file.type.startsWith('image/')) {
            alert('Please select an image file.');
            return;
        }
        if (file.size > 5 * 1024 * 1024) {
            alert('File is too large. Max 5MB allowed.');
            return;
        }
        
        const reader = new FileReader();
        reader.onload = (e) => {
            previewImage.src = e.target.result;
            previewContainer.style.display = 'block';
            uploadArea.style.display = 'none';
            checkFormValid();
        };
        reader.readAsDataURL(file);
    }

    function checkFormValid() {
        const service = serviceSelect.value;
        const amount = amountInput.value;
        const screenshot = screenshotInput.files.length > 0;
        
        submitBtn.disabled = !(service && amount && screenshot);
    }
</script>
@endsection
