@extends('layouts.main')

@section('content')

<section class="gallery-head head-banner">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 p-0 position-relative">
          <div class="box">
            <img class="head" src="{{isset($hotel->banner)?asset('storage/hotel/'.$hotel->banner):''}}" alt="">
            <h1 class="head-one text-white position-absolute"> Booking Detail</h1>
          </div>
        </div>
      </div>
    </div>
  </section>

    {{-- <div class="content-header p-1">
        <div class="container">
        <div class="row justify-content-start">
            <div class="title-box">
                <h4 class="head-two head_dark title">{{__('Booking Details')}}</h4>
            </div><!-- /.col -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div> --}}

    <div class="container-fluid pb-4" style="overflow: hidden;">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                 <div class=" card-info pt-0 pb-3 px-3 my-3 mt-0">
                   {{-- @dd($book); --}}
                    @if(isset($book))
                    <div class="row justify-content-center mr-5">
                    <div class="col-md-5">
                      {{-- <h4 class="head-three head_gray p-2">Details</h4> --}}
                      {{-- <ul style="list-style: none; font-size: 17px;">
                          <li>
                              {{__('Arrival date')}}: <strong>{{$book['date_arrival']}}</strong>
                          </li>
                          <li>
                              {{__('Departure date')}}: <strong>{{$book['date_departure']}}</strong>
                          </li>
                          
                          <li>
                              {{__('Room type')}} : <strong> {{ucwords($book['room_type'])}}
                                                              </strong>
                           </li>
                           <li>
                              {{__('Guests')}}:  <small><b>{{isset($book['guest_adult'])?'Adult-'.$book['guest_adult'] :''}} &nbsp; {{isset($book['guest_child'])?'Child-'.$book['guest_child'] :''}}</b> </small>   
                          </li>
                          <li>
                            {{__('Contact')}}: <strong>{{$book['contact']}}</strong>
                          </li>
                          <li>
                            {{__('Email')}}: <strong>{{$book['email']}}</strong>
                          </li>
                           
                      </ul> --}}
                      
                      <div class="book-details-head">
                        <h1 class="head-four head_dark">Details</h1>
                      </div>

                      <div class="col-md-12">
                        <div class="book-price">
                          <div class="box">
                            <div class="info">
                                <h1 class="head_dark">Arrival date</h1>
                                <p>{{$book['date_arrival']}}</p>
                            </div>
                            <div class="info">
                                <h1 class="head_dark">Departure date</h1>
                                <p>{{$book['date_departure']}}</p>
                            </div>
                            <div class="info">
                                <h1 class="head_dark">Room type</h1>
                                <p>{{ucwords($book['room_type'])}}</p>
                            </div>
                            <div class="info">
                                <h1 class="head_dark">Guests</h1>
                                <p>{{isset($book['guest_adult'])?'Adult-'.$book['guest_adult'] :''}} &nbsp; {{isset($book['guest_child'])?'Child-'.$book['guest_child'] :''}}</p>
                            </div>
                            <div class="info">
                                <h1 class="head_dark">Contact</h1>
                                <p>{{isset($book['contact'])?$book['contact'] :'null'}}</p>
                            </div>
                            <div class="info">
                                <h1 class="head_dark">Email</h1>
                                <p>{{isset($book['email'])?$book['email'] :'null'}}</p>
                            </div>
                          </div>
                        </div>
                      </div>



                      {{-- <div class="details-table">
                        <div class="details-table-box">
                          <div class="row">
                            <div class="col-md-12">
                              <div class="row">
                                <div class="col-6">
                                  <h1 class="head-four">Arrival date</h1>
                                </div>
                                <div class="col-6">
                                  <p class=" details-value para-one text-left"> {{$book['date_arrival']}}</p>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                            <div class="details-table-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-6">
                                      <h1 class="head-four">Departure date</h1>
                                    </div>
                                    <div class="col-6">
                                      <p class=" details-value para-one text-left">{{$book['date_departure']}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="details-table-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-6">
                                      <h1 class="head-four">Room type</h1>
                                    </div>
                                    <div class="col-6">
                                      <p class=" details-value para-one text-left">{{$book['room_type']}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> 
                            <div class="details-table-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-6">
                                      <h1 class="head-four">Guests</h1>
                                    </div>
                                    <div class="col-6">
                                      <p class=" details-value para-one text-left">{{isset($book['guest_adult'])?'Adult-'.$book['guest_adult'] :''}} &nbsp; {{isset($book['guest_child'])?'Child-'.$book['guest_child'] :''}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div> 
                            <div class="details-table-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-6">
                                      <h1 class="head-four">Contact</h1>
                                    </div>
                                    <div class="col-6">
                                      <p class=" details-value para-one text-left">{{$book['contact']}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="details-table-box">
                              <div class="row">
                                <div class="col-md-12">
                                  <div class="row">
                                    <div class="col-6">
                                      <h1 class="head-four">Email</h1>
                                    </div>
                                    <div class="col-6">
                                      <p class=" details-value para-one text-left">{{$book['email']}}</p>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
        
                        
                      </div> --}}
                      
                  </div>
                  <div class="col-md-5">
                    <div class="book-details-head">
                      <h1 class="head-four head_dark transparent" style="color: #00000000">Total</h1>
                    </div>
                    <div class="card card-success book-total-card pt-3 pb-3 px-3 my-4 px-3 mx-0">
                    <ul style="line-height:150%" class="head-four ">
                          <li> <span>Days :</span> <span class="total">
                              @php
                              $startDate = new DateTime($book['date_arrival']);
                              $endDate = new DateTime($book['date_departure']);
                              $difference = $endDate->diff($startDate);
                              $day =$difference->format("%a");                           
                              echo $day;
                              @endphp
                              </span>
                          </li>
                              
                              
                          <li class=""> <span>Price : Rs</span>   <span class="total">
                            @php
                            $cp=0;
                            $price=0;
                            $type=$book['room_type'];
                            
                            @endphp
                            {{-- @dd($type,'type'); --}}
                           
                           @if(count($category)>0)
                            
                              @foreach($category as $cat)
                              @if($cat->slug==$type)
                              
                             @php $cp = $cat->price; @endphp
                                {{-- @dd($cp); --}}
                              @endif
                              @endforeach
                              @endif

                                {{$price = $cp*$day}}
                            
                          </span>

                                  
                               </li>
                      </ul>
                    </div>
                    <div class="row">

                    
                      <form action="{{route('booking.store')}}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="book-details-head py-3">
                          <h1 class="head-four head_dark ">Payment Method</h1>
                        </div>
                        <div class="form-group row col-md-12">
                          {{-- <label>Select payment method</label> --}}
                          {{-- <div class="justify-content-between row p-0"> --}}
                            <div class="col-6">
                                <p class="text-center">eSewa pay</p>
                                <input type="radio" class="radio" value="online" name="payment_type" >
                            </div>
                            <div class="col-6">
                                <p class="text-center">Pay at hotel</p>
                                <input type="radio" class="radio" value="cash" required name="payment_type">
                                
                            </div>
                          {{-- </div> --}}
                        <input class="form-control" type="hidden" name="day" value="{{$day}}" id="day" readonly>
                        <input class="form-control" type="hidden" name="price" value="{{$price}}" id="price" readonly>
                        <input class="form-control" type="hidden" name="guest_child" value="{{$book['guest_child']}}" id="" readonly>
                        <input class="form-control" type="hidden" name="guest_adult" value="{{$book['guest_adult']}}" id="" readonly>
                        <input class="form-control" type="hidden" name="date_departure" value="{{$book['date_departure']}}" id="" readonly>
                        <input class="form-control" type="hidden" name="date_arrival" value="{{$book['date_arrival']}}" id="price" readonly>
                        <input class="form-control" type="hidden" name="contact" value="{{$book['contact']}}" id="" readonly>
                        <input class="form-control" type="hidden" name="email" value="{{$book['email']}}" id="" readonly>
                        <input class="form-control" type="hidden" name="room_type" value="{{$book['room_type']}}" id="" readonly>
                      
                      
                        <div class="text-center p-4">
                          {{-- <a href="dadad" class="button button_green">Pay Now</a> --}}
                          
                          <button type="submit" class="button button_red btn-sm">Submit</button>
    
                        </div>
                      </form>
                    </div>

                    </div>
                  </div>
                </div>
                    

                    {{-- <div class="container">
                        <div class="row">
                          <div class="col-12">
                            <table class="table table-bordered">
                              <thead>
                                <tr>
                                  <th scope="col">Select Room</th>
                                  <th scope="col">Room Name</th>
                                  <th scope="col">Price (Rs)</th>
                                  <th scope="col">Description</th>
                                </tr>
                              </thead>
                              <tbody>
                            @foreach($category as $cat)
                            @if ($book['room_type'] == $cat->slug)
                                @foreach($cat->rooms as $room)
                                <tr>
                                    <td width="12%">
                                      <div class="custom-control custom-checkbox">
                                          <input type="radio" class="checkbox1"  name="checkbox" value="{{$room->price}}" onclick="calculate()" class="custom-control-input" >                                      </div>
                                    </td>
                                    <td>{{$room->name}}</td>
                                    <td>{{$room->price}}</td>
                                    <td>{{$room->description}}</td>
                                  </tr>
                                @endforeach
                            @endif
                            @endforeach
                                
                                  
                              </tbody>
                            </table>
                          </div>
                        </div>
                    </div> --}}
                    @endif

                </div>
                    
            </div>

        </div>

            
                    
                

            
        </div>

        
        
    </div>

@endsection

@section('scripts')
<script>
// $(document).ready(function() {
//     //set initial state.
//     $('#price').val(this.unchecked);
//     $('.checkbox1').change(function() {

//         // var val = $(this).val();
//         // console.log(val);

//         var day = $('#day').val();
//          if(this.checked) {

//              var test = $('.checkbox1')
//              console.log(test);

//              var price= [];
//              price = $(this).val();;
//              console.log(price);

//             var total = price * day;
            
//             // console.log(price);

//             }
//             if(!this.checked){
//             // console.log(price);
                
//             var total = 0;
//         }
        
//         // var str = 10;
//         $('#price').val(total);
//     });
// });

// function calculate()
// {
// //    var val = $(this).val();
// //     console.log(val);
//     $('#price').val(this.unchecked);

//             if(this.checked) {

//              var price= [];
//              price = $('.checkbox1');
//              console.log(price);

//             var total = price * day;
//             console.log(price);

//             }
//             if(!this.checked){
//             // console.log(price);
                
//             var total = 10;
//         }
        
//         // var str = 10;
//         $('#price').val(total);
//     console.log('sa');
// }
</script>
@endsection