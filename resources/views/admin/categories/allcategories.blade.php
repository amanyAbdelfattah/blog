@extends('layouts.admin')
@section('title') Dashboard @endsection
@section ('content')

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{__('Dashboard.AllCategories')}}</h1>
                </div>
                <a class="btn btn-primary" href="{{route('categories.create')}}">{{__('Dashboard.AddCategory')}}</a>
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
            <th scope="col">{{__('Dashboard.CategoryName')}}</th>
            <th scope="col">{{__('Dashboard.Control')}}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td style="border-bottom-width: 0;">{{$category->cat_name}}</td>
                <td class="d-flex" style="border-bottom-width: 0;">
                    <a class="btn btn-warning m-1" href="{{route('categories.edit' , $category->id)}}">{{__('Dashboard.Edit')}}</a>
                    <form method="POST" action="{{route('categories.destroy' , $category->id)}}">
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
        {{$categories->links()}}
    </div>
    
</div>

@endsection