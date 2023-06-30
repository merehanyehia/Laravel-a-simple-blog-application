<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Comment $comment ,$id)
    {
        $validated = $request->validate([
            'content' => 'required|min:3|max:90'
        ]);

        $comment ->content=$request->content;
        $comment ->user_id = Auth::id();
        $comment ->blog_id=$id;
        $comment->save();
        return back()->with('success','Comment is Added successfully');

    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        $this->authorize('update',$comment);
        return view('blogs.updateComment',['comment'=>$comment]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $validated = $request->validate([
            'content' => 'required|min:3|max:90'
        ]);

        $comment = Comment::findOrFail($id);
        $this->authorize('update',$comment);

        $comment ->content=$request->content;
        $comment ->user_id = Auth::id();
        $comment ->blog_id;
        if($comment->save()){
            return redirect()->route('blogs.comments',['id' => $comment->blog_id])->with('success','Comment updated successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $this->authorize('delete', $comment);
        $comment->delete();
        return back()->with('success','Comment is Deleted Successfully');
    }
}
