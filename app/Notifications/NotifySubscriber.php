<?php

namespace App\Notifications;

use App\Channels\HttpChannel;
use App\Channels\SmsChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Http;

class NotifySubscriber extends Notification // implements ShouldQueue
{
    // use Queueable;

    private $url;
    
    private $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($url, $data)
    {
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [HttpChannel::class];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toHttp($notifiable)
    {
        return (Http::post($this->url, $this->data))->ok();
    }


}
