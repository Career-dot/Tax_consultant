<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PlannerSubscription;

class SubscriberController extends Controller
{
    public function index()
    {
        $subscribers = PlannerSubscription::latest()->paginate(20);
        return view('admin.subscribers.index', compact('subscribers'));
    }
}
