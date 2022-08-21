@extends('client.partial.master')
@section('title', 'contact onigami')


@section('content')


<section class="single-cover data-bg-image" data-bg-image="images/posts/single-cover.jpg">

        <div class="container-xl">

            <div class="cover-content post">

                <!-- post header -->
                <div class="post-header">
                    <h1 class="title mt-0 mb-3">{{$data->name}}</h1>
                    <ul class="meta list-inline mb-0">
						@if(file_exists('images/'.$data->user_avatar))
						
                        <li class="list-inline-item"><a href="#"><img src="{{ asset('client/images/logo.png') }}" class="author" alt="author"/>{{$data->user_name}}</a></li>
						@else
						<img src="{{asset('images/no-avatar')}}"/>
						@endif
                        <li class="list-inline-item"><a href="#">Trending</a></li>
                        <li class="list-inline-item">{{ date('d F Y', strtotime($data->created_at)) }}</li>
                    </ul>
                </div>
            </div>

        </div>

    </section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-12">
					<!-- post single -->
                    <div class="post post-single">
						<!-- post content -->
						<div class="post-content clearfix">
							{!!html_entity_decode($data->content)!!}
						</div>
						<!-- post bottom section -->
						

                    </div>

					<div class="spacer" data-height="50"></div>

					<div class="about-author padding-30 rounded">
						<div class="thumb">
							@if(file_exists('images/'.$data->user_avatar))
							<img src="{{asset('client/images/'.$data->user_avatar)}}"/>
							@else
							<img src="{{asset('client/images/no-avatar')}}"/>
							@endif
						</div>
						<div class="details">
							<h4 class="name"><a href="#">{{$data->user_name}}</a></h4>
							<p>Hello, I’m a content writer who is fascinated by content fashion, celebrity and lifestyle. She helps clients bring the right content to the right people.</p>
							<!-- social icons -->
							<ul class="social-icons list-unstyled list-inline mb-0">
								<li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-medium"></i></a></li>
								<li class="list-inline-item"><a href="#"><i class="fab fa-youtube"></i></a></li>
							</ul>
						</div>
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Comments</h3>
						<img src="{{asset('client/images/wave.svg')}}" class="wave" alt="wave" />
					</div>
					<!-- post comments -->
					<div class="comments bordered padding-30 rounded">

						<ul class="comments">
							@php
								$level = DB::table('feedback')->where([['status',2],
												['parent_id',0],
                                                ['deleted_at',Null],
                                                ['origami_id',$data->id]])
                                                ->paginate(3);
							@endphp
							@foreach($level as $item)
								<li class="comment rounded">
									<div class="details">
									<h4 class="name"><a href="#">{{$item->name}}</a></h4>
									<span class="date">{{date('d F Y --H:i', strtotime($item->created_at))}}'</span>
									@php


												$content = $item->content;
											@endphp
											<p>{{ $content }}</p>
									</div>
								</li>
								@php
									$level2 = DB::table('feedback')->where([['status',2],
													['parent_id',$item->id],
													['deleted_at',Null],
													['origami_id',$data->id]])
													->paginate(3);
								@endphp
									@foreach($level2 as $item)
										<li class="comment child rounded">
											<div class="details">
											<h4 class="name"><a href="#">{{$item->name}}</a></h4>
											<span class="date">{{date('d F Y --H:i', strtotime($item->created_at))}}'</span>
											
											<p>{!! $item->content !!}</p>
											</div>
										</li>

									@endforeach
							@endforeach
						</ul>
						{{ $level->links() }}
					</div>

					<div class="spacer" data-height="50"></div>

					<!-- section header -->
					<div class="section-header">
						<h3 class="section-title">Leave Comment</h3>
						<img src="{{asset('client/images/wave.svg')}}" class="wave" alt="wave" />
					</div>
					<!-- comment form -->
					<div class="comment-form rounded bordered padding-30">

						<form id="comment-form" class="comment-form" method="post" action="{{route('FeedbackBlogSingle',['slug'=>$data->slug])}}">
							@csrf
							<div class="messages"></div>
							
							<div class="row">

								<div class="column col-md-12">
									<!-- Comment textarea -->
									<div class="form-group">
										<textarea name="content" id="InputComment" class="form-control" rows="4" placeholder="Your comment here..." required="required"></textarea>
									</div>
								</div>

								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="email" class="form-control" id="InputEmail" name="email" placeholder="Email address" required="required">
									</div>
								</div>
	
								<div class="column col-md-12">
									<!-- Email input -->
									<div class="form-group">
										<input type="text" class="form-control" id="InputName" name="name" placeholder="Your name" required="required">
									</div>
								</div>
						
							</div>
	
							<input type="submit" id="submit" value="Submit" class="btn btn-default"><!-- Submit Button -->
	
						</form>
					</div>
                </div>

				

			</div>

		</div>
	</section>




</div><!-- end site wrapper -->

@endsection