@extends('layouts.main')
@section('content')
<section class="gallery-head head-banner">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 p-0 position-relative">
        <div class="box">
          <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
          <h1 class="head-one text-white position-absolute">Services</h1>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="about-home about-page">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="title-box">
          <h1 class="head-one head_dark title">Services</h1>
        </div>
        <!-- <h1 class="head-one head_dark pb-5 text-center title">Our Services</h1> -->
      </div>
    @if(isset($services))
      {{-- @foreach($services as $service) --}}
      <div class="col-lg-6">
        {{-- <h1 class="head-four head_blue f-w-3">Continue your journey with us.</h1> --}}
        <h1 class="head-two head_dark pb-4 ">{{$services->title}}</h1>
        <p class="para-one para-gray pb-3">{!!$services->description!!}</p>
          {{-- <h1 class="head-four head_blue ">Continue your journey with us.</h1> --}}
       
      </div>
      
      <div class="col-lg-6">
        <!-- <img src="front\assets\image\services.jpg" alt=""> -->
        <div class="hover_image position-relative">
          @if(isset($services->image))
          @foreach(json_decode($services->image) as $img)
          <img class="img_{{$loop->iteration}}" src="{{asset('storage/service/'.$img)}}" alt="">
          @endforeach
          @endif
        </div>
      </div>
      {{-- @endforeach --}}
    @endif
    </div>
  </div>
</section>

  {{-- <section class=" features">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-sm-6 p-0">
          <div class="box">
            <img class="main-image"
            src="front\assets\image\services 1.jpg" alt="">
            <div class="info">
              <img src="front\assets\image\food light.svg" alt="">
              <p class="text-center p-3 para-two text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sint.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 p-0">
          <div class="box">
            <img class="main-image"
            src="front\assets\image\services 2.jpg" alt="">
            <div class="info">
              <img src="front\assets\image\comfort light.svg" alt="">
              <p class="text-center p-3 para-two text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sint.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 p-0">
          <div class="box">
            <img class="main-image"
            src="front\assets\image\services 3.jpg" alt="">
            <div class="info">
              <img src="front\assets\image\explore light.svg" alt="">
              <p class="text-center p-3 para-two text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sint.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-sm-6 p-0">
          <div class="box">
            <img class="main-image"
            src="front\assets\image\services 1.jpg" alt="">
            <div class="info">
              <img src="front\assets\image\food light.svg" alt="">
              <p class="text-center p-3 para-two text-white"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ducimus, sint.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> --}}


<section class="micro">
  <div class="container">
    <div class="row">
      <div class="col-md-12 pt-5">
        <h1 class="head-one head_dark pb-5 text-center title">Hotel Services</h1>
      </div>
      
      @if(isset($features))
      @foreach ($features as $item)
          
      
      <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="{{asset('storage/icon/'.$item->icon)}}" alt="" >
          <h1 class="head-three f-w-5 py-3">{{$item->name}}</h1>
          <p class="para-two f-w-3">{!!$item->description!!}</p>
        </div>
      </div>
      @endforeach
      @endif
      {{-- <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="front\assets\image\ac.svg " alt="">
          <h1 class="head-three f-w-5 py-3">AC Rooms</h1>
          <p class="para-two f-w-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nisi sapiente libero tempore sit blanditiis dolorem fugiat.</p>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="front\assets\image\cleaning.svg " alt="">
          <h1 class="head-three f-w-5 py-3">Daily Housekeeping</h1>
          <p class="para-two f-w-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nisi sapiente libero tempore sit blanditiis dolorem fugiat.</p>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="front\assets\image\bar.svg " alt="">
          <h1 class="head-three f-w-5 py-3">Bar</h1>
          <p class="para-two f-w-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nisi sapiente libero tempore sit blanditiis dolorem fugiat.</p>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="front\assets\image\wifi.svg " alt="">
          <h1 class="head-three f-w-5 py-3">High Speed WIFI</h1>
          <p class="para-two f-w-3e">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nisi sapiente libero tempore sit blanditiis dolorem fugiat.</p>
        </div>
      </div>
      <div class="col-lg-4 col-6">
        <div class="micro-service text-center">
          <img src="front\assets\image\tv.svg " alt="">
          <h1 class="head-three f-w-5 py-3">Cable TV</h1>
          <p class="para-two f-w-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi nisi sapiente libero tempore sit blanditiis dolorem fugiat.</p>
        </div>
      </div> --}}
      
    </div>
  </div>
</section>

@endsection

