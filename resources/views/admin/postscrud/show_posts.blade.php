@extends('admin.admin_dashboard')
@section('title','admin-dashboard manage blogs')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px;width:fit-content;">
    <h1 class="text-center" style="font-size: 27px"> Posts List</h1>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered lg-screen">
            <thead>
                <tr>
                    <th>@lang('CustomizedLanguage.blog_attributes.id')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.title')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.photo')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.category')</th>
                    <th>@lang('CustomizedLanguage.profile.name')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.status')</th>
                    
                    <th colspan="2">@lang('CustomizedLanguage.blog_attributes.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                      <img src={{!empty($post->photo)?url('upload/blog_images/'.$post->photo):url('upload/no_image.jpg')}} alt=""> 
                    </td>
                    <td>{{$post->category->name}}</td>
                    <td>{{$post->user->name}}</td>
                    <td  class={{$post->is_published=='yes'?'text-success':'text-danger'}}>{{$post->is_published=='yes'?__('CustomizedLanguage.blog_attributes.accepted'):__('CustomizedLanguage.blog_attributes.un_accepted')}}</td>
                    
                    <td>
                        <a href="{{route('admin.edit_blog',['post_id'=>$post->id])}}" class="btn btn-success">@lang('CustomizedLanguage.blog_attributes.edit')</a>
                        <a href="{{route('admin.delete_blog',['post_id'=>$post->id])}}" class="btn btn-danger">@lang('CustomizedLanguage.blog_attributes.delete')</a>
                        <a href="{{route('post',['post_id'=>$post->id])}}" class="btn btn-primary">@lang('CustomizedLanguage.blog_attributes.details')</a>
                    </td>
                  

                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection