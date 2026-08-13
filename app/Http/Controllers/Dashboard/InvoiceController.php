<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $payments = Payment::where('user_id', $request->user()->id)
            ->with('service')
            ->latest()
            ->get();

        return view('dashboard.invoices.index', [
            'invoices' => $payments,
        ]);
    }

    public function show(Request $request, Payment $invoice)
    {
        abort_unless($invoice->user_id === $request->user()->id, 403);

        $invoice->load('service', 'user');

        return view('dashboard.invoices.show', [
            'invoice' => $invoice,
            'user' => $request->user(),
        ]);
    }
}
