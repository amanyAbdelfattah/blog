<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
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

        $users = User::paginate(5);
        // $users = Post::find(1);
        // return $users->post->title;
        return view("admin.users.all" , compact('users')); 
        //compact is a function in PHP , This users is the same as $users 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //insert in DB with validation
        $validator = Validator::make($request->all() , [
            'name' => ['required', 'min:4' , 'max:225'],
            'email' => ['required' , 'email' , 'unique:users'],
            'password' => ['required' , 'min:8'],
            'address' => ['required', 'unique:jobapps'],
            'phoneno' => ['required', 'unique:jobapps'],
            'age' => ['required'],
            'experience' => ['required'],
        ]);
        // ERROR: There is no validation rule named string
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address'=>$request->address,
            'phoneno'=>$request->phoneno,
            'age'=>$request->age,
            'experience'=>$request->experience
        ]);
        return redirect()->back()->with(['success' => 'User has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //SELECT * users WHERE id=?
        $user = User::findOrFail($id);
        return view('admin.users.profile' , compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.users.edit' , compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all() , [
            'name' => ['required', 'min:4' , 'max:225'],
            'email' => ['required' , 'email' , 'unique:users'],
            'address' => ['required', 'unique:jobapps'],
            'phoneno' => ['required', 'unique:jobapps'],
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
            'experience'=>$request->experience
        ]);
        return redirect()->back()->with(['success' => 'User has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'User has been deleted']);
    }
}
