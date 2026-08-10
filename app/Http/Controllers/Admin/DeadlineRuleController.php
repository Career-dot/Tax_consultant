<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeadlineRule;
use Illuminate\Http\Request;

class DeadlineRuleController extends Controller
{
    public function index()
    {
        $rules = DeadlineRule::orderBy('taxpayer_type')->orderBy('name')->get();
        return view('admin.deadline-rules.index', compact('rules'));
    }

    public function create()
    {
        return view('admin.deadline-rules.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'requires_sales_tax' => 'boolean',
            'requires_withholding_agent' => 'boolean',
            'sector' => 'nullable|string|max:255',
            'deadline_type' => 'required|in:monthly_sales_tax,withholding_statement,advance_tax,annual_return,wealth_statement',
            'frequency' => 'required|in:monthly,quarterly,annually',
            'day_of_month' => 'nullable|string|max:10',
            'month_of_quarter' => 'nullable|string|max:10',
            'custom_date_rule' => 'nullable|string',
            'statutory_basis' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        DeadlineRule::create($validated);

        return redirect()->route('admin.deadline-rules.index')->with('success', 'Deadline rule created successfully.');
    }

    public function edit(DeadlineRule $deadlineRule)
    {
        return view('admin.deadline-rules.edit', ['rule' => $deadlineRule]);
    }

    public function update(Request $request, DeadlineRule $deadlineRule)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'requires_sales_tax' => 'boolean',
            'requires_withholding_agent' => 'boolean',
            'sector' => 'nullable|string|max:255',
            'deadline_type' => 'required|in:monthly_sales_tax,withholding_statement,advance_tax,annual_return,wealth_statement',
            'frequency' => 'required|in:monthly,quarterly,annually',
            'day_of_month' => 'nullable|string|max:10',
            'month_of_quarter' => 'nullable|string|max:10',
            'custom_date_rule' => 'nullable|string',
            'statutory_basis' => 'nullable|string|max:255',
            'is_active' => 'boolean',
        ]);

        $deadlineRule->update($validated);

        return redirect()->route('admin.deadline-rules.index')->with('success', 'Deadline rule updated successfully.');
    }

    public function destroy(DeadlineRule $deadlineRule)
    {
        $deadlineRule->delete();
        return redirect()->route('admin.deadline-rules.index')->with('success', 'Deadline rule deleted successfully.');
    }
}
