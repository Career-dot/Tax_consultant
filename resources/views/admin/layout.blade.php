<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin Panel') - FINANIC Business Consultants</title>
    <meta name="robots" content="noindex, nofollow">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon.webp') }}">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/pe-icon-7-stroke.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/font-awesome.min.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/admin.css') }}">
    @stack('styles')
</head>
<body class="pfd-body">
    @php
        $flashSuccess = session('success');
        $flashError = session('error');
    @endphp

    <div class="pf-dashboard">
        <a class="pfd-skip-link" href="#pfdMainContent">Skip to content</a>
        <div class="pfd-sidebar-overlay" data-sidebar-overlay></div>

        <aside class="pfd-sidebar">
            <a class="pfd-sidebar-brand" href="{{ route('admin.dashboard') }}">
                <span class="pfd-sidebar-brand-mark">
                    <img class="pfd-sidebar-brand-logo pfd-sidebar-brand-logo-full" src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="FINANIC Admin">
                    <img class="pfd-sidebar-brand-logo pfd-sidebar-brand-logo-compact" src="{{ asset('assets/images/logo/logo-2.jpeg') }}" alt="FINANIC">
                </span>
            </a>

            <nav class="pfd-sidebar-nav" aria-label="Admin navigation">
                <div class="pfd-nav-group">
                    <ul class="pfd-nav-list">
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.dashboard') ? 'is-active' : '' }}" href="{{ route('admin.dashboard') }}">
                                <i class="pe-7s-rocket" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Dashboard</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pfd-nav-group">
                    <p class="pfd-nav-label">Planner &amp; Deadlines</p>
                    <ul class="pfd-nav-list">
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.deadline-rules.*') ? 'is-active' : '' }}" href="{{ route('admin.deadline-rules.index') }}">
                                <i class="pe-7s-date" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Deadline Rules</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.reminder-config') ? 'is-active' : '' }}" href="{{ route('admin.reminder-config') }}">
                                <i class="pe-7s-alarm" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Reminder Config</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.subscribers.*') ? 'is-active' : '' }}" href="{{ route('admin.subscribers.index') }}">
                                <i class="pe-7s-users" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Subscribers</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pfd-nav-group">
                    <p class="pfd-nav-label">Content</p>
                    <ul class="pfd-nav-list">
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.users.*') ? 'is-active' : '' }}" href="{{ route('admin.users.index') }}">
                                <i class="pe-7s-user" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Users</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.user-documents.*') ? 'is-active' : '' }}" href="{{ route('admin.user-documents.index') }}">
                                <i class="pe-7s-note2" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">User Documents</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.payments.*') ? 'is-active' : '' }}" href="{{ route('admin.payments.index') }}">
                                <i class="pe-7s-wallet" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Payments</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.services.*') ? 'is-active' : '' }}" href="{{ route('admin.services.index') }}">
                                <i class="pe-7s-shopbag" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Services</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.faqs.*') ? 'is-active' : '' }}" href="{{ route('admin.faqs.index') }}">
                                <i class="pe-7s-help1" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">FAQs</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.tax-updates.*') ? 'is-active' : '' }}" href="{{ route('admin.tax-updates.index') }}">
                                <i class="pe-7s-notebook" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Tax Updates</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pfd-nav-group">
                    <p class="pfd-nav-label">Leads</p>
                    <ul class="pfd-nav-list">
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.contacts.*') ? 'is-active' : '' }}" href="{{ route('admin.contacts.index') }}">
                                <i class="pe-7s-mail" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Contacts</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link {{ request()->routeIs('admin.notifications.*') ? 'is-active' : '' }}" href="{{ route('admin.notifications.index') }}">
                                <i class="pe-7s-bell" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Notifications Log</span>
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="pfd-nav-group">
                    <ul class="pfd-nav-list">
                        <li>
                            <a class="pfd-nav-link" href="{{ route('home') }}" target="_blank">
                                <i class="pe-7s-global" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">View Site</span>
                            </a>
                        </li>
                        <li>
                            <a class="pfd-nav-link" href="{{ route('planner.index') }}" target="_blank">
                                <i class="pe-7s-date" aria-hidden="true"></i>
                                <span class="pfd-nav-link-text">Tax Planner</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

            <div class="pfd-sidebar-footer">
                <form class="pfd-logout-form" action="{{ route('logout') }}" method="post">
                    @csrf
                    <button class="pfd-logout-btn" type="submit">
                        <i class="pe-7s-power" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Logout</span>
                    </button>
                </form>
            </div>
        </aside>

        <div class="pfd-main">
            <header class="pfd-topbar">
                <button class="pfd-sidebar-toggle" type="button" data-sidebar-toggle aria-label="Collapse sidebar">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>
                <button class="pfd-mobile-toggle" type="button" data-mobile-toggle aria-label="Open menu">
                    <i class="fa fa-bars" aria-hidden="true"></i>
                </button>

                <div class="pfd-search">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="search" placeholder="Search users, services, contacts...">
                </div>

                <div class="pfd-topbar-spacer"></div>

                <div class="pfd-topbar-actions">
                    <div class="pfd-admin-badge">
                        <i class="fa fa-shield" aria-hidden="true"></i> Admin
                    </div>

                    <div class="pfd-dropdown" data-dropdown>
                        <button class="pfd-icon-btn" type="button" data-dropdown-trigger aria-label="Notifications">
                            <i class="fa fa-bell" aria-hidden="true"></i>
                            <span class="pfd-dot">3</span>
                        </button>
                        <div class="pfd-dropdown-panel pfd-notifications-panel">
                            <div class="pfd-dropdown-header">
                                <h6>Notifications</h6>
                                <button type="button">Mark all as read</button>
                            </div>
                            <div class="pfd-dropdown-body">
                                <a href="#" class="pfd-dropdown-item is-unread" style="text-decoration: none; color: inherit;">
                                    <div class="pfd-dropdown-icon"><i class="fa fa-user-plus"></i></div>
                                    <div>
                                        <p>New user registered</p>
                                        <span>2 mins ago</span>
                                    </div>
                                </a>
                                <a href="#" class="pfd-dropdown-item is-unread" style="text-decoration: none; color: inherit;">
                                    <div class="pfd-dropdown-icon" style="color: var(--pf-gold); background: rgba(185, 137, 47, 0.1);"><i class="fa fa-file-text"></i></div>
                                    <div>
                                        <p>New document uploaded</p>
                                        <span>1 hr ago</span>
                                    </div>
                                </a>
                                <a href="#" class="pfd-dropdown-item" style="text-decoration: none; color: inherit;">
                                    <div class="pfd-dropdown-icon" style="color: var(--pf-blue); background: rgba(30, 70, 104, 0.1);"><i class="fa fa-envelope"></i></div>
                                    <div>
                                        <p>New contact message</p>
                                        <span>3 hrs ago</span>
                                    </div>
                                </a>
                            </div>
                            <div class="pfd-dropdown-footer">
                                <a href="{{ route('admin.dashboard') }}" style="text-decoration: none;">View all notifications</a>
                            </div>
                        </div>
                    </div>

                    <div class="pfd-dropdown" data-dropdown>
                        <button class="pfd-profile-toggle" type="button" data-dropdown-trigger>
                            <span class="pfd-avatar">
                                {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                            </span>
                            <span class="pfd-profile-toggle-name">{{ auth()->user()->name }}</span>
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </button>
                        <div class="pfd-dropdown-panel pfd-profile-panel">
                            <div class="pfd-profile-panel-header">
                                <span class="pfd-avatar">
                                    {{ strtoupper(substr(auth()->user()->name, 0, 1)) }}
                                </span>
                                <div>
                                    <strong>{{ auth()->user()->name }}</strong>
                                    <span>{{ auth()->user()->email }}</span>
                                </div>
                            </div>
                            <div class="pfd-profile-panel-links">
                                <a href="{{ route('admin.dashboard') }}"><i class="fa fa-th-large" aria-hidden="true"></i> Dashboard</a>
                                <a href="{{ route('home') }}" target="_blank"><i class="fa fa-globe" aria-hidden="true"></i> Visit Website</a>
                                <form action="{{ route('logout') }}" method="post">
                                    @csrf
                                    <button class="pfd-danger" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main id="pfdMainContent" class="pfd-content fade-in">
                @if($flashSuccess)
                    <div class="pfd-toast" style="margin-bottom: 20px; border-left-color: var(--pf-green);">
                        <i class="fa fa-check-circle" aria-hidden="true"></i>
                        <p>{{ $flashSuccess }}</p>
                    </div>
                @endif
                @if($flashError)
                    <div class="pfd-toast" style="margin-bottom: 20px; border-left-color: var(--pf-danger);">
                        <i class="fa fa-exclamation-circle" aria-hidden="true"></i>
                        <p>{{ $flashError }}</p>
                    </div>
                @endif
                @yield('content')
            </main>
        </div>
    </div>

    <script src="{{ asset('assets/js/dashboard.js') }}" defer></script>
    @stack('scripts')
</body>
</html>
