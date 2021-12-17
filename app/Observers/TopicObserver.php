<?php

namespace App\Observers;

use App\Models\Topic;
use App\Notifications\NotifySubscriber;

class TopicObserver
{
  
    /**
     * Handle the User "updated" event.
     *
     * @param  \App\Models\User  $user
     * @return void
     */
    public static function updated(Topic $topic)
    {
        $failed = $succeed = 0;
        foreach ($topic->subscribers as $subscriber) {
            try {
                $response = $subscriber->notify((new NotifySubscriber($subscriber->url, $topic->body)));                
            } catch (\Throwable $th) {
                $response = false;
            }
            if($response)
                $succeed++;
            else
                $failed ++;
        }
        return [
            'succeed'=> $succeed,
            'failed'=> $failed,
        ];
    }

}