<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Select Services - FINANIC</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        :root {
            --primary: #0f7a4e;
            --primary-light: #18a66a;
            --primary-dark: #084b31;
            --primary-50: #e8f5ee;
            --ink: #10201a;
            --muted: #60706a;
            --border: #dce7e1;
            --surface: #f6faf8;
            --white: #ffffff;
        }

        * { margin: 0; padding: 0; box-sizing: border-box; }

        body {
            font-family: 'Inter', sans-serif;
            background: linear-gradient(135deg, #f6faf8 0%, #e8f5ee 100%);
            min-height: 100vh;
            color: var(--ink);
        }

        .container {
            max-width: 1000px;
            margin: 0 auto;
            padding: 40px 20px;
        }

        .header {
            text-align: center;
            margin-bottom: 40px;
        }

        .header .logo {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
        }

        .header .logo-icon {
            width: 56px;
            height: 56px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 24px;
            font-weight: 800;
            box-shadow: 0 4px 12px rgba(15, 122, 78, 0.3);
        }

        .header .logo-text {
            font-size: 24px;
            font-weight: 800;
            color: var(--ink);
        }

        .header h1 {
            font-size: 32px;
            font-weight: 800;
            margin-bottom: 12px;
            color: var(--ink);
        }

        .header p {
            font-size: 16px;
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(280px, 1fr));
            gap: 20px;
            margin-bottom: 32px;
        }

        .service-card {
            background: var(--white);
            border: 2px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            cursor: pointer;
            transition: all 0.2s ease;
            position: relative;
        }

        .service-card:hover {
            border-color: var(--primary);
            transform: translateY(-4px);
            box-shadow: 0 12px 32px rgba(15, 122, 78, 0.15);
        }

        .service-card.selected {
            border-color: var(--primary);
            background: var(--primary-50);
        }

        .service-card.selected::after {
            content: '\f00c';
            font-family: 'Font Awesome 6 Free';
            font-weight: 900;
            position: absolute;
            top: 12px;
            right: 12px;
            width: 28px;
            height: 28px;
            background: var(--primary);
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 12px;
        }

        .service-card input[type="checkbox"] {
            display: none;
        }

        .service-icon {
            width: 56px;
            height: 56px;
            background: var(--primary-50);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--primary);
            font-size: 24px;
            margin-bottom: 16px;
        }

        .service-card h3 {
            font-size: 18px;
            font-weight: 700;
            margin-bottom: 8px;
            color: var(--ink);
        }

        .service-card p {
            font-size: 14px;
            color: var(--muted);
            line-height: 1.5;
        }

        .submit-section {
            text-align: center;
        }

        .submit-btn {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-dark) 100%);
            color: #fff;
            border: none;
            padding: 16px 48px;
            font-size: 16px;
            font-weight: 700;
            border-radius: 12px;
            cursor: pointer;
            transition: all 0.2s ease;
            box-shadow: 0 4px 16px rgba(15, 122, 78, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(15, 122, 78, 0.4);
        }

        .submit-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
            transform: none;
        }

        .skip-link {
            display: inline-block;
            margin-top: 16px;
            color: var(--muted);
            font-size: 14px;
            text-decoration: none;
        }

        .skip-link:hover {
            color: var(--primary);
        }

        .selected-count {
            font-size: 14px;
            color: var(--muted);
            margin-bottom: 16px;
        }

        .selected-count span {
            color: var(--primary);
            font-weight: 700;
        }

        @media (max-width: 768px) {
            .header h1 { font-size: 24px; }
            .services-grid { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div class="logo">
                <div class="logo-icon">F</div>
                <div class="logo-text">FINANIC</div>
            </div>
            <h1>Choose Your Services</h1>
            <p>Select the services you need. You can always add more services later from your dashboard.</p>
        </div>

        <div class="selected-count">
            <span id="selectedCount">0</span> services selected
        </div>

        <form action="{{ route('portal.store-services') }}" method="POST" id="serviceForm">
            @csrf
            <div class="services-grid">
                @foreach($services as $service)
                    <label class="service-card {{ in_array($service->id, $userServices) ? 'selected' : '' }}">
                        <input type="checkbox" name="services[]" value="{{ $service->id }}" 
                            {{ in_array($service->id, $userServices) ? 'checked' : '' }}
                            onchange="updateCount()">
                        <div class="service-icon">
                            <i class="fa {{ $service->icon }}"></i>
                        </div>
                        <h3>{{ $service->name }}</h3>
                        <p>{{ $service->short_description ?? Str::limit($service->description, 100) }}</p>
                    </label>
                @endforeach
            </div>

            <div class="submit-section">
                <button type="submit" class="submit-btn" id="submitBtn" disabled>
                    <i class="fa fa-arrow-right"></i> Continue to Dashboard
                </button>
                <br>
                <a href="{{ route('portal.dashboard') }}" class="skip-link">Skip for now, I'll choose later</a>
            </div>
        </form>
    </div>

    <script>
        function updateCount() {
            const checked = document.querySelectorAll('input[name="services[]"]:checked').length;
            document.getElementById('selectedCount').textContent = checked;
            document.getElementById('submitBtn').disabled = checked === 0;

            // Update card styles
            document.querySelectorAll('.service-card').forEach(card => {
                const checkbox = card.querySelector('input[type="checkbox"]');
                if (checkbox.checked) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            });
        }

        // Initialize count on page load
        updateCount();
    </script>
</body>
</html>
