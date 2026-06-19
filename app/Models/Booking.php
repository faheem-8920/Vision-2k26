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
        'total_amount',
        'security_deposit',
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
}




