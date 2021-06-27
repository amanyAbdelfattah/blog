@extends('layouts.admin')
@section('title') Add Category @endsection
@section ('content')

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Add New Category</h1>
                            </div>
                            <form method="POST" action="{{route('categories.store')}}" class="user" enctype="multipart/form-data">
                                <div class="row">
                                    @if (Session::has('success'))
                                    <div class="card col-12 mb-4 py-3 border-left-success">
                                        <div class="card-body">
                                            {{Session::get('success')}}
                                        </div>
                                    </div>
                                    @endif
                                </div>
                                <div class="form-group row">
                                    @csrf
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                        name="cat_name" placeholder="Category Name">
                                        @error('cat_name')
                                        <small class="text-danger"> {{$message}} </small> 
                                        @enderror
                                    </div>
                                </div>
                                <input type="submit" value="Add Category" class="btn btn-primary btn-user btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection