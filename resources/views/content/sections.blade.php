@extends('website')
@section('title','blogs')
@section('content')
<style>
  .likes button {
    display: block;
}

</style>
@if(session('success'))
<div class="alert alert-success " role="alert">
<p>{{session('success')}}</p>
</div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <p>{{session('error')}}</p>
</div>
@endif

<div class="section pt-5 pb-0">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading text-capitalize">@lang('CustomizedLanguage.trending')</h2>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-12">
                <div class="posts-slide-wrap">
                    <div class="posts-slide" id="posts-slide">
                        @php $posts = \App\Models\Post::orderBy('created_at','DESC')->take(3)-> get(); @endphp
                        @foreach($posts as $post)
                        @if(isset($post->user) &&  $post->category)
                            @if($post->is_published == "yes")
                                <div class="item">
                                    <div class="post-entry d-lg-flex">
                                        <div class="me-lg-5 thumbnail mb-4 mb-lg-0">
                                            <a href="{{route('single',['slug'=>$post->slug])}}">
                                                <img src="{{url('upload/blog_images/'.$post->photo)}}" alt="Image" class="img-fluid" width="800px" height="514px">
                                            </a>
                                        </div>
                                        <div class="content align-self-center">
                                            <div class="post-meta mb-3">
                                                <a href="#" class="category">{{$post->category->name}}</a> &mdash;
                                                <span class="date">@lang('CustomizedLanguage.created_at') {{ date('d-m-y', strtotime($post->created_at)) }}</span>
                                            </div>
                                            <h2 class="heading"><a href="{{route('single',['slug'=>$post->slug])}}">{{$post->title}}.</a></h2>
                                            <p>{{$post->description}},</p>
                                            @if(isset($post->user))
                                                <a href="#" class="post-author d-flex align-items-center">
                                                    <div class="author-pic">
                                                        <img src="{{ !empty($post->user->photo) ? url('upload/bloger_images/'.$post->user->photo) : url('upload/no_image.jpg') }}" alt="user image">
                                                    </div>
                                                    <div class="text">
                                                        <span>{{$post->user->name}}</span>
                                                    </div>
                                                </a>
                                            @else
                                                <p>No user information available</p>
                                            @endif
                                            
                                            <div class="reaction d-flex mt-3" style="position: relative; right: 98px;">
                                                <div class="comment" style="position: relative; left: 156px;">
                                                    <a href="{{route('single',['slug'=>$post->slug])}}#Cc" onclick="scrollToElement('#Cc')">
                                                        <span class="open-popup text-muted">{{\App\Models\Comment::where('post_id',$post->id)->count()}} @lang('CustomizedLanguage.comments')</span>
                                                        <i style="open-popup" class="fa-regular fa-comments text-dark"></i>
                                                    </a>    
                                                </div>
                                                @if(Auth::user())
                                                    @php $liked_post=\App\Models\Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first(); @endphp
                                                    <div class="form_controller d-flex">
                                                        <div>{{$post->likes->count()}}</div>
                                                        <form style={{$liked_post?'display:none':''}} method="POST" action="{{route('like',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                                            @csrf
                                                            <div class="likes" >
                                                                <button type="submit" style="border:none;background:transparent" class="fa-regular fa-heart" style="font-size: 20px;"></button>
                                                            </div>
                                                        </form>
                                                        <form style={{!$liked_post?'display:none':''}} class="unlike_form" method="POST" action="{{route('unlike',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                                            @csrf
                                                            <div class="unlikes" >
                                                                <button type="submit" style="border:none;background:transparent" class="fa-solid fa-heart" style="font-size: 20px;"></button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- first section end-->

<!-- Begining of the second section -->
<div class="section">
    <div class="container">
        <div class="row g-5">
            <!-- Item 1 -->
            @php $posts = \App\Models\Post::get(); @endphp
            @forEach($posts as $post)
            @if(isset($post->user) &&  $post->category)
                @if($post->is_published == "yes")
                    <div class="col-lg-4">
                        <div class="post-entry d-block small-post-entry-v">
                            <div class="thumbnail">
                                <a href="{{route('single',['slug'=>$post->slug])}}">
                                    <img src="{{url('upload/blog_images/'.$post->photo)}}" alt="Image" class="img-fluid"  style="height:304px;width:800px">
                                </a>
                            </div>
                            <div class="content">
                                <div class="post-meta mb-1">
                                    <a href="#" class="category">{{$post->category->name}}</a> &mdash;
                                    <span class="date">@lang('CustomizedLanguage.created_at') {{ date('d-m-y', strtotime($post->created_at)) }}</span>
                                </div>
                                <h2 class="heading mb-3"><a href="{{route('single',['slug'=>$post->slug])}}">{{$post->title}}</a></h2>
                                @if(strlen($post->description) <= 150)
                                    <p>{{$post->description}}</p>
                                @else
                                    <p>{{substr($post->description,0,150) }} . . .</p>
                                @endif
                               
                                    <a href="#" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img  src="{{ !empty($post->user->photo) ? url('upload/bloger_images/'.$post->user->photo) : url('upload/no_image.jpg') }}" alt="user image"  height="40px" width="40px">
                                        </div>
                                        <div class="text">
                                            <span>{{$post->user->name}}</span>
                                        </div>
                                    </a>
                               
                                <div class="reaction d-flex" style="position: relative;right:111px">
                                    <div class="comment" style="position: relative;left:270px;bottom:30px">
                                        <a href="{{route('single',['slug'=>$post->slug])}}#Cc" onclick="scrollToElement('#Cc')">
                                            <span class="open-popup text-muted">{{\App\Models\Comment::where('post_id',$post->id)->count()}} @lang('CustomizedLanguage.comments')</span>
                                            <i style="open-popup" class="fa-regular fa-comments text-dark"></i>
                                        </a>     
                                    </div>
                                    @if(Auth::user())
                                        @php $liked_post=\App\Models\Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first(); @endphp
                                        <div class="form_controller d-flex" style="    position: relative;left: 316px;bottom: 30px;">
                                            <div>{{$post->likes->count()}}</div>
                                            <form style={{$liked_post?'display:none':''}} method="POST" action="{{route('like',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                                @csrf
                                                <div class="likes" >
                                                    <button type="submit" style="border:none;background:transparent" class="fa-regular fa-heart" style="font-size: 20px;"></button>
                                                </div>
                                            </form>
                                            <form style={{!$liked_post?'display:none':''}} class="unlike_form" method="POST" action="{{route('unlike',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                                @csrf
                                                <div class="unlikes" >
                                                    <button type="submit" style="border:none;background:transparent" class="fa-solid fa-heart" style="font-size: 20px;"></button>
                                                </div>
                                            </form>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Second section end -->

