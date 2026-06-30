<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'item_id',
        'user_id',
        'booking_id',
        'rating',
        'review'
    ];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}