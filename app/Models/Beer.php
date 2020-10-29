<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beer extends Model
{
    use HasFactory;

    /**
     * Get the brewery related to this beer.
     */
    public function brewery()
    {
        return $this->hasOne(Brewery::class);
    }

    /**
     * Get the flavours related to this beer.
     */
    public function flavours()
    {
        return $this->belongsToMany(Flavour::class);
    }

    /**
     * Get the styles related to this beer.
     */
    public function styles()
    {
        return $this->belongsToMany(Style::class);
    }

    /**
     * Get the users related to a beer.
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
        'style',
        'average_rating',
        'brewery'
    ];
}
