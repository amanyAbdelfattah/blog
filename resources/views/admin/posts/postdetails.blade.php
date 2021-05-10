@extends('layouts.admin')
@section('title') Post Details @endsection
@section ('content')

<div class="card m-auto p-2" style="width: 39rem; border:1px solid gray;">
    {{-- <img src="..." class="card-img-top" alt="..."> --}}
    <div class="card-body">
        <h3 class="p-3">{{$post->title}}</h3>
    <p class="card-text">{{$post->description}}</p>
    </div>
</div>

@endsection