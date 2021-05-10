@extends('layouts.admin')
@section('title') User Profile @endsection
@section ('content')

<div class="container mt-5">
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
    <div class="col-md-4">
        <img src="\adminpanel\img\avatar.jpg" alt="..." style="max-width:100%;">
    </div>
    <div class="col-md-8">
        <div class="card-body">
        <h5 class="card-title">{{$user->name}}</h5>
        <p class="card-text d-block">Email Address: {{$user->email}}</p>
        </div>
    </div>
    </div>
</div>
</div>
@endsection