<?php

namespace App\Notifications;

use App\Models\Review;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class NewReviewNotification extends Notification
{
    use Queueable;

    protected $review;

    public function __construct(Review $review)
    {
        $this->review = $review;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'New Review Received',
            'message' => auth()->user()->name . ' left a review on your item "' . $this->review->item->title . '".',
            'review_id' => $this->review->id,
            'item_id' => $this->review->item_id,
            'rating' => $this->review->rating,
            'type' => 'new_review',
        ];
    }
}