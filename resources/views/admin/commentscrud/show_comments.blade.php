@extends('admin.admin_dashboard')
@section('title','admin manage comments')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px;width:fit-content;">
    <h1 class="text-center" style="font-size: 27px"> Comments List</h1>
<x-notify::notify />

<div class="table-responsive pt-3">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>id</th>
                    <th>comments</th>
                    <th>post title</th>
                    <th>bloger name</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($comments as $comment)
                @if($comment->post && $comment->user)
                <tr>
                    
                        <td>{{$comment->id}}</td>
                        <td> {{strlen($comment->comment)>30? substr($comment->comment,0,30):$comment->comment}}</td>
                        @if(isset($comment->post))
                        <td>{{$comment->post->title}}</td>
                        <td>{{$comment->user->name}}</td>
                        @else
                        <td>no infos</td>
                        @endif
                    
                        <td>
                            <a href="{{route('comment_details',['comment_id'=>$comment->id])}}" class="btn btn-primary" role="button">detailes</a>
                            <a href="{{route('delete_comment',['comment_id'=>$comment->id])}}" class="btn btn-danger">delete</a>

                    </td>
                  

                    
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection