<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RequiredDocument extends Model
{
    protected $fillable = [
        'service_id',
        'name',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }
}
