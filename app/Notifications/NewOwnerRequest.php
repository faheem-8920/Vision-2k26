<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewOwnerRequest extends Notification
{
    use Queueable;

    protected $user;

    public function __construct($user)
    {
        $this->user = $user;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [

            'title' => 'New Owner Request',

            'message' => $this->user->name . ' has submitted an owner verification request.',

            'type' => 'info',

            'url' => '/admin/owner-requests'

        ];
    }
}