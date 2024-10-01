<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'country_id',
        'is_visible'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class,'country_id');
    }

    public function cities()
    {
        return $this->hasMany(City::class,'state_id');
    }

    public static function get_states_by_country($country_id){
        return self::where('country_id',$country_id)->get(['id','name']);
    }

    public static function get_state_name($state_id){
        return self::where('id',$state_id)->value('name');
    }
}
