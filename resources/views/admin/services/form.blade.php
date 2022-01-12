<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($service)) {{__('Update')}} @else
            {{__('Add')}}  @endif {{__('Service')}}</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Title')}}</label>
                      <input type="text" class="form-control" value="{{old('title',isset($service)?$service->title:'') }}" placeholder="Enter title" name="title" >
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Description')}}</label>
                      <textarea class="form-control ck-editor" name="description" > {{isset($service)?$service->description:old('description')}}</textarea>
                      {{-- <input type="text" class="form-control"value="{{old('description',isset($service)?$service->description:'') }}" placeholder="Category description" name="description"> --}}
                  </div>
              </div>

              {{-- <div class="col-md-12">
                <div class="form-group">
                    <label>{{__('Link')}}</label>
                    <input type="link" class="form-control" value="{{old('link',isset($service)?$service->link:'') }}" placeholder="https://www.letitgrownepal.com" name="link" >
                </div>
            </div> --}}
      
              

              
            </div>
            
          </div>
        </div>
          
        </form>
      </div>
    </div>
  </div>

    <div class="col-md-4">
      <div class="card d-flex card-info">
        <div class="card-body">
        
          <div class="col-md-12">
            <div class="row">

            <div class="col-md-12"> 
              <div class="form-group">
                <label>{{__('Status')}}</label>
                <div class="form-check">
                  {{-- <input class="form-check-input" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" value="1" id="flash"
                      name="status"> --}}
                      <input class="form-check-input" @if(isset($service))  @if($service->status == '1')
                       checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                    name="status">
                </div>
             </div>
            </div>
                {{-- <div class="col-md-12">
                  <div class="form-group">
                    <label for="avatar">{{__('Upload')}}</label>
                    <input type="file" name="image" class="dropify" @if(isset($service))  data-default-file="{{asset('storage/service/'.$service->image) }}" @endif data-allowed-file-extensions="jpg jpeg png webp" />
                  
                 </div> 
                </div> --}}
                
                <div class="col-md-12">
                  <div class="form-group">
                    <label for="image">{{__('Select one or multiple images')}}:</label>
                    <input type="file" id="imageCollection" name="image[]"  onchange="javascript:updateList()" class="" multiple="">
                    <div id="imageList" class="pt-3"></div>
                  </div>
                </div>
               
              

            
            
               @if(isset($service))
                <button type="submit" class="btn btn-info col-md-12">{{__('Update')}}</button>
                @else
                <button type="submit" class="btn btn-info col-md-12">{{__('Add')}}</button>
                @endif

        </div>
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