<?php
namespace App\Services;

use App\Models\Subscriber;
use App\Models\Topic;
use App\Notifications\NotifySubscriber;

class PublishTopicService
{
    public function execute($topic_title, $data)
    {
        $topic = Topic::where([
            'title' => $topic_title
        ])->first();
        // $topic->body = $data;
        // $topic->save();
return;
        $failed = $succeed = 0;
        foreach ($topic->subscribers as $subscriber) {
            try {
                dd('ds');
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
