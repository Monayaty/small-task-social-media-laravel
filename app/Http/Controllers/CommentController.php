<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use Carbon\Carbon;

class CommentController extends Controller
{
    public function index()
    {
        $comment =  Comment::all();
        dd($comment->post);
        return response()->json([
          'data'=> $comment ,
          'message' =>"success"
        ]); 
    }

    public function store(Request $request)
    {
          $comment = new Comment();
          $comment->content = $request->content;
          $comment->user_id = $request->user_id;
           $comment->post_id = $request->post_id;
          $comment->created_at = Carbon::now();
          $comment->save();
    }

    public function update(Request $request,$comment_id)
    {
          $comment = Comment::findOrFail($comment_id);
          $comment ->update([
            'content'=>$request->content,
            'user_id'=>$request->user_id,  
            'post_id '=> $request->post_id, 
              'created_at' => Carbon::now()
          ]);
    }

    public function show($id)
    {
        $comment =  Comment::find($id);
      return $comment->post;
    }

    public function delete($comment_id)
    {
            $comment=Comment::find($comment_id);
            $comment->delete();
   }
}
