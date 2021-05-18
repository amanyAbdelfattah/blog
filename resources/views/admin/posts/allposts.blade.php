@extends('layouts.admin')
@section('title') All Posts @endsection
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">All Posts</h1>
                </div>
                <a class="btn btn-primary" href="{{route('post.create')}}">Add Post</a>
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
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Written By</th>
            <th scope="col">Control</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{$post->description}}</td>
                <td>{{$post->user->name}}</td>
                <td class="d-flex">
                    <a class="btn btn-info m-1" href="{{route('post.show' , $post->id)}}">Show</a>
                    <a class="btn btn-warning m-1" href="{{route('post.edit' , $post->id)}}">Edit</a>
                    {{-- <a class="btn btn-danger" href="">Delete</a> --}}
                    <form method="POST" action="{{route('post.destroy' , $post->id)}}">
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
        {{$posts->links()}}
    </div>
</div>
@endsection
