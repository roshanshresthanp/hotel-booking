<div class="row">

  <div class="col-md-8">
    <div class="card d-flex card-info">
      <div class="card-header">
        <h3 class="card-title">@if(isset($cat)) {{__('Update')}} {{__('Category')}}@else
            {{__('Add')}} {{__('Category')}} @endif</h3>
      </div>
      <!-- /.card-header -->
  
      <div class="card-body ">
        
        <div class="row">
          <div class="col-md-12">
            <div class="row">
      
              <div class="col-md-6">
                  <div class="form-group">
                      <label>{{__('Category Name')}}</label>
                      <input type="text" class="form-control" value="{{old('name',isset($cat)?$cat->name:'') }}" placeholder="Category name" name="name" >
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                    <label>{{__('Price')}}</label>
                    <input type="text" class="form-control" value="{{old('price',isset($cat)?$cat->price:'') }}" placeholder="Category price" name="price" >
                </div>
            </div>
              <div class="col-md-12">
                  <div class="form-group">
                      <label>{{__('Category Description')}}</label>
                      <textarea class="form-control ck-editor" name="description" rows="7"> {{isset($cat)?$cat->description:old('description')}}</textarea>
                      {{-- <input type="text" class="form-control"value="{{old('description',isset($cat)?$cat->description:'') }}" placeholder="Category description" name="description"> --}}
                  </div>
              </div>
      
              {{-- <div class="col-md-12">
                <label for="image">{{__('Upload Image')}}</label>
                <input type="file" name="image" class="dropify" data-allowed-file-extensions="jpg jpeg png webp" />
              </div> --}}

              
      
              {{-- <div class="col-md-12 d-flex justify-content-between mt-3">
                @if(isset($cat))
                <button type="submit" class="btn btn-info">{{__('Update')}}</button>
                @else
                <button type="submit" class="btn btn-info">{{__('Add')}}</button>
                @endif
              </div>   --}}
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
                      <input class="form-check-input" @if(isset($cat))  @if($cat->status == '1')
                       checked @endif @endif type="checkbox" value="1" data-toggle="toggle" data-on="Yes" data-off="No" id="defaultCheck1"
                                    name="status">
                    </div>
                       </div> 
               </div>

                <div class="col-md-12">
                  <div class="form-group">
                   <label for="avatar">{{__('Upload')}}</label>
                  <input type="file" name="image" class="dropify" @if(isset($cat))  data-default-file="{{ asset('storage/category/'.$cat->image) }}" @endif data-allowed-file-extensions="jpg jpeg png svg webp" />
                  
              </div> 
                </div>
              

            
            
               @if(isset($cat))
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
