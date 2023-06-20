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


    public function blogDetail($id){
        $blogs=Blog::find($id);
        return view('blogs.blogDetail',['blogs'=>$blogs]);
    }


    public function blogs(){
        return view('blogs.addBlog');
    }

    public function create(Request $request){
        $blogData = array_merge($request ->all(),['user_id'=>Auth::id()]);
        Blog::create($blogData); 
        return redirect('blogs');
    }

    public function delete($id){
        // $this->authorize('delete',)
        Blog::find($id)->delete();
        return redirect('blogs');
    }

}
