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
                <span class="col-12 col-md-4 links row justify-content-lg-around">
                    <img src="{{asset('uploads/user/' . Auth::user()->image)}}" alt="" style="max-width: 10%">
                    <h5 class="d-block">{{ Auth::user()->name }}</h5>
                </span>
            </div>
            {{-- <div id="menu" class="hide menu">
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">About</a></li>
                    <li><a href="">Contact Us</a></li>
                </ul>
                </div> --}}
        <div class="intro text-center">
            <h1 class="upper">We Design <span class="main-color">Things</span></h1>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Odio aut ducimus rem hic laboriosam aperiam quod saepe. Ex, quasi nulla. Lorem ipsum dolor sit amet. dolor sit amet consectetur adipisicing elit. Assumenda ullam quasi eos corporisdebitisvoluptates.
            </p>
            <div class="a">
                <a class="upper" href="{{ URL::to('user/jobapp') }}">Hire Us</a>
                <a class="upper" href="#ourworks">Our Works</a>
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
                <h3 class="upper">Office Cleaning</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam vitae illum odit pariatur</p>
            </div>
            <div class="col-12 col-sm-6 col-md-3 box">
                <i class="fas fa-home" aria-hidden="true"></i>
                <h3 class="upper">House Cleaning</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam vitae illum odit pariatur</p>
            </div>
            {{-- <div class="col-12 col-sm-6 col-md-3 box">
                <i class="far fa-file-archive"></i>
                <h3 class="upper">Photography</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam vitae illum odit pariatur</p>
            </div>
            <div class="col-12 col-sm-6 col-md-3 box">
                <i class="fas fa-brush"></i>
                <h3 class="upper">Graphic Design</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Numquam vitae illum odit pariatur</p>
            </div> --}}
        </div>
    </div>
</div>
<!-- End Feature -->

<!-- Start our Work -->
<div class="our-work text-center" id="ourworks">
    <div class="container">
        <div>
            <h2 class="upper">Our <span class="main-color">Work</span></h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Quos voluptas sapiente quas natus illo, quis quaerat quae porro laudantium fugit?</p>
            <div class="row no-gutters">
                @foreach ($services as $service)
                <div class="col-12 col-sm-6 col-md-4 item">
                    {{-- <input type="hidden" name="service_id" value="{{$service->id}}"> --}}
                    <img src={{asset('uploads/service/' . $service->image)}} alt="">
                    <div class="over text-center">
                        <h5 class="upper">{{$service->service_title}}</h5>
                        <p>{{$service->service_desc}}</p>
                        <p>Price: {{$service->price}} L.E</p>
                        <a href="{{route('orderservice.create')}}" class="upper">order service</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button class="upper show-more">Show More</button>
        <div class="swiper-container mySwiper">
            <div class="swiper-wrapper" style="transform: translate3d(0px, 94px, 0px)">
                
                @foreach ($feedbacks as $feedback)
                <div class="swiper-slide customerposts" style="transform: translate3d(43%, 27%, 0px);">
                    <p class="text postbody">" {{$feedback->title}} "</p>
                    <img src="{{asset('uploads/user/' . $feedback->user->image)}}" style="max-width: 15%">
                    <h3 class="text user-name">{{$feedback->user->name}}</h3>
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        </div>
        {{-- <div class="container">
            <div class="items">
                <div class="quote main-color">
                    <i class="fas fa-quote-left"></i>
                </div>
                @foreach ($feedbacks as $feedback)
                <div class="text">
                    <p>"{{$feedback->title}}"</p>
                    <p>"{{$feedback->description}}"</p>
                </div>
                <div class="pic">
                    <img src="userinterface/img/photo-1509967419530-da38b4704bc6.jpg" alt="">
                    <h5>{{$feedback->user->name}}</h5>
                    <p>CEO OF TTCM</p>
                </div>
                @endforeach
                
            </div>
        </div> --}}
        {{-- <div id="demo" class="carousel slide" data-ride="carousel">
            <ul class="carousel-indicators">
              <li data-target="#demo" data-slide-to="0" class="active"></li>
              <li data-target="#demo" data-slide-to="1"></li>
              <li data-target="#demo" data-slide-to="2"></li>
            </ul>
            
            <div class="carousel-inner">
                @foreach ($feedbacks as $feedback)
                  <div class="carousel-item">
                    <img src="{{asset('uploads/user/' . $feedback->user->image)}}" alt="Chicago" width="20%" height="20%">
                    <div class="carousel-caption">
                      <h3>{{$feedback->title}}</h3>
                      <p>{{$feedback->description}}</p>
                    </div>   
                  </div>
                  @endforeach
              
              {{-- <div class="carousel-item">
                <img src="{{URL::asset('userinterface/assets/img/slide-1.jpg')}}" alt="Chicago" width="100%" height="100%">
                <div class="carousel-caption">
                  <h3>Chicago</h3>
                  <p>Thank you, Chicago!</p>
                </div>   
              </div>
              <div class="carousel-item">
                <img src="{{URL::asset('userinterface/assets/img/slide-1.jpg')}}" alt="New York" width="100%" height="100%">
                <div class="carousel-caption">
                  <h3>New York</h3>
                  <p>We love the Big Apple!</p>
                </div>   
              </div>
            </div>
            
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
              <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
              <span class="carousel-control-next-icon"></span>
            </a>
          </div> --}}
          
    </div>
</div>
<!-- End Our Work -->
    @endsection
