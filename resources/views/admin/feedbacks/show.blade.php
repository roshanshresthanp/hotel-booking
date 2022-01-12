@extends('layouts.admin')

@section('content')
    <div class="content-header pt-3">
        <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="">
                <h5 class="m-0 text-dark"><i class="fas fa-comments mr-2 text-blue"></i>{{__('Feedback')}}</h5>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div style="overflow: hidden;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card card-info pt-4 pb-3 px-3 my-3">
                    @if($feedback)
                        <ul style="list-style: none; font-size: 17px;">
                            <li>
                                {{__('Name')}}: <strong>{{$feedback->name}}</strong>
                            </li>
                            <li>
                                {{__('Email')}}: <strong>{{$feedback->email}}</strong>
                            </li>
                            <li>
                                {{__('Subject')}}: <strong>{{$feedback->subject}}</strong>
                            </li>
                            <li>
                                <small>{{__('Date')}}: {{$feedback->created_at->format('D Y M ')}}</small>
                            </li>
                            <hr/>
                            <li>
                               <strong> {{__('Message')}}</strong>: {{$feedback->message}}
                            </li>
                        </ul>
                    @endif
                </div>
                    
            </div>
        </div>
    </div>

@endsection