<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $services = Service::paginate(5);
        return view('admin.services.allservices' , compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return view("admin.services.addservices" , compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all() , [
            'image' => ['required'],
            'service_title' => ['required', 'min:4' , 'max:225'],
            'service_desc' => ['required'],
            'price' =>['required'],
            'cat_id' => ['required']
        ]);
        // ERROR: There is no validation rule named string
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $service = new Service();
        $service->service_title = $request->input('service_title');
        $service->service_desc = $request->input('service_desc');
        $service->price = $request->input('price');
        $service->cat_id = $request->input('cat_id');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service/' , $filename);
            $service->image = $filename;
        }
        else{
            return $request;
            $service->image = '';
        }
        $service->save();
        return redirect()->back()->with(['success' => 'Service has been added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $service = Service::findOrFail($id);
        return view('admin.services.editservices' , compact('service'));
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
            'image' => ['required'],
            'service_title' => ['required', 'min:4' , 'max:225'],
            'service_desc' => ['required'],
            'price' => ['required'],
        ]);
        if($validator->fails())
        {
            return redirect()->back()->withErrors($validator)->withInput($request->all());
        }
        $service = Service::findOrFail($id);
        $service->image = $request->input('image');
        $service->service_title = $request->input('service_title');
        $service->service_desc = $request->input('service_desc');
        $service->price = $request->input('price');

        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $file->move('uploads/service/' , $filename);
            $service->image = $filename;
        }
        else{
            return $request;
            $service->image = '';
        }
        $service->update();
        return redirect()->back()->with(['success' => 'Service has been updated']);
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
        $services = Service::findOrFail($id);
        $services->delete();
        return redirect()->back()->with(['success' => 'Service has been deleted']);
    }
}