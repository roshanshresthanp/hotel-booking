@extends('layouts.admin')

@section('content')

  <div class="col-md-12">

    <div class="card">
      <div class="px-4 py-3 cus-center justify-content-between" style="border-bottom: 1px solid rgb(218, 218, 218);">
        <h3 class="card-title">{{__('Available')}} {{__('Images')}}</h3>
        <div class="text-right">
          <a href="{{route('admin.galleries.create')}}" class="btn btn-sm btn-info"><i class="fas fa-plus mr-2"></i>{{__('Add')}} {{__('Image')}}</a>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body">
        @if(isset($imgs))
        <table id="banner_dt" class="table table-bordered table-striped">
          <thead>
             
            <tr>
              <th style="width: 8%;">{{__('S.N.')}}</th>
              <th>{{__('Image Description')}}</th>
              <th>{{__('Status')}}</th>
              <th>{{__('Image')}}</th>
              <th style="width: 20%; text-align: center;">{{__('Actions')}}</th>
            </tr>
          </thead>
          
              
        
          <tbody>
            @foreach ($imgs as $img)
              <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{!!$img->description!!}</td>
                  <td>@if ($img->status == '1') <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif </span></td>
                  <td><img src="{{asset('storage/gallery/image')}}/{{$img->image}}" height="60" width="80"> </td>
                
                <td class="cus-center justify-content-around">

                  <form action="{{route('admin.galleries.destroy',$img->id)}}" method="POST">
                    <a href="{{route('admin.galleries.edit',$img->id)}}" title="Edit folder" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
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