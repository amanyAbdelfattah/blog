@extends('layouts.admin')
@section('title') Job Requests @endsection
@section ('content')
    <div class="container-fluid">
        
    {{-- $in_DB = 1;
    if($count == $in_DB):?>
    <h1 class="text-center mt-5">Pending Requests</h1> --}}
    <h1 class="text-gray-900 my-4 text-center">Pending Requests</h1>
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
            <th scope="col">Fullname</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Age</th>
            <th scope="col">Years of Experience</th>
            <th scope="col">Control</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($jobapps as $jobapp)
        <tr>
            <th scope="row">{{$jobapp->name}}</th>
            <td>{{$jobapp->email}}</td>
            <td>{{$jobapp->address}}</td>
            <td>{{$jobapp->phoneno}}</td>
            <td>{{$jobapp->age}}</td>
            <td>{{$jobapp->experience}}</td>
            <td class="d-flex">
                <a class="btn btn-success m-1" href="{{route('test' , $id)}}">Accept</a>
                {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                <form method="POST" action="{{route('jobapp.destroy' , $jobapp->id)}}">
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
    {{$jobapps->links()}}
</div>
</div>
@endsection