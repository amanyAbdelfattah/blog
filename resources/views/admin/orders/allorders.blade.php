@extends('layouts.admin')
@section('title') Orders @endsection
@section ('content')
    <div class="container-fluid">
        
    {{-- $in_DB = 1;
    if($count == $in_DB):?>
    <h1 class="text-center mt-5">Pending Requests</h1> --}}
    <h1 class="text-gray-900 my-4 text-center">Pending Orders</h1>
    <div class="row">
        @if (Session::has('success'))
        <div class="card col-12 mb-4 py-3 border-left-success">
            <div class="card-body">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
    </div>
    <table class="table table-striped mt-5 text-center" style="font-weight:500">
    <thead>
        <tr>
            <th scope="col">User Picture</th>
            <th scope="col">Fullname</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Serivce</th>
            <th scope="col">Order Date</th>
            <th scope="col">Control</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($orders as $order)
        <tr>
            <th scope="row"><img src="{{asset('uploads/user/' . $order->user->image)}}" style="max-width: 100%;"></th>
            <th scope="row">{{$order->user->name}}</th>
            <td>{{$order->user->email}}</td>
            <td>{{$order->user->address}}</td>
            <td>{{$order->user->phoneno}}</td>
            <td>{{$order->service->service_title}}</td>
            <td>{{$order->service->created_at}}</td>
            <td class="d-flex">
                <form method="POST" action="{{route('order.update' , $order->id)}}">
                    @csrf
                        {{method_field('PUT')}}
                        <input type="hidden" value="1" name="status">
                        <input type="submit" class="btn btn-success m-1" value="Accept">
                </form>
                <form method="POST" action="{{route('order.destroy' , $order->id)}}">
                    @csrf
                    {{method_field('DELETE')}}
                    <input type="submit" class="btn btn-danger m-1" value="Reject">
                </form>
            </td>
        </tr>
        @endforeach
    
    </tbody>
</table>
<div class="container">
    {{$orders->links()}}
</div>
</div>
@endsection