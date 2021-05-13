<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User\Jobapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobappController extends Controller
{
    //
    public function index()
    {
        $jobapps = Jobapp::paginate(5);
        return view("admin.applicantsreq.allreq" , compact('jobapps'));
        // $Jobapps = Jobapp::paginate(5);
        // return view("user.jobrequests.jobform" , compact('Jobapps'));
    }
    public function create()
    {
        return view("user.jobrequests.jobform");
    }

    public function store(Request $request)
    {
        //insert in DB with validation
        $validator = Validator::make($request->all() , [
            'name' => ['required', 'min:4' , 'max:225'],
            'email' => ['required', 'unique:jobapps'],
            'address' => ['required', 'unique:jobapps'],
            'phoneno' => ['required', 'unique:jobapps'],
            'age' => ['required'],
            'experience' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        Jobapp::create([
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phoneno' => $request->phoneno,
            'age' => $request->age,
            'experience' => $request->experience
        ]);
        return redirect()->back()->with(['success' => 'Your request has been submitted']);
    }
}