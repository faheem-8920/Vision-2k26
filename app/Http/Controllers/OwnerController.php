<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ItemImage;
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
        'quantity' => 'required|integer'
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
    'status' => 'available'
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


    return redirect()->back()->with('success', 'Item Added Successfully');
}

public function items()
{
$items = Item::with([
    'category',
    'images'
])->get();
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

    return redirect('/owner/items')
           ->with('success', 'Item Updated Successfully');
}

public function deleteItem($id)
{
    Item::findOrFail($id)->delete();

    return back()->with('success', 'Item Deleted Successfully');
}


}
