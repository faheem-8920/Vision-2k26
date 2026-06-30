<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\User;
use App\Models\Item;
use App\Models\Booking;
use App\Models\Review;
use App\Models\Wishlist;
use App\Models\OwnerRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Notifications\NewOwnerRequest;

use App\Notifications\ItemRejected;
use App\Notifications\ItemApproved;
use App\Notifications\OwnerRequestApproved;
use App\Notifications\OwnerRequestRejected;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{


public function categories()
{
    $categories = Category::all();

    return view('Admin.categories', compact('categories'));
}


// function to save category in database 

public function storeCategory(Request $request)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image'
    ]);

    $imageName = null;

    if($request->hasFile('image')) {

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/categories'), $imageName);
    }

    Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName
    ]);

    return redirect()->back()->with('success', 'Category Added Successfully');
}

//function to delete category

public function deleteCategory($id)
{
    $category = Category::findOrFail($id);

    $category->delete();

    return back()->with('success', 'Category and all related items deleted successfully');
}

// function to open the edit category page with previous values

public function editCategory($id)
{
    $category = Category::findOrFail($id);

    return view('Admin.editcategories', compact('category'));
}

//function to update category

public function updateCategory(Request $request, $id)
{
    $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
        'image' => 'nullable|image'
    ]);

    $category = Category::findOrFail($id);

    $imageName = $category->image; // old image

    if($request->hasFile('image')) {

        // delete old image if exists
        if($category->image && file_exists(public_path('uploads/categories/'.$category->image))) {
            unlink(public_path('uploads/categories/'.$category->image));
        }

        $file = $request->file('image');
        $imageName = time().'_'.$file->getClientOriginalName();

        $file->move(public_path('uploads/categories'), $imageName);
    }

    $category->update([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $imageName
    ]);

      return redirect('/admin/categories')->with('success', 'Category "' . $category->name . '" has been updated successfully!');
}

public function users()
    {
        $users = User::latest()->get();
        return view('admin.Allusers', compact('users'));
    }
public function viewUser($id)
{
    $user = User::with([
        'items.category',
        'renterBookings.item',
        'ownerBookings.item',
        'wishlist.item',
        'reviews.item',
        'ownerRequest'
    ])->findOrFail($id);

    $stats = [

        'items' => $user->items->count(),

        'renterBookings' => $user->renterBookings->count(),

        'ownerBookings' => $user->ownerBookings->count(),

        'wishlist' => $user->wishlist->count(),

        'reviews' => $user->reviews->count(),

        'revenue' => $user->ownerBookings->sum('total_amount'),

        'completed' => $user->renterBookings
                        ->where('status','completed')
                        ->count(),

        'pending' => $user->renterBookings
                        ->where('status','pending')
                        ->count(),
    ];

    return view('admin.Viewuser', compact(
        'user',
        'stats'
    ));
}

    public function editUser($id)
    {
        $user = User::findOrFail($id);

        return view('admin.Edituser', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->update([
            'name'  => $request->name,
            'email' => $request->email,
            'role'  => $request->role,
        ]);

        return redirect('/users');
    }

    public function deleteUser($id)
{
    $user = User::findOrFail($id);

    $user->delete();

    return redirect('/users')->with('success', 'User deleted successfully.');
}



    public function create()
    {
        $existing = RenterRequest::where('user_id', auth()->id())->first();

        if ($existing) {
            return redirect()->back()
                ->with('error', 'You have already submitted a request.');
        }

        return view('renter.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'cnic' => 'required',
            'phone' => 'required',
            'city' => 'required',
            'address' => 'required',
            'cnic_front' => 'required|image',
            'cnic_back' => 'required|image',
        ]);

        $front = $request->file('cnic_front')
            ->store('cnic', 'public');

        $back = $request->file('cnic_back')
            ->store('cnic', 'public');

        OwnerRequest::create([
            'user_id' => auth()->id(),
            'cnic' => $request->cnic,
            'phone' => $request->phone,
            'city' => $request->city,
            'address' => $request->address,
            'cnic_front' => $front,
            'cnic_back' => $back,
        ]);
$user = auth()->user();

$admins = User::where('role','admin')->get();

foreach($admins as $admin)
{
    $admin->notify(new NewOwnerRequest($user));
}
        return redirect()
            ->back()
            ->with('success', 'Request submitted successfully.');
    }

    public function OwnerRequests()
{
    $requests = OwnerRequest::with('user')->latest()->get();

    return view('admin.OwnerRequests', compact('requests'));
}

