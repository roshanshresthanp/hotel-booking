@extends('layouts.admin')


@section('content')
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{isset($rooms)?count($rooms):''}}</h3>

                        <p>{{__('Total')}} Active {{__('Rooms')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-bed"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{isset($booking)?count($booking):''}}</h3>

                        <p>{{__('Total')}} {{__('Bookings')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{isset($gallery)?count($gallery):''}}</h3>

                        <p>{{__('Total')}} Active {{__('Gallery')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-image"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-secondary">
                    <div class="inner">
                        <h3>{{isset($feedback)?count($feedback):''}}</h3>

                        <p>{{__('Feedbacks')}}</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-inbox"></i>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
    </div>
</section>
@endsection