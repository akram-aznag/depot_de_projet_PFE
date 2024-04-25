@extends('website')
@section('content')
<style>
    @media screen and (min-width:768px) and (max-width:991px) {
        .person {
            position: relative;
            left: 270px;
        }

        .for_border {
            border-bottom: 2px #ced4da solid;
            width: 570%;
            margin-top: 15px;
        }
    }
</style>
<div class="container rounded bg-white mt-5 mb-5">

    <div class="row">
        <h4 class="text-center">Manage My Blogs</h4>
        @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <p>{{ session('error') }}</p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @elseif(session('warning'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <p>{{ session('warning') }}</p>

            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


        @endif
        <div class="table-responsive-sm ">
            <table class="table" style="position: relative;right:5px">
                <thead>
                  <tr >
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.title')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.description')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.photo')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.category')</th>
                    <th scope="col" class="text-center mt-5" colspan="3">@lang('CustomizedLanguage.blog_attributes.status')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.actions')</th>
                  </tr>
                </thead>
                <tbody>
                 
                 @foreach($posts as $post)
                 <tr>
                    <td>{{$post->title}}</td>
                    <td>{{$post->description}}</td>
                    <td>
                        <img src="{{url('/upload/blog_images/'.$post->photo)}}" alt="" height="60px" width="60px">
                    </td>
                    <td>
                        {{$post->category->name}}
                    </td>
                    <td >
                        <div class="container">

                            <div class="row">
                                <div class="col-lg-4 col-md-12">
    
                                    <a href="{{route('edit_blog',['id'=>$post->id])}}" class="btn col-lg-4"style="font-size:12px" >@lang('CustomizedLanguage.blog_attributes.edit')</a>
                                </div>
                                <div class="col-lg-4 col-md-12">
    
                                    <a href="{{route('delete_blog',['id'=>$post->id])}}" style="position: relative;right:5px;font-size:12px" class="btn col-lg-4" >@lang('CustomizedLanguage.blog_attributes.delete')</a>
                                </div>
                                <div class="col-lg-4 col-md-12">
    
                                    <a href="" class="btn col-lg-4" style="">@lang('CustomizedLanguage.blog_attributes.details')</a>
                                </div>
                            </div>
                        </div>
                    </td>
                    <td>
                        <div style="position: relative;left:61px;top:7px;width:91px">
                            <span class={{$post->is_published=='no'?'text-danger':'text-success'}} style="font-size: 14px">{{$post->is_published=='no'?__('CustomizedLanguage.blog_attributes.un_accepted'):__('CustomizedLanguage.blog_attributes.accepted')}}</span>
                        </div>
                    </td>
                   
                 </tr>
                 @endforeach             
                  
                </tbody>
              </table>

        </div>
    </div>

</div>

<script>
    document.getElementById('image').addEventListener('change', function(e) {
        let reader = new FileReader();
        reader.addEventListener('load', function() {
            document.getElementById('showimage').setAttribute('src', reader.result)
        })
        reader.readAsDataURL(e.target.files[0])
    })
</script>
@endsection
