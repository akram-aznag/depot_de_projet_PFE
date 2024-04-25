@extends('admin.admin_dashboard')
@section('admin')
<div class="card" style="margin-top: 140px">
  <x-notify::notify />
  <div class="card-body container">
    
    <h6 class="card-title text-center">@lang('CustomizedLanguage.blog_attributes.update_blog_with_id'):{{$post_data->id}}</h6>

    <form class="forms-sample row" method="POST"  action="{{route('admin.update_blog',['post_id'=>$post_data->id])}}" enctype="multipart/form-data">
      @csrf
      <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.category')</label>
          <div class="col-sm-9">
              <select name="category" id="category" class="form-control @error('category') is-invalid @enderror">
                  <option value={{$post_data->category->id}}>{{$post_data->category->name}}</option>

                  @foreach($categories as $category)
                      <option value="{{ $category->id }}">{{ $category->name }}</option>
                  @endforeach
              </select>
              @error('category')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.title')</label>
          <div class="col-sm-9">
              <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="exampleInputUsername2" value="{{$post_data->title}}">
              @error('title')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label" >@lang('CustomizedLanguage.blog_attributes.description')</label>
          <div class="col-sm-9">
              <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" value="{{$post_data->description}}">
              @error('description')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.detailed_description')</label>
          <div class="col-sm-9">
              <input type="text" name="meta_description" class="form-control @error('meta_description') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" value="{{$post_data->meta_description}}">
              @error('meta_description')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.keywords')</label>
          <div class="col-sm-9">
              <input type="text" name="meta_keywords" class="form-control @error('meta_keywords') is-invalid @enderror" id="exampleInputMobile" value="{{$post_data->meta_keywords}}">
              @error('meta_keywords')
                  <span class="text-danger">{{ $message }}</span>
              @enderror
          </div>
      </div>
      <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.photo')</label>
          <div class="col-sm-9">
              <input type="file" class="form-control" name="photo" id="image" autocomplete="off" name="photo">
          </div>
      </div>
      <div class="row mb-3">
          <div style="position: relative;left:100px">
              <img id="showimage" style="height: 100px;" src={{!empty($post_data->photo)?url('../upload/blog_images/'.$post_data->photo):url('../upload/no_image.jpg')}} alt="photo">
          </div>
      </div>
      <label for="exampleInputUsername2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_authorization.blog_authorization')</label>
      <div class="col-sm-9">
          <select name="post_state" id="category" class="form-control @error('post_state') is-invalid @enderror">
                <option value="">@lang('CustomizedLanguage.blog_authorization.provide_the_blog_authorization')</option>
                 <option value="yes">@lang('CustomizedLanguage.blog_authorization.authorize')</option>
                 <option value="no">@lang('CustomizedLanguage.blog_authorization.deauthorize')</option>
          </select>
          @error('post_state')
              <span class="text-danger">{{ $message }}</span>
          @enderror
      </div>
      <div class="d-flex">
          <button type="submit" class="btn btn-primary me-2">Update</button>
          <button class="btn btn-secondary" type="reset">Cancel</button>
      </div>
  </form>
  

  </div>
</div>
<script src="{{asset('getimagevalue.js')}}">
</script>
@endsection