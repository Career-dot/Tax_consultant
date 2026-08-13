<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Notification;
use App\Models\Payment;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user()->load('services', 'activeServices');

        $activeServices = $user->activeServices;
        $latestApplication = $activeServices->first();

        $fields = [$user->name, $user->email, $user->phone, $user->cnic, $user->address, $user->city, $user->avatar_path];
        $filled = collect($fields)->filter(fn ($value) => filled($value))->count();
        $profileCompletion = (int) round(($filled / count($fields)) * 100);

        $pendingPaymentsCount = Payment::where('user_id', $user->id)->where('status', 'pending')->count();
        $pendingPaymentsTotal = Payment::where('user_id', $user->id)->where('status', 'pending')->sum('amount');

        $pendingDocuments = Document::where('user_id', $user->id)->where('status', 'pending')->count();
        $unreadNotifications = Notification::where('user_id', $user->id)->where('is_read', false)->count();

        $stats = [
            'active_applications' => $activeServices->count(),
            'pending_documents' => $pendingDocuments,
            'pending_payments_count' => $pendingPaymentsCount,
            'pending_payments_total' => $pendingPaymentsTotal,
            'open_tickets' => 0,
            'unread_notifications' => $unreadNotifications,
            'profile_completion' => $profileCompletion,
        ];

        return view('dashboard.index', [
            'user' => $user,
            'stats' => $stats,
            'activeServices' => $activeServices,
            'latestApplication' => $latestApplication,
            'payments' => Payment::where('user_id', $user->id)->latest()->take(4)->get(),
            'documents' => Document::where('user_id', $user->id)->latest()->take(5)->get(),
            'notifications' => Notification::where('user_id', $user->id)->latest()->take(5)->get(),
            'tickets' => [],
        ]);
    }
}
