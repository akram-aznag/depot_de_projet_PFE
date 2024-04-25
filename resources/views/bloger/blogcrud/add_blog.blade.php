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
        <h4 class="text-center">@lang('CustomizedLanguage.blog_attributes.blog_form')</h4>
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


        @endif
        <div class="col-md-3 col-lg-6 person">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
                <img class="mt-5 mb-5" width="480px" height="280px" src={{

                url('upload/no_image.jpg')
                }} id="showimage" style="position: relative;bottom:70px">
                <span class="font-weight-bold"></span>
                <span class="text-black-50"></span>
                <span> </span>
                <div class="for_border"></div>
            </div>
        </div>
        <div class="col-md-5 col-lg-6 border-right">

            <form class="row" method="POST" action="{{ route('ADDBLOG',['id'=>Auth::user()->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-6">
                    <select name="category" id="" class="form-control">
                        <option value="">@lang('CustomizedLanguage.blog_attributes.choose_category')</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <span class="text-danger">
                        {{ $message }}
                    </span>
                    @enderror
                    <div class="mb-2">
                        <label class="labels">@lang('CustomizedLanguage.blog_attributes.title')</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title">
                        @error('title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                  
                    <div class="mb-2">
                        <label class="labels">@lang('CustomizedLanguage.blog_attributes.description')</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" name="description" rows="4"></textarea>
                        @error('description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="mb-2">
                        <label class="labels">@lang('CustomizedLanguage.blog_attributes.detailed_description')</label>
                        <input type="text" class="form-control" name="meta_description">
                    </div>
                    <div class="mb-2">
                        <label class="labels">@lang('CustomizedLanguage.blog_attributes.keywords')</label>
                        <input type="text" class="form-control" name="meta_keywords">
                    </div>
                    <div class="mb-2">
                        <input type="file" class="form-control" name="photo" id="image" style="border: none">
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">@lang('CustomizedLanguage.blog_attributes.create_blog')</button>
                </div>
            </form>
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
