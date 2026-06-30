<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class NewBookingNotification extends Notification
{
    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Booking',
            'message' => 'A new booking has been created.'
        ];
    }
}

