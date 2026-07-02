<?php

namespace App\Notifications;

use App\Models\Booking;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class ItemReturnedNotification extends Notification
{
    use Queueable;

    protected $booking;

    public function __construct(Booking $booking)
    {
        $this->booking = $booking;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Item Returned',
            'message' => 'The item "' . $this->booking->item->title . '" has been returned successfully.',
            'booking_id' => $this->booking->id,
            'item_id' => $this->booking->item_id,
            'type' => 'item_returned',
        ];
    }
}