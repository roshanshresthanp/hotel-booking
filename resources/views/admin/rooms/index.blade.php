@extends('layouts.admin')

@section('content')

  <div class="col-md-12">

    <div class="card">
      <div class="px-4 py-3 cus-center justify-content-between" style="border-bottom: 1px solid rgb(218, 218, 218);">
        <h3 class="card-title">{{__('Available')}} {{__('Rooms')}}</h3>
        <div class="text-right">
          <a href="{{route('admin.rooms.create')}}" class="btn btn-sm btn-info"><i class="fas fa-plus mr-2"></i>{{__('Add')}} {{__('Rooms')}}</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if(isset($rooms))
        <table id="banner_dt" class="table table-bordered table-striped">
          <thead>
             
            <tr>
              <th style="width: 4%;">{{__('S.N.')}}</th>
              <th>{{__('Name')}}</th>
              <th>{{__('Price (Rs)')}}</th>
              {{-- <th>{{__('Description')}}</th> --}}
              <th>{{__('Category')}}</th>
              <th>{{__('Status')}}</th>
              <th>{{__('Featured image')}}</th>
              <th>{{__('Featured')}}</th>
              {{--<th>{{__('Details')}}</th> --}}
              <th style="width: 15%; text-align: center;">{{__('Actions')}}</th>
            </tr>
          </thead>
        
          <tbody>
            <tr>
            @foreach ($rooms as $room)
              
                  <td>{{$loop->iteration}}</td>
                  <td>{{$room->name}}</td>
                  <td>@php $fp=0; $cp=0; @endphp @if(isset($cats))@foreach($cats as $cat) @if($cat->id == $room->category_id) 
                    @php $cp=$cat->price; @endphp  @endif @endforeach @endif 
                     @foreach($room->features as $feat)  @php  $fp +=$feat->price; @endphp @endforeach 
                     {{$cp+$fp}}</td>

                  {{-- <td>{!!str_limit($room->description,500)!!}</td> --}}

                  <td>@if(isset($room->category_id)) 
                      @foreach($cats as $cat)
                        @if($cat->id == $room->category_id)
                        {{$cat->name}}
                        @endif
                      @endforeach
                    @endif
                  </td> 

                  <td>@if ($room->status == '1') <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif </span></td>
                  <td><img src="{{asset('storage/rooms')}}/{{$room->featured_image}}" height="50" width="70"></td>
                  <td>@if ($room->featured == '1') <span class="btn btn-success btn-sm"><a style="color:white;" href="{{route('admin.room.featured',$room->id)}}"> Active</a></span> @else <span class="btn btn-danger btn-sm"><a style="color:white;" href="{{route('admin.room.featured',$room->id)}}">Inactive</a></span> @endif </span></td>
                  {{-- <td> --}}

                    
                    {{-- @if($room->features != null)
                      @foreach($room->features as $feat)
                        {{$feat->name}}
                      
                      @endforeach
                      @endif --}}
                    {{-- {{$room->feature_id}}; --}}

                  {{-- </td> --}}
                  
                  {{-- <td>
                    @if($room->roomDetailValues != null)
                      @foreach($room->roomDetailValues as $detail)
                        
                       @foreach($room_detail as $d)
                        @if($detail->detail_id == $d->id)
                          {{$d->name}}
                        @endif
                        @endforeach
                        {{$detail->detail_value}}
                      @endforeach
                      @endif
                  </td> --}}
                
                <td class="cus-center justify-content-around">

                  <form action="{{route('admin.rooms.destroy',$room->id)}}" method="POST">
                    <a href="{{route('admin.rooms.show',$room->id)}}" title="Show" class="btn btn-sm btn-info"><i class="fas fa-eye"></i></a>

                    <a href="{{route('admin.rooms.edit',$room->id)}}" title="Edit" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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