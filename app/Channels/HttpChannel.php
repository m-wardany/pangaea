<?php

namespace App\Channels;

use App\Notifications\NotifySubscriber;

class HttpChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, NotifySubscriber $notification)
    {
        $message = $notification->toHttp($notifiable);
        $message->send();
    }
}