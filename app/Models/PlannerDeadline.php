<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PlannerDeadline extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'planner_subscription_id',
        'deadline_rule_id',
        'name',
        'due_date',
        'description',
        'reminder_7day_sent',
        'reminder_2day_sent',
        'reminder_today_sent',
        'is_completed',
    ];

    protected $casts = [
        'due_date' => 'date',
        'reminder_7day_sent' => 'boolean',
        'reminder_2day_sent' => 'boolean',
        'reminder_today_sent' => 'boolean',
        'is_completed' => 'boolean',
    ];

    public function subscription()
    {
        return $this->belongsTo(PlannerSubscription::class, 'planner_subscription_id');
    }

    public function rule()
    {
        return $this->belongsTo(DeadlineRule::class, 'deadline_rule_id');
    }

    public function scopeUpcoming($query)
    {
        return $query->where('due_date', '>=', now())->where('is_completed', false);
    }

    public function scopeDueSoon($query, $days = 7)
    {
        return $query->where('due_date', '>=', now())
            ->where('due_date', '<=', now()->addDays($days));
    }
}
