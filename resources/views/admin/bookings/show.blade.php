@extends('layouts.admin')

@section('content')
    <div class="content-header pt-3">
        <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="">
                <h5 class="m-0 text-dark"><i class="fa fa-envelope mr-2 text-blue"></i>{{__('Booking details')}}</h5>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div style="overflow: hidden;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card card-info pt-4 pb-3 px-3 my-3">
                    @if($booking)
                        <ul style="list-style: none; font-size: 17px;">
                            <li>
                                {{__('Check in')}}: <strong>{{$booking->date_arrival}}</strong>
                            </li>
                            <li>
                                {{__('Check out')}}: <strong>{{$booking->date_departure}}</strong>
                            </li>
                            <li>
                                {{__('Day(s)')}}: <strong>{{$booking->day}}</strong>
                            </li>
                            <li>
                                {{__('Room type')}}: <strong>{{ucwords($booking->room_type)}}</strong>
                            </li>
                            <li>
                                {{__('Total Price')}}: Rs  <strong>{{$booking->price}}</strong>
                            </li>
                            
                            
                            
                            <li>
                                <small>{{__('Booking Date')}}: {{$booking->created_at->format('D Y M ')}}</small>
                            </li>
                            <hr/>
                            <li>
                                {{__('Guests')}}:  <small><b>{{isset($booking->guest_adult)?'Adult-'.$booking->guest_adult :''}} &nbsp; {{isset($booking->guest_child)?'Child-'.$booking->guest_child :''}}</b> </small>   
                            </li>
                            <li>
                                {{__('Email')}}: <a href="mailto:{!!$booking->email!!}">{{$booking->email}}</a>
                            </li>
                            <li>
                                {{__('Contact')}}: <a href="tel:{!!$booking->contact!!}">{{$booking->contact}}</a>
                            </li>
                            
                            {{-- <li>
                               <strong> {{__('Message')}}</strong>: {{$booking->message}}
                            </li> --}}
                        </ul>
                    @endif
                </div>
                    
            </div>
        </div>
    </div>

@endsection