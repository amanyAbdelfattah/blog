@extends('layouts.user')
@section('title') Apply for Job @endsection
@section ('content')

<body>

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
                            <form method="POST" action="{{route('user.store')}}" class="user">
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
                                        name="name" placeholder="Username">
                                        @error('name')
                                        <small class="text-danger"> {{$message}} </small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="email" class="form-control form-control-user"
                                    name="email" placeholder="Email Address">
                                    @error('email')
                                <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="password" class="form-control form-control-user"
                                    name="password" placeholder="Password">
                                    @error('password')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                    name="address" placeholder="Address">
                                    @error('address')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                    name="phoneno" placeholder="Phone Number">
                                    @error('phoneno')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                    name="age" placeholder="Age">
                                    @error('age')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                    name="experience" placeholder="Years of Experience">
                                    @error('experience')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <input type="submit" value="Submit" class="btn btn-primary btn-user btn-block">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
@endsection