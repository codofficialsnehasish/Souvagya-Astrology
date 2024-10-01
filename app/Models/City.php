<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'country_id',
        'state_id',
        'is_visible'
    ];

    public function state()
    {
        return $this->belongsTo(State::class,'country_id');
    }
    public function country()
    {
        return $this->belongsTo(Country::class,'state_id');
    }

    public static function get_city_by_states($states_id){
        return self::where('state_id',$states_id)->get(['id','name']);
    }

    public static function get_city_name($city_id){
        return self::where('id',$city_id)->value('name');
    }
  
}
