<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $Post = Post::all();
        return $this->handleResponse($Post, 'Posts have been retrieved!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $attr = $request->validate([
            'title' => 'required|string',




        ]);
        $user = Post::create([
            'title'      => $attr['title'],


        ]);

        $response = [
            'Post'    => $user->only(['id', 'title']),

        ];
        return response($response, 201);
    }
    public function createTag(Request $request)
    {

        $attr = $request->validate([
            'tag_id' => 'required|integer|exists:tags,id',
            'post_id'  => 'required|integer|exists:posts,id',
        ]);
        $post = Post::find($attr['post_id']);
        if (!$post) {
            return response(['message' => 'post not found'], 404);
        }

        $post->tags()->create([
            'tag_id'      => $attr['tag_id'],

        ]);


        $response = [
            'tag'     => $post->only(['tag_id', 'post_id']),

        ];
        return response($response, 201);
    }

    public function getposts()
    {
        $posts = Post::with(['tags'])->get();
        return $this->handleResponse($posts, 'posts have been retrieved!');
    }
}
