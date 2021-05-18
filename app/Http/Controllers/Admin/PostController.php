<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function AllPosts(User $user, Post $post){
        $posts = $post->where("user_id", "=", $user->id)->get();
        return view('your.view' , compact('posts'));
    }

    public function index()
    {
        $posts = Post::paginate(5);
        return view('admin.posts.allposts' , compact('posts'));
        
    }

    public function create()
    {
        return view("admin.posts.createpost");
    }

    public function store(Request $request)
    {
        //insert in DB with validation
        $validator = Validator::make($request->all() , [
            'title' => ['required', 'min:4' , 'max:225'],
            'description' => ['required', 'unique:posts'],
            'user_id' => ['required']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'user_id' => $request->user_id,
        ]);
        return redirect()->back()->with(['success' => 'Post has been added']);
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.postdetails' , compact('post'));
    }

    public function edit($id)
    {
        //
        $post = Post::findOrFail($id);
        return view('admin.posts.editpost' , compact('post'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all() , [
            'title' => ['required', 'min:4' , 'max:225'],
            'description' => ['required' , 'unique:posts']
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $user = Post::findOrFail($id);
        $user->update([
            'name' => $request->title ,
            'description' => $request->description
        ]);
        return redirect()->back()->with(['success' => 'Post has been updated']);
    }

    public function destroy($id)
    {
        //
        $post = Post::findOrFail($id);
        $post->delete();
        return redirect()->back()->with(['success' => 'Post has been deleted']);
    }
}
