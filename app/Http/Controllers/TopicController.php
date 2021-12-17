<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateSubscriptionRequest;
use App\Http\Requests\PublishTopicRequest;
use App\Models\Topic;
use App\Services\CreateSubscriberService;
use App\Services\PublishTopicService;

// use Illuminate\Routing\Controller as BaseController;

class TopicController extends AppBaseController
{
    public function subscribe($topic, CreateSubscriptionRequest $request, CreateSubscriberService $service)
    {
        $service->execute($request->topic, $request->url);
        return $request->only(['url', 'topic']);
    }

    public function publish($topic, PublishTopicRequest $request, PublishTopicService $service)
    {
        return $service->execute($request->topic, $request->data);        
    }
}
