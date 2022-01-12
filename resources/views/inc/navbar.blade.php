<section class="header">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="header_box">
          <div class="logo">
            <a href="/">@if(isset($hotel))
              <img src="{{asset('storage/hotel/'.$hotel->logo)}}" alt="">
            @else
            <img src="hg" alt="logo here">

            @endif
            </a>
          </div>
          <div class="links" id="menu-links">
            <ul>
              <li>
                <a href="{{url('/')}}">home</a>
              </li>
              <li>
                <a href="{{url('/services')}}">Services</a>
              </li>
              <li>
                <a href="{{url('/rooms')}}">Rooms</a>
              </li>
              <li>
                <a href="{{url('/gallery')}}">gallery</a>
              </li>
              <li>
                <a href="{{url('/contact')}}">Contact</a>
              </li>
            </ul>
            <div class="social-media">
              <div class="media-box">
                <a target="blank" href="{{isset($contact)?($contact->fb_link):''}}" class="link fb"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                <a target="blank" href="{{isset($contact)?($contact->insta_link):''}}" class="link ins"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                <a target="blank" href="{{isset($contact)?($contact->twitter_link):''}}" class="link tweet"><i class="fa fa-twitter" aria-hidden="true"></i></a>
              </div>
            </div>
          </div>
          <div class="menu text-right" id="menu">
            <button class="menu-btn">
              <span></span>
              <span></span>
              <span></span>
            </button>
          </div>
              {{-- <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            <i class="fas fa-user"></i>&nbsp;&nbsp; {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul> --}}
        </div>
      </div>
    </div>
  </div>
</section>