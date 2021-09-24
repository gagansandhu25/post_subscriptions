<?php

use App\Events\PostCreated;
use App\Helpers;
use App\Http\Requests\CreatePostRequest;
use App\Http\Requests\SubscribeRequest;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Website;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\MessageBag;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('posts', function(CreatePostRequest $request, MessageBag $messageBag) {
    $website = Helpers::getWebsite($request->website);

    $post = Post::create([
        "title" => $request->title,
        "description" => $request->description,
        "website_id" => $website->id,
    ]);

    event(new PostCreated($website, $post));

    return response()->json([
        "success" => true,
        "message" => "Post Created"
    ]);
});

Route::post('subscriptions', function(SubscribeRequest $request) {
    $website = Helpers::getWebsite($request->website);

    $subscribed = Subscription::where("email", $request->email)
        ->where("website_id", $website->id)
        ->count();

    if ($subscribed > 0) {
        return response()->json([
            "error" => true,
            "message" => "Already subscribed."
        ], 400);
    }

    Subscription::create([
        "email" => $request->email,
        "website_id" => $website->id,
    ]);

    return response()->json([
        "success" => true,
        "message" => "Subscribed"
    ]);
});
