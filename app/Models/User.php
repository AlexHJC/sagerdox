<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Certificate;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
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

    // relationship to certificates
    public function certificates()
    {
        return $this->hasMany(Certificate::class, 'user_id');
    }

    // relationship to alerts
    public function alerts()
    {
        return $this->hasMany(Alert::class, 'user_id');
    }

    // relationship to companies
    public function companies()
    {
        return $this->hasMany(Company::class, 'user_id');
    }

    // relationship to products
    public function products()
    {
        return $this->hasMany(Product::class, 'user_id');
    }
}
