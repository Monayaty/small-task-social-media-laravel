<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Carbon\Carbon;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::all()->load('comments');
        return $post;
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->body = $request->body;
        $post->user_id = $request->user_id;
        $post->created_at = Carbon::now();
        $post->save();
    }

    public function update(Request $request, $post_id)
    {
        $post = Post::findOrFail($post_id);
        $post ->update([
           'body'=>$request->body,
            'user_id'=>$request->user_id,  
            'created_at' => Carbon::now()
        ]);

    }

    public function show($id)
    {
      $post =  Post::find($id);
      dd($post->comments);

      return $post->comments ;
    }

    public function delete($post_id)
    {
        $post=Post::find($post_id); 
        $post->delete();
    }