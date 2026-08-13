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
        $deadlines = $this->calculateDeadlines($rules, 12);

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
            array_merge($validated, ['session_token' => $sessionToken])
        );

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

        $html = view('emails.planner_pdf', compact('deadlines', 'subscription'))->render();

        try {
            $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadHtml($html)
                ->setPaper('a4')
                ->setOption('isRemoteEnabled', true);

            return $pdf->download('finanic_tax_calendar.pdf');
        } catch (\Exception $e) {
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
                ->header('Content-Type', 'text/plain')
                ->header('Content-Disposition', 'attachment; filename="finanic_tax_calendar.txt"');
        }
    }

    private function calculateDeadlines($rules, $monthsAhead = 12)
    {
        $deadlines = [];
        $now = Carbon::now();
        $end = $now->copy()->addMonths($monthsAhead);

        foreach ($rules as $rule) {
            $current = $now->copy();
            $safetyCounter = 0;

            while ($current->lte($end) && $safetyCounter < 100) {
                $safetyCounter++;
                $nextDate = $this->getNextDeadlineDate($rule, $current);

                if (!$nextDate || $nextDate->gt($end)) {
                    break;
                }

                $deadlines[] = [
                    'name' => $rule->name,
                    'description' => $rule->description,
                    'due_date' => $nextDate->format('Y-m-d'),
                    'days_until' => $now->diffInDays($nextDate),
                    'deadline_type' => $rule->deadline_type,
                    'statutory_basis' => $rule->statutory_basis,
                ];

                $current = $nextDate->copy()->addDay();
            }
        }

        usort($deadlines, fn ($a, $b) => strtotime($a['due_date']) - strtotime($b['due_date']));

        return $deadlines;
    }

    private function getNextDeadlineDate($rule, $from)
    {
        switch ($rule->frequency) {
            case 'monthly':
                $next = $from->copy()->addMonth()->startOfMonth();
                if ($rule->day_of_month) {
                    $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                } else {
                    $next->day(18);
                }
                if ($next->lte($from)) {
                    $next->addMonth();
                    if ($rule->day_of_month) {
                        $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                    }
                }
                return $next;

            case 'quarterly':
                $next = $from->copy()->addMonth()->startOfMonth();
                while ($next->month % 3 !== 0) {
                    $next->addMonth();
                }
                if ($rule->day_of_month) {
                    $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                } else {
                    $next->day(15);
                }
                if ($next->lte($from)) {
                    $next->addMonths(3)->startOfMonth();
                    while ($next->month % 3 !== 0) {
                        $next->addMonth();
                    }
                    if ($rule->day_of_month) {
                        $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                    } else {
                        $next->day(15);
                    }
                }
                return $next;

            case 'annually':
                $next = $from->copy()->addYear()->startOfMonth();
                if ($rule->day_of_month && $rule->month_of_quarter) {
                    $next->month((int) $rule->month_of_quarter);
                    $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                } else {
                    $next->month(9)->day(30);
                }
                if ($next->lte($from)) {
                    $next->addYear();
                    if ($rule->day_of_month && $rule->month_of_quarter) {
                        $next->month((int) $rule->month_of_quarter);
                        $next->day(min((int) $rule->day_of_month, $next->daysInMonth));
                    }
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

        $existingDeadlines = PlannerDeadline::where('planner_subscription_id', $subscription->id)
            ->pluck('deadline_rule_id')
            ->toArray();

        foreach ($rules as $rule) {
            if (in_array($rule->id, $existingDeadlines)) {
                continue;
            }

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
            $ics .= "DTSTART;VALUE=DATE:" . $deadline->due_date->format('Ymd') . "\r\n";
            $ics .= "DTEND;VALUE=DATE:" . $deadline->due_date->addDay()->format('Ymd') . "\r\n";
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
