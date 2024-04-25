@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"></h1>
<x-notify::notify />

<div class="table-responsive pt-3 ">
        <table class="table table-bordered">
            <tbody>
              
                <tr><td><span style="font-weight: 700">Post id:</span>{{$post_data->id}}</td></tr>
                <tr><td><span style="font-weight: 700">Post title:</span>{{$post_data->title}}</td></tr>
                <tr><td><span style="font-weight: 700">Post description:</span>{{$post_data->description}}</td></tr>
                <tr><td><span style="font-weight: 700">Post meta_description:</span>{{$post_data->meta_description}}</td></tr>
                <tr><td><span style="font-weight: 700">Post	meta_keywords:</span>{{$post_data->meta_keywords}}</td></tr>
                <tr><td> <span style="font-weight: 700">is_published:</span>  {{$post_data->is_published}}</td></tr>
                <tr>
                    <td>
                            <a href="{{route('admin.edit_blog',['post_id'=>$post_data->id])}}" class="btn btn-primary">edit</a>
                            <a href="{{route('admin.delete_blog',['post_id'=>$post_data->id])}}" class="btn btn-danger">Delete</a>
                            <a href="{{route('posts')}}" class="btn btn-light">go back</a>
    
                        </td>
                </tr>  
                  

                    
                </tr>
            
              
            </tbody>
        </table>
    </div>
</div>
@endsection