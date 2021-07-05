@extends('layouts.admin')
@section('title') All Posts @endsection
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{__('Dashboard.AllPosts')}}</h1>
                </div>
                <a class="btn btn-primary" href="{{route('post.create')}}">{{__('Dashboard.AddPost')}}</a>
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
            <th scope="col">{{__('Dashboard.Title')}}</th>
            <th scope="col">{{__('Dashboard.Description')}}</th>
            <th scope="col">{{__('Dashboard.WrittenBy')}}</th>
            <th scope="col">{{__('Dashboard.Control')}}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
            <tr>
                <th scope="row">{{$post->title}}</th>
                <td>{{$post->description}}</td>
                <td>{{$post->user->name}}</td>
                <td class="d-flex">
                    <a class="btn btn-warning m-1" href="{{route('post.edit' , $post->id)}}">{{__('Dashboard.Edit')}}</a>
                    <form method="POST" action="{{route('post.destroy' , $post->id)}}">
                        @csrf
                        {{method_field('DELETE')}}
                        <input type="submit" class="btn btn-danger m-1" value="{{__('Dashboard.Delete')}}">
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
