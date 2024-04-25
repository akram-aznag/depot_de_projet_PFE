@extends('auth.Authlinks')
@section('title','reset your password')

@section('Authcontent')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('Update-Password',['token'=>$data->remember_token]) }}">
                @csrf

                <x-notify::notify />
                <span class="login100-form-title p-b-32">
                    @lang('CustomizedLanguage.profile.reset_password')
                </span>

                <span class="txt1 p-b-11">
                    @lang('CustomizedLanguage.profile.new_password')

                </span>
                <div class="wrap-input100 validate-input m-b-12 customize" data-validate="Password is required">
                    <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                    <input class="input100 form-control @error('new_password') is-invalid @enderror" type="password" name="new_password">
                    @error('new_password')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <span class="txt1 p-b-11">
                    @lang('CustomizedLanguage.profile.confirm_password')

                </span>
                <div class="wrap-input100 validate-input m-b-12 customize" data-validate="Password is required">
                    <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                    <input class="input100 form-control @error('new_password_confirmation') is-invalid @enderror" type="password" name="new_password_confirmation">
                    @error('new_password_confirmation')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                    @enderror
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn">
                    @lang('CustomizedLanguage.profile.reset_password')</button>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection
