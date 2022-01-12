@extends('layouts.admin')

@section('content')
  {{-- <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <h3 class="m-0 text-dark">{{__('Contact Update')}}</h3>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div> --}}


  <div class="col-md-8 offset-md-2">

    @if(isset($contact))
      <div class="card card-info">
        <h4 class="card-header"> {{__('Contact Edit')}} </h4>
        <div class="card-body"> 
          <form action="{{route('admin.contacts.update',$contact->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-group">
              <label for="phone_nepali" class="form">{{__('Mail')}}:</label>
              <input type="text" name="mail" class="form-control" value="{{$contact->mail}}">
            </div>

            <div class="form-group">
              <label for="location_map" class="form">{{__('Location')}}:</label>
              <input type="text" name="location" class="form-control" value="{{$contact->location}}">
            </div>
            <div class="form-group">
              <label for="location_map" class="form">{{__('Location Map')}}:</label>
              <input type="text" name="location" class="form-control" value="{{$contact->location_map}}">
            </div>


            <div class="form-group">
              <label for="fb_link" class="form">{{__('Facebook Link')}}:</label>
              <input type="text" name="fb_link" class="form-control" value="{{$contact->fb_link}}">
            </div>

            <div class="form-group">
              <label for="administration_email" class="form">{{__('Instagram Link')}}:</label>
              <input type="text" name="insta_link" class="form-control" value="{{$contact->insta_link}}">
            </div>

            <div class="form-group">
              <label for="vehicle_email" class="form">{{__('Twitter Link')}}:</label>
              <input type="text" name="twitter_link" class="form-control" value="{{$contact->twitter_link}}">
            </div>

            <div class="form-group">
              <label for="license_email" class="form">{{__('Contact no')}}:</label>
              <input type="text" name="contact" class="form-control" value="{{$contact->contact}}">
            </div>

            <div class="cus-center justify-content-between pt-3">
              <button type="submit" class="btn btn-sm btn-info">{{__('Update')}}</button>
            </div>

          </form>
        </div>
      </div>
    @else
      <div class="text-center">
        Nothing to edit
      </div>
    @endif
  </div>
@endsection