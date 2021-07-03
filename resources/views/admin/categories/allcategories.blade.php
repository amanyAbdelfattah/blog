@extends('layouts.admin')
@section('title') Dashboard @endsection
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Categories</h1>
                </div>
                <a class="btn btn-primary" href="{{route('categories.create')}}">Add New Category</a>
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
            <th scope="col">Category Image</th>
            <th scope="col">Category Name</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row"><img src="{{asset('uploads/category/' . $category->cat_img)}}" width="100px;" height="100px;"></th>
                <td style="border-bottom-width: 0;">{{$category->cat_name}}</td>
                <td class="d-flex" style="border-bottom-width: 0;">
                    <a class="btn btn-info m-1" href="{{route('categories.show' , $category->id)}}">Show</a>
                    <a class="btn btn-warning m-1" href="{{route('categories.edit' , $category->id)}}">Edit</a>
                    {{-- <a class="btn btn-info m-1" href="{{route('post.show' , $user->id)}}">Posts</a> --}}
                    {{-- <a class="btn btn-danger" href="">Delete</a> --}} 
                    <form method="POST" action="{{route('categories.destroy' , $category->id)}}">
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
        {{$categories->links()}}
    </div>
    
</div>

@endsection