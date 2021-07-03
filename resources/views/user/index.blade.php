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

                {{-- <ul>
                    @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                        <li>
                            <a rel="alternate" hreflang="{{ $localeCode }}" href="{{ LaravelLocalization::getLocalizedURL($localeCode, null, [], true) }}">
                                {{ $properties['native'] }}
                            </a>
                        </li>
                    @endforeach
                </ul> --}}
                
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
            <h1 class="upper">{{__('UserIndex.WE DESIGN')}} <span class="main-color">{{__('UserIndex.THINGS')}}</span></h1>
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
                    <img src="{{asset('uploads/service/' . $service->image)}}" alt="">
                    <div class="over text-center">
                        <h5 class="upper">{{$service->service_title}}</h5>
                        <p>{{$service->service_desc}}</p>
                        <p>Price: {{$service->price}} L.E</p>
                        <a href="{{route('orderservice.create')}}" class="upper show-more order-service">order service</a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <button class="upper show-more">Show More</button>
        
    </div>

</div>


<!-- Main Body -->
<div class="comment-container">
    <h2 class="upper">Our <span class="main-color">Customers Say</span></h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br> Quos voluptas sapiente quas natus illo, quis quaerat quae porro laudantium fugit?</p>
    <section class="comment-section">
        <div class="container">
            <div class="row">
                <div class="col-sm-5 col-md-6 col-12 pb-4">
                    <h1>Comments</h1>
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
                            <h4>Leave a comment</h4> 
                            <div class="form-group"> <label for="name">Title</label> <input type="text" name="title" id="fullname" class="form-control"> </div>
                            <label for="message">Message</label> <textarea name="description" id="" msg cols="30" rows="5" class="form-control" style="background-color: black;"></textarea>
                        </div>
                        <div class="form-group">
                            <p class="text-secondary">If you have a <a href="#" class="alert-link">gravatar account</a> your address will be used to display your profile picture.</p>
                        </div>
                        <div class="form-inline"> <input type="checkbox" name="check" id="checkbx" class="mr-1"> <label for="subscribe">Subscribe me to the newlettter</label> </div>
                        <div class="form-group"> <input type="submit" id="post" class="btn" value="Post Comment"> </div>
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
        <h2 class="upper">Our <span class="main-color">Team</span></h2>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.<br />Quae quasi magni quaerat, quam repudiandae amet.</p>
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quod maiores voluptas beatae reiciendis accusantium expedita.</p>
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- End Our Team -->

    @endsection
