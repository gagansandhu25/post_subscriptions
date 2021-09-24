<?php

namespace App\Console\Commands;

use App\Mail\NewPost;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class PostNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'PostNotification:send {website} {post}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $website = $this->argument("website");
        $post = $this->argument("post");

        $subscribers = Subscription::where("website_id", $website->id)->pluck("email");

        foreach ($subscribers as $item) {
            Mail::to($item)->send(new NewPost($website, $post));
        }

        return 1;
    }
}
