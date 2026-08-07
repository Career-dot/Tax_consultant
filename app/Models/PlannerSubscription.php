<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlannerSubscription extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'email',
        'phone',
        'taxpayer_type',
        'has_sales_tax',
        'has_withholding_agent',
        'sector',
        'email_reminders',
        'sms_reminders',
        'session_token',
        'is_active',
    ];

    protected $casts = [
        'has_sales_tax' => 'boolean',
        'has_withholding_agent' => 'boolean',
        'email_reminders' => 'boolean',
        'sms_reminders' => 'boolean',
        'is_active' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function deadlines()
    {
        return $this->hasMany(PlannerDeadline::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
