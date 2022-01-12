<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($room)) {{__('Update')}} @else {{__('Add')}} @endif {{__('Room')}}</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Room Name')}}</label>
                      <input type="text" class="form-control" value="{{old('name',isset($room)?$room->name:'') }}" placeholder="Room name" name="name" >
                  </div>
              </div>
              {{-- <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('Price')}}</label>
                    <input type="number" min="0"  class="form-control" value="{{old('price',isset($room)?$room->price:'') }}" placeholder="Room price" name="price" >
                </div>
            </div> --}}
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Room Description')}}</label>
                      <textarea class="form-control ck-editor" placeholder="Room description" name="description">{{isset($room)?$room->description:'' }}</textarea>
                  </div>
              </div>

              

              @if(isset($room))
                <div class="form-group col-md-6">
                  <label>{{ __('Select Features') }}</label>
                      @if(count($features)>0)
                            @foreach($features as $feature)
                            
                                  {{-- @foreach($room->features as $feat)  
                                      @if($feature->id === $feat->id)
                                      @dd($feat->name);
                                      @endif
                                  @endforeach --}}
                            
                            
                            
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="{{$feature->id}}" id="defaultCheck1"
                                  name="feature_id[]" @foreach($room->features as $feat)  
                                  @if($feature->id === $feat->id) checked @endif
                              @endforeach >
                              <label class="form-check-label" for="result">
                                  {{$feature->name}} @isset($feature->price)  < <small>Add Rs {{$feature->price}} </small>> @endisset
                              </label>
                            </div> 

                            @endforeach
                       @endif
                 </div>
            @else
              <div class="form-group col-md-6">
                <label>{{ __('Select Features') }}</label>
                    @if(count($features)>0)
                          @foreach($features as $feature)
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="{{$feature->id}}" id="defaultCheck1"
                                name="feature_id[]">
                            <label class="form-check-label" for="result">
                                {{$feature->name}} @isset($feature->price)  < <small>Add Rs {{$feature->price}} </small>> @endisset
                            </label>
                          </div>  
                          @endforeach
                     @endif
              </div>
            @endif

               
              <div class="col-md-6">
                <div class="form-group">
                  <label>Room Type</label>
                  <select class="form-control" name="category_id"  id="exampleFormControlSelect1" placeholder="Select Room">
                        @if(isset($room))
                          @foreach($cats as $cat)
                             @if($room->category_id == $cat->id)
                            <option selected value={{$cat->id}}>{{$cat->name}}</option>
                              @endif
                          @endforeach
                          @foreach($cats as $cat)
                          <option value={{$cat->id}}>{{$cat->name}}</option>
                          @endforeach                  
                        @else
                            @foreach($cats as $cat)
                            <option selected value={{$cat->id}}>{{$cat->name}}</option>
                            @endforeach
                        @endif   
                   </select>
                  </div>
              </div>
          
          @if(isset($room))
          @if(isset($details))

          <div class="form-group col-md-12">
            {{-- <label>Enter Detail</label> --}}
              <div class="form-group">
                <label for="properties">Enter Detail</label>
                  <div class="row">
                      <div class="col-md-2">
                          Title:
                      </div>
                      <div class="col-md-4">
                          Value:
                      </div>
                  </div>
                  @for($i=0; $i <= 4; $i++)
                      <div class="row">
                          <div class="col-md-2">
                              <input type="text" name="detail[{{ $i }}][detail_id]" class="form-control" 
                                value="{{$room->detail[$i]['detail_id'] ?? '' }}">
                          </div>
                          <div class="col-md-4">
                              <input type="text" name="detail[{{ $i }}][detail_value]" class="form-control" 
                                value="{{$room->detail[$i]['detail_value'] ?? '' }}">
                          </div>
                      </div>
                  @endfor
              </div>
          </div>
          @endif

          @else
          @if(isset($details))

          <div class="form-group col-md-12">
            <label>Enter Detail</label>
          <div class="repeater">
            <div data-repeater-list="detail">
              <div data-repeater-item>
                <select name="detail_id"  class="form-group">
                  @foreach ($details as $item)
                    <option value="{{$item->name}}" >{{$item->name}}</option>
                  @endforeach
                </select>
                <input type="number" name="detail_value" placeholder="Enter number"  />
                <input data-repeater-delete type="button" value="Delete"/><br>
               
              </div>
            </div>
            <input data-repeater-create type="button" value="Add column"/>
          </div>
          </div>
          @endif
          @endif
          
                  
          {{-- @if(count($details)>0)

          <div class="form-group">
            <label for="properties">Enter detail</label>
            <div class="row">
                <div class="col-md-2">
                    Key:
                </div>
                <div class="col-md-4">
                    Value:
                </div>
            </div>
            @for ($i=0; $i <= 4; $i++)
            <div class="row">
                <div class="col-md-2">
                    <input type="text" name="detail_id[{{ $i }}][key]" class="form-control" value="{{ old('detail_id['.$i.'][key]') }}">
                </div>
                <div class="col-md-4">
                    <input type="text" name="detail_id[{{ $i }}][value]" class="form-control" value="{{ old('detail_id['.$i.'][value]') }}">
                </div>
            </div>
            @endfor
        </div>
        @endif --}}
        

          
          


      
              {{-- <div class="col-md-12">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" />
              </div> --}}
            </div>
            
          </div>
        </div>
          
        
      </div>
    </div>
  </div>

    <div class="col-md-4">
      <div class="card d-flex card-info">
        <div class="card-body">
        
          <div class="col-md-12">

            {{-- <div class="form-group col-md-12">
              <label>{{ __('Select Details') }}</label>
                  
                    @foreach($details as $detail)
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="{{$detail->id}}" id="defaultCheck1"
                          name="detail_id[]">
                      <label class="form-check-label" for="result">
                          {{$detail->name}}
                      </label>
                    </div>  
                    @endforeach
                 
          </div> --}}
          


              <div class="form-group">
                <label>{{__('Status')}}</label>
                  <div class="form-check">
                    
                    {{-- <input class="form-check-input" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" value="1" id="flash"
                        name="status"> --}}
                        <input class="form-check-input" @if(isset($room))  @if($room->status == '1')
                        checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                      name="status">
                  </div>
              </div>

            <div class="col-md-12">
              <div class="form-group">
               <label for="avatar">{{__('Upload Featured image')}}</label>
              <input type="file" name="featured_image" class="dropify" @if(isset($room))  data-default-file="{{ asset('storage/rooms/'.$room->featured_image) }}" @endif data-allowed-file-extensions="jpg jpeg png webp" />
              
          </div> 
            </div>

              <div class="col-md-12">
                <div class="form-group">
                  <label for="image">{{__('Upload one or multiple images')}}:</label>
                  <input type="file" id="imageCollection" name="image[]" data-allowed-file-extensions="jpg jpeg png webp"  onchange="javascript:updateList()" class="" multiple="">
                  <div id="imageList" class="pt-3"></div>
                </div>
              </div> 
              <div class="form-group">
                <label>{{__('Display as featured room?')}}</label>
                  <div class="form-check">
                    
                    {{-- <input class="form-check-input" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" value="1" id="flash"
                        name="status"> --}}
                        <input class="form-check-input" @if(isset($room))  @if($room->featured == '1')
                        checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck2" name="featured">
                  </div>
              </div>
            
               @if(isset($room))
                <button type="submit" class="btn btn-info col-md-12">{{__('Update')}}</button>
                @else
                <button type="submit" class="btn btn-info col-md-12">{{__('Add')}}</button>
                @endif

        </div>

        </div>

      </div>
    </div>

  
  </div>
  <script>
    function updateList()
    {
      var input = document.getElementById('imageCollection');
      var output = document.getElementById('imageList');
      var children = "";
      console.log(input.files);
      for (var i = 0; i < input.files.length; ++i) {
          children += '<li class="text-secondary">' + input.files.item(i).name + '</li>';
      }
      output.innerHTML = '<ul style="list-style: decimal;">'+children+'</ul>';     
    }

    function removeList()
    {
      document.getElementById('imageList').innerHTML = "";
    }
  </script>
