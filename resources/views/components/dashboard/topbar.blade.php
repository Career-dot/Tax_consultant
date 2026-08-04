@php
    $topbarStore = new \App\Support\Dashboard\DemoDataStore(auth()->user());
    $topbarNotifications = array_slice($topbarStore->notifications(), 0, 5);
    $topbarUnread = collect($topbarNotifications)->where('read', false)->count();
    $topbarUser = auth()->user();
@endphp

<header class="pfd-topbar">
    <button class="pfd-sidebar-toggle" type="button" data-sidebar-toggle aria-label="Collapse sidebar">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>
    <button class="pfd-mobile-toggle" type="button" data-mobile-toggle aria-label="Open menu">
        <i class="fa fa-bars" aria-hidden="true"></i>
    </button>

    <div class="pfd-search">
        <i class="fa fa-search" aria-hidden="true"></i>
        <input type="search" placeholder="Search applications, documents, invoices...">
    </div>

    <div class="pfd-topbar-spacer"></div>

    <div class="pfd-topbar-actions">
        <!-- <button class="pfd-icon-btn pfd-theme-toggle" type="button" data-theme-toggle aria-label="Toggle dark mode">
            <i class="fa fa-moon-o" aria-hidden="true"></i>
            <i class="fa fa-sun-o" aria-hidden="true"></i>
        </button> -->

        <div class="pfd-dropdown" data-dropdown>
            <button class="pfd-icon-btn" type="button" data-dropdown-trigger aria-label="Notifications">
                <i class="fa fa-bell-o" aria-hidden="true"></i>
                @if ($topbarUnread > 0)
                    <span class="pfd-dot">{{ $topbarUnread }}</span>
                @endif
            </button>
            <div class="pfd-dropdown-panel">
                <div class="pfd-dropdown-header">
                    <h6>Notifications</h6>
                    <form action="{{ route('dashboard.notifications.readAll') }}" method="post">
                        @csrf
                        <button type="submit">Mark all read</button>
                    </form>
                </div>
                @forelse ($topbarNotifications as $notification)
                    <div class="pfd-dropdown-item {{ $notification['read'] ? '' : 'is-unread' }}">
                        <span class="pfd-dropdown-icon"><i class="fa fa-bell" aria-hidden="true"></i></span>
                        <div>
                            <p>{{ $notification['title'] }}</p>
                            <span>{{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</span>
                        </div>
                    </div>
                @empty
                    <div class="pfd-dropdown-item"><p>You're all caught up.</p></div>
                @endforelse
                <div class="pfd-dropdown-footer">
                    <a href="{{ route('dashboard.notifications') }}">View all notifications</a>
                </div>
            </div>
        </div>

        <div class="pfd-dropdown" data-dropdown>
            <button class="pfd-profile-toggle" type="button" data-dropdown-trigger>
                <span class="pfd-avatar">
                    @if ($topbarUser->avatarUrl())
                        <img src="{{ $topbarUser->avatarUrl() }}" alt="{{ $topbarUser->name }}">
                    @else
                        {{ $topbarUser->initials() }}
                    @endif
                </span>
                <span class="pfd-profile-toggle-name">{{ $topbarUser->name }}</span>
                <i class="fa fa-angle-down" aria-hidden="true"></i>
            </button>
            <div class="pfd-dropdown-panel pfd-profile-panel">
                <div class="pfd-profile-panel-header">
                    <span class="pfd-avatar">
                        @if ($topbarUser->avatarUrl())
                            <img src="{{ $topbarUser->avatarUrl() }}" alt="{{ $topbarUser->name }}">
                        @else
                            {{ $topbarUser->initials() }}
                        @endif
                    </span>
                    <div>
                        <strong>{{ $topbarUser->name }}</strong>
                        <span>{{ $topbarUser->email }}</span>
                    </div>
                </div>
                <div class="pfd-profile-panel-links">
                    <a href="{{ route('dashboard.profile') }}"><i class="fa fa-user-o" aria-hidden="true"></i> My Profile</a>
                    <a href="{{ route('dashboard.settings') }}"><i class="fa fa-cog" aria-hidden="true"></i> Settings</a>
                    <a href="{{ url('/') }}"><i class="fa fa-globe" aria-hidden="true"></i> Visit Website</a>
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <button class="pfd-danger" type="submit"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</header>
