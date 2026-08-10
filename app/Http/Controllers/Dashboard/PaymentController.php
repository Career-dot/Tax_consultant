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
        $user = $request->user();
        $payments = \App\Models\Payment::where('user_id', $user->id)->latest()->get();
        
        $pendingPayments = $payments->where('status', 'pending');
        $paidPayments = $payments->where('status', 'approved');

        // Services that need payment
        $servicesNeedingPayment = $user->services()->wherePivot('status', 'active')->get()->filter(function ($service) use ($user) {
            // Check if there's an approved or pending payment for this service
            $hasPayment = \App\Models\Payment::where('user_id', $user->id)
                ->where('service_id', $service->id)
                ->whereIn('status', ['approved', 'pending'])
                ->exists();
            return !$hasPayment;
        });

        return view('dashboard.payments.index', [
            'payments' => $payments,
            'pendingPayments' => $pendingPayments,
            'paidPayments' => $paidPayments,
            'servicesNeedingPayment' => $servicesNeedingPayment,
        ]);
    }

    public function pay(Request $request)
    {
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'screenshot' => 'required|image|max:2048',
        ]);

        $service = \App\Models\Service::findOrFail($request->service_id);
        
        $path = $request->file('screenshot')->store('payments', 'public');

        \App\Models\Payment::create([
            'user_id' => $request->user()->id,
            'service_id' => $service->id,
            'amount' => $service->price ?? 0,
            'screenshot_path' => $path,
            'status' => 'pending',
        ]);

        return back()->with('success', 'Payment receipt uploaded successfully. Waiting for admin approval.');
    }
}
