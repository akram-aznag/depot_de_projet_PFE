@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"></h1>
<x-notify::notify />

<div class="table-responsive pt-3 ">
        <table class="table table-bordered">
            <tbody>
              
                <tr><td><span style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.id'):</span>{{$post_data->id}}</td></tr>
                <tr><td><span style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.title'):</span>{{$post_data->title}}</td></tr>
                <tr><td><span style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.description'):</span>{{$post_data->description}}</td></tr>
                <tr><td><span style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.detailed_description'):</span>{{$post_data->meta_description}}</td></tr>
                <tr><td><span style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.keywords'):</span>{{$post_data->meta_keywords}}</td></tr>
                <tr><td><span style="font-weight: 700">likes:</span>{{$post_data->likes->count()}}</td></tr>
                <tr><td> <span  style="font-weight: 700">@lang('CustomizedLanguage.blog_attributes.status'):</span>
                    
                   <span  class={{$post_data->is_published=='yes'?'text-success':'text-danger'}}>
                    
                       {{$post_data->is_published=='yes'?__('CustomizedLanguage.blog_attributes.accepted'):__('CustomizedLanguage.blog_attributes.un_accepted')}}
                    </span> 
                    </td></tr>

                

                
                <tr>
                    <td>
                            <a href="{{route('admin.edit_blog',['post_id'=>$post_data->id])}}" class="btn btn-primary">@lang('CustomizedLanguage.blog_attributes.edit')</a>
                            <a href="{{route('admin.delete_blog',['post_id'=>$post_data->id])}}" class="btn btn-danger">@lang('CustomizedLanguage.blog_attributes.delete')</a>
                            <a href="{{route('posts')}}" class="btn btn-light">@lang('CustomizedLanguage.blog_attributes.go_back')</a>
    
                        </td>
                </tr>  
                  

                    
                </tr>
            
              
            </tbody>
        </table>
    </div>
</div>
@endsection