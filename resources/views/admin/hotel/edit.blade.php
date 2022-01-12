@extends('layouts.admin')

@section('content')

  <div class="col-md-8 offset-md-2">

    @if(isset($hotel))
      <div class="card card-info">
        <h4 class="card-header"> {{__('Hotel Edit')}} </h4>
        <div class="card-body"> 
          <form action="{{route('admin.hotel.update',$hotel->id)}}" enctype="multipart/form-data" method="POST">
            @csrf
            @method('PUT')
            

            <div class="form-group">
              <label for="phone_nepali" class="form">{{__('Hotel Name')}}:</label>
              <input type="text" name="name" class="form-control" value="{{$hotel->name}}">
            </div>

            <div class="form-group">
              <label for="location_map" class="form">{{__('Brief Description')}}:</label>
              <input type="text" name="description" class="form-control" value="{{$hotel->description}}">
            </div>
            <div class="col-md-12">
              <div class="form-group">
               <label for="avatar">{{__('Hotel Logo')}}</label>
              <input type="file" name="logo" class="dropify" @if(isset($hotel))  data-default-file="{{ asset('storage/hotel/'.$hotel->logo)}}" @endif data-allowed-file-extensions="jpg svg jpeg png webp" alt="Logo here"/> 
          </div> 
            </div>

            <div class="col-md-12">
              <div class="form-group">
               <label for="avatar">{{__('Page Banner')}}</label>
              <input type="file" name="banner" class="dropify" @if(isset($hotel))  data-default-file="{{ asset('storage/hotel/'.$hotel->banner) }}" @endif data-allowed-file-extensions="jpg svg jpeg png webp" />
              
          </div> 
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