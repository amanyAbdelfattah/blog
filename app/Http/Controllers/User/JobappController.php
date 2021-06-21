<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class JobappController extends Controller
{
    //
    public function index()
    {
        $users = User::paginate(5);
        return view("user.jobrequests.jobform" , compact('users'));
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
            'email' => ['required', 'unique:users'],
            'address' => ['required'],
            'phoneno' => ['required', 'unique:users'],
            'age' => ['required'],
            'experience' => ['required'],
            'password' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        // User::create([
        //     'name' => $request->name,
        //     'email' => $request->email,
        //     'address' => $request->address,
        //     'phoneno' => $request->phoneno,
        //     'age' => $request->age,
        //     'experience' => $request->experience,
        //     'password' => $request->password,
        //     'approved' => 1,
        // ]);
        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = $request->input('password');
        $user->address = $request->input('address');
        $user->phoneno = $request->input('phoneno');
        $user->age = $request->input('age');
        $user->experience = $request->input('experience');
        $user->approved = 1;
        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/user/' , $filename);
            $user->image = $filename;
        }
        else{
            return $request;
            $user->image = '';
        }
        $user->save();
        return redirect()->back()->with(['success' => 'Your request has been submitted']);
    }
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'Applicant has been deleted']);
    }
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all() , [
            'image' =>['required'],
            'name' => ['required', 'min:4' , 'max:225'],
            'email' => ['required' , 'email' , 'unique:users'],
            'address' => ['required'],
            'phoneno' => ['required', 'unique:users'],
            'age' => ['required'],
            'experience' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $user = User::findOrFail($id);
        $user->update([
            'name' => $request->name ,
            'email' => $request->email,
            'address'=>$request->address,
            'phoneno'=>$request->phoneno,
            'age'=>$request->age,
            'experience'=>$request->experience,
            'approved' => 0
        ]);
        return redirect()->back()->with(['success' => 'User has been updated']);
    }
}
