<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewItemRequest extends Notification
{
    use Queueable;

    protected $item;

    public function __construct($item)
    {
        $this->item = $item;
    }

    public function via(object $notifiable): array
    {
        return ['database'];
    }

    public function toDatabase(object $notifiable): array
    {
        return [

            'title' => 'New Item Request',

            'message' => '"' . $this->item->title . '" has been submitted for approval.',

            'type' => 'info',

            'url' => '/admin/item-requests'

        ];
    }
}