@extends('layouts.admin')
@section('title') Dashboard @endsection
@section ('content')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="p-5">
                <div class="text-center">
                    <h1 class="h4 text-gray-900 mb-4">{{__('Dashboard.AllServices')}}</h1>
                </div>
                <a class="btn btn-primary" href="{{route('service.create')}}">{{__('Dashboard.AddServices')}}</a>
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
            <th scope="col">{{__('Dashboatd.ServiceImage')}}</th>
            <th scope="col">{{__('Dashboatd.ServiceTitle')}}</th>
            <th scope="col">{{__('Dashboatd.ServiceDescription')}}</th>
            <th scope="col">{{__('Dashboatd.ServiceCategory')}}</th>
            <th scope="col">{{__('Dashboatd.ServicePrice')}}</th>
            <th scope="col">{{__('Dashboatd.Control')}}</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($services as $service)
            <tr>
                <th scope="row"><img src="{{asset('uploads/service/' . $service->image)}}" width="100px;" height="100px;"></th>
                <th scope="row">{{$service->service_title}}</th>
                <td style="border-bottom-width: 0;">{{$service->service_desc}}</td>
                <td style="border-bottom-width: 0;">{{$service->category->cat_name}}</td>
                <td style="border-bottom-width: 0;">{{$service->price}}</td>
                <td class="d-flex" style="border-bottom-width: 0;">
                    <a class="btn btn-warning m-1" href="{{route('service.edit' , $service->id)}}">{{__('Dashboard.Edit')}}</a>
                    <form method="POST" action="{{route('service.destroy' , $service->id)}}">
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
        {{$services->links()}}
    </div>
    
</div>

@endsection