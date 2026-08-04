@extends('layouts.dashboard')

@section('title', 'Notifications - Tax Consultant')

@section('content')
    @php
        $typeIcons = [
            'application' => 'pe-7s-note2',
            'payment' => 'pe-7s-wallet',
            'document' => 'pe-7s-cloud-upload',
            'support' => 'pe-7s-ticket',
            'system' => 'pe-7s-bell',
        ];
        $unread = collect($notifications)->where('read', false)->values();
        $read = collect($notifications)->where('read', true)->values();
    @endphp

    <x-dashboard.page-header title="Notifications" subtitle="Stay on top of every update to your account." :breadcrumb="[['label' => 'Dashboard', 'url' => route('dashboard.index')], ['label' => 'Notifications']]">
        <x-slot:actions>
            <form action="{{ route('dashboard.notifications.readAll') }}" method="post">
                @csrf
                <button class="pfd-btn pfd-btn-outline" type="submit"><i class="fa fa-check" aria-hidden="true"></i> Mark all as read</button>
            </form>
        </x-slot:actions>
    </x-dashboard.page-header>

    <div class="pfd-tabs pfd-reveal" style="margin-bottom:20px;" data-tabs="#notificationPanels">
        <button class="pfd-tab is-active" data-tab-trigger="all">All ({{ count($notifications) }})</button>
        <button class="pfd-tab" data-tab-trigger="unread">Unread ({{ $unread->count() }})</button>
        <button class="pfd-tab" data-tab-trigger="read">Read ({{ $read->count() }})</button>
    </div>

    <div id="notificationPanels">
        @foreach (['all' => $notifications, 'unread' => $unread->all(), 'read' => $read->all()] as $key => $list)
            <div class="pfd-card pfd-tab-panel {{ $key === 'all' ? 'is-active' : '' }}" data-tab-panel="{{ $key }}">
                @if (count($list))
                    @foreach ($list as $notification)
                        <div class="pfd-dropdown-item {{ $notification['read'] ? '' : 'is-unread' }}" style="padding:16px 22px;">
                            <span class="pfd-dropdown-icon"><i class="{{ $typeIcons[$notification['type']] ?? 'pe-7s-bell' }}" aria-hidden="true"></i></span>
                            <div style="flex:1;">
                                <p>{{ $notification['title'] }}</p>
                                <span>{{ $notification['message'] }}</span><br>
                                <span>{{ \Carbon\Carbon::parse($notification['created_at'])->diffForHumans() }}</span>
                            </div>
                            @if (! $notification['read'])
                                <form action="{{ route('dashboard.notifications.read', $notification['id']) }}" method="post">
                                    @csrf
                                    <button class="pfd-btn pfd-btn-outline pfd-btn-sm" type="submit">Mark read</button>
                                </form>
                            @endif
                        </div>
                    @endforeach
                @else
                    <x-dashboard.empty-state icon="pe-7s-bell" title="Nothing here" text="You have no notifications in this category." />
                @endif
            </div>
        @endforeach
    </div>
@endsection
