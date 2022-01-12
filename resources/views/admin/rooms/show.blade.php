@extends('layouts.admin')

@section('content')
    <div class="content-header pt-3">
        <div class="container-fluid">
        <div class="row justify-content-start">
            <div class="">
                <h5 class="m-0 text-dark"><i class="fas fa-bed mr-2 text-blue"></i>{{__('Room Details')}}</h5>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div style="overflow: hidden;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                
                <div class="card card-info pt-4 pb-3 px-3 my-3">
                    @if(isset($room))
                        <ul style="list-style: none; font-size: 17px;">
                            <li>
                                {{__('Room Name')}}: <strong>{{$room->name}}</strong>
                            </li>
                            
                            <li>
                                {{__('Room type')}} : <strong> 
                                                                    @foreach($cats as $cat)
                                                                    @if($cat->id == $room->category_id)
                                                                    
                                                                    {{$cat->name}}
                                                                    @endif
                                                                    @endforeach
                                                                </strong>
                             </li>
                             <li>
                                {{__('Price')}}: Rs <strong><td>@php $fp=0; $cp=0; @endphp @if(isset($cats))@foreach($cats as $cat) @if($cat->id == $room->category_id) 
                                    @php $cp=$cat->price; @endphp  @endif @endforeach @endif 
                                     @foreach($room->features as $feat)  @php  $fp +=$feat->price; @endphp @endforeach 
                                     {{$cp+$fp}}</td></strong>
                            </li>
                            <li>
                                {{__('Status')}}: @if ($room->status == '1') <span class="badge badge-success">Active</span> @else <span class="badge badge-danger">Inactive</span> @endif </span>
                                
                            </li>
                            <li>
                                <small>{{__('Created Date')}}: {{$room->created_at->format('D Y M ')}}</small>
                            </li>   
                            <hr/>
                            <li>
                               <strong> {{__('Description')}}</strong>: {!!$room->description!!}
                            </li>
                            {{-- <li>@dd($roo->feature_id); --}}
                                <strong> {{__('Features')}}</strong>: @foreach($room->features as $feat) <a class="badge badge- badge-info">{{$feat->name}} </a>@endforeach 
                             </li>
                             {{-- <li> 
                                <strong> {{__('Details')}}</strong>:
                                <table border='1'>
               
                                    <tr>
                                        <th>Title</th>
                                        <th>Value</th>
                                    </tr>
                                    @foreach($room->details as $item)
                                        <tr>
                                                <td> {{$item->name}} </td>
                                                <td>{{$item->pivot->detail_value}}</td>
                                        </tr>
                                    @endforeach
                                </table>
                             </li> --}}
                             <li> @if(count($room->detail)>0)
                                <strong> {{__('Details')}}</strong>:
                                <div class="row">
                                    <div class="col-md-2">
                                        Title:
                                    </div>
                                    <div class="col-md-4">
                                        Value:
                                    </div>
                                </div>
                                
                                    @for ($i=0; $i < (count($room->detail)); $i++)
                                        <div class="row">
                                            <div class="col-md-2">
                                                <input type="text" name="detail[{{ $i }}][detail_id]" class="form-control" 
                                                value="{{$room->detail[$i]['detail_id'] ?? '' }}" disabled>
                                            </div>
                                            <div class="col-md-4">
                                                <input type="text" name="detail[{{ $i }}][detail_value]" class="form-control" 
                                                value="{{$room->detail[$i]['detail_value'] ?? '' }}" disabled>
                                            </div>
                                        </div>
                                    @endfor
                                    @endif
                                </div>
                             </li>
                             
                        </ul>
                    @endif
                </div>
                    
            </div>
        </div>
    </div>

@endsection