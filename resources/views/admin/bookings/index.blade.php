@extends('layouts.admin')

@section('content')

  <div class="col-md-12">

    <div class="card">
      <div class="px-4 py-3 cus-center justify-content-between" style="border-bottom: 1px solid rgb(218, 218, 218);">
        <h3 class="card-title">{{__('Available')}} {{__('Bookings')}}</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if(isset($book))
        <table id="banner_dt" class="table table-bordered table-striped">
          <thead>
             
            <tr>
              <th style="width: 8%;">{{__('S.N.')}}</th>
              <th>{{__('Check in')}}</th>
              <th>{{__('Check out')}}</th>
              <th>{{__('Children')}}</th>
              <th>{{__('Adult')}}</th>
              <th>{{__('Room type')}}</th>
              <th>{{__('Price(Rs)')}}</th>
              <th>{{__('Email')}}</th>
              {{-- <th>{{__('Contact')}}</th> --}}
              {{-- <th>{{__('Rooms')}}</th> --}}
              <th style="width: 10%; text-align: center;">{{__('Actions')}}</th>
            </tr>
          </thead>
          
              
        
          <tbody>
            @foreach ($book as $booking)
              <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{$booking->date_arrival}}</td>
                  <td>{{$booking->date_departure}}</td>
                  <td>{{$booking->guest_child}}</td>
                  <td>{!!$booking->guest_adult!!}</td>
                  <td>{{ucwords($booking->room_type)}}</td>
                  <td>{{$booking->price}}</td>
                  {{-- <td>{!!$booking->contact!!}</td> --}}
                  <td><a href="mailto:{!!$booking->email!!}">{!!$booking->email!!}</td>
                  {{-- <td>{!!$booking->room_count!!}</td> --}}

                  {{-- <td>@if ($cat->status == '1') <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif </span></td> --}}
                
                <td class="cus-center justify-content-around">

                  <form action="{{route('admin.bookings.destroy',$booking->id)}}" method="POST">
                    <a href="{{route('admin.bookings.show',$booking->id)}}" title="View" class="btn btn-sm btn-success"><i class="fas fa-eye"></i></a>
                    @csrf
                    @method('DELETE')
                    
                    <button type="submit" class="btn btn-sm btn-danger"  title="Delete" onclick="confirmation(event)"><i class="fas fa-trash"></i></button>
                  </form>
                </td>
              </tr>
            @endforeach
          </tbody>
          {{-- <tfoot>
            <tr>
              <th style="width: 7%;">Sn</th>
              <th>Image Description</th>
              <th>Image</th>
              <th style="width: 13%; text-align: center;">Actions</th>
            </tr>
          </tfoot> --}}
        </table>
        @else
          <div class="text-center">
            No data found
          </div>
        @endif
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  @section('scripts')
    <script>
      function confirmation(e)
      {
        if(confirm('Are you sure to delete this image? Once delete cannot be recovered!'))
        {
          return true;
        }
        else{
          e.preventDefault();
        }
      }
      //datatable
      $(function () {

        $("#banner_dt").DataTable({
          "responsive": true,
          "autoWidth": false,
        });
      });
    </script>
  @endsection
@endsection