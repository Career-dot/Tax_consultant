<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.notifications.index', [
            'notifications' => $store->notifications(),
        ]);
    }

    public function markRead(Request $request, string $notification): RedirectResponse
    {
        $store = new DemoDataStore($request->user());
        $store->markNotificationRead($notification);

        return back();
    }

    public function markAllRead(Request $request): RedirectResponse
    {
        $store = new DemoDataStore($request->user());
        $store->markAllNotificationsRead();

        return back()->with('status', 'notifications-cleared');
    }
}
