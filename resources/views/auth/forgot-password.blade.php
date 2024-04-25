@extends('auth.Authlinks')
@section('title','forget password')

@section('Authcontent')

<div class="limiter">
<div class="container-login100">
<div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
    @if(!empty(session('danger')))
  <!-- Check if 'danger' key exists in the session -->
  <div class="alert alert-danger" role="danger">
    {{ session('danger') }}
  </div>
  @elseif(!empty(session('success')))
  <!-- Check if 'danger' key exists in the session -->
  <div class="alert alert-success" role="success">
    {{ session('success') }}
  </div>
@endif

    <form class="login100-form validate-form flex-sb flex-w" method="POST"  action="{{ route('Reset-Password') }}">
    
    @csrf
<span class="login100-form-title p-b-32">
  @lang('CustomizedLanguage.profile.reset_password')

</span>
<span class="txt1 p-b-11">  @lang('CustomizedLanguage.profile.email')
</span>
            <div class="wrap-input100 validate-input m-b-36 customize" >
                 <input class="input100 form-control " type="email" name="email" :value="old('email')" required autofocus id="eval">
              
            </div>
            <p id="vmessage"></p>

    
<div class="flex-sb-m w-full p-b-48">
<div class="contact100-form-checkbox">
<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">

</div>
<div>

</div>
</div>
<div class="container-login100-form-btn">
<button class="login100-form-btn">
  @lang('CustomizedLanguage.profile.reset_password_link')

</button>
</div>
</form>
</div>
</div>
</div>


<script src="{{asset('submitjs.js')}}"></script>
@endsection