public function approve($id)
{
    $request = OwnerRequest::findOrFail($id);

    $request->update([
        'status' => 'approved',
        'approved_at' => now(),
        'approved_by' => auth()->id(),
    ]);

    // 👇 USER ROLE UPDATE
    $request->user->update([
        'role' => 'owner'
    ]);
$request = OwnerRequest::findOrFail($id);

$user = User::findOrFail($request->user_id);

   // Notification
    $user->notify(new OwnerRequestApproved());

    return back()->with('success', 'User approved as Owner successfully.');
}

public function reject($id)
{
    $request = OwnerRequest::findOrFail($id);

    $request->update([
        'status' => 'rejected',
        'approved_at' => null,
        'approved_by' => auth()->id(),
    ]);

    $request = OwnerRequest::findOrFail($id);

$user = User::findOrFail($request->user_id);


        // Notification
    $user->notify(new OwnerRequestRejected());

    return back()->with('success', 'Owner request rejected.');
}


public function itemRequests()
{
    $items = Item::with([
        'category',
        'owner',
        'images'
    ])
    ->where('status', 'pending')
    ->latest()
    ->get();

    return view('admin.ItemRequests', compact('items'));
}

public function approveItem($id)
{
    $item = Item::findOrFail($id);

    $item->update([
        'status' => 'available'
    ]);

    $item = Item::findOrFail($id);

$user = User::findOrFail($item->user_id);

    // Notification
    $user->notify(new ItemApproved());

    return back()->with(
        'success',
        'Item accepted successfully.'
    );
}

public function rejectItem($id)
{
    $item = Item::findOrFail($id);

    $item->update([
        'status' => 'rejected'
    ]);

        // Notification
    $user->notify(new ItemRejected());

    return back()->with(
        'success',
        'Item rejected successfully.'
    );
}

public function bookings()
{
    $bookings = Booking::with([
        'item',
        'owner',
        'renter'
    ])->latest()->get();

    return view('admin.Bookings', compact('bookings'));
}

public function viewBooking($id)
{
    $booking = Booking::with([

        // Booking Relations
        'owner',
        'renter',

        // Item Relations
        'item',
        'item.category',
        'item.owner',
        'item.images',
        'item.reviews'

    ])->findOrFail($id);

    return view(
        'admin.Bookingdetails',
        compact('booking')
    );
}
public function editBooking($id)
{
    $booking = Booking::findOrFail($id);

    return view('admin.Editbooking', compact('booking'));
}
public function updateBooking(Request $request, $id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => $request->status
    ]);

    return redirect('/admin/bookings')
        ->with('success', 'Booking updated successfully');
}



public function deleteBooking($id)
{
    Booking::findOrFail($id)->delete();

    return redirect('/admin/bookings')
        ->with('success', 'Booking deleted successfully');
}

public function items()
{
    $items = Item::with([
        'user',
        'category'
    ])->latest()->get();

    return view('admin.Items', compact('items'));
}

