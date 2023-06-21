<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $id)
    {
        $validated = $request->validate([
            'content' => 'required|max:30|string'
        ]);
        $comment = new Comment();

        $comment ->content=$request->content;
        $comment ->user_id = Auth::id();
        $comment ->blog_id=$id;
        // dd($comment);
        $comment->save();
        return back();

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        return view('blogs.updateComment',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'content' => 'required|max:70|string'
        ]);
        $comment = Comment::findOrFail($id);

        $comment ->content=$request->content;
        $comment ->user_id = Auth::id();
        $comment ->blog_id;
        // dd($comment);
        if($comment->save())
        session()->flash('success','Comment updated successfully');
        return back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        if (auth()->user()->is($comment->user)) {
            $comment->delete();
        }
        return back();
    }
}
