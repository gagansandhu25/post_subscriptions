<?php

namespace App\Mail;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NewPost extends Mailable implements ShouldQueue
{
    use Queueable, SerializesModels;

    private $website;
    private $post;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Website $website, Post $post)
    {
        $this->website = $website;
        $this->post = $post;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject("New Post")
            ->markdown('emails.new_post')
            ->with("website", $this->website)
            ->with("post", $this->post);
    }
}
