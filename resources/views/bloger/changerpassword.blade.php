@extends('website')
@section('title','change the password')
@section('content')  
<style>
    @media screen and (min-width:768px) and (max-width:991px) {
        .person{
            position: relative;
            left: 270px;
            
        }
        .for_border{
            border-bottom: 2px #ced4da solid;
            width: 570%;
            margin-top: 15px;
        }
       
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">
    
        <div class="row">
            <h4 class="text-center">@lang('CustomizedLanguage.profile.password_setting')</h4>
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{session('success')}}
                
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
            @elseif(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <p>{{session('error')}}</p>

                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                
        
            @endif
            <div class="col-md-3 col-lg-6 person">
                <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                    <img class="rounded-circle mt-5" width="180px" height="180px" src={{Auth::user()->photo? url('upload/no_image.jpg/'.Auth::user()->photo):url('upload/no_image.jpg/')}}>
                    <span class="font-weight-bold"></span>
                    <span class="text-black-50"></span>
                    <span> </span>
                    <div class="for_border"></div>
                </div>
            </div>
            <div class="col-md-5 col-lg-6 border-right">
                
                <form class="row" method="POST" action="{{route('RESETPASSWORD',['id'=>Auth::user()->id])}}">
                   @csrf
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.password')</label>
                            <input type="password" class="form-control   @error('old_password') is-invalid @enderror"  name="old_password">
                            @error('old_password')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.new_password')</label>
                            <input type="password" class="form-control  @error('new_password') is-invalid @enderror" name="new_password">
                            @error('new_password')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.confirm_password')</label>
                            <input type="password" class="form-control  @error('new_password_confirmation') is-invalid @enderror" name="new_password_confirmation">
                            @error('new_password_confirmation')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                    
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">@lang('CustomizedLanguage.profile.change_password')</button>
                    </div>
                </form>
            </div>
        </div>
 
</div>

<script>
    document.getElementById('image').addEventListener('change',function(e){
    let reader=new FileReader();
    reader.addEventListener('load',function(){
        document.getElementById('showimage').setAttribute('src',reader.result)
    })
    reader.readAsDataURL(e.target.files[0])
})
</script>
@endsection