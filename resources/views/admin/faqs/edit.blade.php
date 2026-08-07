@extends('admin.layout')

@section('title', 'Edit FAQ')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Edit FAQ</h2>
        <p>Update this frequently asked question.</p>
    </div>
    <a href="{{ route('admin.faqs.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to FAQs
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.faqs.update', $faq->id) }}" method="POST" class="adm-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-12 mb-4">
                    <label class="form-label">Question</label>
                    <input type="text" name="question" class="form-control" value="{{ old('question', $faq->question) }}" required>
                </div>
                <div class="col-12 mb-4">
                    <label class="form-label">Answer</label>
                    <textarea name="answer" class="form-control" rows="6" required>{{ old('answer', $faq->answer) }}</textarea>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Category</label>
                    <select name="category" class="form-select" required>
                        <option value="general" {{ old('category', $faq->category) === 'general' ? 'selected' : '' }}>General</option>
                        <option value="income_tax" {{ old('category', $faq->category) === 'income_tax' ? 'selected' : '' }}>Income Tax</option>
                        <option value="sales_tax" {{ old('category', $faq->category) === 'sales_tax' ? 'selected' : '' }}>Sales Tax</option>
                        <option value="withholding_tax" {{ old('category', $faq->category) === 'withholding_tax' ? 'selected' : '' }}>Withholding Tax</option>
                        <option value="litigation" {{ old('category', $faq->category) === 'litigation' ? 'selected' : '' }}>Tax Litigation</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Sort Order</label>
                    <input type="number" name="sort_order" class="form-control" value="{{ old('sort_order', $faq->sort_order) }}">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Status</label>
                    <div class="form-check form-switch mt-2" style="padding-top: 8px;">
                        <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ old('is_active', $faq->is_active) ? 'checked' : '' }}>
                        <label class="form-check-label" for="isActive">Active (visible on site)</label>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Update FAQ
                </button>
                <a href="{{ route('admin.faqs.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
