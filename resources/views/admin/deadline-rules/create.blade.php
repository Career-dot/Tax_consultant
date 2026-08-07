@extends('admin.layout')

@section('title', 'Create Deadline Rule')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Create Deadline Rule</h2>
        <p>Add a new tax compliance deadline rule.</p>
    </div>
    <a href="{{ route('admin.deadline-rules.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Rules
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.deadline-rules.store') }}" method="POST" class="adm-form">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name') }}" required placeholder="e.g., Monthly Sales Tax Filing">
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Taxpayer Type</label>
                    <select name="taxpayer_type" class="form-select" required>
                        <option value="salaried_individual">Salaried Individual</option>
                        <option value="business_individual">Business Individual</option>
                        <option value="aop">Association of Persons (AOP)</option>
                        <option value="company">Company</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Description <span class="label-hint">(optional)</span></label>
                <textarea name="description" class="form-control" rows="2" placeholder="Brief description of this deadline rule">{{ old('description') }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Deadline Type</label>
                    <select name="deadline_type" class="form-select" required>
                        <option value="monthly_sales_tax">Monthly Sales Tax</option>
                        <option value="withholding_statement">Withholding Statement</option>
                        <option value="advance_tax">Advance Tax</option>
                        <option value="annual_return">Annual Return</option>
                        <option value="wealth_statement">Wealth Statement</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Frequency</label>
                    <select name="frequency" class="form-select" required>
                        <option value="monthly">Monthly</option>
                        <option value="quarterly">Quarterly</option>
                        <option value="annually">Annually</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Day of Month</label>
                    <input type="text" name="day_of_month" class="form-control" value="{{ old('day_of_month') }}" placeholder="e.g., 18">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Sector <span class="label-hint">(optional)</span></label>
                    <input type="text" name="sector" class="form-control" value="{{ old('sector') }}" placeholder="Leave empty for all sectors">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Statutory Basis <span class="label-hint">(optional)</span></label>
                    <input type="text" name="statutory_basis" class="form-control" value="{{ old('statutory_basis') }}" placeholder="e.g., Section 165">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Requirements</label>
                    <div style="padding-top: 8px;">
                        <div class="form-check">
                            <input type="checkbox" name="requires_sales_tax" value="1" class="form-check-input" id="salesTax" {{ old('requires_sales_tax') ? 'checked' : '' }}>
                            <label class="form-check-label" for="salesTax">Sales Tax Registration</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="requires_withholding_agent" value="1" class="form-check-input" id="withholding" {{ old('requires_withholding_agent') ? 'checked' : '' }}>
                            <label class="form-check-label" for="withholding">Withholding Agent</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" checked>
                            <label class="form-check-label" for="isActive">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Save Rule
                </button>
                <a href="{{ route('admin.deadline-rules.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
