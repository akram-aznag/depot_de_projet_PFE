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
        <h4 class="text-center">Manage My Comments</h4>
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
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.id')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.title')</th>
                    <th scope="col">@lang('CustomizedLanguage.admin_attributes.blogs_comments')</th>
                    <th scope="col">@lang('CustomizedLanguage.blog_attributes.actions')</th>
                  </tr>
                </thead>
                <tbody>
                 
                 @foreach($comments as $comment)
                 
                 <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{$comment->post->title}}</td>
                    <td>
                        {{$comment->comment}}
                    </td>
                    <td ><a href="{{route('delete_bloger_comments',['comment_id'=>$comment->id])}}" class="btn btn-danger" >@lang('CustomizedLanguage.blog_attributes.delete')</a>
                    </td>
                   
                   
                 </tr>
                 @endforeach             
                  
                </tbody>
              </table>

        </div>
    </div>

</div>


@endsection
