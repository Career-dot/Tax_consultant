<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'short_description',
        'icon',
        'price',
        'deadline_date',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'deadline_date' => 'date',
    ];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('notes', 'status', 'assigned_at')->withTimestamps();
    }

    public function activeUsersCount()
    {
        return $this->users()->wherePivot('status', 'active')->count();
    }

    public function requiredDocuments()
    {
        return $this->hasMany(RequiredDocument::class)->orderBy('sort_order');
    }
}
