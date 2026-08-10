<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();
        
        // Active services
        $activeServices = $user->services()->wherePivot('status', 'active')->get();
        $latestApplication = $activeServices->first(); // Just use the first active service as 'latest application'
        
        // Profile completion
        $fields = [$user->name, $user->email, $user->phone, $user->cnic, $user->address, $user->city, $user->avatar_path];
        $filled = collect($fields)->filter(fn ($value) => filled($value))->count();
        $profileCompletion = (int) round(($filled / count($fields)) * 100);

        // Stats
        $pendingPaymentsCount = \App\Models\Payment::where('user_id', $user->id)->where('status', 'pending')->count();
        $pendingPaymentsTotal = \App\Models\Payment::where('user_id', $user->id)->where('status', 'pending')->sum('amount');
        
        $stats = [
            'active_applications' => $activeServices->count(),
            'pending_documents' => 0, // Implement real document count when documents module is built
            'pending_payments_count' => $pendingPaymentsCount,
            'pending_payments_total' => $pendingPaymentsTotal,
            'open_tickets' => 0, // Implement real tickets count when support module is built
            'profile_completion' => $profileCompletion,
        ];

        return view('dashboard.index', [
            'user' => $user,
            'stats' => $stats,
            'activeServices' => $activeServices,
            'latestApplication' => $latestApplication,
            'payments' => \App\Models\Payment::where('user_id', $user->id)->latest()->take(4)->get(),
            'documents' => [], // real documents later
            'notifications' => [], // real notifications later
            'tickets' => [], // real tickets later
        ]);
    }
}
