<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    public function items()
    {
        return $this->hasMany(OrderItems::class);
    }

    public function addressBook()
    {
        return $this->belongsTo(AddressBook::class, 'address_book_id');
    }

}
