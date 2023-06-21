<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{
   
    public function view(){
        $blogs=Blog::all();
        return view('blogs.blogs',['blogs'=>$blogs]);
    }

    public function index(){
        $blogs=Blog::where('user_id' , Auth::id())->get();
        return view('blogs.blogs',['blogs'=>$blogs]);
    }

    public function blogDetails($id){
        $blogs=Blog::find($id);
        return view('blogs.blogDetail',['blogs'=>$blogs]);
    }

    public function blogs(){
        return view('blogs.addBlog');
    }

    public function create(Request $request){
        $request->validate([
            'title' => 'required|min:3|max:25',
            'content' => 'required|min:3|max:150'
 
        ]);
        $blogData = array_merge($request ->all(),['user_id'=>Auth::id()]);
        Blog::create($blogData); 
        return redirect('blogs')->with('success','Blog is Added Sucessfully');
    }

    public function edit(Blog $id){
        $this->authorize('update',$id);
        return view('blogs.editBlog',['blogs'=>$id]);
    }

    public function updateBlog(Request $request, Blog $id){
        $request->validate([
            'title' => 'required|min:3|max:25',
            'content' => 'required|min:3|max:150'
        ]);
        $id->title=$request->title;
        $id->content=$request->content;
        if($id->save()){
            return redirect()->route('blogs.details', ['id' => $id])->with('success','Blog is Edited Sucessfully');       
         }
    }

    public function delete($id){
        // $this->authorize('delete',$id);
        Blog::find($id)->delete();
        return redirect('blogs')->with('success','Blog is Deleted Sucessfully');
    }
}
