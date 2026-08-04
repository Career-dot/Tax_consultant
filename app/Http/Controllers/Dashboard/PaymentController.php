<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.payments.index', [
            'payments' => $store->payments(),
            'stats' => $store->stats(),
        ]);
    }

    public function pay(Request $request, string $payment): RedirectResponse
    {
        $store = new DemoDataStore($request->user());
        $store->markPaymentPaid($payment);

        return back()->with('status', 'payment-completed');
    }
}
