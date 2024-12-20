<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddressBook extends Model
{
    use HasFactory;

    public function country()
    {
        return $this->belongsTo(Country::class, 'billing_country', 'id');
    }

    public function state()
    {
        return $this->belongsTo(State::class, 'billing_state', 'id');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'billing_city', 'id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'address_book_id');
    }
}
