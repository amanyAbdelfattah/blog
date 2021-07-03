<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\Admin\Service;
use App\Models\User;

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
}