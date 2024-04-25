@extends('auth.Authlinks')
@section('title','create your account')

@section('Authcontent')

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-85 p-r-85 p-t-55 p-b-55" style="position: relative;bottom:20px">
            <form class="login100-form validate-form flex-sb flex-w" method="POST" action="{{ route('register') }}">
                @csrf

                <x-notify::notify />
                <span class="login100-form-title p-b-32 text-center">
                    @lang('CustomizedLanguage.create_account')

                </span>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <span class="txt1 p-b-11">
                        @lang('CustomizedLanguage.profile.name')

                            </span>
                            <div class="wrap-input100 validate-input m-b-36 customize">
                                <input class="input100 form-control @error('name') is-invalid @enderror" type="text" name="name">
                                @error('name')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <span class="txt1 p-b-11">
                        @lang('CustomizedLanguage.profile.user_name')
                                
                            </span>
                            <div class="wrap-input100 validate-input m-b-36 customize">
                                <input class="input100 form-control @error('address') is-invalid @enderror" type="text" name="address">
                                @error('address')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <span class="txt1 p-b-11">
                        @lang('CustomizedLanguage.profile.phone_number')
                                
                            </span>
                            <div class="wrap-input100 validate-input m-b-36 customize">
                                <input class="input100 form-control @error('phone') is-invalid @enderror" type="text" name="phone">
                                @error('phone')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <span class="txt1 p-b-11">
                        @lang('CustomizedLanguage.profile.email')
                                
                            </span>
                            <div class="wrap-input100 validate-input m-b-36 customize">
                                <input class="input100 form-control @error('email') is-invalid @enderror" type="email" name="email">
                                @error('email')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>

                            <span class="txt1 p-b-11">
                        @lang('CustomizedLanguage.profile.password')
                                
                            </span>
                            <div class="wrap-input100 validate-input m-b-12 customize" data-validate="Password is required">
                                <span class="btn-show-pass"><i class="fa fa-eye"></i></span>
                                <input class="input100 form-control @error('password') is-invalid @enderror" type="password" name="password">
                                @error('password')
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
                                <input class="input100 form-control @error('password_confirmation') is-invalid @enderror" type="password" name="password_confirmation">
                                @error('password_confirmation')
                                    <span class="text-danger">
                                        {{ $message }}
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

               

                <div class="container-login100-form-btn" style="position: relative;left:20px">
                    <button class="login100-form-btn">
                        @lang('CustomizedLanguage.create_account')

                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<div id="dropDownSelect1"></div>

@endsection
