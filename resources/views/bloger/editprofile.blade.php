@extends('website')
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
            <h4 class="text-center">@lang('CustomizedLanguage.profile.title')</h4>
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
                    <img class="rounded-circle mt-5" width="180px" height="180px" src={{
                        !empty($user_data->photo)
                        ?url('upload/bloger_images/'.$user_data->photo)
                        :url('upload/no_image.jpg')
                        }}>
                    <span class="font-weight-bold">{{$user_data->username ? $user_data->username  :__('CustomizedLanguage.profile.no_username_exists')}}</span>
                    <span class="text-black-50">{{$user_data->email}}</span>
                    <span> </span>
                    <div class="for_border"></div>
                </div>
            </div>
            <div class="col-md-5 col-lg-6 border-right">
                
                <form class="row" method="POST" action="{{route('UPDATEPROFILE',['id'=>$user_data->id])}}" enctype="multipart/form-data">
                   @csrf
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.name')</label>
                            <input type="text" class="form-control   @error('name') is-invalid @enderror" value="{{ $user_data->name }}" name="name">
                            @error('name')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.user_name')</label>
                            <input type="text" class="form-control  @error('username') is-invalid @enderror" value="{{ $user_data->username ? $user_data->username :'' }}"
                            name="username">
                            @error('username')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.phone_number')</label>
                            <input type="text" class="form-control  @error('phone') is-invalid @enderror" value="{{ $user_data->phone }}" name="phone">
                            @error('phone')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.adress')</label>
                            <input type="text" class="form-control  @error('adress') is-invalid @enderror" value="{{ $user_data->address }}" name="adress">
                            @error('adress')
                            <span class="text-danger">

                                {{$message}}
                            </span>
                       
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label class="labels">@lang('CustomizedLanguage.profile.email')</label>
                            <input type="text" class="form-control  @error('email') is-invalid @enderror" value="{{ $user_data->email }}" name="email" disabled>
                            @error('email')
                            <div class="text-danger">

                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <label for="formFile" class="form-label">@lang('CustomizedLanguage.profile.image')</label>
                        <input class="form-control" type="file" id="image" style="border: none" name="photo">
                        <img class="" src="{{asset('upload/no_image.jpg')}}" id="showimage" alt="photo" style="border-radius: 10px;height:150px">
                    </div>
                    <div class="mt-5 text-center">
                        <button class="btn btn-primary profile-button" type="submit">@lang('CustomizedLanguage.profile.submit_button')</button>
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