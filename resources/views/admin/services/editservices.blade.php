@extends('layouts.admin')
@section('title') Edit Service @endsection
@section ('content')

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>
    

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">{{__('Dashboard.EditService')}}!</h1>
                            </div>
                            <form method="POST" action="{{route('service.update' , $service->id)}}" enctype="multipart/form-data">
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
                                    {{method_field('PUT')}}
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user"
                                        name="service_title" value="{{$service->service_title}}">
                                        @error('service_title')
                                        <small class="text-danger"> {{$message}} </small> 
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control form-control-user"
                                    name="service_desc" value="{{$service->service_desc}}">
                                    @error('service_desc')
                                <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-12 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user"
                                    name="price" value="{{$service->price}}">
                                    @error('price')
                                    <small class="text-danger"> {{$message}} </small>
                                    @enderror
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Upload Image</label>
                                    <input class="form-control" type="file" id="formFile" name="image">
                                </div>
                                <input type="submit" value="{{__('Dashboard.UpdateService')}}" class="btn btn-primary btn-user btn-block">
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