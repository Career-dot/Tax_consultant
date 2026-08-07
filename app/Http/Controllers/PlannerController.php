<?php

namespace App\Http\Controllers;

use App\Models\DeadlineRule;
use App\Models\PlannerSubscription;
use App\Models\PlannerDeadline;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

class PlannerController extends Controller
{
    public function index()
    {
        return view('planner.index');
    }

    public function getDeadlines(Request $request)
    {
        $validated = $request->validate([
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'has_sales_tax' => 'boolean',
            'has_withholding_agent' => 'boolean',
            'sector' => 'nullable|string',
        ]);

        $query = DeadlineRule::where('is_active', true)
            ->forTaxpayer($validated['taxpayer_type']);

        if (!empty($validated['has_sales_tax']) && $validated['has_sales_tax']) {
            $query->withSalesTax();
        }

        if (!empty($validated['has_withholding_agent']) && $validated['has_withholding_agent']) {
            $query->withWithholdingAgent();
        }

        if (!empty($validated['sector'])) {
            $query->forSector($validated['sector']);
        }

        $rules = $query->get();
        $deadlines = $this->calculateDeadlines($rules);

        return response()->json([
            'deadlines' => $deadlines,
            'taxpayer_type' => $validated['taxpayer_type'],
        ]);
    }

