<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

        $users = DB::table('users')
                ->where('approved', '=', 1)
                ->get();
        // $users = Post::find(1);
        // return $users->post->title;
        return view("admin.jobreqs.allreq" , compact('users')); 
        //compact is a function in PHP , This users is the same as $users 
    }


    public function edit($id)
    {
        //
        $user = User::findOrFail($id);
        return view('admin.jobreqs.allreq' , compact('user'));
    }

    public function update(Request $request, $id)
    {
        //
    
        $user = User::findOrFail($id);
        $user->update([
            'approved' => $request->approved
        ]);
        return redirect()->back()->with(['success' => 'Applicant has been accepted']);
    }
    public function destroy($id)
    {
        //
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back()->with(['success' => 'Applicant has been Rejected']);
    }
}