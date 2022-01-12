@extends('layouts.admin')

@section('content')

{{-- <div class="row justify-content-center mx-0">  --}}
    <div class="container">
      {{-- <div class="row justify-content-center pt-0 pb-3">
        <a href="{{route('categories.index')}}" class="btn btn-warning">{{__('List')}}</a>
      </div> --}}
  </div>
  <form action="{{ route('admin.features.update', $feature->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @include('admin.features.form')
  </form>
  {{-- </div> --}}
@endsection