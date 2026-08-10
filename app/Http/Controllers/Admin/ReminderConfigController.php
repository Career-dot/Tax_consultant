<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReminderConfigController extends Controller
{
    public function index()
    {
        $config = [
            'reminder_7day' => config('planner.reminder_7day', true),
            'reminder_2day' => config('planner.reminder_2day', true),
            'reminder_today' => config('planner.reminder_today', true),
        ];
        return view('admin.reminder-config', compact('config'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'reminder_7day' => 'boolean',
            'reminder_2day' => 'boolean',
            'reminder_today' => 'boolean',
        ]);

        return redirect()->route('admin.reminder-config')->with('success', 'Reminder configuration updated successfully.');
    }
}
