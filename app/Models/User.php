<?php

namespace App\Models;

use App\Models\traits\HasRoles;
use App\Notifications\Contracts\Notifiable as NotifiableContract;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements NotifiableContract
{
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use HasRoles;
    use Notifiable;

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
        'telegram_id',
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
        return Auth::guard('sanctum')->user();
    }

    /**
     * @return string
     */
    public function getAttributeFullName(): string
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
