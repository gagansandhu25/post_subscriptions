@component('mail::message')
    # New Post on {{ $website->domain }}

    ### {{ $post->title }}

    {{ $post->description }}

@endcomponent