    public function subscribe(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'taxpayer_type' => 'required|in:salaried_individual,business_individual,aop,company',
            'has_sales_tax' => 'boolean',
            'has_withholding_agent' => 'boolean',
            'sector' => 'nullable|string',
            'email_reminders' => 'boolean',
            'sms_reminders' => 'boolean',
        ]);

        $sessionToken = $request->session()->token();

        $subscription = PlannerSubscription::updateOrCreate(
            ['session_token' => $sessionToken],
            $validated + ['session_token' => $sessionToken]
        );

        // Generate deadlines for this subscription
        $this->generateDeadlinesForSubscription($subscription);

        return response()->json([
            'success' => true,
            'subscription_id' => $subscription->id,
            'message' => 'You have been subscribed to deadline reminders.',
        ]);
    }

    public function myDeadlines(Request $request)
    {
        $sessionToken = $request->session()->token();

        $subscription = PlannerSubscription::where('session_token', $sessionToken)
            ->with('deadlines')
            ->first();

        if (!$subscription) {
            return response()->json(['deadlines' => []]);
        }

        $deadlines = $subscription->deadlines()
            ->upcoming()
            ->orderBy('due_date')
            ->get();

        return response()->json([
            'subscription' => $subscription,
            'deadlines' => $deadlines,
        ]);
    }

    public function exportIcs(Request $request)
    {
        $sessionToken = $request->session()->token();

        $subscription = PlannerSubscription::where('session_token', $sessionToken)
            ->first();

        if (!$subscription) {
            return redirect()->route('planner.index')->with('error', 'No subscription found.');
        }

        $deadlines = $subscription->deadlines()
            ->upcoming()
            ->orderBy('due_date')
            ->get();

        $icsContent = $this->generateIcsContent($deadlines, $subscription);

        return response($icsContent)
            ->header('Content-Type', 'text/calendar')
            ->header('Content-Disposition', 'attachment; filename="finanic_tax_deadlines.ics"');
    }

    public function exportPdf(Request $request)
    {
        $sessionToken = $request->session()->token();

        $subscription = PlannerSubscription::where('session_token', $sessionToken)
            ->first();

        if (!$subscription) {
            return redirect()->route('planner.index')->with('error', 'No subscription found.');
        }

        $deadlines = $subscription->deadlines()
            ->upcoming()
            ->orderBy('due_date')
            ->get();

        // For now, return a simple text-based PDF content
        // In production, use a PDF library like dompdf or barryvdh/laravel-dompdf
        $content = "FINANIC Business Consultants - Tax Compliance Calendar\n";
        $content .= "Generated: " . now()->format('F j, Y') . "\n";
        $content .= str_repeat('=', 60) . "\n\n";

        foreach ($deadlines as $deadline) {
            $content .= $deadline->due_date->format('F j, Y') . " - " . $deadline->name . "\n";
            if ($deadline->description) {
                $content .= "  " . $deadline->description . "\n";
            }
            $content .= "\n";
        }

        return response($content)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="finanic_tax_calendar.pdf"');
    }

    private function calculateDeadlines($rules)
    {
        $deadlines = [];
        $now = Carbon::now();

        foreach ($rules as $rule) {
            $nextDate = $this->getNextDeadlineDate($rule, $now);
            if ($nextDate) {
                $deadlines[] = [
                    'name' => $rule->name,
                    'description' => $rule->description,
                    'due_date' => $nextDate->format('Y-m-d'),
                    'days_until' => $now->diffInDays($nextDate),
                    'deadline_type' => $rule->deadline_type,
                    'statutory_basis' => $rule->statutory_basis,
                ];
            }
        }

        usort($deadlines, function ($a, $b) {
            return strtotime($a['due_date']) - strtotime($b['due_date']);
        });

        return $deadlines;
    }

    private function getNextDeadlineDate($rule, $from)
    {
        switch ($rule->frequency) {
            case 'monthly':
                $next = $from->copy()->addMonth();
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(18); // Default: 18th for monthly sales tax
                }
                if ($next->lte($from)) {
                    $next->addMonth();
                }
                return $next;

            case 'quarterly':
                $next = $from->copy()->addMonth();
                while ($next->month % 3 !== 0) {
                    $next->addMonth();
                }
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(15); // Default: 15th of last month of quarter
                }
                if ($next->lte($from)) {
                    $next->addMonths(3);
                    while ($next->month % 3 !== 0) {
                        $next->addMonth();
                    }
                    if ($rule->day_of_month) {
                        $next->day((int) $rule->day_of_month);
                    } else {
                        $next->day(15);
                    }
                }
                return $next;

            case 'annually':
                $next = $from->copy()->addYear();
                $next->month(9); // Default: September for annual returns
                if ($rule->day_of_month) {
                    $next->day((int) $rule->day_of_month);
                } else {
                    $next->day(30);
                }
                if ($next->lte($from)) {
                    $next->addYear();
                }
                return $next;

            default:
                return null;
        }
    }

    private function generateDeadlinesForSubscription($subscription)
    {
        $rules = DeadlineRule::where('is_active', true)
            ->forTaxpayer($subscription->taxpayer_type);

        if ($subscription->has_sales_tax) {
            $rules->withSalesTax();
        }

        if ($subscription->has_withholding_agent) {
            $rules->withWithholdingAgent();
        }

        if ($subscription->sector) {
            $rules->forSector($subscription->sector);
        }

        $rules = $rules->get();

        foreach ($rules as $rule) {
            $nextDate = $this->getNextDeadlineDate($rule, Carbon::now());
            if ($nextDate) {
                PlannerDeadline::create([
                    'planner_subscription_id' => $subscription->id,
                    'deadline_rule_id' => $rule->id,
                    'name' => $rule->name,
                    'due_date' => $nextDate,
                    'description' => $rule->description,
                ]);
            }
        }
    }

    private function generateIcsContent($deadlines, $subscription)
    {
        $ics = "BEGIN:VCALENDAR\r\n";
        $ics .= "VERSION:2.0\r\n";
        $ics .= "PRODID:-//FINANIC Business Consultants//Tax Planner//EN\r\n";
        $ics .= "CALSCALE:GREGORIAN\r\n";

        foreach ($deadlines as $deadline) {
            $ics .= "BEGIN:VEVENT\r\n";
            $ics .= "DTSTART:" . $deadline->due_date->format('Ymd') . "\r\n";
            $ics .= "DTEND:" . $deadline->due_date->format('Ymd') . "\r\n";
            $ics .= "SUMMARY:" . $this->escapeIcs($deadline->name) . "\r\n";
            if ($deadline->description) {
                $ics .= "DESCRIPTION:" . $this->escapeIcs($deadline->description) . "\r\n";
            }
            $ics .= "UID:" . $deadline->id . "@finanic.com\r\n";
            $ics .= "END:VEVENT\r\n";
        }

        $ics .= "END:VCALENDAR\r\n";
        return $ics;
    }

    private function escapeIcs($text)
    {
        return str_replace(
            ["\\", ",", "\n", ";"],
            ["\\\\", "\\,", "\\n", "\\;"],
            $text
        );
    }
}
