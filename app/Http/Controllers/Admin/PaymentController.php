<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Jobs\SendPaymentStatusEmail;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['user', 'service'])->latest()->paginate(20);
        return view('admin.payments', compact('payments'));
    }

    public function approvePayment(Payment $payment)
    {
        $payment->update(['status' => 'approved', 'verified_at' => now()]);

        SendPaymentStatusEmail::dispatch($payment, 'approved');

        return redirect()->back()->with('success', 'Payment approved successfully.');
    }

    public function rejectPayment(Request $request, Payment $payment)
    {
        $request->validate([
            'admin_notes' => 'required|string|max:500',
        ]);

        $payment->update([
            'status' => 'rejected',
            'admin_notes' => $request->admin_notes,
        ]);

        SendPaymentStatusEmail::dispatch($payment, 'rejected');

        return redirect()->back()->with('success', 'Payment rejected.');
    }
}
