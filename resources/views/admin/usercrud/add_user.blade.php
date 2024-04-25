@extends('admin.admin_dashboard')
@section('admin')
<div class="card" style="margin-top: 100px">
  <x-notify::notify />
  <div class="card-body container">
    
    <h6 class="card-title" style="text-align: center"></h6>@lang('CustomizedLanguage.admin_attributes.add_new_bloger')


    <form class="forms-sample row" method="POST" action="{{route('add')}}" enctype="multipart/form-data">
      @csrf
      <div class="col-lg-4">
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.name')</label>
          <div class="col-sm-9">
            <input type="text" name="name" class="form-control  @error('name') is-invalid @enderror" id="exampleInputUsername2" placeholder="Email">
            @error('name')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputUsername2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.user_name')</label>
          <div class="col-sm-9">
            <input type="text"  name="username" class="form-control @error('username') is-invalid @enderror" id="exampleInputUsername2" placeholder="user name" >
            @error('username')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.email')</label>
          <div class="col-sm-9">
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" placeholder="email" >
            @error('email')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputEmail2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.adress')</label>
          <div class="col-sm-9">
            <input type="text" name="adress"  class="form-control @error('adress') is-invalid @enderror" id="exampleInputEmail2" autocomplete="off" placeholder="adress">
            @error('adress')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>

        <div class="row mb-3">
          <label for="exampleInputMobile" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.phone_number')</label>
          <div class="col-sm-9">
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" id="exampleInputMobile" placeholder="Mobile number">
            @error('phone')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
      
      </div>

      
      <div class="col-lg-4">

        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.password')</label>
          <div class="col-sm-9">
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off" placeholder="password" >
            @error('password')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.profile.confirm_password')</label>
          <div class="col-sm-9">
            <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="exampleInputPassword2" autocomplete="off" placeholder="confirm password">
            @error('password_confirmation')
            <span class="text-danger">

              {{$message}}
            </span>
            @enderror
          </div>
        </div>
        <div class="row mb-3">
          <label for="exampleInputPassword2" class="col-sm-3 col-form-label">@lang('CustomizedLanguage.blog_attributes.photo')</label>
          <div class="col-sm-9">
            <input type="file" class="form-control" id="image" autocomplete="off" name="photo">
          </div>
        </div>
        <div class="row mb-3">
          <div style="position: relative;left:100px">

            <img id="showimage" style="height: 100px;" src={{
              !empty($user_data->photo)
              ?url('upload/bloger_images/'.$user_data->photo)
              :url('upload/no_image.jpg')
              }} alt="photo">
          </div>
        </div>
        <div class="col-lg-4">

            <div class="form-check mb-3 w-100">
              <input type="checkbox" class="form-check-input" id="exampleCheck1">
              <label class="form-check-label" for="exampleCheck1">
                @lang('CustomizedLanguage.profile.remember_me')
              </label>
          </div>
         
          <div class="d-flex">
            
            <button  type="submit" class="btn btn-primary me-2 ">@lang('CustomizedLanguage.admin_attributes.add')</button>
            <button class="btn btn-secondary">@lang('CustomizedLanguage.admin_attributes.cancel')</button>
          </div>
        </div>

        

      </div>
     
      
    </form>

  </div>
</div>
   <script src="{{asset('getimagevalue.js')}}">
   
   </script>

@endsection