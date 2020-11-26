<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasFactory, Notifiable, HasApiTokens, HasRoles;

    /**
     * Get the beer styles for this user.
     */
    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }

    /**
     * Get the pictures for this user.
     */
    public function pictures()
    {
        return $this->hasMany(UserPicture::class);
    }

    /**
     * Get the favourite bar for this user.
     */
    public function bar()
    {
        return $this->hasOne(Bar::class);
    }

    /**
     * Get the favourite brewery of this user.
     */
    public function brewery()
    {
        return $this->hasOne(Brewery::class);
    }

    /**
     * Get the favourite store of this user.
     */
    public function store()
    {
        return $this->hasOne(Store::class);
    }

    /**
     * Get the last known location of this user.
     */
    public function location()
    {
        return $this->hasOne(Location::class);
    }

    /**
     * Get the favourtie beer of this user.
     */
    public function beer()
    {
        return $this->hasOne(Beer::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'age',
        'description',
        'phone',
        'email',
        'password',
        'beer_id',
        'bar_id',
        'brewery_id',
        'store_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
