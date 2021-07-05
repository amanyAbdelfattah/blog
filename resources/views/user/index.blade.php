@extends('layouts.user')
@section('title')
    Welcome
@endsection
@section('content')


<div class="header">
    <div class="overlay"></div>
    <div class="container">
            <div class="row justify-content-center justify-content-md-between navbar align-items-lg-end">
                <span class="col-12 col-md-4 logo">Cleaning<span class="main-color">Fairy</span></span>
                <ul style="width: 20%; list-style:none">
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a style="text-decoration:none; color:white" rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul>
                
                <span class="col-12 col-md-4 links row justify-content-lg-around">
                    <img src="{{asset('uploads/user/' . Auth::user()->image)}}" alt="" style="max-width: 13%">
                    <h5 class="d-block"> <a href="{{route('profile.show', Auth::user()->id)}}" style="color: white; text-decoration: none;">{{ Auth::user()->name }}</a></h5>
                </span>
            </div>
        <div class="intro text-center">
            <h1 class="upper">{{__('UserIndex.HAPPINESS')}} <span class="main-color">{{__('UserIndex.CleanedHouse')}}</span></h1>
            <p>{{__('UserIndex.QOUTE')}}
            </p>
            <div class="a">
                <a class="upper" href="{{ URL::to('user/jobapp') }}">{{__('UserIndex.HIRE')}}</a>
                <a class="upper" href="#ourworks">{{__('UserIndex.WORK')}}</a>
            </div>
        </div>
    </div>
</div>

<!-- End Header -->

<!-- Start Feature -->
<div class="features text-center">
    <div class="container">
        <div class="row justify-content-lg-around">
            <div class="col-12 col-sm-6 col-md-3 box">
                <i class="far fa-building"></i>
                <h3 class="upper">{{__('UserIndex.OFFICE')}}</h3>
                <p>{{__('UserIndex.OFFICEtext')}}</p>
            </div>
            <div class="col-12 col-sm-6 col-md-3 box">
                <i class="fas fa-home" aria-hidden="true"></i>
                <h3 class="upper">{{__('UserIndex.HOUSE')}}</h3>
                <p>{{__('UserIndex.HOUSEtext')}}</p>
            </div>
        </div>
    </div>
</div>
<!-- End Feature -->

<!-- Start our Work -->
<div class="our-work text-center" id="ourworks">
    <div class="container">
        <div>
            <h2 class="upper">{{__('UserIndex.OUR')}} <span class="main-color">{{__('UserIndex.Work')}}</span></h2>
            <p>{{__('UserIndex.OFFERYOU')}}<br> {{__('UserIndex.SERVICES')}}</p>
            <div class="row no-gutters">
                @foreach ($services as $service)
                <div class="col-12 col-sm-6 col-md-4 item">
                    {{-- <input type="hidden" name="service_id" value="{{$service->id}}"> --}}
                    <img src="{{asset('uploads/service/' . $service->image)}}" alt="">
                    <div class="over text-center">
                        <h5 class="upper">{{$service->service_title}}</h5>
                        <p>{{$service->service_desc}}</p>
                        <p>Price: {{$service->price}} L.E</p>
                        <a href="{{route('orderservice.create')}}" class="upper show-more order-service">{{__('UserIndex.OrderService')}}</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button class="upper show-more">{{__('UserIndex.ShowMore')}}</button>
        
    </div>

</div>


<!-- Main Body -->
<div class="comment-container">
    <h2 class="upper">{{__('UserIndex.OURCUSTOMERS')}} <span class="main-color">{{__('UserIndex.SAY')}}</span></h2>
    <p>{{__('UserIndex.CustomersFeedback')}}</p>
    <section class="comment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>{{__('UserIndex.COMMENTS')}}</h1>
                    @foreach ($feedbacks as $feedback)
                    <div class="comment mt-4 text-justify float-left"> <img src="{{asset('uploads/user/' . $feedback->user->image)}}" alt="" class="rounded-circle" width="40" height="40">
                        <h4>{{$feedback->user->name}}</h4> <span>- 20 October, 2018</span> <br>
                        <h5 class="mt-2">{{$feedback->title}}</h5>
                        <p>{{$feedback->description}}</p>
                    </div>
                    @endforeach
                </div>
                <div class="col-lg-4 col-md-5 col-sm-4 offset-md-1 offset-sm-1 col-12 mt-4">
                    <form id="algin-form" method="POST" action="{{route('feedback.store')}}" class="user my-3 opinion">
                        @csrf
                        <div class="row">
                        <div class="form-group">
                            <h4>{{__('UserIndex.LEAVECOMMENT')}}</h4> 
                            <div class="form-group"> <label for="name">{{__('UserIndex.TITLE')}}</label> <input type="text" name="title" id="fullname" class="form-control"> </div>
                            <label for="message">{{__('UserIndex.Message')}}</label> <textarea name="description" id="" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                        </div>
                        <div class="form-group"> <input type="submit" id="post" class="btn" value="{{__('UserIndex.POST')}}"> </div>
                    </form>
                </div>
            </div>
            <div class="container">
                {{$feedbacks->links()}}
            </div>
        </div>
    </section>
</div>
<!-- End Our Work -->

<!-- Start Our Team -->
<div class="our-team text-center">
    <div class="container">
        <h2 class="upper">{{__('UserIndex.OUR')}} <span class="main-color">{{__('UserIndex.Team')}}</span></h2>
        <p>{{__("UserIndex.FIRSTIMP")}}<br />{{__("UserIndex.SECONDIMP")}}</p>
        <div class="team row justify-content-center">
            @foreach ($users as $user)
                @if ($user->admin == 1)
                <div class="person col-12 col-sm-6 col-md-3">
                    <img src="{{asset('uploads/user/' . $user->image)}}" alt="Team Member">
                    <h4 class="upper">{{$user->name}}</h4>
                    <div class="social-media">
                        <i class="fab fa-facebook" aria-hidden="true"></i>
                        <i class="fab fa-twitter" aria-hidden="true"></i>
                        <i class="fab fa-youtube" aria-hidden="true"></i>
                        <i class="fab fa-google" aria-hidden="true"></i>
                    </div>
                    <p>{{__('UserIndex.TEAMINFO')}}</p>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Our Team -->

    @endsection
