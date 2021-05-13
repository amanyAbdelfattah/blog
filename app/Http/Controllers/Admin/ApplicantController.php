<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\Jobapp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApplicantController extends Controller
{
    //
    public function index()
    {
        $jobapps = Jobapp::paginate(5);
        return view("admin.applicantsreq.allreq" , compact('jobapps'));
    }

    public function store(Request $request)
    {
        //insert in DB with validation
        $validator = Validator::make($request->all() , [
            'name' => ['required', 'min:4' , 'max:225'],
            'email' => ['required' , 'email' , 'unique:users'],
        ]);
        // ERROR: There is no validation rule named string
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        return redirect()->back()->with(['success' => 'Applicant has been added']);
    }
}
