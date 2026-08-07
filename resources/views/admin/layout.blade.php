<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - FINANIC Business Consultants</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        /* ============================================================
           MODERN ADMIN DESIGN SYSTEM - FINANIC
           ============================================================ */
        :root {
            /* Primary Palette - Matching Front-end */
            --primary: #0f7a4e;
            --primary-light: #18a66a;
            --primary-dark: #084b31;
            --primary-50: #e8f5ee;
            --primary-100: #d4f1e4;
            --primary-200: #a8e3c8;
            --primary-glow: rgba(15, 122, 78, 0.25);

            /* Accent Colors - Matching Front-end */
            --accent-blue: #1e4668;
            --accent-blue-light: #2a5a82;
            --accent-blue-50: #eef4f8;
            --accent-gold: #b9892f;
            --accent-gold-light: #d4a23d;
            --accent-gold-50: #faf3e6;
            --accent-coral: #ef785a;
            --accent-coral-50: #fee2e0;
            --accent-purple: #7c3aed;
            --accent-purple-50: #f3f0ff;
            --accent-cyan: #06b6d4;
            --accent-cyan-50: #ecfeff;

            /* Neutral Palette - Matching Front-end */
            --ink: #10201a;
            --ink-secondary: #3a4a44;
            --muted: #60706a;
            --muted-light: #7d8b86;
            --border: #dce7e1;
            --border-light: #eef6f1;
            --surface: #f6faf8;
            --surface-elevated: #ffffff;

            /* Sidebar */
            --sidebar-bg: linear-gradient(180deg, #0c1f17 0%, #081a12 50%, #061310 100%);
            --sidebar-width: 280px;
            --sidebar-collapsed: 72px;

            /* Effects */
            --shadow-xs: 0 1px 2px rgba(16, 32, 26, 0.04);
            --shadow-sm: 0 2px 8px rgba(16, 32, 26, 0.06);
            --shadow-md: 0 4px 6px -1px rgba(16, 32, 26, 0.07), 0 2px 4px -2px rgba(16, 32, 26, 0.05);
            --shadow-lg: 0 10px 15px -3px rgba(16, 32, 26, 0.08), 0 4px 6px -4px rgba(16, 32, 26, 0.04);
            --shadow-xl: 0 18px 48px rgba(16, 32, 26, 0.1);
            --shadow-glow: 0 0 20px rgba(15, 122, 78, 0.15);

            /* Borders */
            --radius-sm: 8px;
            --radius-md: 10px;
            --radius-lg: 14px;
            --radius-xl: 18px;
            --radius-full: 9999px;

            /* Transitions */
            --ease-smooth: cubic-bezier(0.4, 0, 0.2, 1);
            --ease-bounce: cubic-bezier(0.34, 1.56, 0.64, 1);
            --transition-fast: 0.15s var(--ease-smooth);
            --transition-normal: 0.25s var(--ease-smooth);
            --transition-slow: 0.4s var(--ease-smooth);
        }

        /* ===== RESET & BASE ===== */
        *, *::before, *::after { margin: 0; padding: 0; box-sizing: border-box; }

        html {
            scroll-behavior: smooth;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        body {
            font-family: 'Inter', system-ui, -apple-system, BlinkMacSystemFont, sans-serif;
            background: var(--surface);
            color: var(--ink);
            overflow-x: hidden;
            font-size: 14px;
            line-height: 1.6;
        }

        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', 'Inter', sans-serif;
            font-weight: 700;
            line-height: 1.3;
            color: var(--ink);
        }

        a { text-decoration: none; }

        /* ===== CUSTOM SCROLLBAR ===== */
        ::-webkit-scrollbar { width: 6px; height: 6px; }
        ::-webkit-scrollbar-track { background: transparent; }
        ::-webkit-scrollbar-thumb { background: var(--border); border-radius: 3px; }
        ::-webkit-scrollbar-thumb:hover { background: var(--muted-light); }

        /* ============================================================
           SIDEBAR
           ============================================================ */
        .admin-sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background: var(--sidebar-bg);
            z-index: 1050;
            display: flex;
            flex-direction: column;
            transition: transform var(--transition-normal);
            overflow: hidden;
            border-right: 1px solid rgba(255, 255, 255, 0.04);
        }

        .admin-sidebar::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: radial-gradient(ellipse at top left, rgba(15, 122, 78, 0.08) 0%, transparent 50%);
            pointer-events: none;
        }

        .admin-sidebar::-webkit-scrollbar { width: 3px; }
        .admin-sidebar::-webkit-scrollbar-thumb { background: rgba(255,255,255,0.1); border-radius: 3px; }

        /* Brand */
        .sidebar-brand {
            padding: 24px 20px 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.06);
            position: relative;
            z-index: 1;
        }

        .sidebar-brand .brand-logo {
            display: flex;
            align-items: center;
            gap: 14px;
            text-decoration: none;
            padding: 4px;
            border-radius: var(--radius-md);
            transition: all var(--transition-fast);
        }

        .sidebar-brand .brand-logo:hover {
            background: rgba(255, 255, 255, 0.04);
        }

        .sidebar-brand .brand-icon {
            width: 44px;
            height: 44px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 18px;
            font-weight: 800;
            font-family: 'Plus Jakarta Sans', sans-serif;
            box-shadow: 0 4px 12px rgba(15, 122, 78, 0.3);
            position: relative;
            overflow: hidden;
        }

        .sidebar-brand .brand-icon::after {
            content: '';
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(255,255,255,0.2), transparent);
            border-radius: inherit;
        }

        .sidebar-brand .brand-text h5 {
            color: #fff;
            font-size: 17px;
            font-weight: 800;
            margin: 0;
            letter-spacing: 0.8px;
        }

        .sidebar-brand .brand-text small {
            color: rgba(255, 255, 255, 0.4);
            font-size: 10px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        /* Navigation */
        .sidebar-nav {
            flex: 1;
            padding: 12px 10px;
            overflow-y: auto;
            position: relative;
            z-index: 1;
        }

        .sidebar-nav .nav-section {
            margin-bottom: 8px;
        }

        .sidebar-nav .nav-header {
            color: rgba(255, 255, 255, 0.25);
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            padding: 16px 14px 8px;
            user-select: none;
        }

        .sidebar-nav .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 11px 14px;
            color: rgba(255, 255, 255, 0.5);
            text-decoration: none;
            font-size: 13.5px;
            font-weight: 500;
            border-radius: var(--radius-sm);
            transition: all var(--transition-fast);
            position: relative;
            margin-bottom: 2px;
            border: 1px solid transparent;
        }

        .sidebar-nav .nav-link i {
            width: 20px;
            text-align: center;
            font-size: 15px;
            transition: all var(--transition-fast);
            opacity: 0.7;
        }

        .sidebar-nav .nav-link:hover {
            color: rgba(255, 255, 255, 0.9);
            background: rgba(255, 255, 255, 0.06);
            border-color: rgba(255, 255, 255, 0.04);
        }

        .sidebar-nav .nav-link:hover i {
            opacity: 1;
            transform: translateX(2px);
        }

        .sidebar-nav .nav-link.active {
            color: #fff;
            background: linear-gradient(135deg, rgba(15, 122, 78, 0.2), rgba(15, 122, 78, 0.1));
            font-weight: 600;
            border-color: rgba(15, 122, 78, 0.2);
            box-shadow: 0 0 16px rgba(15, 122, 78, 0.1);
        }

        .sidebar-nav .nav-link.active i {
            opacity: 1;
            color: var(--primary-light);
        }

        .sidebar-nav .nav-link.active::before {
            content: '';
            position: absolute;
            left: -11px;
            top: 50%;
            transform: translateY(-50%);
            width: 4px;
            height: 24px;
            background: var(--primary-light);
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 12px rgba(24, 166, 106, 0.5);
        }

        .sidebar-divider {
            border: none;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            margin: 8px 14px;
        }

        /* Sidebar Footer */
        .sidebar-footer {
            padding: 10px;
            border-top: 1px solid rgba(255, 255, 255, 0.06);
            position: relative;
            z-index: 1;
        }

        .sidebar-footer .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: rgba(255, 255, 255, 0.45);
            text-decoration: none;
            font-size: 13px;
            font-weight: 500;
            border-radius: var(--radius-sm);
            transition: all var(--transition-fast);
            margin-bottom: 2px;
        }

        .sidebar-footer .nav-link:hover {
            color: rgba(255, 255, 255, 0.9);
            background: rgba(255, 255, 255, 0.06);
        }

        .sidebar-footer .logout-btn {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 14px;
            color: rgba(255, 255, 255, 0.45);
            font-size: 13px;
            font-weight: 500;
            border: none;
            background: none;
            width: 100%;
            text-align: left;
            border-radius: var(--radius-sm);
            cursor: pointer;
            transition: all var(--transition-fast);
            font-family: inherit;
        }

        .sidebar-footer .logout-btn:hover {
            color: #f87171;
            background: rgba(248, 113, 113, 0.08);
        }

        /* ============================================================
           MAIN CONTENT AREA
           ============================================================ */
        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            transition: margin-left var(--transition-normal);
            background: var(--surface);
        }

        /* Topbar */
        .admin-topbar {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(16px) saturate(180%);
            -webkit-backdrop-filter: blur(16px) saturate(180%);
            border-bottom: 1px solid var(--border);
            padding: 0 32px;
            height: 64px;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .admin-topbar .topbar-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        .admin-topbar .page-title {
            font-size: 20px;
            font-weight: 700;
            color: var(--ink);
            margin: 0;
        }

        .admin-topbar .topbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .admin-topbar .user-badge {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 5px 16px 5px 5px;
            background: var(--primary-50);
            border-radius: var(--radius-full);
            font-size: 13px;
            font-weight: 600;
            color: var(--primary-dark);
            border: 1px solid var(--primary-100);
            transition: all var(--transition-fast);
            cursor: default;
        }

        .admin-topbar .user-badge:hover {
            background: var(--primary-100);
            box-shadow: var(--shadow-sm);
        }

        .admin-topbar .user-avatar {
            width: 34px;
            height: 34px;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            color: #fff;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 13px;
            font-weight: 700;
            box-shadow: 0 2px 8px rgba(15, 122, 78, 0.25);
        }

        .mobile-toggle {
            display: none;
            background: none;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            padding: 8px 12px;
            color: var(--ink);
            cursor: pointer;
            font-size: 18px;
            transition: all var(--transition-fast);
        }

        .mobile-toggle:hover {
            background: var(--primary-50);
            border-color: var(--primary);
            color: var(--primary);
        }

        /* Content */
        .admin-content {
            padding: 28px 32px 40px;
        }

        /* ============================================================
           SHARED COMPONENT CLASSES
           ============================================================ */

        /* --- Cards --- */
        .adm-card {
            background: var(--surface-elevated);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: all var(--transition-normal);
        }

        .adm-card:hover {
            box-shadow: var(--shadow-md);
        }

        .adm-card-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 20px 24px;
            border-bottom: 1px solid var(--border-light);
            background: linear-gradient(180deg, rgba(246, 250, 248, 0.5), transparent);
        }

        .adm-card-header h5 {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink);
            margin: 0;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .adm-card-header h5 i {
            color: var(--primary);
            font-size: 14px;
        }

        .adm-card-body {
            padding: 24px;
        }

        /* --- Page Header --- */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 28px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-header .page-info h2 {
            font-size: 24px;
            font-weight: 800;
            margin-bottom: 4px;
        }

        .page-header .page-info p {
            color: var(--muted);
            font-size: 14px;
            margin: 0;
        }

        /* --- Buttons --- */
        .adm-btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 9px 20px;
            border-radius: var(--radius-sm);
            font-size: 13.5px;
            font-weight: 600;
            text-decoration: none;
            transition: all var(--transition-fast);
            border: 1.5px solid transparent;
            cursor: pointer;
            font-family: inherit;
            line-height: 1.4;
            white-space: nowrap;
        }

        .adm-btn i { font-size: 13px; }

        .adm-btn-primary {
            color: #fff;
            background: linear-gradient(135deg, var(--primary), var(--primary-dark));
            border: none;
            box-shadow: 0 2px 8px rgba(15, 122, 78, 0.2);
        }

        .adm-btn-primary:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(15, 122, 78, 0.3);
            color: #fff;
        }

        .adm-btn-outline {
            color: var(--primary);
            background: transparent;
            border-color: var(--primary-200);
        }

        .adm-btn-outline:hover {
            background: var(--primary-50);
            border-color: var(--primary);
            color: var(--primary-dark);
        }

        .adm-btn-danger {
            color: #fff;
            background: linear-gradient(135deg, #ef4444, #dc2626);
            border: none;
            box-shadow: 0 2px 8px rgba(239, 68, 68, 0.2);
        }

        .adm-btn-danger:hover {
            transform: translateY(-1px);
            box-shadow: 0 6px 20px rgba(239, 68, 68, 0.3);
            color: #fff;
        }

        .adm-btn-ghost {
            color: var(--muted);
            background: transparent;
            border-color: var(--border);
        }

        .adm-btn-ghost:hover {
            background: var(--surface);
            border-color: var(--muted-light);
            color: var(--ink);
        }

        .adm-btn-sm {
            padding: 6px 14px;
            font-size: 12.5px;
        }

        .adm-btn-sm i { font-size: 12px; }

        .adm-btn-icon {
            width: 36px;
            height: 36px;
            padding: 0;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            border-radius: var(--radius-sm);
        }

        .adm-btn-icon.adm-btn-sm {
            width: 32px;
            height: 32px;
        }

        /* --- Tables --- */
        .adm-table-wrapper {
            overflow-x: auto;
        }

        .adm-table {
            width: 100%;
            border-collapse: separate;
            border-spacing: 0;
        }

        .adm-table thead th {
            padding: 12px 20px;
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.8px;
            color: var(--muted);
            background: var(--surface);
            border-bottom: 1px solid var(--border);
            white-space: nowrap;
            position: sticky;
            top: 0;
        }

        .adm-table tbody td {
            padding: 14px 20px;
            font-size: 13.5px;
            color: var(--ink-secondary);
            border-bottom: 1px solid var(--border-light);
            vertical-align: middle;
        }

        .adm-table tbody tr {
            transition: all var(--transition-fast);
        }

        .adm-table tbody tr:hover {
            background: var(--primary-50);
        }

        .adm-table tbody tr:last-child td {
            border-bottom: none;
        }

        .adm-table tbody tr:last-child {
            border-bottom-left-radius: var(--radius-lg);
            border-bottom-right-radius: var(--radius-lg);
        }

        .adm-table a {
            color: var(--primary);
            font-weight: 600;
            transition: color var(--transition-fast);
        }

        .adm-table a:hover {
            color: var(--primary-dark);
        }

        /* --- Badges --- */
        .adm-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 4px 12px;
            border-radius: var(--radius-full);
            font-size: 11.5px;
            font-weight: 600;
            letter-spacing: 0.2px;
        }

        .adm-badge-green { background: var(--primary-50); color: var(--primary); }
        .adm-badge-blue { background: var(--accent-blue-50); color: var(--accent-blue); }
        .adm-badge-gold { background: var(--accent-gold-50); color: #b45309; }
        .adm-badge-coral { background: var(--accent-coral-50); color: #c2410c; }
        .adm-badge-purple { background: var(--accent-purple-50); color: var(--accent-purple); }
        .adm-badge-red { background: #fef2f2; color: #dc2626; }
        .adm-badge-gray { background: var(--border-light); color: var(--muted); }

        .adm-badge-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: currentColor;
        }

        /* --- Forms --- */
        .adm-form .form-label {
            font-size: 12.5px;
            font-weight: 700;
            color: var(--ink-secondary);
            text-transform: uppercase;
            letter-spacing: 0.4px;
            margin-bottom: 8px;
            display: block;
        }

        .adm-form .form-label .label-hint {
            font-weight: 400;
            text-transform: none;
            letter-spacing: 0;
            color: var(--muted-light);
            font-size: 12px;
            margin-left: 4px;
        }

        .adm-form .form-control,
        .adm-form .form-select {
            border: 1.5px solid var(--border);
            border-radius: var(--radius-sm);
            font-size: 14px;
            padding: 11px 14px;
            color: var(--ink);
            background: var(--surface-elevated);
            transition: all var(--transition-fast);
            font-family: inherit;
        }

        .adm-form .form-control::placeholder {
            color: var(--muted-light);
        }

        .adm-form .form-control:focus,
        .adm-form .form-select:focus {
            border-color: var(--primary);
            box-shadow: 0 0 0 3px rgba(15, 122, 78, 0.08);
            outline: none;
        }

        .adm-form textarea.form-control {
            min-height: 100px;
            resize: vertical;
        }

        .adm-form .form-check {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 8px 0;
        }

        .adm-form .form-check-input {
            width: 18px;
            height: 18px;
            border: 2px solid var(--border);
            border-radius: 4px;
            cursor: pointer;
            transition: all var(--transition-fast);
        }

        .adm-form .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .adm-form .form-check-label {
            font-size: 13.5px;
            font-weight: 500;
            color: var(--ink-secondary);
            cursor: pointer;
        }

        .adm-form .form-switch .form-check-input {
            width: 44px;
            height: 24px;
            border-radius: 12px;
            transition: all var(--transition-fast);
            flex-shrink: 0;
            position: relative;
            margin-left: 0;
        }

        .adm-form .form-switch .form-check-input::before {
            content: "";
            position: absolute;
            top: 2px;
            left: 2px;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #fff;
            transition: transform 0.2s;
            box-shadow: 0 1px 3px rgba(0,0,0,0.2);
        }

        .adm-form .form-switch .form-check-input:checked::before {
            transform: translateX(20px);
        }

        .adm-form .form-switch .form-check-input:checked {
            background-color: var(--primary);
            border-color: var(--primary);
        }

        .adm-form .form-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' viewBox='0 0 12 12'%3E%3Cpath fill='%2364748b' d='M6 8L1 3h10z'/%3E%3C/svg%3E");
            background-repeat: no-repeat;
            background-position: right 14px center;
            padding-right: 36px;
        }

        /* --- Empty State --- */
        .adm-empty {
            padding: 48px 24px;
            text-align: center;
        }

        .adm-empty-icon {
            width: 72px;
            height: 72px;
            background: var(--border-light);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 16px;
        }

        .adm-empty-icon i {
            font-size: 28px;
            color: var(--muted-light);
        }

        .adm-empty h6 {
            font-size: 16px;
            font-weight: 700;
            color: var(--ink-secondary);
            margin-bottom: 6px;
        }

        .adm-empty p {
            color: var(--muted);
            font-size: 13.5px;
            margin: 0;
        }

        /* --- Pagination --- */
        .pagination {
            display: inline-flex;
            flex-wrap: wrap;
            gap: 4px;
            list-style: none;
            margin: 0;
            padding: 0;
        }

        .pagination .page-item {
            display: inline-block;
        }

        .page-item .page-link {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            border: 1px solid var(--border);
            border-radius: var(--radius-sm);
            color: var(--muted);
            font-size: 13px;
            font-weight: 600;
            padding: 6px 12px;
            transition: all var(--transition-fast);
            background: var(--surface-elevated);
            text-decoration: none;
            line-height: 1;
            white-space: nowrap;
        }

        .page-item .page-link:hover {
            background: var(--primary-50);
            border-color: var(--primary);
            color: var(--primary);
        }

        .page-item.active .page-link {
            background: var(--primary);
            border-color: var(--primary);
            color: #fff;
            box-shadow: 0 2px 8px rgba(15, 122, 78, 0.25);
        }

        .page-item.disabled .page-link {
            opacity: 0.5;
            pointer-events: none;
        }

        /* --- Info Cards (for reminder config etc.) --- */
        .adm-info-card {
            background: var(--surface-elevated);
            border: 1px solid var(--border);
            border-radius: var(--radius-lg);
            overflow: hidden;
            transition: all var(--transition-normal);
        }

        .adm-info-card:hover {
            box-shadow: var(--shadow-md);
        }

        .adm-info-card-header {
            padding: 18px 24px;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid var(--border-light);
        }

        .adm-info-card-header i {
            width: 40px;
            height: 40px;
            border-radius: var(--radius-md);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
        }

        .adm-info-card-header h5 {
            font-size: 16px;
            font-weight: 700;
            margin: 0;
        }

        .adm-info-card-body {
            padding: 24px;
        }

        .adm-info-card-header.icon-green { background: var(--primary-50); color: var(--primary); }
        .adm-info-card-header.icon-blue { background: var(--accent-blue-50); color: var(--accent-blue); }
        .adm-info-card-header.icon-gold { background: var(--accent-gold-50); color: var(--accent-gold); }
        .adm-info-card-header.icon-purple { background: var(--accent-purple-50); color: var(--accent-purple); }
        .adm-info-card-header.icon-coral { background: var(--accent-coral-50); color: var(--accent-coral); }

        /* --- Action Buttons Row --- */
        .adm-actions {
            display: flex;
            align-items: center;
            gap: 6px;
        }

        /* --- Detail List --- */
        .adm-detail-list {
            display: grid;
            gap: 16px;
        }

        .adm-detail-item {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .adm-detail-item label {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: var(--muted);
        }

        .adm-detail-item span {
            font-size: 14px;
            font-weight: 500;
            color: var(--ink);
        }

        .adm-message-box {
            background: var(--surface);
            border: 1px solid var(--border-light);
            border-radius: var(--radius-md);
            padding: 16px;
            font-size: 14px;
            line-height: 1.7;
            color: var(--ink-secondary);
        }

        /* --- Toggle Switch (Modern) --- */
        .adm-toggle {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 0;
            border-bottom: 1px solid var(--border-light);
        }

        .adm-toggle:last-child { border-bottom: none; }

        .adm-toggle-info h6 {
            font-size: 14px;
            font-weight: 600;
            margin-bottom: 2px;
        }

        .adm-toggle-info small {
            color: var(--muted);
            font-size: 12.5px;
        }

        /* ============================================================
           FLASH MESSAGES / TOASTS
           ============================================================ */
        .alert-modern {
            border: none;
            border-radius: var(--radius-md);
            padding: 14px 20px;
            font-size: 14px;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 12px;
            animation: slideDown 0.35s ease both;
            box-shadow: var(--shadow-md);
        }

        .alert-modern.alert-success {
            background: linear-gradient(135deg, var(--primary-50), var(--primary-100));
            color: var(--primary-dark);
            border-left: 4px solid var(--primary);
        }

        .alert-modern.alert-danger {
            background: linear-gradient(135deg, #fef2f2, #fee2e2);
            color: #991b1b;
            border-left: 4px solid #ef4444;
        }

        .alert-modern .btn-close {
            margin-left: auto;
            opacity: 0.5;
        }

        /* ============================================================
           ANIMATIONS
           ============================================================ */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes slideDown {
            from { opacity: 0; transform: translateY(-12px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        .anim-fade-up { animation: fadeInUp 0.5s var(--ease-smooth) both; }
        .anim-fade { animation: fadeIn 0.4s var(--ease-smooth) both; }
        .anim-scale { animation: scaleIn 0.4s var(--ease-smooth) both; }
        .anim-delay-1 { animation-delay: 0.05s; }
        .anim-delay-2 { animation-delay: 0.1s; }
        .anim-delay-3 { animation-delay: 0.15s; }
        .anim-delay-4 { animation-delay: 0.2s; }
        .anim-delay-5 { animation-delay: 0.25s; }
        .anim-delay-6 { animation-delay: 0.3s; }
        .anim-delay-7 { animation-delay: 0.35s; }
        .anim-delay-8 { animation-delay: 0.4s; }

        /* ============================================================
           SIDEBAR OVERLAY (Mobile)
           ============================================================ */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 1040;
            backdrop-filter: blur(4px);
            opacity: 0;
            transition: opacity var(--transition-normal);
        }

        .sidebar-overlay.show {
            display: block;
            opacity: 1;
        }

        /* ============================================================
           RESPONSIVE
           ============================================================ */
        @media (max-width: 1199px) {
            .admin-content {
                padding: 24px 20px 32px;
            }
        }

        @media (max-width: 991px) {
            .admin-sidebar {
                transform: translateX(-100%);
            }

            .admin-sidebar.open {
                transform: translateX(0);
            }

            .admin-main {
                margin-left: 0;
            }

            .mobile-toggle {
                display: inline-flex;
            }

            .admin-topbar {
                padding: 0 16px;
            }

            .admin-content {
                padding: 20px 16px 28px;
            }
        }

        @media (max-width: 575px) {
            .admin-topbar .page-title {
                font-size: 16px;
            }

            .admin-topbar .user-badge span:not(.user-avatar) {
                display: none;
            }

            .page-header {
                flex-direction: column;
                align-items: flex-start;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Sidebar Overlay (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay"></div>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="sidebar-brand">
            <a href="{{ route('admin.dashboard') }}" class="brand-logo">
                <div class="brand-icon">F</div>
                <div class="brand-text">
                    <h5>FINANIC</h5>
                    <small>Admin Panel</small>
                </div>
            </a>
        </div>

        <nav class="sidebar-nav">
            <div class="nav-section">
                <div class="nav-header">Main</div>
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fas fa-th-large"></i> Dashboard
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-header">Planner & Deadlines</div>
                <a href="{{ route('admin.deadline-rules.index') }}" class="nav-link {{ request()->routeIs('admin.deadline-rules.*') ? 'active' : '' }}">
                    <i class="fas fa-calendar-alt"></i> Deadline Rules
                </a>
                <a href="{{ route('admin.reminder-config') }}" class="nav-link {{ request()->routeIs('admin.reminder-config') ? 'active' : '' }}">
                    <i class="fas fa-clock"></i> Reminder Config
                </a>
                <a href="{{ route('admin.subscribers.index') }}" class="nav-link {{ request()->routeIs('admin.subscribers.*') ? 'active' : '' }}">
                    <i class="fas fa-users"></i> Subscribers
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-header">Content</div>
                <a href="{{ route('admin.users.index') }}" class="nav-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="fas fa-user-cog"></i> Users
                </a>
                <a href="{{ route('admin.user-documents.index') }}" class="nav-link {{ request()->routeIs('admin.user-documents.*') ? 'active' : '' }}">
                    <i class="fas fa-file-alt"></i> Users Documents
                </a>
                <a href="{{ route('admin.payments.index') }}" class="nav-link {{ request()->routeIs('admin.payments.*') ? 'active' : '' }}">
                    <i class="fas fa-credit-card"></i> Payments
                </a>
                <a href="{{ route('admin.services.index') }}" class="nav-link {{ request()->routeIs('admin.services.*') ? 'active' : '' }}">
                    <i class="fas fa-briefcase"></i> Services
                </a>
                <a href="{{ route('admin.faqs.index') }}" class="nav-link {{ request()->routeIs('admin.faqs.*') ? 'active' : '' }}">
                    <i class="fas fa-question-circle"></i> FAQs
                </a>
                <a href="{{ route('admin.tax-updates.index') }}" class="nav-link {{ request()->routeIs('admin.tax-updates.*') ? 'active' : '' }}">
                    <i class="fas fa-newspaper"></i> Tax Updates
                </a>
            </div>

            <div class="nav-section">
                <div class="nav-header">Leads</div>
                <a href="{{ route('admin.contacts.index') }}" class="nav-link {{ request()->routeIs('admin.contacts.*') ? 'active' : '' }}">
                    <i class="fas fa-envelope"></i> Contacts
                </a>
                <a href="{{ route('admin.notifications.index') }}" class="nav-link {{ request()->routeIs('admin.notifications.*') ? 'active' : '' }}">
                    <i class="fas fa-bell"></i> Notifications Log
                </a>
            </div>
        </nav>

        <div class="sidebar-footer">
            <a href="{{ route('home') }}" class="nav-link" target="_blank">
                <i class="fas fa-external-link-alt"></i> View Site
            </a>
            <a href="{{ route('planner.index') }}" class="nav-link" target="_blank">
                <i class="fas fa-calendar-check"></i> Tax Planner
            </a>
            <hr class="sidebar-divider">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="logout-btn">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </button>
            </form>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="admin-main">
        <!-- Top Bar -->
        <header class="admin-topbar">
            <div class="topbar-left">
                <button class="mobile-toggle" id="mobileToggle" aria-label="Toggle sidebar">
                    <i class="fas fa-bars"></i>
                </button>
                <h1 class="page-title">@yield('page-title', 'Dashboard')</h1>
            </div>
            <div class="topbar-actions">
                <div class="user-badge">
                    <span>{{ auth()->user()->name }}</span>
                    <div class="user-avatar">{{ strtoupper(substr(auth()->user()->name, 0, 1)) }}</div>
                </div>
            </div>
        </header>

        <!-- Content Area -->
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-modern alert-success alert-dismissible fade show">
                    <i class="fas fa-check-circle"></i>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-modern alert-danger alert-dismissible fade show">
                    <i class="fas fa-exclamation-circle"></i>
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebar = document.getElementById('adminSidebar');
        const overlay = document.getElementById('sidebarOverlay');
        const toggle = document.getElementById('mobileToggle');

        toggle.addEventListener('click', () => {
            sidebar.classList.toggle('open');
            overlay.classList.toggle('show');
            document.body.style.overflow = sidebar.classList.contains('open') ? 'hidden' : '';
        });

        overlay.addEventListener('click', () => {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            document.body.style.overflow = '';
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                sidebar.classList.remove('open');
                overlay.classList.remove('show');
                document.body.style.overflow = '';
            }
        });
    </script>
    @stack('scripts')
</body>
</html>