public function viewItem($id)
{
    $item = Item::with([
        'user',
        'category',
        'images',
        'reviews.user',
        'bookings.renter',
        'wishlists.user'
    ])->findOrFail($id);

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

    return view('admin.Viewitems', compact(
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

public function editItem($id)
{
    $item = Item::findOrFail($id);

    $categories = Category::all();

    return view('admin.Edititem', compact(
        'item',
        'categories'
    ));
}

public function updateItem(Request $request, $id)
{
    $item = Item::findOrFail($id);

    $item->update([
        'title' => $request->title,
        'description' => $request->description,
        'rent_price_per_day' => $request->rent_price_per_day,
        'security_deposit' => $request->security_deposit,
        'replacement_cost' => $request->replacement_cost,
        'city' => $request->city,
        'address' => $request->address,
        'quantity' => $request->quantity,
        'category_id' => $request->category_id,
        'status' => $request->status,
    ]);

    return redirect('/admin/items')
        ->with('success', 'Item updated successfully');
}

public function deleteItem($id)
{
    Item::findOrFail($id)->delete();

    return redirect('/admin/items')
        ->with('success', 'Item deleted successfully');
}

public function reviews()
{
    $reviews = Review::with([
        'user',
        'item',
        'booking'
    ])->latest()->get();

    return view('admin.Reviews', compact('reviews'));
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
    ])->findOrFail($id);

    // Average Rating of this Item
    $averageRating = Review::where('item_id', $review->item_id)
        ->avg('rating');

    // Total Reviews of this Item
    $totalReviews = Review::where('item_id', $review->item_id)
        ->count();

    // Total Bookings of this Item
    $totalBookings = Booking::where('item_id', $review->item_id)
        ->count();

    // Total Rental Days
    $rentalDays = \Carbon\Carbon::parse($review->booking->start_date)
        ->diffInDays(
            \Carbon\Carbon::parse($review->booking->end_date)
        );

    return view('admin.Viewreview', compact(
        'review',
        'averageRating',
        'totalReviews',
        'totalBookings',
        'rentalDays'
    ));
}

public function editReview($id)
{
    $review = Review::findOrFail($id);

    return view('admin.Editreview', compact('review'));
}

public function updateReview(Request $request, $id)
{
    $review = Review::findOrFail($id);

    $review->update([
        'rating' => $request->rating,
        'review' => $request->review
    ]);

    return redirect('/admin/reviews')
        ->with('success', 'Review updated successfully.');
}

public function deleteReview($id)
{
    Review::findOrFail($id)->delete();

    return redirect('/admin/reviews')
        ->with('success', 'Review deleted successfully.');
}

public function dashboard()
{
    // ===========================
    // BASIC COUNTS
    // ===========================

    $totalUsers = User::count();

    $totalItems = Item::count();

    $totalBookings = Booking::count();

    $totalReviews = Review::count();

    $totalWishlist = Wishlist::count();

    $totalCategories = Category::count();


    // ===========================
    // USER STATISTICS
    // ===========================

    $totalOwners = User::where('role','owner')->count();

    $totalRenters = User::where('role','renter')->count();

    $newUsersThisMonth = User::whereMonth(
        'created_at',
        Carbon::now()->month
    )->whereYear(
        'created_at',
        Carbon::now()->year
    )->count();


    // ===========================
    // ITEM STATISTICS
    // ===========================

    $pendingItems = Item::where('status','pending')->count();

    $approvedItems = Item::where('status','approved')->count();

    $rejectedItems = Item::where('status','rejected')->count();

    $newItemsThisMonth = Item::whereMonth(
        'created_at',
        Carbon::now()->month
    )->whereYear(
        'created_at',
        Carbon::now()->year
    )->count();


    // ===========================
    // BOOKING STATISTICS
    // ===========================

    $pendingBookings = Booking::where('status','pending')->count();

    $approvedBookings = Booking::where('status','approved')->count();

    $handedOverBookings = Booking::where('status','handed_over')->count();

    $returnedBookings = Booking::where('status','returned')->count();

    $completedBookings = Booking::where('status','completed')->count();

    $rejectedBookings = Booking::where('status','rejected')->count();

    $todayBookings = Booking::whereDate(
        'created_at',
        Carbon::today()
    )->count();


    // ===========================
    // REVENUE
    // ===========================

    $totalRevenue = Booking::whereIn('status',[
        'approved',
        'handed_over',
        'returned',
        'completed'
    ])->sum('total_amount');

    $todayRevenue = Booking::whereDate(
        'created_at',
        Carbon::today()
    )
    ->whereIn('status',[
        'approved',
        'handed_over',
        'returned',
        'completed'
    ])
    ->sum('total_amount');

    $monthRevenue = Booking::whereMonth(
        'created_at',
        Carbon::now()->month
    )
    ->whereYear(
        'created_at',
        Carbon::now()->year
    )
    ->whereIn('status',[
        'approved',
        'handed_over',
        'returned',
        'completed'
    ])
    ->sum('total_amount');


    // ===========================
    // RATINGS
    // ===========================

    $averageRating = round(
        Review::avg('rating'),
        1
    );


    // ===========================
    // MOST RENTED ITEM
    // ===========================
$mostRented = Booking::select(
        'item_id',
        DB::raw('COUNT(*) as total_rentals')
    )
    ->groupBy('item_id')
    ->orderByDesc('total_rentals')
    ->first();

$mostRentedItem = null;

if($mostRented)
{
    $mostRentedItem = Item::find($mostRented->item_id);

    $mostRentedItem->total_rentals = $mostRented->total_rentals;
}

    // ===========================
    // TOP OWNER
    // ===========================

    $topOwnerData = Booking::select(
        'owner_id',
        DB::raw('COUNT(*) as rentals')
    )
    ->groupBy('owner_id')
    ->orderByDesc('rentals')
    ->first();

$topOwner = null;

if ($topOwnerData) {

    $topOwner = User::find($topOwnerData->owner_id);

    if ($topOwner) {
        $topOwner->rentals = $topOwnerData->rentals;
    }
}


    // ===========================
    // TOP RENTER
    // ===========================

  $topRenterData = Booking::select(
        'renter_id',
        DB::raw('COUNT(*) as bookings_count')
    )
    ->groupBy('renter_id')
    ->orderByDesc('bookings_count')
    ->first();

$topRenter = null;

if ($topRenterData) {

    $topRenter = User::find($topRenterData->renter_id);

    if ($topRenter) {
        $topRenter->bookings_count = $topRenterData->bookings_count;
    }
}


    // ===========================
    // HIGHEST RATED ITEM
    // ===========================

$highestRatedData = Review::select(
        'item_id',
        DB::raw('AVG(rating) as avg_rating')
    )
    ->groupBy('item_id')
    ->orderByDesc('avg_rating')
    ->first();

$highestRatedItem = null;

if ($highestRatedData) {

    $highestRatedItem = Item::find($highestRatedData->item_id);

    if ($highestRatedItem) {
        $highestRatedItem->avg_rating = round($highestRatedData->avg_rating, 1);
    }
}


    // ===========================
    // MOST ACTIVE CITY
    // ===========================

    $mostActiveCity = Item::select(
            'city',
            DB::raw('COUNT(*) as total')
        )
        ->groupBy('city')
        ->orderByDesc('total')
        ->first();


    // ===========================
    // RECENT BOOKINGS
    // ===========================

    $recentBookings = Booking::with([
        'item',
        'renter'
    ])
    ->latest()
    ->take(5)
    ->get();


    return view(
        'admin.index',
        compact(

            'totalUsers',
            'totalOwners',
            'totalRenters',

            'totalItems',
            'pendingItems',
            'approvedItems',
            'rejectedItems',

            'totalBookings',
            'pendingBookings',
            'approvedBookings',
            'handedOverBookings',
            'returnedBookings',
            'completedBookings',
            'rejectedBookings',

            'todayBookings',

            'totalReviews',
            'averageRating',

            'totalWishlist',
            'totalCategories',

            'totalRevenue',
            'todayRevenue',
            'monthRevenue',

            'newUsersThisMonth',
            'newItemsThisMonth',

            'mostRentedItem',
            'topOwner',
            'topRenter',
            'highestRatedItem',
            'mostActiveCity',

            'recentBookings'
        )
    );
}

public function notifications()
{
    $notifications = Auth::user()
        ->notifications()
        ->latest()
        ->get();

    return view('admin.notifications', compact('notifications'));
}
public function readNotification($id)
{
    $notification = Auth::user()
        ->notifications()
        ->findOrFail($id);

    $notification->markAsRead();

    return redirect($notification->data['url']);
}

public function deleteNotification($id)
{
    $notification = Auth::user()
        ->notifications()
        ->findOrFail($id);

    $notification->delete();

    return back()->with('success', 'Notification deleted successfully.');
}

}









