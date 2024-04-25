@extends('auth.Authlinks')
@section('title','login to your account')

@section('Authcontent')
    
<div class="limiter" style="">
  <div class="container-login100" >
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="position: relative;bottom:20px">
          <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{route('login')}}">
              @csrf
              @if(session('verificationError'))
                  <div class="alert alert-danger" role="alert">
                      {{ session('verificationError') }}
                  </div>
              @elseif(session('success'))
                  <div class="alert alert-success" role="success">
                      {{ session('success') }}
                  </div>
              @elseif(session('error'))
                  <div class="alert alert-error" role="error">
                      {{ session('succerroress') }}
                  </div>
              @endif

              <span class="login100-form-title p-b-32 text-center">
                @lang('CustomizedLanguage.login')
              </span>
              <span class="txt1 p-b-11">@lang('CustomizedLanguage.profile.email')/@lang('CustomizedLanguage.profile.name')/@lang('CustomizedLanguage.profile.phone_number')</span>
              <div class="wrap-input100 validate-input m-b-36 customize" >
                  <input class="input100 form-control  @error('login') is-invalid @enderror" type="text" name="login" style="border-radius: 0px">
                  @error('login')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                  @enderror
              </div>

              <span class="txt1 p-b-11">@lang('CustomizedLanguage.profile.password')</span>
              <div class="wrap-input100 validate-input m-b-12 customize" data-validate="Password is required">
                  <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                  <input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password" style="border-radius: 0px">
                  @error('password')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                  @enderror
              </div>


              <div class="flex-sb-m w-full p-b-48">
                  <div class="contact100-form-checkbox">
                      <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                      <label class="label-checkbox100" for="ckb1">
                        @lang('CustomizedLanguage.profile.remember_me')

                      </label>
                  </div>
                  <div>
                      <a href="{{route('password.request')}}" class="txt3">
                        @lang('CustomizedLanguage.profile.forget_password')

                      </a>
                  </div>
              </div>
              <div class="container-login100-form-btn">
                  <button class="login100-form-btn">
                    @lang('CustomizedLanguage.profile.login_button')
                  </button>
              </div>
          </form>
      </div>
  </div>
</div>
<div id="dropDownSelect1"></div>

@endsection




