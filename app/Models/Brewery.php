<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brewery extends Model
{
    use HasFactory;

    /**
     * Get the beers related to this brewery.
     */
    public function beers()
    {
        return $this->belongsToMany(Beer::class);
    }

    /**
     * Get the users related to a brewery.
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
        'name',
        'adres',
        'city',
        'postal_code',
        'maps_link'
    ];
    
}
