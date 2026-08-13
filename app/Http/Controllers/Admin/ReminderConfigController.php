<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class ReminderConfigController extends Controller
{
    public function index()
    {
        $config = [
            'reminder_7day' => Setting::get('reminder_7day', '1') === '1',
            'reminder_2day' => Setting::get('reminder_2day', '1') === '1',
            'reminder_today' => Setting::get('reminder_today', '1') === '1',
            'reminder_7day_days' => (int) Setting::get('reminder_7day_days', '7'),
            'reminder_2day_days' => (int) Setting::get('reminder_2day_days', '2'),
        ];
        return view('admin.reminder-config', compact('config'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'reminder_7day' => 'nullable|boolean',
            'reminder_2day' => 'nullable|boolean',
            'reminder_today' => 'nullable|boolean',
            'reminder_7day_days' => 'nullable|integer|min:1|max:30',
            'reminder_2day_days' => 'nullable|integer|min:1|max:10',
        ]);

        Setting::set('reminder_7day', $request->boolean('reminder_7day') ? '1' : '0');
        Setting::set('reminder_2day', $request->boolean('reminder_2day') ? '1' : '0');
        Setting::set('reminder_today', $request->boolean('reminder_today') ? '1' : '0');

        if ($request->filled('reminder_7day_days')) {
            Setting::set('reminder_7day_days', (string) $validated['reminder_7day_days']);
        }
        if ($request->filled('reminder_2day_days')) {
            Setting::set('reminder_2day_days', (string) $validated['reminder_2day_days']);
        }

        return redirect()->route('admin.reminder-config')->with('success', 'Reminder configuration updated successfully.');
    }
}
