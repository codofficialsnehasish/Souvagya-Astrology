<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'is_visible'
    ];


    // public function states()
    // {
    //     return $this->hasMany(State::class);
    // }


    // public function cities()
    // {
    //     return $this->hasManyThrough(City::class, State::class, 'country_id', 'state_id', 'id', 'id');
    // }

    public function states()
    {
        return $this->hasMany(State::class, 'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class, 'country_id');
    }
}