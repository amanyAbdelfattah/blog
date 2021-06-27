<?php

namespace App\Http\Controllers\User;

use App\Models\Admin\Service;
use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrderServiceController extends Controller
{
    public function create()
    {
        //
        $services = Service::all();
        return view('user.orders.makeorders' , compact('services'));
    }

    public function store(Request $request)
    {
        //
        $service = new Service();
        $order = Order::create([
            'user_id' => Auth()->user() ? Auth()->user()->id : null,
            'service_id' => $request->input('service_id')
            // 'service_id' => $service->id,
        ]);
        return redirect()->back()->with(['success' => 'Your Order had been submitted']);
    }
}
