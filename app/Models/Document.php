<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Document extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'planner_subscription_id',
        'service_id',
        'required_document_id',
        'name',
        'file_path',
        'file_type',
        'file_size',
        'status',
        'rejection_reason',
    ];

    protected $casts = [
        'file_size' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function subscription()
    {
        return $this->belongsTo(PlannerSubscription::class, 'planner_subscription_id');
    }

    public function requiredDocument()
    {
        return $this->belongsTo(RequiredDocument::class);
    }
}
