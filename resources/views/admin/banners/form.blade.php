<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($banner)) {{__('Update')}} {{__('Banner')}}@else
            {{__('Add')}} {{__('Banner')}} @endif</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Banner Title')}}</label>
                      <input type="text" class="form-control" value="{{old('title',isset($banner)?$banner->title:'') }}" placeholder="Banner title" name="title" >
                  </div>
              </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Banner Description')}}</label>
                      <textarea class="form-control ck-editor" name="description" > {{isset($banner)?$banner->description:old('description')}}</textarea>
                      {{-- <input type="text" class="form-control"value="{{old('description',isset($banner)?$banner->description:'') }}" placeholder="Category description" name="description"> --}}
                  </div>
              </div>

              {{-- <div class="col-md-12">
                <div class="form-group">
                    <label>{{__('Link')}}</label>
                    <input type="link" class="form-control" value="{{old('link',isset($banner)?$banner->link:'') }}" placeholder="https://www.letitgrownepal.com" name="link" >
                </div>
            </div> --}}
      
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
            <div class="row">

           
            <div class="form-group">
              <label>{{__('Status')}}</label>
                <div class="form-check">
                  
                  {{-- <input class="form-check-input" type="checkbox" data-toggle="toggle" data-on="Yes" data-off="No" value="1" id="flash"
                      name="status"> --}}
                      <input class="form-check-input" @if(isset($banner))  @if($banner->status == '1')
                       checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                    name="status">
                </div>
            </div>

                <div class="col-md-12">
                  <div class="form-group">
                <label for="avatar">{{__('Upload')}}</label>
                  <input type="file" name="image" class="dropify" @if(isset($banner))  data-default-file="{{ asset('storage/banner/'.$banner->image) }}" @endif data-allowed-file-extensions="jpg jpeg png webp" />
                  
                </div>
              </div>
            
               @if(isset($banner))
                <button type="submit" class="btn btn-info col-md-12">{{__('Update')}}</button>
                @else
                <button type="submit" class="btn btn-info col-md-12">{{__('Add')}}</button>
                @endif

        </div>

        
        </div>

      </div>
    </div>

  
  </div>
