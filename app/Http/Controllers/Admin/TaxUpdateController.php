<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TaxUpdate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TaxUpdateController extends Controller
{
    public function index()
    {
        $updates = TaxUpdate::latest()->paginate(20);
        return view('admin.tax-updates.index', compact('updates'));
    }

    public function create()
    {
        return view('admin.tax-updates.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tax_updates,slug',
            'content' => 'required|string',
            'category' => 'nullable|in:income_tax,sales_tax,withholding_tax,litigation,general',
            'tags' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['is_published'])) {
            $validated['published_at'] = now();
        }
        $validated['author_id'] = auth()->id();

        if ($request->hasFile('featured_image')) {
            $validated['featured_image'] = $request->file('featured_image')->store('tax-updates', 'public');
        } else {
            unset($validated['featured_image']);
        }

        TaxUpdate::create($validated);

        return redirect()->route('admin.tax-updates.index')->with('success', 'Tax update created successfully.');
    }

    public function edit(TaxUpdate $taxUpdate)
    {
        return view('admin.tax-updates.edit', ['update' => $taxUpdate]);
    }

    public function update(Request $request, TaxUpdate $taxUpdate)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:tax_updates,slug,' . $taxUpdate->id,
            'content' => 'required|string',
            'category' => 'nullable|in:income_tax,sales_tax,withholding_tax,litigation,general',
            'tags' => 'nullable|string|max:500',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'boolean',
        ]);

        if (!empty($validated['is_published']) && !$taxUpdate->published_at) {
            $validated['published_at'] = now();
        }

        if ($request->hasFile('featured_image')) {
            if ($taxUpdate->featured_image) {
                Storage::disk('public')->delete($taxUpdate->featured_image);
            }
            $validated['featured_image'] = $request->file('featured_image')->store('tax-updates', 'public');
        } else {
            unset($validated['featured_image']);
        }

        $taxUpdate->update($validated);

        return redirect()->route('admin.tax-updates.index')->with('success', 'Tax update updated successfully.');
    }

    public function destroy(TaxUpdate $taxUpdate)
    {
        $taxUpdate->delete();
        return redirect()->route('admin.tax-updates.index')->with('success', 'Tax update deleted successfully.');
    }
}
