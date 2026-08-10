<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NotificationsLog;

class NotificationController extends Controller
{
    public function index()
    {
        $notifications = NotificationsLog::latest()->paginate(50);
        return view('admin.notifications.index', compact('notifications'));
    }
}
