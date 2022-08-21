@extends('client.partial.master')
@section('title', 'Origami homePage ')


@section('content')

	<!-- hero section -->
	<section class="section-home-page">
		<div class="container container-mobile">
			<div class="row">
				<div class="col-md-6">
					<h1>MAKE PERSONAL AWESOME CRAFT <span>ORIGAMI</span></h1>
					<p>Lany studies assert that origami was invented by the Japanese about a thousand years ago, but its roots may well be in China. It is also highly probable that the process of folding was applied to other materials before paper was invented, so the origins of recreational folding may lie with cloth or leather.</p>
				
				</div>
			</div>
		</div>
	</section>
	<section class="section-history">
		<div class="container">
			<div class="row">
				<div class="col-12 col-md-6">
					<img src="{{asset('./client/images/Frame_36.png')}}" alt="" srcset="">
				</div>
				<div class="col-12 col-md-6 d-flex align-items-center">
					<div class="contact-desc d-flex align-items-center flex-column">
						<h2>The history of <span>origami</span></h2>
						<p>LWriting a comprehensive history of paper folding is almost impossible, since information about the art form prior to the 15th century is virtually nonexistent. There are many plausible assertions about its origins and early history, but most of those are based on little firm documentation</p>
					</div>
				</div>
			</div>
			<div class="row">
				
				<div class="col-12 col-md-6 d-flex align-items-center">
					<div class="contact-desc d-flex align-items-center flex-column">
						<h2>The history of <span>origami for China</span></h2>
						<p>Paper was invented in China, and a Chinese court official, Cai Lun, has been traditionally credited as the inventor, though contemporary research suggests that paper was invented earlier. However, Cai is known to have introduced the concept of sheets of paper about the year 105 CE. By making paper from the macerated bark of trees, hemp waste, old rags, and fishnets, he discovered a far superior and cheaper way of creating a writing surface, compared with the cloth made of silk that was commonly used.</p>
					</div>
				</div>
				<div class="col-12 col-md-6">
					<img src="{{asset('./client/images/Frame_37.png')}}" alt="" srcset="">
				</div>
			</div>
		</div>
	</section>
	<section class="section-blog">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Origami, <span>“Ori”</span> means foldings and  <span>“Gami”</span> means paper</h2>
					</div>
				</div>
				<div class="col-md-12">
					<div class="row gy-4">
					<div class="col-md-12">
                    <div class="owl-carousel">
						@foreach($data_origami as $blog)
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
									
									<!-- @php
										$pos = strpos($blog->content,'p>') + 2
									@endphp
                                    <p class="excerpt mb-0">    {!! substr($blog->content, 0,  30) !!} ...</p> -->
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
						@endforeach
                            
                    </div>
                    </div>
                        
                      

                    </div>
				</div>
			
				
				
			</div>
		
		</div>
		
	</section>
	<section class="sign_block">
	
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-10 col-md-12 col-12 text-center">
                    
                    <h2 class>New guide sent directly to your inbox.</h2>
				
                    <form  action="{{route('sub_mail')}}" method="GET"  class="d-flex search-form">
                        <input type="email" class="form-control me-2" name="email" type="search" placeholder="Search and press enter ..." aria-label="Search">
                        <button class="btn btn-default btn-lg" type="submit" name="submit">SUBSCRIBE</button>
                    </form>
                </div>
            </div>
        </div>
		
	</section>

	<section class="section-home-grid-image mt-5">
		 <!--Grid row-->
		 <div class="container">
			<div class="row">

				<!--Grid column-->
				<div class="col-lg-8 col-md-12 ">
					<div class="row">
           
						<div class="col-lg-4 col-md-12 mb-0 balance-padding-right ">
							<img src="{{ asset('./client/images/product_1.png') }}" class="img-fluid mb-2 mix-mod pb-0  " alt="">
							<img src="{{ asset('./client/images/product_3.png') }}" class="img-fluid mb-3 mix-mod " alt="">
							<img src="{{ asset('./client/images/product_4.png') }}"   class="img-fluid mb-3 mix-mod " alt="">
							<img src= "{{ asset('./client/images/product_1.png') }}"     class="img-fluid mb-3 pb-1 mix-mod d-none-md  " alt="">
							
						</div>
						<div class="col-lg-8 col-md-12 mb-4 d-none-xl">
							<img src="{{asset('./client/images/product_2.png')}}" class="img-fluid mb-3 pb-1 mix-mod  " alt="">
							<div class="row">
								<div class=" col-6 col-lg-6 col-md-12 mb-3 balance-padding-right">
									<img src="{{asset('./client/images/product_3.png')}}" class="img-fluid mb-3 mix-mod pt-2 pb-2 p-0 pt-0 " alt="">
								</div>
								<div class=" col-6 col-lg-6 col-md-12 mb-3 ">
									<img src="{{asset('./client/images/product_3.png')}}" class="img-fluid mb-3 mix-mod  pt-2" alt="">
								</div>
							</div>
						</div>

					</div>
				 
		  
				
		  
				</div>
				<div class="col-lg-4 col-md-12 mb-4">
					<div class="row">
						<div class=" col-6 col-lg-6 col-md-12 mb-3 balance-padding-left">
							<img src="{{asset('./client/images/product_4.png')}}" class="img-fluid mix-mod " alt="">
							</div>
							<div class=" col-6 col-lg-6 col-md-12 mb-3 balance-padding-right">
								<img src="{{asset('./client/images/product_4.png')}}" class="img-fluid mix-mod " alt="">
								</div>
					<img src="{{asset('./client/images/product_5.png')}}" class="img-fluid mb-3 mix-mod " alt="">

					<img src="{{asset('./client/images/product_1.png')}}" class="img-fluid mb-4 mix-mod " alt="">
					
				
			
				  </div>
				<!--Grid column-->
		  
				
		  
		  
			  </div>
		 </div>
	
		  <!--Grid row-->
	</section>
    <section class="section-contact">
        <div class="container-fluid">
            <div class="row">
                <div class=" col-12 col-lg-6 col-md-6 d-flex align-items-center ">
					<form action="{{route('sendmail')}}" method="GET"   id="contact-form" class="contact-form" >
                
						<div class="messages"></div>
						
						<div class="row">
							<div class="column col-md-6">
								<!-- Name input -->
								<div class="form-group">
									<input type="text" class="form-control" name="InputName" id="InputName" placeholder="Your name" required="required" data-error="Name is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
							
							<div class="column col-md-6">
								<!-- Email input -->
								<div class="form-group">
									<input type="email" class="form-control" id="InputEmail" name="InputEmail" placeholder="Email address" required="required" data-error="Email is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
		
							<div class="column col-md-12">
								<!-- Email input -->
								<div class="form-group">
									<input type="text" class="form-control" id="InputSubject" name="InputSubject" placeholder="Subject" required="required" data-error="Subject is required.">
									<div class="help-block with-errors"></div>
								</div>
							</div>
					
							<div class="column col-md-12">
								<!-- Message textarea -->
								<div class="form-group">
									<textarea name="InputMessage" id="InputMessage" class="form-control" rows="4" placeholder="Your message here..." required="required" data-error="Message is required."></textarea>
									<div class="help-block with-errors"></div>
								</div>
							</div>
						</div>
		
						<button type="submit" name="submit" id="submit" value="Submit" class="btn btn-default">Submit Message</button><!-- Send Button -->
		
					</form>

				</div>
                <div class=" col-12 col-lg-6 col-md-6 baner-bg">
                    <div class="container d-flex justify-content-center flex-column align-items-center text-center">
						<div class="row">
							<div class="col-lg-12 text-white">
								<h3 class="text-white">Let’s Contact Us</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ut aliquam, purus sit amet luctus venenatis, lectus magna fringilla urna, porttitor rhoncus dolor purus non enim</p>
							
							</div>
						</div>
                        <div class="row d-flex justify-content-center">
                            <div class=" col-3 col-lg-3">
                                <img src="{{asset('./client/images/section_icon-1.png')}}" alt="" srcset="">
                            </div>
                            <div class="col-3 col-lg-3">
                                <img src="{{asset('./client/images/section_icon-2.png')}}" alt="" srcset="">
                            </div>
                            <div class="col-3 col-lg-3">
                                <img src="{{asset('./client/images/section_icon-3.png')}}" alt="" srcset="">
                            </div>
							
                        </div>
						
                    </div>
                </div>
            </div>
           
   
        </div>
    </section>
	<section class="section-blog">
		
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<div class="title">
						<h2>Origami, <span>“Ori”</span> means foldings and  <span>“Gami”</span> means paper</h2>
					</div>
				</div>
			
				<div class="col-md-12">
                    <div class="owl-carousel">
                                @foreach($data_origami as $blog)
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
                                            <p class="excerpt mb-0">
                                    
                                            
                                                <!-- {!! substr($blog->content, 0,  30) !!} -->
                                            
                                        
                                            </p>
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
                                @endforeach
                            
                            </div>
                    </div>
				
				
			</div>
		
		</div>
		
	</section>


@endsection