@extends('website')
@section('title','details')
@section('content')

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
	{{session('success')}}
	
	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<p>{{session('error')}}</p>

	<button type="button" class="close" data-dismiss="alert" aria-label="Close">
	  <span aria-hidden="true">&times;</span>
	</button>
  </div>
	

@endif
@if(($post_data->user))
	<div class="section post-section pt-5">
	  <div class="container">
		<div class="row justify-content-center">
		  <div class="col-lg-8">
			<div class="text-center">
			  <img src="{{asset('../upload/bloger_images/'.$post_data->user->photo)}}" alt="Image" class="author-pic img-fluid rounded-circle mx-auto">
			</div>
			<span class="d-block text-center">{{$post_data->user->name}}</span>
			<span class="date d-block text-center small text-uppercase text-black-50 mb-5">
				@lang('CustomizedLanguage.created_at')
				{{date('Y-m-d',strtotime($post_data->updated_at))}} </span>
			<h2 class="heading text-center">{{$post_data->title}}.</h2>
			<p class="lead mb-4 text-center">{{$post_data->description}}.</p>
			<img src="{{asset('../upload/blog_images/'.$post_data->photo)}}" id="property" alt="Image" class="img-fluid rounded mb-4" style="width: 100%">
			<p>
			 {{$post_data->meta_description}}
			</p>
			<div class="comment" style="position: relative;left:300px">
				<i style="open-popup" class="fa-regular fa-comments text-dark"></i>
				<span class="open-popup" id="Cc">
					{{$post_data->comments->count()}}                        
					 @lang('CustomizedLanguage.comments')
				</span>
			  
			</div>
			
		  </div>
		</div>
	  </div>
	<div class="popup" id="popup">
		<div class="overlay"></div>
		<div class="popup-content">
			<div class="h3 comment-header">
				{{Auth::user()? __('CustomizedLanguage.blog_comments_attributs.add_comment'):__('CustomizedLanguage.blog_comments_attributs.view_replies')}}
			</div>
			<div class="comment-body">
				@if(Auth::user())
				<form action={{route('store_comment',['post_id'=>$post_data->id,'user_id'=>Auth::user()->id])}} method="post">
					@csrf
					<textarea type="text" class="comment-input" placeholder="@lang('CustomizedLanguage.blog_comments_attributs.write_a_comment')" name="comment"></textarea>
					<div class="controllers">
						<button class="close-btn">
							@lang('CustomizedLanguage.blog_comments_attributs.close')
						</button>
						<button class="submit-btn" type="submit">
							@lang('CustomizedLanguage.blog_comments_attributs.add_comment')
							
						</button>
					</div>
				</form>
				@else
				<div class="controllers">
					<button class="close-btn">@lang('CustomizedLanguage.blog_comments_attributs.close')</button>
				</div>
				@endif
				@if($post_data->comments->count()>0)
				<h5>@lang('CustomizedLanguage.comments')</h5>
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
								  <div class="replies-btn parent-replies">
							@lang('CustomizedLanguage.blog_comments_attributs.view_replies')({{$comment->replies->count()}})</div>
								@endif
								
								@if(Auth::user())
								  <div class="reply-btn btn parent-reply" style="font-size:17px">
							@lang('CustomizedLanguage.blog_comments_attributs.reply')
									
								  </div>
								@endif
							  </div>
							  @if(Auth::user())
							  <form action={{route('store_comment_reply',['post_id'=>$post_data->id,'user_id'=>Auth::user()->id,'parent_id'=>$comment->id])}} method="post" >
								@csrf
								  <div class="reply-input-field">
									<div class="h6 comment-header">
										@lang('CustomizedLanguage.blog_comments_attributs.reply_to_comment')

									</div>
									<div class="form-group reply_comment_filed">
									  <input  type="text" placeholder="@lang('CustomizedLanguage.blog_comments_attributs.write_a_comment')" name="comment_reply">
									  <button class="btn btn-primary btn-sm mt-3" type="submit">
										@lang('CustomizedLanguage.blog_comments_attributs.add_comment')
									  </button>
									</div>
								  </div>
							  </form>
							  @endif
							  <!---->
							 @foreach($comment->replies as $reply)
							 <div class="user-info-reply">
								<div class="user-img">
									<img src="{{ !empty($reply->user->photo) ? url('../upload/bloger_images/'.$reply->user->photo) : url('../upload/no_image.jpg') }}" alt="user" class="IMG">
								</div>
								<div class="comment-content-reply">
									<div class="card">
										<div class="card-body-reply">
											<div class="card-title-reply">
												<span class="username">{{ $reply->user->name }}</span>
												<span class="time">{{ \Carbon\Carbon::parse($reply->created_at)->format('g:i a') }}</span>
											</div>
											<p class="card-text-reply">{{ $reply->comment }}</p>
											<div class="action-controller">
												<div class="replies-btn btn1">{{$reply->replies->count() > 0 ? __('CustomizedLanguage.blog_comments_attributs.view_replies').'('.$reply->replies->count().')' : __('CustomizedLanguage.blog_comments_attributs.No_replies')}}</div>
												<div class="reply-btn btn try" style="font-size: 16px">
										@lang('CustomizedLanguage.blog_comments_attributs.reply')
													
												</div>
											</div>
											@if(Auth::user())
											<form action="{{ route('store_comment_reply_reply', ['post_id' => $post_data->id, 'user_id' => Auth::user()->id, 'parent_id' => $reply->id]) }}" method="post">
												@csrf
												<div class="reply-input-field-2">
													<div class="h6 comment-header">
														@lang('CustomizedLanguage.blog_comments_attributs.reply_to_comment')

													</div>
													<div class="form-group">
														<input class="form-control" type="text" placeholder="@lang('CustomizedLanguage.blog_comments_attributs.write_a_comment')" name="comment_reply_reply">
														<button class="btn btn-sm mt-3" type="submit">
										@lang('CustomizedLanguage.blog_comments_attributs.reply_to_comment')
															
														</button>
													</div>
												</div>
											</form>
											@endif
										</div>
									</div>
									@forEach($reply->replies as $reply_reply)
									<div class="user-info-reply-2">
										<div class="user-img-2">
											<img src="{{ !empty($reply_reply->user->photo) ? url('../upload/bloger_images/'.$reply_reply->user->photo) : url('../upload/no_image.jpg') }}" alt="user" class="IMG">

										</div>
										<div class="comment-content-reply-2">
											<div class="card" style="background:#fff">
												<div class="card-body-reply-2">
													<div class="card-title-reply-2">
														<span class="username">{{$reply_reply->user->name}}</span>
														<span class="time">{{ \Carbon\Carbon::parse($reply_reply->created_at)->format('g:i a') }}</span>
													</div>
													<p class="card-text-reply">{{$reply_reply->comment}}</p>
												</div>
											</div>
										</div>
									</div>
									@endforeach
									
								</div>
							</div>
							 @endforeach
	
						  </div>
					  </div>
				  </div>
			  </div>
			  @endforeach
			  @else
			  <h5>no Comment yet</h5>

			  @endif
			  
			</div>
		</div>
	</div>
	</div>
	<div>
	</div>
@endif
@endsection
