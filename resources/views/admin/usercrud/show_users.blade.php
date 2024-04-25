@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"> Users List</h1>
    <div class="btn_handler" style="display: flex;justify-content:end">

        <a style="position: relative;right:12%" href="{{route('genrate_blogers_pdf')}}" class="btn btn-light text-dark">print</a>
    </div>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>@lang('CustomizedLanguage.blog_attributes.id')</th>
                    <th>@lang('CustomizedLanguage.profile.name')</th>
                    <th>@lang('CustomizedLanguage.profile.email')</th>
                    <th>@lang('CustomizedLanguage.profile.email_status')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.status')</th>
                    <th>@lang('CustomizedLanguage.blog_attributes.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    
                        <td>{{$user->id}}</td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->email_verified_at?__("CustomizedLanguage.profile.verified"):__("CustomizedLanguage.profile.unverified")}}</td>
                        <td>
                            @if($user->UserisOnline())
                            <span class="text-success">@lang('CustomizedLanguage.admin_attributes.online')</span>            
                            @else
                            <span class="text-danger">@lang('CustomizedLanguage.admin_attributes.offline')</span>
                                
                            @endif
                        </td>
                    
                    <td>
                        <a href="{{route('edit',['id'=>$user->id])}}" class="btn btn-success">@lang('CustomizedLanguage.blog_attributes.edit')</a>
                        <a href="{{route('delete',['id'=>$user->id])}}" class="btn btn-danger">@lang('CustomizedLanguage.blog_attributes.delete')</a>
                    <a href="{{route('show',['id'=>$user->id])}}" class="btn btn-primary" role="button">@lang('CustomizedLanguage.blog_attributes.details')</a>

                    </td>
                  

                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection