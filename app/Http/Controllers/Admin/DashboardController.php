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

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'contacts' => Contact::count(),
            'pending_contacts' => Contact::where('status', 'pending')->count(),
            'subscriptions' => PlannerSubscription::count(),
            'deadline_rules' => DeadlineRule::count(),
            'notifications_sent' => NotificationsLog::count(),
            'notifications_failed' => NotificationsLog::where('status', 'failed')->count(),
            'services' => Service::count(),
            'faqs' => Faq::count(),
            'tax_updates' => TaxUpdate::count(),
            'team_members' => TeamMember::count(),
        ];

        $serviceStats = Service::withCount('users')->get()->map(function ($service) {
            $service->active_users_count = $service->users()->wherePivot('status', 'active')->count();
            return $service;
        });

        $recentContacts = Contact::latest()->take(5)->get();

        $upcomingDeadlines = DeadlineRule::where('is_active', true)
            ->orderBy('name')
            ->take(5)
            ->get();

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
