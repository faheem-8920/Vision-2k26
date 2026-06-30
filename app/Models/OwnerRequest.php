<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OwnerRequest extends Model
{
    protected $fillable = [
        'user_id',
        'cnic',
        'phone',
        'city',
        'address',
        'cnic_front',
        'cnic_back',
        'status',
        'admin_note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function approvedBy()
{
    return $this->belongsTo(User::class, 'approved_by');
}
}
