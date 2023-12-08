<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendAdminNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

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
