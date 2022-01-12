@extends('layouts.main')
@section('content')

<section class="gallery-head head-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0 position-relative">
          <div class="box">
            <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
            <h1 class="head-one text-white position-absolute">Gallery</h1>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="gallery-head">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-10 ">
          <main class="popup-gallery">
            <ul class="gallery-box">
            @if(isset($gallery))
              @foreach($gallery as $image)
              <a class="gallery-link" href="{{asset('storage/gallery/image/'.$image->image)}}">
                <img  class="gallery-image" src="{{asset('/storage/gallery/image/'.$image->image)}}" alt="day at the beach">
                <div class="image-eye">
                  <i class="bi bi-eye"></i>
                </div>
              </a>
              @endforeach
            @endif
            </ul>
          </main>
        </div>
      </div>
    </div>
  </section>

@endsection
