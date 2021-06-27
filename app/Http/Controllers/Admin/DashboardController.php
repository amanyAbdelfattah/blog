<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Post;
use App\Models\Admin\Service;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use League\OAuth1\Client\Server\Server;

class DashboardController extends Controller
{
    //

    public function index()
    {
        $users = DB::table('users')->get()->count();
        $services = DB::table('services')->get()->count();
        $categories = DB::table('categories')->get()->count();
        $posts = DB::table('posts')->get()->count();
        return view("admin.dashboard" , compact('users' , 'services' , 'categories' , 'posts'));
    }
}
