<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'is_active',
        'avatar'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'is_admin' => 'boolean',
        'is_active' => 'boolean'
    ];

    public function isAdmin()
    {
        return $this->is_admin === true;
    }

    // Agregar esta relación
    public function emotionalEntries()
    {
        return $this->hasMany(EmotionalEntry::class);
    }
}