<!-- Begining of the third section -->
<div class="section">
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-lg-7 text-center">
                <h2 class="heading text-capitalize">@lang('CustomizedLanguage.most_popular_post')</h2>
            </div>
        </div>
    </div>
    <div class="most-popular-slider-wrap px-3 px-md-0">
        <div id="most-popular-nav">
            <span class="prev" data-controls="prev">@lang('CustomizedLanguage.prev')</span>
            <span class="next" data-controls="next">@lang('CustomizedLanguage.next')</span>
        </div>
        <div class="most-popular-slider" id="most-popular-center">
            @php $posts = \App\Models\Post::select('posts.*')
            ->selectRaw('COUNT(comments.id) + COUNT(likes.id) AS popularity_score')
            ->leftJoin('comments', 'posts.id', '=', 'comments.post_id')
            ->leftJoin('likes', 'posts.id', '=', 'likes.post_id')
            ->groupBy('posts.id')
            ->orderByDesc('popularity_score')
            ->take(4) 
            ->get(); @endphp
            <!-- Item 1 -->
            @forEach($posts as $post)
            @if(isset($post->user) &&  $post->category)
            @if($post->is_published == "yes")

                <div class="item">
                    <div class="post-entry d-block small-post-entry-v">
                        <div class="thumbnail">
                            <a href="{{route('single',['slug'=>$post->slug])}}">
                                <img src="{{url('upload/blog_images/'.$post->photo)}}"  alt="Image" class="img-fluid" style="height: 232px">
                            </a>
                        </div>
                        <div class="content">
                            <div class="post-meta mb-1">
                                <a href="#" class="category">{{$post->category->name}}</a> &mdash;
                                <span class="date">@lang('CustomizedLanguage.created_at') {{date('d-m-y', strtotime($post->created_at)) }}</span>
                            </div>
                            <h2 class="heading mb-3"><a href="{{route('single',['slug'=>$post->slug])}}">{{$post->title}}</a></h2>
                            <p>{{substr($post->description,0,280)}} . . .</p>
                           
                                <a href="#" class="post-author d-flex align-items-center">
                                    <div class="author-pic">
                                        <img src="{{ !empty($post->user->photo) ? url('upload/bloger_images/'.$post->user->photo) : url('upload/no_image.jpg') }}" alt="Image">
                                    </div>
                                    <div class="text">
                                        <span>{{$post->user->name}}</span>
                                    </div>
                                </a>
                           
                            <div class="action_manager d-flex">
                                <div class="comment" style="position: relative;left:270px;bottom:30px">
                                    <a href="{{route('single',['slug'=>$post->slug])}}#Cc" onclick="scrollToElement('#Cc')">
                                        <span class="open-popup text-muted">{{\App\Models\Comment::where('post_id',$post->id)->count()}} @lang('CustomizedLanguage.comments')</span>
                                        <i style="open-popup" class="fa-regular fa-comments text-dark"></i>
                                    </a>      
                                </div>
                                @if(Auth::user())
                                    @php $liked_post=\App\Models\Like::where('post_id',$post->id)->where('user_id',Auth::user()->id)->first(); @endphp
                                    <div class="form_controller d-flex" style="position: relative;left: 316px;bottom: 30px;">
                                        <div>{{$post->likes->count()}}</div>
                                        <form style={{$liked_post?'display:none':''}} method="POST" action="{{route('like',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                            @csrf
                                            <div class="likes" >
                                                <button type="submit" style="border:none;background:transparent" class="fa-regular fa-heart" style="font-size: 20px;"></button>
                                            </div>
                                        </form>
                                        <form style={{!$liked_post?'display:none':''}} class="unlike_form" method="POST" action="{{route('unlike',['post_id'=>$post->id,'user_id'=>Auth::user()->id])}}" >
                                            @csrf
                                            <div class="unlikes" >
                                                <button type="submit" style="border:none;background:transparent" class="fa-solid fa-heart" style="font-size: 20px;"></button>
                                            </div>
                                        </form>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endif
                @endif
            @endforeach
        </div>
    </div>
</div>
<!-- Third section end -->
@endsection