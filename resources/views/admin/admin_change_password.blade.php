
@extends('admin.admin_dashboard')
@section('admin')
<x-notify::notify />
<div class="page-content" style="margin-top: 191px">

    <div class="row">
      <div class="col-12 grid-margin">
        
      </div>
    </div>
    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">
                
                <div>
                    <img class="wd-70 rounded-circle" src="{{
                      !empty($data->photo)
                      ?url('upload/admin_images/'.$data->photo)
                      :url('upload/no_image.jpg')
                      }}" alt="profile">
                    <span class="h4 ms-3 text-light">{{$data->name}}</span>
                  </div>
              
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">@lang('CustomizedLanguage.profile.name'):</label>
              <p class="text-muted">{{$data->username}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">@lang('CustomizedLanguage.profile.adress')::</label>
              <p class="text-muted">{{$data->adress}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">@lang('CustomizedLanguage.profile.email'):</label>
              <p class="text-muted">{{$data->email}}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">@lang('CustomizedLanguage.profile.phone_number'):</label>
              <p class="text-muted">{{$data->phone}}</p>
            </div>
           
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
          <div class="col-md-12 grid-margin">
            <div class="card">
                <div class="card-body">
  
                                  <h6 class="card-title">@lang('CustomizedLanguage.profile.change_password'):</h6>
  
                                  <form class="forms-sample" method="POST" action="{{route('admin.update.password')}}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                      <div class="mb-3">
                                          <label for="exampleInputUsername1" class="form-label">@lang('CustomizedLanguage.profile.password'):</label>
                                          <input type="password" class="form-control @error('old_password') is-invalid @enderror
                                          " id="exampleInputUsername1" autocomplete="off" placeholder="old password"  name="old_password" value="">
                                          @error('old_password')
                                              <span class="text-danger">{{$message}}</span>
                                          @enderror
                                      </div>
                                     
                                      <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">@lang('CustomizedLanguage.profile.new_password'):</label>
                                        <input type="password" class="form-control @error('new_password') is-invalid @enderror
                                        " id="exampleInputUsername1" autocomplete="off" placeholder="new password"  name="new_password">
                                        @error('new_password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                      <label for="exampleInputUsername1" class="form-label">@lang('CustomizedLanguage.profile.confirm_password'):</label>
                                      <input type="password" class="form-control @error('new_password_confirmation') is-invalid @enderror
                                      " id="exampleInputUsername1" autocomplete="off" placeholder="confirm password"  name="new_password_confirmation">
                                      @error('new_password_confirmation')
                                          <span class="text-danger">{{$message}}</span>
                                      @enderror
                                  </div>
                                                   
                                      <button type="submit" class="btn btn-primary me-2 mt-3">@lang('CustomizedLanguage.profile.change_password')</button>
                                      <button class="btn btn-secondary mt-3" type="reset">@lang('CustomizedLanguage.admin_attributes.cancel')</button>
                                  </form>
                                </div>
                              </div>
                            </div>        
        </div>
      </div>
      <!-- middle wrapper end -->
      <!-- right wrapper start -->
     
      <!-- right wrapper end -->
    </div>

    </div>
   

   <script src="{{asset('getimagevalue.js')}}"></script>
  <!-- Your existing Blade code here -->

<!-- Add this script at the end of your Blade file -->

@endsection

