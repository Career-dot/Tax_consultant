<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'service'])->latest()->paginate(20);
        return view('admin.payments', compact('payments'));
    }

    public function approve(Payment $payment)
    {
        $payment->update([
            'status' => 'approved',
            'verified_at' => now(),
        ]);

        try {
            \Illuminate\Support\Facades\Mail::to($payment->user->email)->send(new \App\Mail\PaymentStatusEmail($payment, 'approved'));
        } catch (\Exception $e) {
            \Log::error('Payment email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Payment approved successfully.');
    }

    public function reject(Payment $payment)
    {
        $payment->update([
            'status' => 'rejected',
        ]);

        try {
            \Illuminate\Support\Facades\Mail::to($payment->user->email)->send(new \App\Mail\PaymentStatusEmail($payment, 'rejected'));
        } catch (\Exception $e) {
            \Log::error('Payment email failed: ' . $e->getMessage());
        }

        return back()->with('success', 'Payment rejected.');
    }
}
