@extends('admin.admin_dashboard')
@section('admin')
<x-notify::notify />

<div class="page-content">
  
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
              <label class="tx-11 fw-bolder mb-0 text-uppercase">@lang('CustomizedLanguage.profile.adress'):</label>
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
                                  <h6 class="card-title">@lang('CustomizedLanguage.profile.title'):</h6>
  
                                  <form class="forms-sample" method="POST" action="{{route('admin.update_profile',['id'=>$data->id])}}" enctype="multipart/form-data" >
                                    @csrf
                                    @method('PUT')
                                      <div class="mb-3">
                                          <label for="exampleInputUsername1" class="form-label">@lang('CustomizedLanguage.profile.name')::</label>
                                          <input type="text" class="form-control  @error('name') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="name" value="{{$data->name}}" name="name">
                                          @error('name')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputUsername1" class="form-label">@lang('CustomizedLanguage.profile.user_name'):</label>
                                        <input type="text" class="form-control  @error('username') is-invalid @enderror" id="exampleInputUsername1" autocomplete="off" placeholder="Username" value="{{$data->username}}" name="username">
                                        @error('username')
                                        <span class="text-danger">
                                          {{$message}}
                                        </span>
                                        @enderror
                                    </div>
                                      <div class="mb-3">
                                          <label for="exampleInputEmail1" class="form-label">@lang('CustomizedLanguage.profile.email'):</label>
                                          <input type="email" class="form-control  @error('email') is-invalid @enderror" id="exampleInputEmail1" placeholder="Email" value="{{$data->email}}" name="email">
                                          @error('email')
                                          <span class="text-danger">
                                            {{$message}}
                                          </span>
                                          @enderror
                                      </div>
                                      <div class="mb-3">
                                        <label for="exampleInputEmail1" class="form-label">@lang('CustomizedLanguage.profile.adress'):</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="adress" value="{{$data->adress}}" name="adress">
                                    </div>
                                    <div class="mb-3">
                                      <label for="exampleInputEmail1" class="form-label">@lang('CustomizedLanguage.profile.phone_number'):</label>
                                      <input type="text" class="form-control" id="exampleInputEmail1" placeholder="phone" value="{{$data->phone}}" name="phone">
                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label" for="formFile">@lang('CustomizedLanguage.blog_attributes.photo'):</label>
                                    <input class="form-control" type="file" id="image" name="photo">
                                  </div>
                                  <div>
                                    <img class="wd-70 rounded-circle" src="{{
                                      !empty($data->photo)
                                      ?url('upload/admin_images/'.$data->photo)
                                      :url('upload/no_image.jpg')
                                      }}" alt="profile" id="showimage">
                                    
                                  </div>
                                     
                                      <button type="submit" class="btn btn-primary me-2 mt-3">@lang('CustomizedLanguage.profile.submit_button')</button>
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
   <script src="{{asset('getimagevalue.js')}}">
   
   </script>

@endsection