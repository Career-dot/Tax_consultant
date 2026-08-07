@extends('admin.layout')

@section('title', 'Edit Deadline Rule')

@section('content')
<div class="page-header anim-fade-up">
    <div class="page-info">
        <h2>Edit Deadline Rule</h2>
        <p>Update deadline rule: <strong>{{ $rule->name }}</strong></p>
    </div>
    <a href="{{ route('admin.deadline-rules.index') }}" class="adm-btn adm-btn-ghost">
        <i class="fas fa-arrow-left"></i> Back to Rules
    </a>
</div>

<div class="adm-card anim-fade-up anim-delay-2">
    <div class="adm-card-body">
        <form action="{{ route('admin.deadline-rules.update', $rule->id) }}" method="POST" class="adm-form">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-4">
                    <label class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $rule->name) }}" required>
                </div>
                <div class="col-md-6 mb-4">
                    <label class="form-label">Taxpayer Type</label>
                    <select name="taxpayer_type" class="form-select" required>
                        <option value="salaried_individual" {{ old('taxpayer_type', $rule->taxpayer_type) === 'salaried_individual' ? 'selected' : '' }}>Salaried Individual</option>
                        <option value="business_individual" {{ old('taxpayer_type', $rule->taxpayer_type) === 'business_individual' ? 'selected' : '' }}>Business Individual</option>
                        <option value="aop" {{ old('taxpayer_type', $rule->taxpayer_type) === 'aop' ? 'selected' : '' }}>Association of Persons (AOP)</option>
                        <option value="company" {{ old('taxpayer_type', $rule->taxpayer_type) === 'company' ? 'selected' : '' }}>Company</option>
                    </select>
                </div>
            </div>
            <div class="mb-4">
                <label class="form-label">Description <span class="label-hint">(optional)</span></label>
                <textarea name="description" class="form-control" rows="2">{{ old('description', $rule->description) }}</textarea>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Deadline Type</label>
                    <select name="deadline_type" class="form-select" required>
                        <option value="monthly_sales_tax" {{ old('deadline_type', $rule->deadline_type) === 'monthly_sales_tax' ? 'selected' : '' }}>Monthly Sales Tax</option>
                        <option value="withholding_statement" {{ old('deadline_type', $rule->deadline_type) === 'withholding_statement' ? 'selected' : '' }}>Withholding Statement</option>
                        <option value="advance_tax" {{ old('deadline_type', $rule->deadline_type) === 'advance_tax' ? 'selected' : '' }}>Advance Tax</option>
                        <option value="annual_return" {{ old('deadline_type', $rule->deadline_type) === 'annual_return' ? 'selected' : '' }}>Annual Return</option>
                        <option value="wealth_statement" {{ old('deadline_type', $rule->deadline_type) === 'wealth_statement' ? 'selected' : '' }}>Wealth Statement</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Frequency</label>
                    <select name="frequency" class="form-select" required>
                        <option value="monthly" {{ old('frequency', $rule->frequency) === 'monthly' ? 'selected' : '' }}>Monthly</option>
                        <option value="quarterly" {{ old('frequency', $rule->frequency) === 'quarterly' ? 'selected' : '' }}>Quarterly</option>
                        <option value="annually" {{ old('frequency', $rule->frequency) === 'annually' ? 'selected' : '' }}>Annually</option>
                    </select>
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Day of Month</label>
                    <input type="text" name="day_of_month" class="form-control" value="{{ old('day_of_month', $rule->day_of_month) }}" placeholder="e.g., 18">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 mb-4">
                    <label class="form-label">Sector <span class="label-hint">(optional)</span></label>
                    <input type="text" name="sector" class="form-control" value="{{ old('sector', $rule->sector) }}" placeholder="Leave empty for all sectors">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Statutory Basis <span class="label-hint">(optional)</span></label>
                    <input type="text" name="statutory_basis" class="form-control" value="{{ old('statutory_basis', $rule->statutory_basis) }}" placeholder="e.g., Section 165">
                </div>
                <div class="col-md-4 mb-4">
                    <label class="form-label">Requirements</label>
                    <div style="padding-top: 8px;">
                        <div class="form-check">
                            <input type="checkbox" name="requires_sales_tax" value="1" class="form-check-input" id="salesTax" {{ old('requires_sales_tax', $rule->requires_sales_tax) ? 'checked' : '' }}>
                            <label class="form-check-label" for="salesTax">Sales Tax Registration</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="requires_withholding_agent" value="1" class="form-check-input" id="withholding" {{ old('requires_withholding_agent', $rule->requires_withholding_agent) ? 'checked' : '' }}>
                            <label class="form-check-label" for="withholding">Withholding Agent</label>
                        </div>
                        <div class="form-check">
                            <input type="checkbox" name="is_active" value="1" class="form-check-input" id="isActive" {{ old('is_active', $rule->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="isActive">Active</label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="adm-btn adm-btn-primary">
                    <i class="fas fa-save"></i> Update Rule
                </button>
                <a href="{{ route('admin.deadline-rules.index') }}" class="adm-btn adm-btn-ghost">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
