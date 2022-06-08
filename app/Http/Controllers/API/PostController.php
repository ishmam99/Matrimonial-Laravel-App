<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Http\Resources\PostResource;
use App\Models\Post;
use App\Models\Profile;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        if (auth()->user()->profile->posts) {
            $posts = auth()->user()->profile->posts->load('profile');
            return $this->apiResponseResourceCollection(200, 'User Posts', PostResource::collection($posts));
        } else
            return $this->apiResponse(404, 'You Have No Post Yet');
    }
    public function store(PostRequest $request)
    {
        $input = $request->validated();
        if ($request->post_image)
            $input['post_image'] = uploadFile($request->file('post_image'), 'post');
        if ($request->video)
            $input['video'] = uploadFile($request->file('video'), 'post');
        auth()->user()->profile->posts()->create($input);
        return $this->apiResponse(201, 'Post Created Successfully');
    }
    public function show(Post $post)
    {
        return $this->apiResponse(200, 'Post Details', PostResource::make($post));
    }

    public function update(PostRequest $request, Post $post)
    {
        $input = $request->validated();
        if ($request->hasFile('post_image')) {
            if (File::exists('storage/post/' . $post->post_image)) {
                File::delete('storage/post/' . $post->post_image);
            }
            $input['post_image'] = uploadFile($request->file('post_image'), 'post');
        }
        if ($request->hasFile('video')) {
            if (File::exists('storage/post/' . $post->video)) {
                File::delete('storage/post/' . $post->video);
            }
            $input['video'] = uploadFile($request->file('video'), 'post');
        }
        $post->update($input);
        return $this->apiResponse(201, 'Post Updated Successfully');
    }
    public function destroy(Post $post)
    {
        if ($post->post_image)
            File::delete('storage/post/' . $post->post_image);
        if ($post->video)
            File::delete('storage/post/' . $post->video);
        $post->delete();
        return $this->apiResponse(200, 'Post Deleted Successfully');
    }

    public function postList()
    {
        $posts = Post::with('profile')->get();
        return $this->apiResponseResourceCollection(200, 'All Post List', PostResource::collection($posts));
    }
    public function timeline()
    {
        $posts = [];
        $followings = auth()->user()->profile->followings->where('status', 1);
        foreach ($followings->load('following') as $profile) {
            $profile->following->load('posts');
            if ($profile->following->posts)
                foreach ($profile->following->posts as $post) {
                    $posts[] = $post->load('profile');
                }
        }

        return $this->apiResponseResourceCollection(200, 'Timeline Posts', PostResource::collection($posts));
    }
}
