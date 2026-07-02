<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\BookingApprovedMail;
use App\Mail\BookingRejectedMail;
use App\Models\User;
use App\Models\Item;
use App\Models\Category;
use App\Models\Booking;
use App\Models\ItemImage;
use App\Models\Review;
use App\Models\Wishlist;

use App\Notifications\NewItemRequest;
use App\Notifications\ItemReturnedNotification;
class OwnerController extends Controller
{

//function to fetch all categories name in selectbox of CReate items form page and to open Createitems Page

public function createItem()
{
    $categories = Category::all();

    return view('Vendor.Createitems', compact('categories'));
}

public function storeItem(Request $request)
{

    // function to apply built-in laravel validation

    $request->validate([
        'title' => 'required|max:255',
        'category_id' => 'required',
        'description' => 'required',
        'rent_price_per_day' => 'required|numeric',
        'security_deposit' => 'required|numeric',
        'replacement_cost' => 'required|numeric',
        'city' => 'required',
        'address' => 'required',
        'quantity' => 'required|integer',
          'images' => 'required',
    'images.*' => 'image|mimes:jpg,jpeg,png,webp|max:2048'
    ]);

    // function to saveitems in database

$item = Item::create([
    'user_id' => auth()->id(),
    'category_id' => $request->category_id,
    'title' => $request->title,
    'description' => $request->description,
    'rent_price_per_day' => $request->rent_price_per_day,
    'security_deposit' => $request->security_deposit,
    'replacement_cost' => $request->replacement_cost,
    'city' => $request->city,
    'address' => $request->address,
    'quantity' => $request->quantity,
    'status' => 'pending'
]);

if ($request->hasFile('images')) {

    foreach ($request->file('images') as $image) {

        $fileName = time().'_'.$image->getClientOriginalName();

        $image->move(
            public_path('uploads/items'),
            $fileName
        );

        ItemImage::create([
            'item_id' => $item->id,
            'image' => $fileName
        ]);
    }
}
$admin = User::where('role', 'admin')->first();

if ($admin) {
    $admin->notify(new NewItemRequest($item));
}
    return redirect()->back()->with('success', 'Item Added Successfully');
}

public function items()
{
    $items = Item::with(['category','images'])
        ->where('user_id', auth()->id()) // important
        ->get();

    return view('Vendor.Items', compact('items'));
}

public function editItem($id)
{
    $item = Item::findOrFail($id);
    $categories = Category::all();

    return view('Vendor.Edititems', compact('item', 'categories'));
}


public function updateItem(Request $request, $id)
{
    $item = Item::findOrFail($id);

    $item->update([
        'category_id' => $request->category_id,
        'title' => $request->title,
        'description' => $request->description,
        'rent_price_per_day' => $request->rent_price_per_day,
        'security_deposit' => $request->security_deposit,
        'replacement_cost' => $request->replacement_cost,
        'city' => $request->city,
        'address' => $request->address,
        'quantity' => $request->quantity,
    ]);

      if ($request->hasFile('images')) {

$oldImages = ItemImage::where('item_id', $item->id)->get();

foreach ($oldImages as $oldImage) {

    $path = public_path('uploads/items/'.$oldImage->image);

    if(file_exists($path)){
        unlink($path);
    }
}

ItemImage::where('item_id', $item->id)->delete();
   if ($request->hasFile('images')) {

        foreach ($request->file('images') as $image) {

            $fileName = time().'_'.$image->getClientOriginalName();

            $image->move(
                public_path('uploads/items'),
                $fileName
            );

            ItemImage::create([
                'item_id' => $item->id,
                'image' => $fileName
            ]);
        }
    }

    return redirect('/owner/items')
           ->with('success', 'Item Updated Successfully');
}

}

public function deleteItem($id)
{
    Item::findOrFail($id)->delete();

    return back()->with('success', 'Item Deleted Successfully');
}

public function viewOwnerItem($id)
{
    $item = Item::with([
        'user',
        'category',
        'images',
        'reviews.user',
        'bookings.renter',
        'wishlists.user'
    ])
    ->where('user_id', auth()->id()) // Only owner's own item
    ->findOrFail($id);

    // Statistics
    $averageRating = $item->reviews()->avg('rating');

    $totalReviews = $item->reviews()->count();

    $totalBookings = $item->bookings()->count();

    $pendingBookings = $item->bookings()
        ->where('status', 'pending')
        ->count();

    $approvedBookings = $item->bookings()
        ->where('status', 'approved')
        ->count();

    $completedBookings = $item->bookings()
        ->where('status', 'completed')
        ->count();

    $wishlistCount = $item->wishlists()->count();

    $totalRevenue = $item->bookings()
        ->whereIn('status', [
            'approved',
            'handed_over',
            'returned',
            'completed'
        ])
        ->sum('total_amount');

    return view('Vendor.Viewitem', compact(
        'item',
        'averageRating',
        'totalReviews',
        'totalBookings',
        'pendingBookings',
        'approvedBookings',
        'completedBookings',
        'wishlistCount',
        'totalRevenue'
    ));
}

public function bookingRequests()
{
    $bookings = Booking::with([
        'item',
        'renter'
    ])
    ->where('owner_id',auth()->id())
    ->latest()
    ->get();

    return view(
        'Vendor.Bookingrequests',
        compact('bookings')
    );
}


public function bookingDetails($id)
{
    $booking = Booking::with([
        'item.images',
        'item.category',
        'renter',
        'owner'
    ])->findOrFail($id);

    return view(
        'Vendor.DetailsofBookingrequest',
        compact('booking')
    );
}


public function approveBooking($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'approved'
    ]);


