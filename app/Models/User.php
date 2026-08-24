<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Filament\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'is_active',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function arsips(): HasMany
    {
        return $this->hasMany(Arsip::class);
    }

    public function suratMasuks(): HasMany
    {
        return $this->hasMany(SuratMasuk::class);
    }

    public function sendPasswordResetNotification($token): void
    {
        $url = url('/admin/password-reset/reset')
            . '?token=' . urlencode($token)
            . '&email=' . urlencode($this->email);

        $notification = new ResetPasswordNotification($token);

        $notification->url = $url;

        $this->notify($notification);
    }

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }
}
