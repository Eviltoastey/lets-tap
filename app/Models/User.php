<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * Get the beer styles for this user.
     */
    public function styles()
    {
        return $this->hasMany(Style::class);
    }

    /**
     * Get the pictures for this user.
     */
    public function pictures()
    {
        return $this->hasMany('App\Models\UserPicture');
    }

    /**
     * Get the favourite bar for this user.
     */
    public function bar()
    {
        return $this->hasOne('App\Models\Bar');
    }

    /**
     * Get the favourite brewery of this user.
     */
    public function brewery()
    {
        return $this->hasOne('App\Models\Brewery');
    }

    /**
     * Get the favourite store of this user.
     */
    public function store()
    {
        return $this->hasOne('App\Models\Store');
    }

    /**
     * Get the last known location of this user.
     */
    public function location()
    {
        return $this->hasOne('App\Models\Location');
    }

    /**
     * Get the favourtie beer of this user.
     */
    public function beer()
    {
        return $this->hasOne('App\Models\beer');
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
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
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
