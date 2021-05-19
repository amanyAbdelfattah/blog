<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Jobapp;

class ApplicantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //SELECT * FROM users
        //$users = User::all()

        $jobapps = Jobapp::paginate(5);
        // $users = Post::find(1);
        // return $users->post->title;
        return view("admin.jobreqs.allreq" , compact('jobapps')); 
        //compact is a function in PHP , This users is the same as $users 
    }

//     public function test($id)
// {
//     $jobapps = Jobapp::where('id', $id); //this will select the row with the given id

//     //now save the data in the variables;
//     $name = $jobapps->name;
//     $email = $jobapps->email;
//     $password = $jobapps->password;
//     $jobapps->delete();

//     $users = new User();
//     $users->name = $name;
//     $users->email = $email;
//     $users->password = $password;
//     $users->save();

//     //then return to your view or whatever you want to do
//     return view('admin.jobreqs.allreq');

// }
}