<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Support\Dashboard\DemoDataStore;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
        $store = new DemoDataStore($request->user());

        return view('dashboard.invoices.index', [
            'invoices' => $store->invoices(),
        ]);
    }

    public function show(Request $request, string $invoice)
    {
        $store = new DemoDataStore($request->user());
        $record = $store->invoice($invoice);

        abort_if(! $record, Response::HTTP_NOT_FOUND);

        return view('dashboard.invoices.show', [
            'invoice' => $record,
            'user' => $request->user(),
        ]);
    }
}
