@extends('admin.admin_dashboard')
@section('admin')
<div class="card-body mt-5" style="position: relative;top:50px">
    <h1 class="text-center" style="font-size: 27px"></h1>
<x-notify::notify />

<div class="pt-3 ">
        <table class="table table-bordered">
            <tbody>
              
                <tr><td><span style="font-weight: 700">comment id:</span>{{$comment->id}}</td></tr>
                <tr><td><p style="font-weight: 700;">comment content:</p>{{$comment->comment}}</td></tr>
                <tr><td><span style="font-weight: 700">comment post id:</span>{{$comment->post->id}}</td></tr>
                <tr><td><span style="font-weight: 700">comment post title:</span>{{$comment->post->title}}</td></tr>
                <tr><td><span style="font-weight: 700">comment post description:</span>{{$comment->post->description}}</td></tr>
                <tr><td> <span style="font-weight: 700">comment user name:</span>  {{$comment->user->name}}</td></tr>
                <tr><td> <span style="font-weight: 700">comment date: </span> {{date('Y-m-d',strtotime( $comment->created_at)).' at '.\Carbon\Carbon::parse($comment->created_at)->format('g:i a')}}</td></tr> 
                <tr>
                    <td>
                       <a href="{{route('comments')}}" class="btn btn-light">go back</a>
                    </td>
                </tr>  
                  

                    
                </tr>
            
              
            </tbody>
        </table>
    </div>
</div>
@endsection