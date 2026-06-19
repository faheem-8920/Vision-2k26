<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Item;
use Illuminate\Http\Request;
use Carbon\Carbon;

class RenterController extends Controller
{
    
    public function storeBooking(Request $request, $itemId)
{
    $request->validate([
        'start_date' => 'required|date',
        'end_date'   => 'required|date|after:start_date'
    ]);

    $item = Item::findOrFail($itemId);

    $days = Carbon::parse($request->start_date)
                  ->diffInDays(
                      Carbon::parse($request->end_date)
                  );

    if($days == 0)
    {
        $days = 1;
    }

    $rentAmount = $days * $item->rent_price_per_day;

    $totalAmount =
        $rentAmount +
        $item->security_deposit;

    Booking::create([

        'item_id' => $item->id,

        'owner_id' => $item->user_id,

        'renter_id' => auth()->id(),

        'start_date' => $request->start_date,

        'end_date' => $request->end_date,

        'total_amount' => $totalAmount,

        'security_deposit' => $item->security_deposit,

        'status' => 'pending'

    ]);

    return back()->with(
        'success',
        'Booking Request Sent Successfully'
    );
}




}
