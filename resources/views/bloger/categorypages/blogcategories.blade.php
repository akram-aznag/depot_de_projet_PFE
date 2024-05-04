@extends('website')
@section('content')  
<style>
    .btn:hover{
        color: #fff;
    }
    .form-select:focus{
        outline-color:black; 
    }
</style>
<div class="container">
    <div class="content">
        <div class="category_header mt-4 mb-3">
            <span class="fw-normal text-uppercase d-block mb-1 text-center">  @lang('CustomizedLanguage.menu.categories')
            </span>
            
        </div>
        <div class="category_body">
            @php $categories=\App\Models\Category::get(); @endphp
            <form action={{route('get_category')}} method="post">
                @csrf
                <div class="select_handler">
                    <select class="form-select form-select-lg mb-3" aria-label=".form-select-lg example" name="category">
                        <option selected> @lang('CustomizedLanguage.blog_attributes.choose_category')</option>
                        @foreach($categories as $category)
                        <option value={{$category->id}}>{{$category->name}}</option>
                        @endforeach
                      </select>
                </div>
                <button type="submit" class="btn btn-dark" > @lang('CustomizedLanguage.blog_attributes.get_category')</button>
            </form>
        </div>
        <div class="category_select_result">
            <div class="section pt-5 pb-0">
                <div class="container">
                    <div class="row mb-5 justify-content-center">

                        <div class="col-lg-9">
                            <span class="fw-normal text-uppercase d-block mb-1">{{$CATEGORY->name ?? ''}}    @lang('CustomizedLanguage.blog_attributes.category') </span>
                           
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @if(!empty($posts_category))
                        @foreach($posts_category as $post_category)
                        @if($post_category->user)
                        <div class="col-lg-9">
                            <div class="post-entry d-md-flex small-horizontal mb-5">
                                <div class="me-md-5 thumbnail mb-3 mb-md-0">
                                    <img src={{url('../upload/blog_images/'.$post_category->photo)}} alt="Image" class="img-fluid">
                                </div>
                                <div class="content">
                                    <div class="post-meta mb-3">
                                        <a href="#" class="category">{{$post_category->category->name}}</a>
                                        <span class="date">{{date('Y-m-d',strtotime( $post_category->created_at))}}</span>
                                    </div>
                                    <h2 class="heading"><a href="{{route('single',['slug'=>$post_category->slug])}}">{{$post_category->title}}.</a></h2>
                                    <p>{{$post_category->description}}.</p>
                                    <a href="{{route('single',['slug'=>$post_category->slug])}}" class="post-author d-flex align-items-center">
                                        <div class="author-pic">
                                            <img  src={{
                                                !empty($post_category->user->photo)
                                                ?url('upload/bloger_images/'.$post_category->user->photo)
                                                :url('upload/no_image.jpg')
                                                }} alt="user image">

                                        </div>
                                        <div class="text">
                                            <strong>{{$post_category->user->name}}</strong>
                                            <span>Author, {{$post_category->user->posts->count()}} published post</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        @else 
                        <p>the posts of category {{$CATEGORY->name}} are no longer exists</p>
                        @endif
                        @endforeach
                      
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
document.querySelector('select').addEventListener("change",(e)=>{
  const form=e.target.closest("form");
  return form.submit();
})
</script>
@endsection