<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
        protected $fillable = [
         'item_id',
        'owner_id',
        'renter_id',

        'start_date',
        'end_date',

        'days',
        'subtotal',

        'delivery_method',
        'delivery_address',
        'delivery_charges',

        'total_amount',
        'security_deposit',

        'notes',
        'status'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function renter()
    {
        return $this->belongsTo(User::class, 'renter_id');
    }

    public function review()
{
    return $this->hasOne(Review::class);
}


}




