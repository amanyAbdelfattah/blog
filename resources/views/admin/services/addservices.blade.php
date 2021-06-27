@extends('layouts.admin')
@section('title') Add Service @endsection
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
                                <h1 class="h4 text-gray-900 mb-4">Add New Service</h1>
                            </div>
                            <form method="POST" action="{{route('service.store')}}" class="user" enctype="multipart/form-data">
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
                                        name="service_title" placeholder="Service Title">
                                        @error('service_title')
                                        <small class="text-danger"> {{$message}} </small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                    name="service_desc" placeholder="Service Description">
                                    @error('service_desc')
                                <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                    name="price" placeholder="Service Price">
                                    @error('price')
                                <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <h5>Choose Related Category</h5>
                            <div class="checkbox"> 
                                <div class="btn-group-vertical">
                                    @foreach ($categories as $category)
                                    <label for=""><input type="checkbox" name="cat_id" value="{{$category->id}}"> {{$category->cat_name}}</label>
                                    @endforeach
                                </div>
                            </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <input type="submit" value="Add Service" class="btn btn-primary btn-user btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection