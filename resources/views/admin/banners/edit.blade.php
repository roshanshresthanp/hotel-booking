@extends('layouts.admin')

@section('content')

{{-- <div class="row justify-content-center mx-0">  --}}
    <div class="container">
      {{-- <div class="row justify-content-center pt-0 pb-3">
        <a href="{{route('categories.index')}}" class="btn btn-warning">{{__('List')}}</a>
      </div> --}}
  </div>
  <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.banners.form')
  </form>
  {{-- </div> --}}
@endsection