Mail::to($booking->user->email)
    ->send(new BookingApprovedMail($booking));

    return back()->with(
        'success',
        'Booking Approved Successfully'
    );
}
  
public function rejectBooking($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'rejected'
    ]);

Mail::to($booking->user->email)
    ->send(new BookingRejectedMail($booking));

    return back()->with(
        'success',
        'Booking Rejected Successfully'
    );
}

public function giveToUser($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'handed_over',
        'handed_over_at' => now()
    ]);

    return back()->with(
        'success',
        'Item Given To User Successfully'
    );
}

public function markReturned($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'returned',
        'returned_at' => now()

    ]);

    return back()->with(
        'success',
        'Item Returned Successfully'
    );
    $booking->item->owner->notify(new ItemReturnedNotification($booking));
}


public function notifications()
{
    $notifications = auth()->user()
        ->notifications()
        ->latest()
        ->paginate(10);

    return view('Vendor.Notifications', compact('notifications'));
}



public function markNotificationRead($id)
{
    $notification = auth()->user()
        ->notifications()
        ->findOrFail($id);

    $notification->markAsRead();

    return back()->with('success', 'Notification marked as read.');
}

public function markAllNotificationsRead()
{
    auth()->user()
        ->unreadNotifications
        ->markAsRead();

    return back()->with('success', 'All notifications marked as read.');
}

public function deleteNotification($id)
{
    $notification = auth()->user()
        ->notifications()
        ->findOrFail($id);

    $notification->delete();

    return back()->with('success', 'Notification deleted successfully.');
}

public function reviews()
{
    $reviews = Review::with([
        'user',
        'item'
    ])
    ->whereHas('item', function ($query) {
        $query->where('user_id', auth()->id());
    })
    ->latest()
    ->paginate(10);

    $averageRating = Review::whereHas('item', function ($query) {
        $query->where('user_id', auth()->id());
    })->avg('rating');

    $totalReviews = Review::whereHas('item', function ($query) {
        $query->where('user_id', auth()->id());
    })->count();

    return view('Vendor.Reviews', compact(
        'reviews',
        'averageRating',
        'totalReviews'
    ));
}


public function viewReview($id)
{
    $review = Review::with([
        'user',
        'item',
        'item.category',
        'item.owner',
        'item.images',
        'booking',
        'booking.renter',
        'booking.owner'
    ])
    ->whereHas('item', function ($query) {
        $query->where('user_id', auth()->id());
    })
    ->findOrFail($id);

    $averageRating = Review::where('item_id', $review->item_id)
        ->avg('rating');

    $totalReviews = Review::where('item_id', $review->item_id)
        ->count();

    $totalBookings = Booking::where('item_id', $review->item_id)
        ->count();

    $rentalDays = \Carbon\Carbon::parse($review->booking->start_date)
        ->diffInDays(
            \Carbon\Carbon::parse($review->booking->end_date)
        );

    return view('Vendor.ViewReview', compact(
        'review',
        'averageRating',
        'totalReviews',
        'totalBookings',
        'rentalDays'
    ));
} 

