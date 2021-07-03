<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use App\Models\Admin\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FeedbackController extends Controller
{
    public function index()
    {
        //To display redirect user to index page to be able to view or write posts
        return view('user.index');
    }

    public function create()
    {
        return view('user.index');
    }

    public function store(Request $request)
    {
        //insert in DB with validation
        $validator = Validator::make($request->all() , [
            'title' => ['required', 'min:4' , 'max:225'],
            'description' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $feedback = new Post();
        $feedback->title = $request->input('title');
        $feedback->description = $request->input('description');
        $feedback->user_id = auth()->id();
        $feedback->save();
        return redirect()->back()->with(['success' => 'Thanks for your valuable feedback']);
    }
}
