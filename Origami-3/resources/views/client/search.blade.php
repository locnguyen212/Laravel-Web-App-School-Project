@extends('client.partial.master')
@section('title', 'search onigami')


@section('content')

   
<section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <?php
                     $query = $_GET['query'];
                
                ?>
                <h1 class="mt-0 mb-2"> {{$query}}</h1>
                <nav aria-label="breadcrumb">
                <p class="mt-0 mb-2">  Search Results: {{$count}}</p>
                </nav>
            </div>
        </div>
    </section>

	<!-- section main content -->
	<section class="main-content">
		<div class="container-xl">

			<div class="row gy-4">

				<div class="col-lg-12">

                    <div class="row gy-4">
                        @if($count == 0 )
                            I have one record!
                     
                        @else
                            @foreach($data_origami as $blog)
                            <div class="col-sm-3">
                                <div class="post post-grid rounded bordered">
                                    <div class="thumb top-rounded">
                                        <a href="/blog-single/{{$blog->slug}}" class="category-badge position-absolute">{{$blog->category_name}}</a>
                                        <span class="post-format">
                                            <i class="icon-picture"></i>
                                        </span>
                                        <a href="/blog-single/{{$blog->slug}}">
                                            <div class="inner">
											<img src="{{$blog->intro_image}}"alt="post-title"/>
                                              
                                            </div>
                                        </a>
                                    </div>
                                    <div class="details">
                                        <ul class="meta list-inline mb-0">
                                            <li class="list-inline-item"><a href=""><img src="{{asset('./client/images/other/'.$blog->user_avatar. '')}} " class="author w-20" alt="author">{{$blog->user_name}}</a></li>
                                            <li class="list-inline-item">{{ date('d F Y', strtotime($blog->created_at)) }}</li>
                                        </ul>
                                        <h5 class="post-title mb-3 mt-3"><a href="/blog-single/{{$blog->slug}}">{{$blog->name}}</a></h5>
                                        <!-- <p class="excerpt mb-0">
                                   
                                         
                                            {!! substr($blog->content, 0,  30) !!}
                                          
                                       
                                        </p> -->
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
                                            <a href="/blog-single/{{$blog->slug}}"><span class="icon-options"></span></a>
                                        </div>
                                    </div>
                                </div>
                            </div> 
                            @endforeach
                           
                     
                           
                            
                        @endif
                       
                 
                            
                    
              
                   
                    
                        

				

				    </div>
                    </div>
                </div>  
                   
				

			</div>

		</div>
	</section>

	

@endsection