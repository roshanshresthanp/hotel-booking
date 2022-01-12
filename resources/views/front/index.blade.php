@extends('layouts.main')
@section('content')
<section class="banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0">
          @if(isset($banners))
          <div class="banner-box owl-carousel owl-theme" id="bannerslide">
            @foreach($banners as $banner)
            <div class="banner-data ">
              <div class="banner-image">
                <img class="" src="{{asset('storage/banner/'.$banner->image)}}" alt="Responsive image">
              </div>
              <div class="banner-info">
                <div>
                  <h1 class="head-four head_white ">{{$banner->title}}</h1>
                  <h1 class="head-one head_white pb-4">{!!$banner->description!!}</h1>
                  
                  {{-- <a href="{{$banner->link }}" class="button button_red">know more</a> --}}
                </div>
              </div>
            </div>
  
            {{-- <div class="banner-data ">
              <div class="banner-image">
                <img class="" src="front\assets\image\hotel 1.jpg" alt="Responsive image">
              </div>
              <div class="banner-info">
                <div>
                  <h1 class="head-four head_white ">Cost Friendly pckage on your way</h1>
                  <h1 class="head-one head_white pb-4">Everything is hear right here for you.</h1>
                  <button class="button button_red">know more</button>
                </div>
              </div>
            </div> --}}
            @endforeach
          </div>
          @endif
  
          <div class="banner-form">
            <h1 class="head-four text-white">quick booking</h1>
            <form action="{{route('booking.detail')}}" method="post">
                @csrf
                @method('POST')
              <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                <input placeholder="Arrival Date"  name="date_arrival" value="{{old('date_arrival')}}" class="datepicker" id="datepicker" width="276" />
                <div class="icon">
                  <img class="calendar" src="front\assets\image\calendar.png" alt="">
                </div>
                
                <!-- <i class="bi bi-calendar-week"></i> -->
              </div>
              <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                <input placeholder="Departure Date"  name="date_departure" value="{{old('date_departure')}}" class="datepicker" id="datepicker2" width="276" />
                <div class="icon">
                  <img class="calendar" src="front\assets\image\calendar.png" alt="">
                </div>
                <!-- <i class="bi bi-calendar-week"></i> -->
              </div>
              <div class="form-group mb-2 position-relative">
                <select class="form-control" name="room_type"  id="exampleFormControlSelect1" placeholder="Select Room">
                    @if (isset($cats))
                        @foreach($cats as $cat)
                        <option selected value={{$cat->slug}}>{{$cat->name}}</option>
                        @endforeach
                    @endif
                </select>
                <div class="icon">
                  <img class="calendar" src="front\assets\image\room.png" alt="">
                </div>
              </div>
              <div class="form-group mb-2 position-relative">
                <input type="number" min="0" name="guest_adult" value="{{old('guest_adult')}}" class="form-control" placeholder="Adult Guest">
                <div class="icon">
                  <img class="calendar" src="front\assets\image\adult.png" alt="">
                </div>
              </div> 
              <div class="form-group mb-2 position-relative">
                <input type="number" min="0" name="guest_child" value="{{old('guest_child')}}" class="form-control" placeholder="Childern">
                <div class="icon">
                  <img class="calendar" src="front\assets\image\child.png" alt="">
                </div>
              </div> 
              <div class="form-group mb-2 position-relative">
                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                <div class="icon">
                  <img class="calendar" src="front\assets\image\mail.png" alt="">
                </div>
              </div>
              <div class="form-group mb-2 position-relative">
                <input type="number" class="form-control" name="contact" value="{{old('contact')}}" placeholder="Phone Number">
                <div class="icon">
                  {{-- <i class="fa fa-phone mr-2"></i> --}}
                  <img class="calendar" src="front\assets\image\call.png" alt="">
                </div>
              </div>
              <!-- <div class="form-group mb-2">
                <textarea name="" class="form-control" id="" cols="30" rows="10"></textarea>
              </div> -->
              <button type="submit" class="button button_red">Book Now</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="about-home">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="title-box">
            <h1 class="head-one head_dark title">About US</h1>
          </div>
          
        </div>
        @if(isset($aboutus))
        <div class="col-lg-7">  
          {{-- <h1 class="head-four head_blue f-w-3">Continue your journey with us.</h1> --}}
          <h1 class="head-two head_dark pb-4 "> {{$aboutus->title}} </h1>
          <p class="para-one para-gray pb-3">{!!$aboutus->description!!}</p>
          {{-- <h1 class="head-four head_blue "> </h1> --}}
          {{-- <div class="service-list pt-2">
            <ul>
              <li class="para-one para-gray"><img src="front\assets\image\check red.svg" alt=""> <span>Comfort with your valuable services. Comfort with your valuable services. Comfort with your valuable services.</span> </li>
              <li class="para-one para-gray"><img src="front\assets\image\check red.svg" alt=""> <span>Comfort with your valuable services.</span> </li>
              <li class="para-one para-gray"><img src="front\assets\image\check red.svg" alt=""> <span>Lorem ipsum dolor sit amet consectetur adipisicing elit. Illum nihil iure libero veniam fuga perferendis </span> </li>
            </ul>
          </div> --}}
        </div>
        <div class="col-lg-5">
          <div class="about-image">
            <img  class="" src="{{asset('storage/aboutus/'.$aboutus->image)}}" alt="">
            <span class="shape-one"></span>
            <span class="shape-two"></span>
            <span class="shape-three"></span>
          </div>
          
        </div>
        @endif
      </div>
    </div>
  </section>
  
  <section class="rooms pt-0">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="rooms-titles ">
            @foreach($cats as $cat)
            <button  class="collaps-btn-edit head-four head_blue f-w-4 @if($loop->first) active @endif  collaps-btn" target="{{$cat->id}}" >
              <span>{{$cat->name}}</span> 
              <!-- <img src="front\assets\image\studio.png" alt=""> -->
            </button>
            @endforeach
            {{-- <button class=" collaps-btn-edit head-four head_blue f-w-4 collaps-btn" target="delux2">
              <span>Standard</span> 
              <!-- <img src="front\assets\image\studio.png" alt=""> -->
            </button>
            <button class=" collaps-btn-edit head-four head_blue f-w-4 collaps-btn " target="delux3">
              <span>Studio</span>
              <!-- <img src="front\assets\image\studio.png" alt=""> -->
             </button> --}}
          </div>
        </div>

        @foreach ($cats as $cat)
        <div id="{{$cat->id}}" class="rooms-toggle @if($loop->first) room-active @endif">
          <div class="row">
            @foreach ($cat->rooms as $room)
              @if($room->featured==1)
              <div  class="col-md-4">
                <a href="{{route('room.view',$room->slug)}}">
                  <div class="rooms-box">
                    <div class="image">
                      <img src="{{asset('storage/rooms/'.$room->featured_image)}}" alt="">
                    </div>
                    <div class="rooms-info text-center">
                      <span class="price">From <span class="value">Rs. </span>@if(isset($category))@foreach($category as $cat) @if($cat->id == $room->category_id) {{$cat->price}}  @endif @endforeach @endif</span>
                      <h1 class="head-four head_red pb-3 f-w-5"> {{$room->name}}</h1>
                      <span class="para-two para_gray ">{!!str_limit($room->description,150)!!}</span>
                      <div class="rooms-scale">
                        <div class="scale">
                          <img class="" src="front\assets\image\man red.svg" alt="">
                          <span class="para-two">2</span>
                        </div>
                        <div class="scale">
                          <img class="" src="front\assets\image\bed red.svg" alt="">
                          <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                          <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                          <span  class="para-two">2</span>
                        </div>
                        <div class="scale">
                          <img class="" src="front\assets\image\scale red.svg" alt="">
                          <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                          <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                          <span class="para-two">2</span>
                        </div>
                      </div>
                    </div>
                  </div>
                </a>
              </div>  
              @endif
            @endforeach
           
          </div>

        </div>
        @endforeach

        
        {{-- <div id="delux2" class="rooms-toggle ">
          <div class="row">
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div>
        <div id="delux3" class="rooms-toggle ">
          <div class="row">
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
            <div  class="col-md-4">
              <a href="viewRoom.php">
                <div class="rooms-box">
                  <div class="image">
                    <img src="front\assets\image\rooms.png" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>300</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> Delux Contrast Room</h1>
                    <p class="para-two para_gray ">Live in luxurious place in earth with exotic view and cultural diversity. Food which is dream come true.</p>
                    <div class="rooms-scale">
                      <div class="scale">
                        <img class="" src="front\assets\image\man red.svg" alt="">
                        
                        <span class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\bed red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\bed red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\bed light.svg" alt=""> -->
                        <span  class="para-two">2</span>
                      </div>
                      <div class="scale">
                        <img class="" src="front\assets\image\scale red.svg" alt="">
                        <!-- <img class="show-on-nothover" src="front\assets\image\scale red.svg" alt=""> -->
                        <!-- <img class="show-on-hover" src="front\assets\image\scale light.svg" alt=""> -->
                        <span class="para-two">2</span>
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>
  
  <section class="pb-5">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10">
          <div class="title-box gallery-title">
            <h1 class="head-one head_dark title">Gallery</h1>
          </div>
           <p class=" gallery-para para-one para-gray "></p>
        </div>
        @if(isset($gallery))
        <div class="col-md-10 ">
          <main class="popup-gallery">
            <ul class="gallery-box">
              @foreach($gallery as $img)
              <a class="gallery-link" href="{{asset('/storage/gallery/image/'.$img->image)}}">
                <img  class="gallery-image" src="{{asset('/storage/gallery/image/'.$img->image)}}" alt="day at the beach">
                <div class="image-eye">
                  <i class="bi bi-eye"></i>
                </div>
              </a>
              @endforeach

              
            </ul>
          </main>
          @endif
          @if(isset($gallery))
          <div class="gallery-btn">
            <a class="button button_red" href="{{route('gallery')}}">See More</a>
          </div>
        </div>
        @endif
      </div>
    </div>
  </section>
  
  <section class="info-banner">
    <div class="container">
      @if(isset($explore))
      <div class="row">
        <div class="col-lg-6" style="color:white;">
          {{-- <h1 class="head-four text-light f-w-3 ">Exclusive to affordable, explore with us.</h1> --}}
          <h1 class="head-two text-blue_light pb-3 ">{{$explore->title}}</h1>
          <p class="para-two text-light">{!!$explore->description!!}</p>
          {{-- <div class="main-services">
            <div class="box">
              <img src="front\assets\image\food light.svg" alt="">
              <div class="box-info">
                <p class="para-one text-light">Explore our Local meals.</p>
                <p class="para-two text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.  </p>
              </div>
            </div>
            <div class="box">
              <img src="front\assets\image\comfort light.svg" alt="">
              <div class="box-info">
                <p class="para-one text-light">Explore our Local meals.</p>
                <p class="para-two text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Officiis minima architecto fugiat hic quibusdam incidunt  </p>
              </div>
            </div>
            <div class="box">
              <img src="front\assets\image\explore light.svg" alt="">
              <div class="box-info">
                <p class="para-one text-light">Explore our Local meals.</p>
                <p class="para-two text-white">Lorem, ipsum dolor sit amet consectetur adipisicing elit.</p>
              </div>
            </div>
          </div> --}}
        </div>
        <div class="col-lg-6">
            <img class="main-image" src="{{asset('/storage/aboutexplore/'.$explore->image)}}" alt="">
        </div>
      </div>
      @endif
    </div>
  </section>
  
  <section class="reviews">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="head-one head_dark pb-5 text-center title">Testimonials</h1>
        </div>
        <div class="col-md-12">
          @if(isset($testimonials))
          <div class="reviews-list owl-carousel owl-theme" id="reviews">
            @foreach($testimonials as $test)
            <div class="reviews-box text-center">
              <div class="reviews-data">
                <img src="{{asset('/storage/testimonial/'.$test->image)}}" alt="">
                <p class="head-four head_blue p-3">{{$test->name}}</p>
                <p class="para-two head_gray p-3">{!!$test->description!!}</p>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </section>
    
@endsection