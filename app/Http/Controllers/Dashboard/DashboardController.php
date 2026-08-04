<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.index', [
            'stats' => $store->stats(),
            'applications' => array_slice($store->applications(), 0, 4),
            'documents' => array_slice($store->documents(), 0, 4),
            'payments' => array_slice($store->payments(), 0, 4),
            'notifications' => array_slice($store->notifications(), 0, 5),
            'tickets' => $store->tickets(),
            'serviceMeta' => DemoDataStore::serviceMeta(),
        ]);
    }
}
