<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Admin\Service;
use App\Models\User;

class index extends Controller
{
    //
    public function index()
    {
        $services = Service::all();
        return view("user.index", compact('services'));
    }
}