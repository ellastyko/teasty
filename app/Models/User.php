<?php

namespace App\Models;

use App\Models\traits\HasRoles;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'display_name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return mixed
     */
    public static function current(): mixed
    {
        return app(Guard::class)->user();
    }

    /**
     * @return string
     */
    public function getFullName(): string
    {
        return ucfirst($this->name) . ' ' . ucfirst($this->surname);
    }

    /**
     * @return HasMany
     */
    public function receipts(): HasMany
    {
        return $this->hasMany(Receipt::class);
    }
}
