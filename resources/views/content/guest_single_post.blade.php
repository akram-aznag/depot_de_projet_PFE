@extends('website')
@section('title','details')
@section('content')


	<div class="section post-section pt-5">
	  <div class="container">
		<div class="row justify-content-center">
		  <div class="col-lg-8">
			<div class="text-center">
			  <img src="{{asset('../upload/bloger_images/'.$post_data->user->photo)}}" alt="Image" class="author-pic img-fluid rounded-circle mx-auto">
			</div>
			<span class="d-block text-center">{{$post_data->user->name}}</span>
			<span class="date d-block text-center small text-uppercase text-black-50 mb-5">created at {{date('Y-m-d',strtotime($post_data->updated_at))}} </span>
			<h2 class="heading text-center">{{$post_data->title}}.</h2>
			<p class="lead mb-4 text-center">{{$post_data->description}}.</p>
			<img src="{{asset('../upload/blog_images/'.$post_data->photo)}}" id="property" alt="Image" class="img-fluid rounded mb-4" style="width: 100%">
			<p>
			 {{$post_data->meta_description}}
			</p>
			<div class="comment" style="position: relative;left:300px">
				<i style="open-popup" class="fa-regular fa-comments text-dark"></i>
				<span class="open-popup">comments</span>
			  
			</div>
			<div class="row mt-5 pt-5 border-top">
			  <div class="col-12">
				<span class="fw-bold text-black small mb-1">Share</span>
				<ul class="social list-unstyled">
				  <li><a href="#"><span class="icon-facebook"></span></a></li>
				  <li><a href="#"><span class="icon-twitter"></span></a></li>
				  <li><a href="#"><span class="icon-linkedin"></span></a></li>
				  <li><a href="#"><span class="icon-pinterest"></span></a></li>
				</ul>
			  </div>
			</div>
		  </div>
		</div>
	  </div>
	  <div class="popup" id="popup">
		<div class="overlay"></div>
		<div class="popup-content">
			<div class="h3 comment-header">
				View comments
			</div>
			<div class="comment-body">
				
				<div class="controllers">
					<button class="close-btn">close</button>
				</div>
				
				<h5>Comments</h5>
				@foreach($post_data->comments as $comment)
				<div class="user-info">
				  <div class="user-img">
					
					  <img src={{url('../upload/bloger_images/',$comment->user->photo)}} class="IMG" alt="user">
				  </div>
				  <div class="comment-content">
					  <div class="card">
						  <div class="card-body">
							  <div class="card-title">
								  <span class="username">{{$comment->user->name}}</span>
								  <span class="time">{{\Carbon\Carbon::parse($post_data->created_at)->format('g:i a') }}</span>
							  </div>
							  <p class="card-text">{{$comment->comment}}.</p>
							  <div class="action-controller">
								@if($comment->replies->count()>0)
								  <div class="replies-btn parent-replies">view replies ({{$comment->replies->count()}})</div>
								@endif
								  <div class="reply-btn btn parent-reply">reply</div>
							  </div>
							 
							  <!---->
							@forEach( $comment->replies as $reply)
							  <div class="user-info-reply">
								  <div class="user-img">
									  <img src="../Desktop/CVPHOTO.jpg" alt="user">
								  </div>
								  <div class="comment-content-reply">
									  <div class="card">
										  <div class="card-body-reply">
											  <div class="card-title-reply">
												  <span class="username">{{$reply->user->name}}</span>
												  <span class="time">{{\Carbon\Carbon::parse($post_data->created_at)->format('g:i a') }}</span>
											  </div>
											  <p class="card-text-reply">{{$reply->comment}}.</p>
											  <div class="action-controller">
												  <div class="replies-btn btn1">view replies</div>
												  <div class="reply-btn btn try">reply</div>
											  </div>
											  <div class="reply-input-field-2">
												<div class="h6 comment-header">
												  reply to comment
												</div>
												<div class="form-group">
												  <input class="form-control" type="text" placeholder="Default input" name="comment_reply_2">
												  <button class="btn  btn-sm mt-3">submit</button>
				  
				  
												</div>
											  </div>
											  
										  </div>
									  </div>
									  
								  </div>
							  </div>
							@endforeach
	
							  <div class="user-info-reply-2">
								  <div class="user-img-2">
									  <img src="../Desktop/CVPHOTO.jpg" alt="user" class="IMG">
								  </div>
								  <div class="comment-content-reply-2">
									  <div class="card">
										  <div class="card-body-reply-2">
											  <div class="card-title-reply-2">
												  <span class="username">user name</span>
												  <span class="time">3:04 am</span>
											  </div>
											  <p class="card-text-reply">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
										  </div>
									  </div>
								  </div>
							  </div>
							  
	
						  </div>
					  </div>
				  </div>
			  </div>
			  @endforeach
			  
			</div>
		</div>
	</div>
	</div>
	<div>
	</div>
	<script>
		const createPopup = (popupId) => {
    const popupNode = document.querySelector(popupId);
    const overlay = popupNode.querySelector(".overlay");
    const closeBtn = popupNode.querySelector(".close-btn");

    function openPopup() {
        popupNode.classList.add("active");
    }

    function closePopup() {
        popupNode.classList.remove("active");
    }

    overlay.addEventListener("click", closePopup);
    closeBtn.addEventListener("click", closePopup);

    return openPopup;
};

const openPopupElement = document.querySelector('.open-popup');
const popup = createPopup("#popup");
openPopupElement.addEventListener('click', popup);

document.querySelectorAll('.parent-reply').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        const commentSection = event.target.closest('.user-info');
        const replyInputField = commentSection.querySelector('.reply-input-field');
        replyInputField.classList.toggle('active');
    });
});

document.querySelectorAll('.parent-replies').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        const commentSection = event.target.closest('.user-info');
        const repliesSection = commentSection.querySelector('.user-info-reply');
        repliesSection.classList.toggle('active');
    });
});

//
document.querySelectorAll('.btn1').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        const repliesSection = event.target.closest('.user-info').querySelector('.user-info-reply-2');
        repliesSection.classList.toggle('active');
    });
});
document.querySelectorAll('.try').forEach((btn) => {
    btn.addEventListener('click', (event) => {
        const repliesSection = event.target.closest('.user-info').querySelector('.reply-input-field-2');
        repliesSection.classList.toggle('active');
    });
});




	</script>
@endsection
