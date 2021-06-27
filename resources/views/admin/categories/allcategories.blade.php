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
    <div class="card" style="width: 18rem;">
        @foreach ($categories as $category)
        {{-- <img src={{asset('uploads/categories/' . $category->cat_img)}} class="card-img-top"> --}}
        <div class="card-body">
            <h5 class="card-title">{{$category->cat_name}}</h5>
            <a href="{{route('categories.show' , $category->id)}}" class="btn btn-info m-1">Show</a>
            <a href="{{route('categories.edit' , $category->id)}}" class="btn btn-warning m-1">Edit</a>
            <form method="POST" action="{{route('categories.destroy' , $category->id)}}">
                @csrf
                {{method_field('DELETE')}}
                <input type="submit" class="btn btn-danger m-1" value="Delete">
            </form>
        </div>
        @endforeach
    </div>
    <div class="container">
        {{$categories->links()}}
    </div>
    
</div>

@endsection