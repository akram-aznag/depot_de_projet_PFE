@extends('auth.Authlinks')
@section('title','contact us')

@section('Authcontent')

<div class="limiter" style="">
  <div class="container-login100" >
      <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="position: relative;bottom:20px">
          <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{route('save_message')}}">
              @csrf
             
              @if(session('success'))
                  <div class="alert alert-success" role="success">
                      {{ session('success') }}
                  </div>
              @elseif(session('error'))
                  <div class="alert alert-error" role="error">
                      {{ session('error') }}
                  </div>
              @endif

              <span class="login100-form-title p-b-32 text-center">
                @lang('CustomizedLanguage.contact_messages.contact_us')
              </span>
              <span class="txt1 p-b-11">@lang('CustomizedLanguage.profile.email')</span>
              <div class="wrap-input100 validate-input m-b-36 customize" >
                  <input class="input100 form-control  @error('email') is-invalid @enderror" type="email" name="email" style="border-radius: 0px" placeholder="email@example.com">
                  @error('email')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                  @enderror
              </div>

              <span class="txt1 p-b-11">@lang('CustomizedLanguage.contact_messages.message')</span>
              <div class="wrap-input100 validate-input m-b-12 customize" data-validate="message is required">
                
                  <textarea placeholder="@lang('CustomizedLanguage.contact_messages.place_holder_message')" style="height: 160px;  border-radius: 0px" name="message" cols="30" rows="10" class="form-control @error('message') is-invalid @enderror" type="message" name="message" ></textarea>
                  @error('message')
                      <span class="text-danger">
                          {{$message}}
                      </span>
                  @enderror
              </div>


            
              <div class="container-login100-form-btn">
                  <button class="login100-form-btn">
                    @lang('CustomizedLanguage.contact_messages.send_message')

                  </button>
              </div>
          </form>
      </div>
  </div>
</div>


@endsection




