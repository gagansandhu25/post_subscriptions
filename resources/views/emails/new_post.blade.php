@component('mail::message')
# New post on {{ $website->domain }}

## {{ $post->title }}

{{ $post->description }}
@endcomponent
