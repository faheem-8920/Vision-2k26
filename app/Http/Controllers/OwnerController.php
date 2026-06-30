<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Item;
use App\Models\Category;
use App\Models\Booking;
use App\Models\ItemImage;

use App\Notifications\NewItemRequest;
class OwnerController extends Controller
{

//function to fetch all categories name in selectbox of CReate items form page and to open Createitems Page

public function createItem()
{
    $categories = Category::all();

    return view('Createitems', compact('categories'));
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

    return view('Items', compact('items'));
}

public function editItem($id)
{
    $item = Item::findOrFail($id);
    $categories = Category::all();

    return view('Edititems', compact('item', 'categories'));
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
        'Bookingrequests',
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
        'DetailsofBookingrequest',
        compact('booking')
    );
}


public function approveBooking($id)
{
    $booking = Booking::findOrFail($id);

    $booking->update([
        'status' => 'approved'
    ]);

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
}


}
