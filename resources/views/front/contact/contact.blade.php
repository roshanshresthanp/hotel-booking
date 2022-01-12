@extends('layouts.main')
@section('content')
<section class="gallery-head head-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0 position-relative">
          <div class="box">
            <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
            <h1 class="head-one text-white position-absolute">Contact us</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <section class="contact-page-bg" >
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md-5">
          
          <div class="contact-page">
            <div class="contact">
              <h1 class="head-two text-blue_light   title pb-3">Contact</h1>
              <div class="box mb-2">
                <i class="bi bi-geo-alt text-blue_light"></i>
                <div>
                  <p class="head-four text-white">Location</p>
                  <p class="para-one text-light">{{isset($contact)?($contact->location):''}}</p>
                </div>
              </div>
              <div class="box mb-2">
                <i class="bi bi-telephone text-blue_light"></i>
                <div>
                  <p class="head-four text-white">Contact</p>
                  <p class="para-one text-light"> <a class="para-one text-light phone" href="tel:{{isset($contact)?($contact->contact):''}}">( {{isset($contact)?($contact->contact):''}} )</a> </p>
                </div>
              </div>
              <div class="box mb-2">
                <i class="bi bi-envelope text-blue_light"></i>
                <div >
                  <p class="head-four text-white">Mail</p>
                  <p class="para-one text-light"><a class="para-one text-light email" href="mailto:{{isset($contact)?($contact->mail):''}}" >{{isset($contact)?($contact->mail):''}}</a></p>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-md-7">
          <h1 class="head-one head_dark text-center  title pb-5">Feed Back</h1>
          <div class="feedBack">

            <form action="{{route('feedback.store')}}" method="POST">
                @csrf
                @method('post')
              <div class="row">
                <div class="col-6 mb-3">
                  
                  <div class="form-group">
                    <!-- <label for="name">Enter You Full Name</label> -->
                    <input class="form-control" type="text" name="name" value="{{old('name')}}" id="name" placeholder="Name">
                  </div>
                </div>
                <div class="col-6 mb-3">
                  <div class="form-group">
                    <!-- <label for="email">Enter You Full Name</label> -->
                    <input class="form-control" type="email" name="email" value="{{old('email')}}" required id="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="form-group">
                    <!-- <label for="subject">Enter You Full Name</label> -->
                    <input class="form-control" type="text" name="subject" id="subject" placeholder="Subject" >
                  </div>
                </div>
                <div class="col-12 mb-3">
                  <div class="form-group">
                    <!-- <label for="message">Enter You Full Name</label> -->
                    <textarea class="form-control" name="message" required id="message" placeholder="Message"></textarea>
                  </div>
                </div>
                <div class="text-center">
                  <button class="f-w-6" type="submit">Send</button>
                </div>
              </div>
            </form>

          </div>
        </div>
      </div>
    </div>
  </section>
    
@endsection