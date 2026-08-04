@php
    $navStore = new \App\Support\Dashboard\DemoDataStore(auth()->user());
    $navStats = $navStore->stats();
@endphp

<aside class="pfd-sidebar">
    <a class="pfd-sidebar-brand" href="{{ route('dashboard.index') }}">
        <span class="pfd-sidebar-brand-mark">
            <img class="pfd-sidebar-brand-logo pfd-sidebar-brand-logo-full" src="{{ asset('assets/images/logo/logo.jpeg') }}" alt="Tax Consultant">
            <img class="pfd-sidebar-brand-logo pfd-sidebar-brand-logo-compact" src="{{ asset('assets/images/logo/logo-2.jpeg') }}" alt="Tax Consultant">
        </span>
        <!-- <span>Tax Consultant</span> -->
    </a>

    <nav class="pfd-sidebar-nav" aria-label="Dashboard navigation">
        <div class="pfd-nav-group">
            <ul class="pfd-nav-list">
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.index') ? 'is-active' : '' }}" href="{{ route('dashboard.index') }}">
                        <i class="pe-7s-rocket" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.profile') ? 'is-active' : '' }}" href="{{ route('dashboard.profile') }}">
                        <i class="pe-7s-user" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">My Profile</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="pfd-nav-group">
            <p class="pfd-nav-label">Start Filing</p>
            <ul class="pfd-nav-list">
                @foreach (\App\Support\Dashboard\DemoDataStore::serviceMeta() as $slug => $meta)
                    <li>
                        <a class="pfd-nav-link {{ request()->routeIs('dashboard.filing.create') && request()->route('service') === $slug ? 'is-active' : '' }}" href="{{ route('dashboard.filing.create', $slug) }}">
                            <i class="{{ $meta['icon'] }}" aria-hidden="true"></i>
                            <span class="pfd-nav-link-text">{{ $meta['label'] }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="pfd-nav-group">
            <p class="pfd-nav-label">My Filings</p>
            <ul class="pfd-nav-list">
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.applications*') ? 'is-active' : '' }}" href="{{ route('dashboard.applications') }}">
                        <i class="pe-7s-note2" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">My Applications</span>
                        @if ($navStats['active_applications'] > 0)
                            <span class="pfd-nav-badge">{{ $navStats['active_applications'] }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.documents') ? 'is-active' : '' }}" href="{{ route('dashboard.documents') }}">
                        <i class="pe-7s-cloud-upload" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Uploaded Documents</span>
                        @if ($navStats['pending_documents'] > 0)
                            <span class="pfd-nav-badge">{{ $navStats['pending_documents'] }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.payments') ? 'is-active' : '' }}" href="{{ route('dashboard.payments') }}">
                        <i class="pe-7s-wallet" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Payments</span>
                        @if ($navStats['pending_payments_count'] > 0)
                            <span class="pfd-nav-badge">{{ $navStats['pending_payments_count'] }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.invoices*') ? 'is-active' : '' }}" href="{{ route('dashboard.invoices') }}">
                        <i class="pe-7s-cash" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Invoices</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="pfd-nav-group">
            <p class="pfd-nav-label">Support</p>
            <ul class="pfd-nav-list">
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.support*') ? 'is-active' : '' }}" href="{{ route('dashboard.support') }}">
                        <i class="pe-7s-ticket" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Support Tickets</span>
                        @if ($navStats['open_tickets'] > 0)
                            <span class="pfd-nav-badge">{{ $navStats['open_tickets'] }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.notifications') ? 'is-active' : '' }}" href="{{ route('dashboard.notifications') }}">
                        <i class="pe-7s-bell" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Notifications</span>
                        @if ($navStats['unread_notifications'] > 0)
                            <span class="pfd-nav-badge">{{ $navStats['unread_notifications'] }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>

        <div class="pfd-nav-group">
            <ul class="pfd-nav-list">
                <li>
                    <a class="pfd-nav-link {{ request()->routeIs('dashboard.settings') ? 'is-active' : '' }}" href="{{ route('dashboard.settings') }}">
                        <i class="pe-7s-settings" aria-hidden="true"></i>
                        <span class="pfd-nav-link-text">Settings</span>
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
