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