@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px;width:fit-content;">
    <h1 class="text-center" style="font-size: 27px">Messages List</h1>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>@lang('CustomizedLanguage.blog_attributes.id')</th>
                    <th>@lang('CustomizedLanguage.contact_messages.message')</th>
                    <th>@lang('CustomizedLanguage.profile.email')</th>
                    <th>@lang('CustomizedLanguage.contact_messages.the_sending_date')</th>
                    <th colspan="2">@lang('CustomizedLanguage.blog_attributes.actions')</th>
                </tr>
            </thead>
            <tbody>
                @foreach($messages as $message)
                <tr>
                    
                        <td>{{$message->id}}</td>
                        <td>{{$message->message_content}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{date('Y-m-d', strtotime($message->created_at))}}</td>
                    
                    <td>
                        
                        <a href="{{route('delete_message',['message_id'=>$message->id])}}" class="btn btn-danger">Delete</a>
                       

                    </td>
                  

                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection