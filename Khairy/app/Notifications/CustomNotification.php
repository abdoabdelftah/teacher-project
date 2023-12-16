<?php

namespace App\Notifications;

use Illuminate\Notifications\Notification;

class CustomNotification extends Notification
{
    protected $message;
    protected $link;

    public function via($notifiable)
    {
        return ['database'];
    }

    public function __construct($message, $link)
    {
        $this->message = $message;
        $this->link = $link;
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'link' => $this->link,
        ];
    }
}
