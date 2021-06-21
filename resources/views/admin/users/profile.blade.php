@extends('layouts.admin')
@section('title') User Profile @endsection
@section ('content')

<div class="container mt-5">
<div class="card mb-3" style="max-width: 100%;">
    <div class="row g-0">
    <div class="col-md-4">
        <img src="{{asset('uploads/user/' . $user->image)}}" alt="..." style="max-width:100%;border-right: 5px solid dodgerblue">
    </div>
    <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title" style="font-size:23px; color:black; font-weight:500;">{{$user->name}}</h5>
        <p class="card-text d-block">Email Address: <span>{{$user->email}}</span></p>
        <p class="card-text d-block">Phone Number: <span>{{$user->phoneno}}</span></p>
        <p class="card-text d-block">Age: <span>{{$user->age}}</span></p>
        <p class="card-text d-block">Years of Experience: <span>{{$user->experience}}</span></p>
        <p class="card-text d-block">Posts: <span>{{$user->post}}</span></p>
        </div>
    </div>
    </div>
</div>
</div>
@endsection