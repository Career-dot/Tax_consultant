<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'role',
        'cnic',
        'city',
        'address',
        'business_name',
        'business_type',
        'avatar_path',
        'notification_preferences',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'notification_preferences' => 'array',
        ];
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isClient(): bool
    {
        return $this->role === 'client';
    }

    public function initials(): string
    {
        $words = preg_split('/\s+/', trim($this->name));
        $initials = array_map(fn ($word) => mb_strtoupper(mb_substr($word, 0, 1)), array_slice($words, 0, 2));

        return implode('', $initials) ?: 'U';
    }

    public function avatarUrl(): ?string
    {
        return $this->avatar_path ? asset('storage/'.$this->avatar_path) : null;
    }

    public function services()
    {
        return $this->belongsToMany(Service::class)
            ->withPivot('notes', 'status', 'assigned_at', 'service_status')
            ->withTimestamps();
    }

    public function documents()
    {
        return $this->hasMany(Document::class);
    }

    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }

    public function payments()
    {
        return $this->hasMany(Payment::class);
    }

    public function plannerSubscriptions()
    {
        return $this->hasMany(PlannerSubscription::class);
    }

    public function activeServices()
    {
        return $this->services()->wherePivot('status', 'active');
    }

    public function pendingPayments()
    {
        return $this->payments()->where('status', 'pending');
    }

    public function unreadNotifications()
    {
        return $this->notifications()->where('is_read', false);
    }
}
