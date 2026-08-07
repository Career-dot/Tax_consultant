<?php

namespace App\Http\Controllers;

use App\Models\TaxUpdate;
use Illuminate\Http\Request;

class TaxUpdateController extends Controller
{
    public function index(Request $request)
    {
        $query = TaxUpdate::published()->latest('published_at');

        if ($request->has('category') && $request->category !== 'all') {
            $query->where('category', $request->category);
        }

        if ($request->has('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('title', 'like', '%' . $request->search . '%')
                  ->orWhere('content', 'like', '%' . $request->search . '%');
            });
        }

        $updates = $query->paginate(10);
        $categories = ['income_tax', 'sales_tax', 'withholding_tax', 'litigation', 'general'];

        return view('resources.index', compact('updates', 'categories'));
    }

    public function show($slug)
    {
        $update = TaxUpdate::where('slug', $slug)
            ->published()
            ->firstOrFail();

        return view('resources.show', compact('update'));
    }
}
