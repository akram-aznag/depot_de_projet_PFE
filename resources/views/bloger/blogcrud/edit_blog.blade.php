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
        <h4 class="text-center">Blog Form</h4>
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

            <form class="row" method="POST" action="{{ route('update_blog',['user_id'=>Auth::user()->id,'id'=>$post_data->id]) }}" enctype="multipart/form-data">
                @csrf
                <div class="col-lg-6">
                    <select name="category" id="" class="form-control">
                        <option value={{$post_data->category->id}}>{{$post_data->category->name}}</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <div class="mb-2">
                        <label class="labels">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" value={{$post_data->title}}>
                        @error('title')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="labels">Description</label>
                        <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value={{$post_data->description}}>
                        @error('description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                  
                   
                </div>
                <div class="col-lg-6">
                    <div class="mb-2">
                        <label class="labels">Meta Description</label>
                        <input type="text" class="form-control @error('meta_description') is-invalid @enderror" name="meta_description" value={{$post_data->meta_description}} >
                        @error('meta_description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <label class="labels">Meta Keywords</label>
                        <input type="text" class="form-control @error('meta_keywords') is-invalid @enderror" name="meta_keywords" value={{$post_data->meta_keywords}}>
                        @error('meta_description')
                        <span class="text-danger">
                            {{ $message }}
                        </span>
                        @enderror
                    </div>
                    <div class="mb-2">
                        <input type="file" class="form-control" name="photo" id="image" value={{$post_data->photo}}>
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <button class="btn btn-primary profile-button" type="submit">Update blog</button>
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
