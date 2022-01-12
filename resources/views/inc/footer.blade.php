<footer class="footer">
  <div class="container">
    <div class="row ">
      <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
        <div class="logo">
          <a href="{{route('home')}}">
            @if(isset($hotel))
            <img src="{{asset('storage/hotel/'.$hotel->logo)}}" alt="logo">
            @endif
          </a>
          
        </div>
        <p class="para-two para_white">{{isset($hotel)?$hotel->description:''}}</p>
        <div class="footer-contact">
          <div class="box mb-2">
            <i class="bi bi-geo-alt text-white"></i>
            <p class="para-two text-blue_light">{{isset($contact)?($contact->location):''}}</p>
          </div>
          <div class="box mb-2">
            <i class="bi bi-telephone text-white"></i>
            <p class="para-two text-blue_light"><a class="para-two text-blue_light phone" href="tel:{{isset($contact)?($contact->contact):''}}">{{isset($contact)?($contact->contact):''}}</a> </p>
          </div>
          <div class="box mb-2">
            <i class="bi bi-envelope text-white"></i>
            <p class="para-two text-blue_light"> <a class="para-two text-blue_light email" href="mailto:{{isset($contact)?($contact->mail):''}}" >{{isset($contact)?($contact->mail):''}}</a>  </p>
          </div>
        </div>
        <div class="social-media">
          <div class="media-box">
            <a target="_blank" href="{{url(isset($contact)?($contact->fb_link):'')}}" class="link fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
            <a target="_blank" href="{{url(isset($contact)?($contact->insta_link):'')}}" class="link ins"><i class="fa fa-instagram" aria-hidden="true"></i></a>
            <a target="_blank" href="{{url(isset($contact)?($contact->twitter_link):'')}}" class="link tweet"><i class="fa fa-twitter" aria-hidden="true"></i></a>
          </div>
        </div>
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
        <h1 class="head-four text-white f-w-4 pb-4">Explore Links</h1>
        <div class=" footer-links">
          <ul>
            <li>
              <a href="/" class="para-two text-blue_light">home</a>
            </li>
            <li>
              <a href="/services" class="para-two text-blue_light">Services</a>
            </li>
            <li>
              <a href="/rooms" class="para-two text-blue_light">Rooms</a>
            </li>
            <li>
              <a href="/gallery" class="para-two text-blue_light">gallery</a>
            </li>
            <li>
              <a href="/contact" class="para-two text-blue_light">Contact</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-3 col-md-4 col-sm-6 pb-4 ">
        <h1 class="head-four text-white f-w-4 pb-4">Rooms</h1>
        @if(isset($cats))
        @foreach($cats as $cat)
        <div class=" footer-rooms">
          <div class="footer-rooms-box">
            <img src="{{asset('storage/category/'.$cat->image)}}" alt="">
          </div>
          <div class="px-2">
            <p class="para-two f-w-3 text-blue_light">{{$cat->name}}</p>
            <span class="para-two text-white">From <span class="value">Rs. </span><span>{{$cat->price}}</span></span>
          </div>
        </div>
        @endforeach
        @endif
      </div>
      <div class="col-lg-3 col-md-4 col-sm-6 pb-4">
        <h1 class="head-four text-white f-w-4 pb-4">Map</h1>
        <div class="footer-rooms-box">
          <iframe src="{{isset($contact)?$contact->location_map:''}}" width="100%" height="300" style="border:0" allowfullscreen="" loading="lazy"></iframe>
        </div>
        
      </div>
      <div class="col-12">
        <div class="row align-items-center">
          <div class="col-md-6 ">
            <div class="copyright">
              <p class=" para-two text-white"> <span class="text-blue_light f-w-6">{{isset($hotel)?$hotel->name:''}}</span> @copyRight reserved</p>
            </div>
          </div>
          <div class="col-md-6  ">
            <div class="payments">
              <p class="para-two f-w-6 text-white px-2">Payments:</p>
              <div class="method">
                <img src="{{asset('front\assets\image\esewa.png')}}" alt="">
              </div>
              <div class="method">
                <img src="{{asset('front\assets\image\khalti.png')}}" alt="">
              </div>
              <div class="method">
                <img src="{{asset('front\assets\image\ime pay.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>
</footer>