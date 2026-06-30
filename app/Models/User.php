<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;


class User extends Authenticatable implements MustVerifyEmail{
    use HasApiTokens; 

    /** @use HasFactory<UserFactory> */
    use HasFactory;

    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'cnic',
        'city',
        'address',
        'profile-image',
        'is-verified',
        'role',

    ];

    public function ownedItems()
{
    return $this->hasMany(Item::class,'user_id');
}

public function renterBookings()
{
    return $this->hasMany(Booking::class,'renter_id');
}

public function ownerBookings()
{
    return $this->hasMany(Booking::class,'owner_id');
}

public function renterRequest()
{
    return $this->hasOne(RenterRequest::class);
}

public function approvedRequests()
{
    return $this->hasMany(RenterRequest::class, 'approved_by');
}

public function wishlists()
{
    return $this->hasMany(Wishlist::class);
}

public function reviews()
{
    return $this->hasMany(Review::class);
}

public function ownerRequest()
{
    return $this->hasOne(OwnerRequest::class);
}

public function items()
{
    return $this->hasMany(Item::class);
}




public function wishlist()
{
    return $this->hasMany(Wishlist::class);
}



    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
