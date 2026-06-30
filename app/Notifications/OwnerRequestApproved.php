<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class OwnerRequestApproved extends Notification
{
    use Queueable;

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [

            'title' => 'Owner Request Approved',

            'message' => 'Congratulations! Your owner request has been approved.',

            'type' => 'success',

            'url' => '/owner/dashboard'

        ];
    }
}