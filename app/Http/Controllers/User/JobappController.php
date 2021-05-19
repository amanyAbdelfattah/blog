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
        return view("user.jobrequests.jobform" , compact('jobapps'));
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
            'password' => ['required'],
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
            'experience' => $request->experience,
            'password' => $request->password
        ]);
        return redirect()->back()->with(['success' => 'Your request has been submitted']);
    }
    public function destroy($id)
    {
        //
        $jobapp = Jobapp::findOrFail($id);
        $jobapp->delete();
        return redirect()->back()->with(['success' => 'Applicant has been deleted']);
    }
}
