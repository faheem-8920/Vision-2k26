<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    
    protected $fillable = [
    'user_id',
    'category_id',
    'title',
    'description',
    'rent_price_per_day',
    'security_deposit',
    'replacement_cost',
    'city',
    'address',
    'quantity',
    'status'
];

public function category()
{
    return $this->belongsTo(Category::class);
}

public function images()
{
    return $this->hasMany(ItemImage::class);
}

public function bookings()
{
    return $this->hasMany(Booking::class);
}

public function owner()
{
    return $this->belongsTo(User::class,'user_id');
}

}
