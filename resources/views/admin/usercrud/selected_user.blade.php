@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"></h1>
<x-notify::notify />

<div class="table-responsive pt-3 ">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>@lang('CustomizedLanguage.blog_attributes.id')</th>
                    <th>@lang('CustomizedLanguage.profile.name')</th>
                    <th>@lang('CustomizedLanguage.profile.user_name')</th>
                    <th>@lang('CustomizedLanguage.profile.email')</th>
                    <th>@lang('CustomizedLanguage.profile.email_status')</th>
                    <th>@lang('CustomizedLanguage.profile.phone_number')</th>
                    <th>@lang('CustomizedLanguage.profile.adress')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.status')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.photo')</th>
                    <th colspan="2">@lang('CustomizedLanguage.blog_attributes.actions')</th>
                </tr>
            </thead>
            <tbody>
              
                <tr>
                    <td>{{$user_data->id}}</td>
                    <td>{{$user_data->name}}</td>
                    <td>{{$user_data->username}}</td>
                    <td>{{$user_data->email}}</td>
                    <td>{{$user_data->email_verified_at?__("CustomizedLanguage.profile.verified"):__("CustomizedLanguage.profile.unverified")}}</td>

                    <td>{{$user_data->phone}}</td>
                    <td>{{$user_data->adress}}</td>
                    <td>
                        @if($user_data->UserisOnline())
                        <span class="text-success">@lang('CustomizedLanguage.admin_attributes.online')</span>            
                        @else
                        <span class="text-danger">@lang('CustomizedLanguage.admin_attributes.offline')</span>
                            
                        @endif
                    </td>
                
                    <td>
                        <img height="100px" src={{
                            !empty($user_data->photo)?
                            url('/upload/bloger_images/'.$user_data->photo)
                            :url('/upload/bloger_images/no_image.jpg')
                            }} alt="" srcset=""> 
                    </td>
                    <td>
                        <a href="{{route('edit',['id'=>$user_data->id])}}" class="btn btn-primary">@lang('CustomizedLanguage.blog_attributes.edit')</a>
                        <a href="{{route('delete',['id'=>$user_data->id])}}" class="btn btn-danger">@lang('CustomizedLanguage.blog_attributes.delete')</a>
                        <a href="{{route('users')}}" class="btn btn-light">@lang('CustomizedLanguage.blog_attributes.go_back')</a>

                    </td>
                  

                    
                </tr>
              
            </tbody>
        </table>
    </div>
</div>
@endsection