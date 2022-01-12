@extends('layouts.admin')

@section('content')

{{-- <div class="row justify-content-center mx-0">  --}}
    <div class="container">
      {{-- <div class="row justify-content-center pt-0 pb-3">
        <a href="{{route('categories.index')}}" class="btn btn-warning">{{__('List')}}</a>
      </div> --}}
  </div>
  <form action="{{ route('admin.categories.store', app()->getLocale()) }}" method="POST" enctype="multipart/form-data">
      @csrf
      @include('admin.categories.form')
  </form>
  {{-- </div> --}}
@endsection