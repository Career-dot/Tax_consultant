<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\DeadlineRule;
use App\Models\Faq;
use App\Models\NotificationsLog;
use App\Models\PlannerSubscription;
use App\Models\Service;
use App\Models\TaxUpdate;
use App\Models\TeamMember;
use App\Models\User;
use App\Models\Document;
use App\Models\Payment;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'contacts' => Contact::count(),
            'pending_contacts' => Contact::where('status', 'pending')->count(),
            'subscriptions' => PlannerSubscription::where('is_active', true)->count(),
            'deadline_rules' => DeadlineRule::where('is_active', true)->count(),
            'notifications_sent' => NotificationsLog::where('status', 'sent')->count(),
            'notifications_failed' => NotificationsLog::where('status', 'failed')->count(),
            'services' => Service::count(),
            'faqs' => Faq::count(),
            'tax_updates' => TaxUpdate::count(),
            'team_members' => TeamMember::count(),
            'total_users' => User::count(),
            'total_clients' => User::where('role', 'client')->count(),
            'total_documents' => Document::count(),
            'pending_documents' => Document::where('status', 'pending')->count(),
            'total_payments' => Payment::count(),
            'pending_payments' => Payment::where('status', 'pending')->count(),
        ];

        $serviceStats = Service::withCount(['users as active_users_count' => function ($query) {
            $query->where('service_user.status', 'active');
        }])->orderBy('sort_order')->get();

        $recentContacts = Contact::latest()->take(5)->get();

        $upcomingDeadlines = PlannerSubscription::where('is_active', true)
            ->with('deadlines')
            ->get()
            ->pluck('deadlines')
            ->flatten()
            ->filter(fn ($d) => $d->due_date->gte(now()) && $d->due_date->lte(now()->addDays(30)))
            ->sortBy('due_date')
            ->take(10);

        $contactsChart = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $contactsChart[] = [
                'label' => $date->format('M'),
                'count' => Contact::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        $notificationsChart = [
            'sent' => NotificationsLog::where('status', 'sent')->count(),
            'failed' => NotificationsLog::where('status', 'failed')->count(),
            'queued' => NotificationsLog::where('status', 'queued')->count(),
        ];

        $subscribersChart = [];
        for ($i = 5; $i >= 0; $i--) {
            $date = now()->subMonths($i);
            $subscribersChart[] = [
                'label' => $date->format('M'),
                'count' => PlannerSubscription::whereYear('created_at', $date->year)
                    ->whereMonth('created_at', $date->month)
                    ->count(),
            ];
        }

        $contactStatusChart = [
            'pending' => Contact::where('status', 'pending')->count(),
            'contacted' => Contact::where('status', 'contacted')->count(),
            'resolved' => Contact::where('status', 'resolved')->count(),
        ];

        return view('admin.dashboard', compact(
            'stats',
            'serviceStats',
            'recentContacts',
            'upcomingDeadlines',
            'contactsChart',
            'notificationsChart',
            'subscribersChart',
            'contactStatusChart'
        ));
    }
}
