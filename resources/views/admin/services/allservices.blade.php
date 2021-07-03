@extends('layouts.admin')
@section('title') Dashboard @endsection
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Services</h1>
                </div>
                <a class="btn btn-primary" href="{{route('service.create')}}">Add New Service</a>
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
    {{-- <div class="card" style="width: 18rem;">
        @foreach ($services as $service)
        <img src={{asset('uploads/service/' . $service->image)}} class="card-img-top">
        <div class="card-body">
            <h5 class="card-title">{{$service->service_title}}</h5>
            <p class="card-text">{{$service->service_desc}}</p>
            <p class="card-text">{{$service->price}}</p>
            <td style="border-bottom-width: 0;">{{$service->category->cat_name}}</td>
            <a href="{{route('service.show' , $service->id)}}" class="btn btn-info m-1">Show</a>
            <a href="{{route('service.edit' , $service->id)}}" class="btn btn-warning m-1">Edit</a>
            <form method="POST" action="{{route('service.destroy' , $service->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger m-1" value="Delete">
            </form>
        </div>
        @endforeach
    </div> --}}
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Service Image</th>
            <th scope="col">Service Title</th>
            <th scope="col">Service Description</th>
            <th scope="col">Service Category</th>
            <th scope="col">Service Price</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <th scope="row"><img src="{{asset('uploads/service/' . $service->image)}}" width="100px;" height="100px;"></th>
                <th scope="row">{{$service->service_title}}</th>
                <td style="border-bottom-width: 0;">{{$service->service_desc}}</td>
                <td style="border-bottom-width: 0;">{{$service->category->cat_name}}</td>
                <td style="border-bottom-width: 0;">{{$service->price}}</td>
                <td class="d-flex" style="border-bottom-width: 0;">
                    <a class="btn btn-info m-1" href="{{route('service.show' , $service->id)}}">Show</a>
                    <a class="btn btn-warning m-1" href="{{route('service.edit' , $service->id)}}">Edit</a>
                    {{-- <a class="btn btn-info m-1" href="{{route('post.show' , $user->id)}}">Posts</a> --}}
                    {{-- <a class="btn btn-danger" href="">Delete</a> --}} 
                    <form method="POST" action="{{route('service.destroy' , $service->id)}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" class="btn btn-danger m-1" value="Delete">
                    </form>
                </td>
            </tr>
            @endforeach
        
        </tbody>
    </table>
    <div class="container">
        {{$services->links()}}
    </div>
    
</div>

@endsection