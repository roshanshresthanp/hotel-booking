<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($feature)) {{__('Upate')}}@else {{__('Add')}} {{__('Feature')}} @endif</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              <div class="col-md-6">
                  <div class="form-group">
                      <label>{{__('Feature Name')}}</label>
                      <input type="text" class="form-control" value="{{old('name',isset($feature)?$feature->name:'') }}" placeholder="Feature name" name="name" >
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('Price')}}</label>
                    <input type="number" class="form-control" value="{{old('price',isset($feature)?$feature->price:'') }}" placeholder="Feature price" name="price" >
                </div>
            </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Feature Description')}}</label>
                      <textarea class="form-control ck-editor" name="description" rows="7"> {{isset($feature)?$feature->description:old('description')}}</textarea>
                      {{-- <input type="text" class="form-control"value="{{old('description',isset($feature)?$feature->description:'') }}" placeholder="Category description" name="description"> --}}
                  </div>
              </div>
      
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
                  
                  {{-- <input class="form-check-input" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" value="1" id="flash"
                      name="status"> --}}
                      <input class="form-check-input" @if(isset($feature))  @if($feature->status == '1')
                       checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                    name="status">
                </div>

                <div class="col-md-12" onMouseOver="this.style.border='1px solid black'" onMouseOut="this.style.border='0'">
                  <label for="avatar">{{__('Upload')}}</label>
                  <input type="file" name="icon" class="dropify" @if(isset($feature))  data-default-file="{{ asset('storage/icon/'.$feature->icon) }}" @endif data-allowed-file-extensions="jpg svg jpeg png webp" />
                  
              </div>  
            </div>
            
               @if(isset($feature))
                <button type="submit" class="btn btn-info col-md-12">{{__('Update')}}</button>
                @else
                <button type="submit" class="btn btn-info col-md-12">{{__('Add')}}</button>
                @endif

        </div>

        </div>

      </div>
    </div>

  
  </div>
