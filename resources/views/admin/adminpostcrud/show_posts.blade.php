@extends('admin.admin_dashboard')
@section('title','admin-dashboard manage blogs')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px;width:fit-content;">
    <h1 class="text-center" style="font-size: 27px"> My posts list</h1>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered lg-screen">
            <thead>
                <tr>
                    <th>id</th>
                    <th>post title</th>
                    <th>post photo</th>
                    <th>post category</th>
                    <th>post state</th>
                    <th colspan="2">Actions</th>
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
                    <td class={{$post->is_published=='yes'?'text-success':'text-danger'}}> {{$post->is_published=='yes'?'published':'not published'}}</td>
                    <td>
                        <a href="{{route('admin.edit_blog',['post_id'=>$post->id])}}" class="btn btn-success">edit</a>
                        <a href="{{route('admin.delete_blog',['post_id'=>$post->id])}}" class="btn btn-danger">Delete</a>
                        <a href="{{route('show_admin_blog',['post_id'=>$post->id])}}" class="btn btn-primary" role="button">detaile</a>
                    </td>
                  

                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection