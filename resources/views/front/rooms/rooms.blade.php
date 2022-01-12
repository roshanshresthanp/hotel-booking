@extends('layouts.main')
@section('content')
<section class="gallery-head head-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0 position-relative">
          <div class="box">
            <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
            <h1 class="head-one text-white position-absolute">Rooms</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="room-form pb-5" >
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="title-box gallery-title">
            <h1 class="head-one head_dark title">Booking Form</h1>
          </div>
          <p class=" gallery-para para-one para-gray "><!--Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus cumque, provident maxime quos perferendis soluta, velit accusamus officiis, iusto assumenda distinctio. Mollitia veritatis architecto quis unde, aperiam officiis --></p>
          <div class="form-box">
            <form action="{{route('booking.detail')}}" method="post">
                @csrf
                @method('POST')
              <div class="row">
                <!-- <div class="col-lg-3 col-sm-6 ">
                  <div class="info-box">
                    <div class="d-flex justify-content-between align-items-center">
                      <p class="head-four text-white f-w-3 text-center">Hotel Name</p>
                      <img src="front\assets/image/logo (4).png" alt="">
                    </div>
                    <h1 class="head-one text-white">HOLIDAY</h1>
                  </div>
                </div> -->
                <div class="col-lg-4 col-sm-6  flex-it">
                  <div class="col-md-12">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                      <input name="date_arrival" value="{{old('date_arrival')}}" placeholder="Arrival Date" class="datepicker" id="datepicker" width="276" />
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\calendar.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                      <input name="date_departure" value="{{old('date_departure')}}" placeholder="Departure Date" class="datepicker" id="datepicker2" width="276" />
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\calendar.png" alt="">
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="col-lg-4 col-sm-6  flex-it">
                  <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <select class="form-control" name="room_type" id="exampleFormControlSelect1">
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
                  </div>
                  <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <input type="number" class="form-control" name="guest_adult" value="{{old('guest_adult')}}" placeholder="Adult Guest">
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\adult.png" alt="">
                      </div>
                    </div> 
                  </div>
                </div>
                <div class="col-lg-4 col-sm-6  flex-it">
                  <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <input type="text" class="form-control" name="contact" value="{{old('contact')}}" placeholder="Phone Number">
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\call.png" alt="">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <input type="number" class="form-control" placeholder=" Childern" name="guest_child" value="{{old('guest_child')}}">
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\child.png" alt="">
                      </div>
                    </div>  
                  </div>
                </div>
                
                <div class="col-lg-4 col-sm-6  flex-it">
                  <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                      <div class="icon">
                        <img class="calendar" src="front\assets\image\mail.png" alt="">
                      </div>
                    </div>
                  </div>
                  {{-- <div class="col-md-12">
                    <button type="submit " class="button button_red mb-2 edit-btn">Book now</button>
                  </div> --}}
  
                  <!-- <div class="col-md-12">
                    <div class="form-group mb-2 position-relative">
                      <textarea class="form-control" name="" id="" placeholder="message"></textarea>
                      
                    </div> 
                  </div> -->
                </div>
                <div class="col-sm-4">
                  <button type="submit " class="button button_red mb-2 edit-btn">Book now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
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
            <div  class="col-md-4">
              <a href="{{route('room.view',$room->slug)}}">
                <div class="rooms-box">
                  <div class="image">
                    <img src="{{asset('storage/rooms/'.$room->featured_image)}}" alt="">
                  </div>
                  <div class="rooms-info text-center">
                    <span class="price">From <span class="value">Rs. </span><span>@if(isset($category))@foreach($category as $cat) @if($cat->id == $room->category_id) {{$cat->price}}  @endif @endforeach @endif</span></span>
                    <h1 class="head-four head_red pb-3 f-w-5"> {{$room->name}}</h1>
                    <span class="para-two para_gray" >{!!str_limit($room->description,150)!!}</span>
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
  
  @if(isset($explore))
  <section class="info-banner bg-transparent">
    <div class="container">
      <div class="row">
        <div class="col-md-6 d-flex align-items-center" style="color:white;">
          <div class="room-info-banner">
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
          
        </div>
        <div class="col-md-6">
          <img class="main-image"  src="{{asset('/storage/aboutexplore/'.$explore->image)}}" alt="">
        </div>
      </div>
    </div>
  </section>
  @endif
    
@endsection