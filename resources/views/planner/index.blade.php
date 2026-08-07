<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tax Compliance Planner - FINANIC Business Consultants</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        .step-card { border: 2px solid #e9ecef; border-radius: 12px; transition: all 0.3s; }
        .step-card.active { border-color: #1a5276; box-shadow: 0 4px 15px rgba(26,82,118,0.2); }
        .step-card.completed { border-color: #28a745; background: #f8fff9; }
        .step-indicator { width: 40px; height: 40px; border-radius: 50%; background: #e9ecef; color: #6c757d; display: flex; align-items: center; justify-content: center; font-weight: bold; }
        .step-indicator.active { background: #1a5276; color: #fff; }
        .step-indicator.completed { background: #28a745; color: #fff; }
        .taxpayer-option { cursor: pointer; border: 2px solid #e9ecef; border-radius: 10px; padding: 20px; text-align: center; transition: all 0.3s; }
        .taxpayer-option:hover { border-color: #1a5276; background: #f0f8ff; }
        .taxpayer-option.selected { border-color: #1a5276; background: #1a5276; color: #fff; }
        .deadline-item { border-left: 4px solid #1a5276; padding: 15px; margin-bottom: 10px; background: #f8f9fa; border-radius: 0 8px 8px 0; }
        .deadline-item.urgent { border-left-color: #dc3545; background: #fff5f5; }
        .deadline-item.warning { border-left-color: #ffc107; background: #fffcf0; }
    </style>
</head>
<body style="background:#f8f9fa;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <!-- Header -->
                <div class="text-center mb-5">
                    <h1 class="display-6 fw-bold text-primary">Tax Compliance Planner</h1>
                    <p class="text-muted fs-5">Get a personalized filing deadline calendar in 4 simple steps</p>
                </div>

                <!-- Progress Bar -->
                <div class="d-flex justify-content-center mb-5">
                    <div class="d-flex align-items-center">
                        <div class="step-indicator" id="step-ind-1">1</div>
                        <div style="width:60px;height:2px;background:#e9ecef;" id="line-1"></div>
                        <div class="step-indicator" id="step-ind-2">2</div>
                        <div style="width:60px;height:2px;background:#e9ecef;" id="line-2"></div>
                        <div class="step-indicator" id="step-ind-3">3</div>
                        <div style="width:60px;height:2px;background:#e9ecef;" id="line-3"></div>
                        <div class="step-indicator" id="step-ind-4">4</div>
                    </div>
                </div>

                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show">{{ session('success') }}<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>
                @endif

                <!-- STEP 1: Taxpayer Type -->
                <div class="card step-card active mb-4" id="step-1">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <span class="step-indicator active me-3">1</span>
                        <h5 class="mb-0">Select Your Taxpayer Type</h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="taxpayer-option" data-type="salaried_individual" onclick="selectTaxpayer(this)">
                                    <i class="fa fa-user fa-2x mb-2"></i>
                                    <h6>Salaried Individual</h6>
                                    <small class="text-muted">Employment income only</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="taxpayer-option" data-type="business_individual" onclick="selectTaxpayer(this)">
                                    <i class="fa fa-briefcase fa-2x mb-2"></i>
                                    <h6>Business Individual</h6>
                                    <small class="text-muted">Self-employed / sole proprietor</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="taxpayer-option" data-type="aop" onclick="selectTaxpayer(this)">
                                    <i class="fa fa-users fa-2x mb-2"></i>
                                    <h6>AOP / Partnership</h6>
                                    <small class="text-muted">Association of persons</small>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="taxpayer-option" data-type="company" onclick="selectTaxpayer(this)">
                                    <i class="fa fa-building fa-2x mb-2"></i>
                                    <h6>Company</h6>
                                    <small class="text-muted">Private / public limited</small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- STEP 2: Registrations -->
                <div class="card step-card mb-4" id="step-2" style="display:none;">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <span class="step-indicator active me-3">2</span>
                        <h5 class="mb-0">Select Applicable Registrations</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Choose which tax registrations apply to you:</p>
                        <div class="row g-3">
                            <div class="col-md-4">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="reg_type" id="reg-income" value="income_only" checked>
                                    <label class="form-check-label" for="reg-income">
                                        <strong>Income Tax Only</strong><br>
                                        <small class="text-muted">Annual return, wealth statement</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="reg_type" id="reg-income-sales" value="income_sales">
                                    <label class="form-check-label" for="reg-income-sales">
                                        <strong>Income Tax + Sales Tax</strong><br>
                                        <small class="text-muted">Monthly returns, input/output</small>
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="reg_type" id="reg-all" value="all">
                                    <label class="form-check-label" for="reg-all">
                                        <strong>All + Withholding Agent</strong><br>
                                        <small class="text-muted">Also deduct withholding tax</small>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-primary" onclick="goToStep(3)">Continue <i class="fa fa-arrow-right ms-1"></i></button>
                            <button class="btn btn-outline-secondary ms-2" onclick="goToStep(1)"><i class="fa fa-arrow-left me-1"></i> Back</button>
                        </div>
                    </div>
                </div>

                <!-- STEP 3: Sector (Optional) -->
                <div class="card step-card mb-4" id="step-3" style="display:none;">
                    <div class="card-header bg-primary text-white d-flex align-items-center">
                        <span class="step-indicator active me-3">3</span>
                        <h5 class="mb-0">Select Your Industry Sector (Optional)</h5>
                    </div>
                    <div class="card-body">
                        <p class="text-muted">Sector-specific deadlines may apply (e.g. Section 236G/236H for distributors):</p>
                        <div class="row g-3">
                            <div class="col-md-3">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="sector" id="sector-none" value="" checked>
                                    <label class="form-check-label" for="sector-none">General / Not Applicable</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="sector" id="sector-cement" value="cement">
                                    <label class="form-check-label" for="sector-cement"><i class="fa fa-industry me-1"></i> Cement Distribution</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="sector" id="sector-transport" value="transport">
                                    <label class="form-check-label" for="sector-transport"><i class="fa fa-truck me-1"></i> Transport</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="sector" id="sector-pharma" value="pharmaceuticals">
                                    <label class="form-check-label" for="sector-pharma"><i class="fa fa-pills me-1"></i> Pharmaceuticals</label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-check p-3 border rounded bg-light">
                                    <input class="form-check-input" type="radio" name="sector" id="sector-fmcg" value="fmcg">
                                    <label class="form-check-label" for="sector-fmcg"><i class="fa fa-shopping-cart me-1"></i> FMCG</label>
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-success btn-lg" onclick="generateDeadlines()"><i class="fa fa-calendar-check me-2"></i>Generate My Deadlines</button>
                            <button class="btn btn-outline-secondary ms-2" onclick="goToStep(2)"><i class="fa fa-arrow-left me-1"></i> Back</button>
                        </div>
                    </div>
                </div>

                <!-- STEP 4: Results & Subscribe -->
                <div id="step-4" style="display:none;">
                    <!-- Deadlines List -->
                    <div class="card mb-4">
                        <div class="card-header bg-success text-white d-flex justify-content-between align-items-center">
                            <div class="d-flex align-items-center">
                                <span class="step-indicator completed me-3"><i class="fa fa-check"></i></span>
                                <h5 class="mb-0">Your Upcoming Deadlines</h5>
                            </div>
                            <div>
                                <button class="btn btn-sm btn-light" onclick="exportIcs()" title="Download .ics calendar"><i class="fa fa-calendar-plus-o me-1"></i>ICS</button>
                                <button class="btn btn-sm btn-light" onclick="exportPdf()" title="Download PDF"><i class="fa fa-file-pdf-o me-1"></i>PDF</button>
                            </div>
                        </div>
                        <div class="card-body" id="deadlines-list">
                            <div class="text-center py-4">
                                <div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>
                                <p class="mt-2 text-muted">Generating your personalized deadlines...</p>
                            </div>
                        </div>
                    </div>

                    <!-- Subscribe to Reminders -->
                    <div class="card mb-4">
                        <div class="card-header bg-info text-white">
                            <h5 class="mb-0"><i class="fa fa-bell me-2"></i>Step 5: Opt-in to Email/SMS Reminders</h5>
                        </div>
                        <div class="card-body">
                            <p class="text-muted">Enter your details to receive automated reminders before each deadline:</p>
                            <ul class="text-muted mb-3">
                                <li><strong>7 days before</strong> — Email reminder</li>
                                <li><strong>2 days before</strong> — Email + SMS reminder</li>
                                <li><strong>On deadline day</strong> — SMS reminder</li>
                            </ul>
                            <form id="subscribeForm">
                                @csrf
                                <div class="row">
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Full Name *</label>
                                        <input type="text" name="name" class="form-control" required placeholder="Enter your name">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" name="email" class="form-control" required placeholder="you@example.com">
                                    </div>
                                    <div class="col-md-4 mb-3">
                                        <label class="form-label">Phone (for SMS) *</label>
                                        <input type="text" name="phone" class="form-control" placeholder="+92 3XX XXXXXXX">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="email_reminders" value="1" checked id="email_rem">
                                            <label class="form-check-label" for="email_rem"><i class="fa fa-envelope me-1"></i> Email Reminders (Recommended)</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="sms_reminders" value="1" id="sms_rem">
                                            <label class="form-check-label" for="sms_rem"><i class="fa fa-mobile me-1"></i> SMS Reminders</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-info text-white mt-3"><i class="fa fa-bell me-2"></i>Subscribe to Reminders</button>
                            </form>
                        </div>
                    </div>

                    <div class="text-center">
                        <a href="{{ route('home') }}" class="btn btn-outline-secondary"><i class="fa fa-home me-2"></i>Back to Home</a>
                        <button class="btn btn-outline-primary ms-2" onclick="resetPlanner()"><i class="fa fa-refresh me-2"></i>Start Over</button>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        let plannerData = {
            taxpayer_type: '',
            has_sales_tax: false,
            has_withholding_agent: false,
            sector: ''
        };

        function selectTaxpayer(el) {
            document.querySelectorAll('.taxpayer-option').forEach(o => o.classList.remove('selected'));
            el.classList.add('selected');
            plannerData.taxpayer_type = el.dataset.type;

            setTimeout(() => goToStep(2), 300);
        }

        function goToStep(step) {
            // Update registration data from step 2
            if (step >= 3) {
                const regType = document.querySelector('input[name="reg_type"]:checked').value;
                plannerData.has_sales_tax = (regType === 'income_sales' || regType === 'all');
                plannerData.has_withholding_agent = (regType === 'all');
            }
            if (step >= 4) {
                const sectorEl = document.querySelector('input[name="sector"]:checked');
                plannerData.sector = sectorEl ? sectorEl.value : '';
            }

            // Hide all steps
            for (let i = 1; i <= 4; i++) {
                const el = document.getElementById('step-' + i);
                if (el) el.style.display = 'none';
                const card = el;
                if (card) { card.classList.remove('active', 'completed'); }
            }

            // Show target step
            const target = document.getElementById('step-' + step);
            if (target) {
                target.style.display = 'block';
                target.classList.add('active');
            }

            // Update indicators
            for (let i = 1; i <= 4; i++) {
                const ind = document.getElementById('step-ind-' + i);
                const line = document.getElementById('line-' + (i - 1));
                if (ind) {
                    ind.classList.remove('active', 'completed');
                    if (i < step) { ind.classList.add('completed'); ind.innerHTML = '<i class="fa fa-check"></i>'; }
                    else if (i === step) { ind.classList.add('active'); ind.innerHTML = i; }
                    else { ind.innerHTML = i; }
                }
                if (line && i <= step) { line.style.background = '#28a745'; }
            }
        }

        function generateDeadlines() {
            goToStep(4);
            const listEl = document.getElementById('deadlines-list');
            listEl.innerHTML = '<div class="text-center py-4"><div class="spinner-border text-primary"></div><p class="mt-2 text-muted">Loading deadlines...</p></div>';

            fetch('{{ route("api.planner.deadlines") }}', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                },
                body: JSON.stringify(plannerData)
            })
            .then(r => r.json())
            .then(data => {
                if (!data.deadlines || data.deadlines.length === 0) {
                    listEl.innerHTML = '<div class="alert alert-info">No deadlines found for your profile. Please try different options.</div>';
                    return;
                }

                let html = '';
                data.deadlines.forEach(d => {
                    let cls = '';
                    if (d.days_until <= 2) cls = 'urgent';
                    else if (d.days_until <= 7) cls = 'warning';

                    html += `
                        <div class="deadline-item ${cls}">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-1 fw-bold">${d.name}</h6>
                                    <small class="text-muted"><i class="fa fa-calendar me-1"></i> Due: <strong>${new Date(d.due_date).toLocaleDateString('en-US', {year:'numeric', month:'long', day:'numeric'})}</strong></small>
                                    ${d.statutory_basis ? '<br><small class="text-muted"><i class="fa fa-book me-1"></i> ' + d.statutory_basis + '</small>' : ''}
                                </div>
                                <span class="badge ${d.days_until <= 2 ? 'bg-danger' : (d.days_until <= 7 ? 'bg-warning text-dark' : 'bg-success')} fs-6">
                                    ${d.days_until} days left
                                </span>
                            </div>
                        </div>`;
                });
                listEl.innerHTML = html;
            })
            .catch(err => {
                listEl.innerHTML = '<div class="alert alert-danger">Error loading deadlines. Please try again.</div>';
                console.error(err);
            });
        }

        document.getElementById('subscribeForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const fd = new FormData(this);
            fd.append('taxpayer_type', plannerData.taxpayer_type);
            fd.append('has_sales_tax', plannerData.has_sales_tax ? 1 : 0);
            fd.append('has_withholding_agent', plannerData.has_withholding_agent ? 1 : 0);
            fd.append('sector', plannerData.sector);

            fetch('{{ route("api.planner.subscribe") }}', {
                method: 'POST',
                headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}', 'Accept': 'application/json' },
                body: fd
            })
            .then(r => r.json())
            .then(data => {
                if (data.success) {
                    alert('You have been subscribed to deadline reminders! You will receive email and SMS reminders before each deadline.');
                    this.reset();
                } else {
                    alert('Error: ' + (data.message || 'Please try again.'));
                }
            })
            .catch(err => { alert('An error occurred. Please try again.'); console.error(err); });
        });

        function exportIcs() { window.location.href = '{{ route("planner.export.ics") }}'; }
        function exportPdf() { window.location.href = '{{ route("planner.export.pdf") }}'; }

        function resetPlanner() {
            plannerData = { taxpayer_type: '', has_sales_tax: false, has_withholding_agent: false, sector: '' };
            document.querySelectorAll('.taxpayer-option').forEach(o => o.classList.remove('selected'));
            goToStep(1);
        }
    </script>
</body>
</html>
