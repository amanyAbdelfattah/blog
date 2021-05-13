@extends('layouts.user')
@section('title')
    Apply For Job
@endsection
@section('content')

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                {{-- <div class="col-lg-5 d-none d-lg-block bg-register-image"></div> --}}
                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Please enter your information!</h1>
                        </div>
                        <form method="POST" action="{{route('jobapp.store')}}" class="user">
                            <div class="row">
                                @if (Session::has('success'))
                                <div class="card col-12 mb-4 py-3" style="border-left:9px solid green;color: black; font-weight:500">
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
                                    name="name" placeholder="Name">
                                    @error('name')
                                    <small class="text-danger"> {{$message}} </small> 
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                name="email" placeholder="Email">
                                @error('email')
                            <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                name="address" placeholder="Address">
                                @error('address')
                            <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                name="phoneno" placeholder="Phone Number">
                                @error('phoneno')
                            <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                name="age" placeholder="Age">
                                @error('age')
                            <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user"
                                name="experience" placeholder="Years of Experience">
                                @error('experience')
                            <small class="text-danger"> {{$message}} </small>
                                @enderror
                            </div>
                            <input type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection