@extends('client.partial.master')
@section('title', 'contact onigami')


@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2">{{$title->name}}</h1>
            </div>
        </div>
    </section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-8">

                    <div class="row gy-4">
                        @foreach($data as $item)
						@foreach($data_catelory as $data_catelorys)
									
                        <div class="col-sm-6">
                            <!-- post -->
                            <div class="post post-grid rounded bordered">
                                <div class="thumb top-rounded">
                                    <a href="category.html" class="category-badge position-absolute">Lifestyle</a>
                                    <span class="post-format">
                                        <i class="icon-picture"></i>
                                    </span>
                                    <a href="{{route('blog-single',['slug'=>$item->slug])}}">
                                        <div class="inner">
											@if(file_exists('images/'.$item->intro_image))
											<img src="{{asset($item->intro_image)}}"alt="post-title"/>
											@else
                                            <img src="{{asset($item->intro_image)}}" alt="post-title" />
											@endif
                                        </div>
                                    </a>
                                </div>
                                <div class="details">
                                    <ul class="meta list-inline mb-0">
                                        <li class="list-inline-item"><a href="{{route('blog-single',['slug'=>$item->slug])}}"><img src="{{asset('client/images/other/author-sm.png')}}" class="author" alt="author"/>{{$data_catelorys->user_name}}</a></li>
                                        <li class="list-inline-item">{{ date('d F Y', strtotime($item->created_at)) }}</li>
                                    </ul>
                                    <h5 class="post-title mb-3 mt-3"><a href="{{route('blog-single',['slug'=>$item->slug])}}">{{$item->name}}</a></h5>
									<!-- @php
										$pos = strpos($item->content,'p>') + 2
									@endphp -->
                                    <!-- <p class="excerpt mb-0">    {!! substr($item->content, $pos, 30) !!} ...</p> -->
                                </div>
                                <div class="post-bottom clearfix d-flex align-items-center">
                                    <div class="social-share me-auto">
                                        <button class="toggle-button icon-share"></button>
                                        <ul class="icons list-unstyled list-inline mb-0">
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="fab fa-telegram-plane"></i></a></li>
                                            <li class="list-inline-item"><a href="#"><i class="far fa-envelope"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="more-button float-end">
                                        <a href="blog-single.html"><span class="icon-options"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
						   @endforeach
                    </div>
					{{ $data->links() }}
				</div>
				<div class="col-lg-4">

					<!-- sidebar -->
					<div class="sidebar">
						<!-- widget about -->
						<div class="widget rounded">
							<div class="widget-about data-bg-image text-center" data-bg-image="{{asset('client/images/map-bg.png')}}">
								<img src="{{asset('client/images/logo.svg')}}" alt="logo" class="mb-4" />
								<p class="mb-4">Hello, We’re content writer who is fascinated by content fashion, celebrity and lifestyle. We helps clients bring the right content to the right people.</p>
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

					

						<!-- widget categories -->
						<div class="widget rounded">
							<div class="widget-header text-center">
								<h3 class="widget-title">Category</h3>
								<img src="{{asset('client/images/wave.svg')}}" class="wave" alt="wave" />
							</div>
							<div class="widget-content">
								<ul class="list">
                                    @foreach($category as $item)
									@php
									$quantity = DB::table('origami')
									->where('category_id',$item->id)->get();	
									@endphp
									<li><a href="{{route('category',['slug' =>$item->slug])}}">{{$item->name}}</a><span>{{count($quantity)}}</span></li>
									@endforeach
								</ul>
							</div>
							
						</div>

						<!-- widget newsletter -->


						<!-- widget tags -->

					</div>

				</div>

			</div>

		</div>
	</section>

	

@endsection