<?php

namespace App\Listeners\PostCreated;

use App\Events\PostCreated;
use App\Mail\NewPost;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class NotifySubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param  PostCreated  $event
     * @return void
     */
    public function handle(PostCreated $event)
    {
        $subscribers = Subscription::where("website_id", $event->website->id)->pluck("email");

        foreach ($subscribers as $item) {
            Mail::to($item)->send(new NewPost($event->website, $event->post));
        }
    }
}
