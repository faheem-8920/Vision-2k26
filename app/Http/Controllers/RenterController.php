<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Booking;
use App\Models\Item;
use App\Models\Wishlist;
use App\Models\Review;
use App\Models\User;
use App\Notifications\NewBookingNotification;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RenterController extends Controller
{
    
    

public function categories()
{
    $products = Item::with(['category','images','reviews'])
        ->where('status', 'available')
        ->latest()
        ->get();

    $allcategories = Category::take(3)->get();

    return view('User.index', compact('allcategories','products'));
}




public function showItem($id)
{
   $item = Item::with([
    'images',
    'category',
    'owner',
    'reviews.user'

])->findOrFail($id);

    $relatedItems = Item::with([
        'category',
        'images'
    ])
    ->where('category_id', $item->category_id)
    ->where('id', '!=', $item->id)
    ->where('status', 'available')
    ->take(4)
    ->get();

    return view('User.productdetails', compact(
        'item',
        'relatedItems'
    ));
}

    public function store(Request $request,$id)
    {
        $item = Item::findOrFail($id);

        $days = Carbon::parse(
            $request->start_date
        )->diffInDays(
            Carbon::parse($request->end_date)
        );

        $subtotal =
            $days *
            $item->rent_price_per_day;

        $deliveryCharges =
            $request->delivery_method == 'delivery'
            ? 500
            : 0;

        $total =
            $subtotal +
            $item->security_deposit +
            $deliveryCharges;

        Booking::create([

            'item_id' => $item->id,

            'owner_id' => $item->user_id,

            'renter_id' => auth()->id(),

            'start_date' => $request->start_date,

            'end_date' => $request->end_date,

            'days' => $days,

            'subtotal' => $subtotal,

            'delivery_method' =>
                $request->delivery_method,

            'delivery_address' =>
                $request->delivery_address,

            'delivery_charges' =>
                $deliveryCharges,

            'total_amount' => $total,

            'security_deposit' =>
                $item->security_deposit,

            'notes' => $request->notes,

            'status' => 'pending'
        ]);


$admin = User::where('role','admin')->first();

$admin->notify(
    new NewBookingNotification()
);
        return back()->with(
            'success',
            'Booking Request Submitted Successfully'
        );
    }

    public function myBookings()
{
    $bookings = Booking::with([
       'item',
    'item.images',
    'item.category',
    'review'
    ])
    ->where('renter_id', auth()->id())
    ->latest()
    ->get();

    return view(
        'User.Mybookings',
        compact('bookings')
    );

    }
   
    public function bookingDetails($id)
{
$booking = Booking::with([
'item',
'item.images',
'item.owner',
'item.category'
])
->where('renter_id',auth()->id())
->findOrFail($id);

return view(
    'User.Bookingdetails',
    compact('booking')
);

}


public function addToWishlist($id)
{
    Wishlist::firstOrCreate([

        'user_id' => auth()->id(),

        'item_id' => $id

    ]);

    return back()->with(
        'success',
        'Item added to wishlist.'
    );
}

public function wishlist()
{
    $wishlists = Wishlist::with([
        'item.images',
        'item.category'
    ])
    ->where(
        'user_id',
        auth()->id()
    )
    ->latest()
    ->get();

    return view(
        'User.Wishlists',
        compact('wishlists')
    );
}

public function removeWishlist($id)
{
    Wishlist::where(
        'id',
        $id
    )
    ->where(
        'user_id',
        auth()->id()
    )
    ->delete();

    return back()->with(
        'success',
        'Removed from wishlist.'
    );
}

public function submitReview(Request $request,$id)
{
    $booking = Booking::findOrFail($id);

    if($booking->renter_id != auth()->id())
    {
        abort(403);
    }

    if($booking->status != 'completed')
    {
        return back()->with(
            'error',
            'Only completed bookings can be reviewed.'
        );
    }

    $alreadyReviewed =
        Review::where(
            'booking_id',
            $booking->id
        )->exists();

    if($alreadyReviewed)
    {
        return back()->with(
            'error',
            'You already reviewed this booking.'
        );
    }

    $request->validate([

        'rating' => 'required|integer|min:1|max:5',

        'review' => 'required|min:10|max:500'

    ]);

    Review::create([

        'item_id' => $booking->item_id,

        'user_id' => auth()->id(),

        'booking_id' => $booking->id,

        'rating' => $request->rating,

        'review' => $request->review

    ]);

    return back()->with(
        'success',
        'Review submitted successfully.'
    );
}

}
