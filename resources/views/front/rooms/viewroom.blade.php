@extends('layouts.main')
@section('content')
<section class="gallery-head head-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0 position-relative">
        <div class="box">
          <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
          <h1 class="head-one text-white position-absolute"> @foreach($cats as $cat)@if($cat->id == $room->category_id)
            {{$cat->name}}
            @endif
            @endforeach
            </h1>
        </div>
      </div>
    </div>
  </div>
</section>


<section class="view-room pb-5">
  <div class="container">
    <div class="row  ">
      <!-- <div class="col-12 ">
        <div class="row"> -->
          <div class="col-lg-8">

            <div class="owl-carousel owl-theme image-slide-box myslider" >
              @if(isset($room->image))
              @foreach(json_decode($room->image) as $img)
              <div class="item ">
                <img src="{{asset('storage/rooms/'.$img)}}">
              </div>
              @endforeach
              @endif
              {{-- <div class="item">
                <div><img src="{{asset('front\assets\image\hotel 1.jpg')}}"></div>
              </div>
              <div class="item">
                <div><img src="{{asset('front\assets\image\hotel 3.jpg')}}"></div>
              </div>
              <div class="item">
                <div><img src="{{asset('front\assets\image\hotel 4.jpg')}}"></div>
              </div>
              <div class="item">
                <div><img src="{{asset('storage/rooms/'.$room->image)}}"></div>
              </div> --}}
            </div>

            <div class="owl-dots details-dots">
              @if(isset($room->image))
              @foreach(json_decode($room->image) as $img)
              <button role="button" class="owl-dot active"><img src="{{asset('storage/rooms/'.$img)}}" alt=""></button>
              @endforeach
              @endif
              {{-- <button role="button" class="owl-dot active"><img src="{{asset('front\assets\image\hotel 1.jpg')}}" alt=""></button> --}}
                {{-- <button role="button" class="owl-dot active"><img src="{{asset('front\assets\image\hotel 2.jpg')}}" alt=""></button>
                <button role="button" class="owl-dot active"><img src="{{asset('front\assets\image\hotel 3.jpg')}}" alt=""></button>
                <button role="button" class="owl-dot active"><img src="{{asset('front\assets\image\hotel 4.jpg')}}" alt=""></button>
                <button role="button" class="owl-dot active"><img src="{{asset('front\assets\image\delux.jpg')}}" alt=""></button> --}}
            </div>

          </div>
          
        <!-- </div> -->
        <!-- <div class="row"> -->
        <div class="col-lg-4 ">
            <div class="detail-price-box">
              <button  class=" head-three text-white value">Rs. @php $fp=0; $cp=0; @endphp @if(isset($category))@foreach($category as $cat) @if($cat->id == $room->category_id) @php $cp=$cat->price; @endphp  @endif @endforeach @endif  @foreach($room->features as $feat)  @php  $fp +=$feat->price; @endphp @endforeach {{$cp+$fp}}/-</button>
              <div class="veiwRoom-services">
                @if(isset($room->features))
                  @foreach($room->features as $feat)
                    <div class="services-box">
                      <div class="services-box-info text-center">
                        <img src="{{asset('/storage/icon/'.$feat->icon)}} " alt="">
                        <p class="para-two text-truncate">{{$feat->name}}</p>
                      </div>
                    </div>
                    @endforeach
                @endif
                {{-- <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\wifi.svg " alt="">
                    <p class="para-two text-truncate">Free WIFI</p>
                  </div>
                </div>
                <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\ac.svg " alt="">
                    <p class="para-two text-truncate">AC</p>
                  </div>
                </div>
                <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\cleaning.svg " alt="">
                    <p class="para-two text-truncate">Housekeeping</p>
                  </div>
                </div>
                <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\bar.svg " alt="">
                    <p class="para-two text-truncate">Bar</p>
                  </div>
                </div>
                <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\tv.svg " alt="">
                    <p class="para-two">TV</p>
                  </div>
                </div>
                <div class="services-box">
                  <div class="services-box-info text-center">
                    <img src="{{asset('front\assets\image\cleaning.svg " alt="">
                    <p class="para-two text-truncate">Housekeeping</p>
                  </div>
                </div> --}}
              </div>
            </div>
          </div>
          
          
          <div class=" col-lg-8">
            <div>
              <div class="room-details-box">
                <h1 class="head-three head_dark">Description</h1>
              </div>
              <p class="para-one pt-3">{!!$room->description!!}</p>
            </div>
            <div class="room-details">
              <div class="room-details-box">
                <h1 class="head-three head_dark">Room Details</h1>
              </div>
              <div class="details-table">
                
                <div class="details-table-box">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-6">
                          <h1 class="head-four">Room type</h1>
                        </div>
                        <div class="col-6">
                          <p class=" details-value para-one text-left"> @foreach($cats as $cat)@if($cat->id == $room->category_id)
                            <b>{{$cat->name}}</b>
                            @endif
                            @endforeach</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                @if(isset($room->detail))
                @for ($i=0; $i < (count($room->detail)); $i++)
                    <div class="details-table-box">
                      <div class="row">
                        <div class="col-md-12">
                          <div class="row">
                            <div class="col-6">
                              <h1 class="head-four">{{$room->detail[$i]['detail_id'] ?? '' }}</h1>
                            </div>
                            <div class="col-6">
                              <p class=" details-value para-one text-left">{{$room->detail[$i]['detail_value'] ?? '' }}</p>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  @endfor
                @endif

                 
               {{-- <div class="details-table-box">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-6">
                          <h1 class="head-four">Bed Size</h1>
                        </div>
                        <div class="col-6">
                          <p class=" details-value para-one text-left">10</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="details-table-box">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-6">
                          <h1 class="head-four">Room Type</h1>
                        </div>
                        <div class="col-6">
                          <p class=" details-value para-one text-left">Delux</p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div> --}}
                
              </div>
            </div>
          </div>

          <div class="col-lg-4">
            <section class="room-form view-room-form "  >
              
              <!-- <div class="container"> -->
                <div class="row">
                  <div class="col-md-12">
                  <h1 class="head-four text-white">Booking Form</h1>
                    <!-- <div class="title-box gallery-title mb-5">
                      <h1 class="head-one head_dark title">Booking Form</h1>
                    </div> -->
                    <!-- <p class=" gallery-para para-one para-gray ">Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloribus cumque, provident maxime quos perferendis soluta, velit accusamus officiis, iusto assumenda distinctio. Mollitia veritatis architecto quis unde, aperiam officiis </p> -->
                    <div class="form-box">
                      <form action="{{route('booking.detail')}}" method="post">
                        @csrf
                        @method('POST')
                        <div class="row">
                          <div class="col-lg-12 col-sm-12  flex-it">
                            <div class="col-md-12">
                              <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                                <input placeholder="Arrival Date" value="{{old('date_arrival')}}" class="datepicker" id="datepicker" name="date_arrival" width="276" />
                                <div class="icon">
                                  <img class="calendar" src="{{asset('front\assets\image\calendar.png')}}"  alt="">
                                </div>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div id="date-picker-example" class="md-form md-outline input-with-post-icon datepicker mb-2 position-relative" inline="true">
                                <input placeholder="Departure Date" value="{{old('date_departure')}}" name="date_departure" class="datepicker" id="datepicker2" width="276" />
                                <div class="icon">
                                  <img class="calendar" src="{{asset('front\assets\image\calendar.png')}}" alt="">
                                </div>
                              </div>
                            </div>
                          </div>
                          <div class="col-lg-12 col-sm-12  flex-it">
                            {{-- <div class="col-md-12"> --}}
                              {{-- <div class="form-group mb-2 position-relative"> --}}

                                {{-- <select class="form-control" name="room_type" id="exampleFormControlSelect1">
                                  @if (isset($cats))
                                      @foreach($cats as $cat)
                                      <option selected value={{$cat->slug}}>{{$cat->name}}</option>
                                      @endforeach
                                  @endif
                                </select> --}}

                                {{-- @foreach($cats as $cat)@if($cat->id == $room->category_id)
                                {{$cat->name}}
                                @endif
                                @endforeach --}}
                                <input type="hidden" class="form-control"@if(isset($cats)) @foreach($cats as $cat)@if($cat->id == $room->category_id)
                                  value="{{$cat->slug}}"
                                  @endif
                                  @endforeach @endif name="room_type" readonly>


                                {{-- <div class="icon">
                                  <img class="calendar" src="{{asset('front\assets\image\room.png')}}"  alt="">
                                </div> --}}
                              {{-- </div>
                            </div> --}}
                            <div class="col-md-12">
                              <div class="form-group mb-2 position-relative">
                                <input type="number" class="form-control" placeholder="Adult Guest" value="{{old('guest_adult')}}" name="guest_adult">
                                <div class="icon">
                                  <img class="calendar" src="{{asset('front\assets\image\adult.png')}}" alt="">
                                </div>
                              </div> 
                            </div>
                          </div>
                          <div class="col-lg-12 col-sm-12  flex-it">
                            <div class="col-md-12">
                              <div class="form-group mb-2 position-relative">
                                <input type="number" value="{{old('guest_child')}}" class="form-control" placeholder=" Childern" name="guest_child">
                                <div class="icon">
                                  <img class="calendar"  src="{{asset('front\assets\image\child.png')}}" alt="">
                                </div>
                              </div> 
                            </div>
                            <div class="form-group mb-2 position-relative">
                              <input type="text" class="form-control" name="contact" value="{{old('contact')}}" placeholder="Phone Number">
                              <div class="icon">
                                <img class="calendar" src="{{asset('front\assets\image\call.png')}}" alt="">
                              </div>
                            </div>
                            <div class="form-group mb-2 position-relative">
                              <input type="text" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                              <div class="icon">
                                <img class="calendar" src="{{asset('front\assets\image\mail.png')}}" alt="">
                              </div>
                            </div>
                            <div class="col-md-12">
                              <button type="submit " class="button button_red mb-2 edit-btn">Book Now</button>
                            </div>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              <!-- </div> -->
            </section>
          </div>
         
          
        <!-- </div> -->
      <!-- </div> -->
    </div>
  </div>
</section>
@endsection