public function analytics()
{
    $ownerId = auth()->id();

    // Total Items
    $totalItems = Item::where('user_id', $ownerId)->count();

    // Total Bookings
    $totalBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->count();

    // Pending Bookings
    $pendingBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->where('status', 'pending')->count();

    // Approved Bookings
    $approvedBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->where('status', 'approved')->count();

    // Completed Bookings
    $completedBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->where('status', 'completed')->count();

    // Total Reviews
    $totalReviews = Review::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->count();

    // Average Rating
    $averageRating = Review::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->avg('rating');

    // Wishlist Count
    $wishlistCount = Wishlist::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })->count();

    // Total Revenue
    $totalRevenue = Booking::whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })
    ->whereIn('status', [
        'approved',
        'handed_over',
        'returned',
        'completed'
    ])
    ->sum('total_amount');

    // Monthly Revenue
    $monthlyRevenue = Booking::selectRaw('MONTH(created_at) as month, SUM(total_amount) as total')
        ->whereHas('item', function ($query) use ($ownerId) {
            $query->where('user_id', $ownerId);
        })
        ->whereYear('created_at', now()->year)
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    // Top 5 Most Booked Items
    $topItems = Item::where('user_id', $ownerId)
        ->withCount('bookings')
        ->orderByDesc('bookings_count')
        ->take(5)
        ->get();


     // Available Items
$availableItems = Item::where('user_id', $ownerId)
    ->where('status', 'approved')
    ->count();

// Pending Approval Items
$pendingItems = Item::where('user_id', $ownerId)
    ->where('status', 'pending')
    ->count();

// Rejected Items
$rejectedItems = Item::where('user_id', $ownerId)
    ->where('status', 'rejected')
    ->count();

// Active Rentals
$activeRentals = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->whereIn('status', ['approved', 'handed_over'])
->count();

// Cancelled Bookings
$cancelledBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('status', 'cancelled')
->count();

// Rejected Bookings
$rejectedBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('status', 'rejected')
->count();

// Today's Bookings
$todayBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->whereDate('created_at', today())
->count();

// This Month Bookings
$thisMonthBookings = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->whereMonth('created_at', now()->month)
->whereYear('created_at', now()->year)
->count();

// This Month Revenue
$thisMonthRevenue = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->whereMonth('created_at', now()->month)
->whereYear('created_at', now()->year)
->whereIn('status', ['approved','handed_over','returned','completed'])
->sum('total_amount');

// Today's Revenue
$todayRevenue = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->whereDate('created_at', today())
->whereIn('status', ['approved','handed_over','returned','completed'])
->sum('total_amount');

// Total Renters
$totalRenters = Booking::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->distinct('renter_id')
->count('renter_id');

// Five Star Reviews
$fiveStarReviews = Review::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('rating', 5)
->count();

// Four Star Reviews
$fourStarReviews = Review::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('rating', 4)
->count();

// Three Star Reviews
$threeStarReviews = Review::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('rating', 3)
->count();

// Two Star Reviews
$twoStarReviews = Review::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('rating', 2)
->count();

// One Star Reviews
$oneStarReviews = Review::whereHas('item', function ($query) use ($ownerId) {
    $query->where('user_id', $ownerId);
})
->where('rating', 1)
->count();

// Highest Revenue Item
$highestRevenueItem = Item::where('user_id', $ownerId)
    ->withSum('bookings', 'total_amount')
    ->orderByDesc('bookings_sum_total_amount')
    ->first();

// Most Reviewed Item
$mostReviewedItem = Item::where('user_id', $ownerId)
    ->withCount('reviews')
    ->orderByDesc('reviews_count')
    ->first();

// Most Wishlisted Item
$mostWishlistedItem = Item::where('user_id', $ownerId)
    ->withCount('wishlists')
    ->orderByDesc('wishlists_count')
    ->first();

// Latest Bookings
$latestBookings = Booking::with(['item', 'renter'])
    ->whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })
    ->latest()
    ->take(5)
    ->get();

// Latest Reviews
$latestReviews = Review::with(['user', 'item'])
    ->whereHas('item', function ($query) use ($ownerId) {
        $query->where('user_id', $ownerId);
    })
    ->latest()
    ->take(5)
    ->get();

// Booking Success Rate
$bookingSuccessRate = $totalBookings > 0
    ? round(($completedBookings / $totalBookings) * 100, 2)
    : 0;   

    return view('Vendor.index', compact(
        'totalItems',
        'totalBookings',
        'pendingBookings',
        'approvedBookings',
        'completedBookings',
        'totalReviews',
        'averageRating',
        'wishlistCount',
        'totalRevenue',
        'monthlyRevenue',
        'topItems',
        'availableItems',
'pendingItems',
'rejectedItems',
'activeRentals',
'cancelledBookings',
'rejectedBookings',
'todayBookings',
'thisMonthBookings',
'todayRevenue',
'thisMonthRevenue',
'totalRenters',
'fiveStarReviews',
'fourStarReviews',
'threeStarReviews',
'twoStarReviews',
'oneStarReviews',
'highestRevenueItem',
'mostReviewedItem',
'mostWishlistedItem',
'latestBookings',
'latestReviews',
'bookingSuccessRate'
    ));
}


}
