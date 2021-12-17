<?php
namespace App\Services;

use App\Models\Subscriber;
use App\Models\Topic;

class CreateSubscriberService
{
    public function execute($topic_title, $url)
    {
        $topic = Topic::firstOrCreate([
            'title' => $topic_title
        ]);
        
        $subscriber = Subscriber::firstOrCreate([
            'url' => $url,
            'topic_id' => $topic->id
        ]);
    }
}
