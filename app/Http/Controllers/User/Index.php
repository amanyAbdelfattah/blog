<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\Service;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class index extends Controller
{
    //
    public function index()
    {
        $services = Service::all();
        $users = User::all();
        $feedbacks = Post::paginate(3);
        return view("user.index", compact('services', 'users' ,'feedbacks'));
    }

    public function show($id)
    {
        //To show user profile
        $user = User::findOrFail($id);
        $posts = DB::table('posts')
        ->where('user_id', '=', Auth::user()->id)
        ->get();
        return view('user.profiles.showprofile' , compact('user','posts'));
    }
}