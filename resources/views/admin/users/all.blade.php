@extends('layouts.admin')
@section('title') Dashboard @endsection
@section ('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Users</h1>
                </div>
                <a class="btn btn-primary" href="{{route('user.create')}}">Add User</a>
            </div>
    <div class="row">
        @if (Session::has('success'))
        <div class="card col-12 mb-4 py-3 border-left-success">
            <div class="card-body">
                {{Session::get('success')}}
            </div>
        </div>
        @endif
    </div>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Image</th>
            <th scope="col">Username</th>
            <th scope="col">Email</th>
            <th scope="col">Address</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Age</th>
            <th scope="col">Experience</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <th scope="row"><img src="{{asset('uploads/user/' . $user->image)}}" style="max-width: 100%;"></th>
                <th scope="row">{{$user->name}}</th>
                <td>{{$user->email}}</td>
                <td>{{$user->address}}</td>
                <td>{{$user->phoneno}}</td>
                <td>{{$user->age}}</td>
                <td>{{$user->experience}}</td>
                <td class="d-flex">
                    @if (Auth::user()->admin == 1)
                    <a class="btn btn-info m-1" href="{{route('user.show' , $user->id)}}">Show</a>
                    <a class="btn btn-warning m-1" href="{{route('user.edit' , $user->id)}}">Edit</a>
                    <form method="POST" action="{{route('user.destroy' , $user->id)}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" class="btn btn-danger m-1" value="Delete">
                    </form>   
                    
                    @else
                    <a class="btn btn-info m-1" href="{{route('user.show' , $user->id)}}">Show</a>
                    @endif
                    
                    {{-- <a class="btn btn-info m-1" href="{{route('post.show' , $user->id)}}">Posts</a> --}}
                    {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                    
                </td>
            </tr>
            @endforeach
            
        </tbody>
    </table>

    
</div>
@endsection