<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flavour extends Model
{
    use HasFactory;

    /**
     * Get the beers related to a flavour.
     */
    public function beers()
    {
        return $this->belongsToMany(Beer::class);
    }

    /**
     * Get the users related to a flavour.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name'
    ];

}
