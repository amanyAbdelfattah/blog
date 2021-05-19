<?php

namespace App\Http\Controllers;

use App\Doctor;
use App\Hospital;
use App\Models\Admin\Post;
use App\Models\Phone;
use App\Models\User;
use Illuminate\Http\Request;

class RelationsController extends Controller
{
    //
    public function hasOne()
    {
        $user = User::with('phone')->get();
        return response()->json($user);
    }

    public function hasOneReverse()
    {
        $phone = Phone::with([
            'user' => function($query)
            {
                $query->select('id' , 'name' , 'email');
            },
        ])->get();
        return response()->json($phone);
    }
    // Start Doctors || Hospitals Relationship
    public function hasMany()
    {
        $hospitals = Hospital::with([
            'doctor' => function($query)
            {
                $query->select('name','phone','hospital_id');
            }
        ])->get();
        // return response()->json($hospital);
        return view('hasmany' , compact('hospitals'));
    }

    public function hasManyReverse()
    {
        $doctor = Doctor::with('hospital')->get();
        return response()->json($doctor);
    }

    // End Doctors || Hospitals Relationship

    // Start Users || Posts Relationship

    public function UserhasMany()
    {
        $users = User::with([
            'post' => function($review)
            {
                $review->select('title','description','user_id');
            }
        ])->get();
        return view('admin.posts.allposts', compact('users'));
    }

    public function UserhasManyReverse()
    {
        $post = Post::with('user')->get();
        return response()->json($post);
    }

    // End Users || Posts Relationship
}
