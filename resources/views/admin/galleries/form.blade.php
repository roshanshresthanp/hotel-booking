<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($img)) {{__('Upate')}} {{__('Image')}}@else
            {{__('Add')}} {{__('Image')}} @endif</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              {{-- <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Image Name')}}</label>
                      <input type="text" class="form-control" value="{{old('name',isset($img)?$img->name:'') }}" placeholder="imgegory name" name="name" >
                  </div>
              </div> --}}
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Image Description')}}</label>
                      <textarea class="form-control ck-editor" name="description" rows="7"> {{isset($img)?$img->description:old('description')}}</textarea>
                      {{-- <input type="text" class="form-control"value="{{old('description',isset($img)?$img->description:'') }}" placeholder="imgegory description" name="description"> --}}
                  </div>
              </div>
              @if(!isset($img))
              <div class="col-md-12">
                <div class="form-group">
                  <label for="image">{{__('Select one or multiple images')}}:</label>
                  <input type="file" id="imageCollection" name="image[]" accept="image/*" onchange="javascript:updateList()" class="" multiple="">
                  <div id="imageList" class="pt-3"></div>
                </div>
              </div>
              @else
              <div class="col-md-12">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" name="image" class="dropify" data-default-file="{{ asset('storage/gallery/image/'.$img->image) }}"  data-allowed-file-extensions="jpg jpeg png webp svg" />
              </div> 
              @endif
      
              {{-- <div class="col-md-12">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" />
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
            <div class="form-group">
              <label>{{__('Status')}}</label>
                <div class="form-check">
                      <input class="form-check-input" @if(isset($img))  @if($img->status == '1')
                       checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                    name="status">
                </div>

                {{-- <div class="col-md-12" onMouseOver="this.style.border='1px solid black'" onMouseOut="this.style.border='0'">
                  <label for="avatar">{{__('Upload')}}</label>
                  <input type="file" name="image" class="dropify" @if(isset($img))  data-default-file="{{ asset('storage/image/'.$img->image) }}" @endif data-allowed-file-extensions="jpg jpeg png webp" />
                  
              </div>  --}}
              {{-- <div class="col-md-12">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" />
              </div> --}}
              

            </div>
            
               @if(isset($img))
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
