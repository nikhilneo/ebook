
@extends('main')
@section('content')
        <!-- Start Slider area -->
        <div class="slider-area brown__nav slider--15 slide__activation slide__arrow01 owl-carousel owl-theme">
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--1 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Buy <span>your </span></h2>
		            				<h2>favourite <span>Book </span></h2>
		            				<h2>from <span>Here </span></h2>
				                   	<a class="shopbtn" href="#">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        	<!-- Start Single Slide -->
	        <div class="slide animation__style10 bg-image--7 fullscreen align__center--left">
	            <div class="container">
	            	<div class="row">
	            		<div class="col-lg-12">
	            			<div class="slider__content">
		            			<div class="contentbox">
		            				<h2>Buy <span>your </span></h2>
		            				<h2>favourite <span>Book </span></h2>
		            				<h2>from <span>Here </span></h2>
				                   	<a class="shopbtn" href="#">shop now</a>
		            			</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
            </div>
            <!-- End Single Slide -->
        </div>
        <!-- End Slider area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--80">
			<div class="container">
				<div class="col-lg-12 col-12 text-center">
					@if(Session::has('userSuccess'))
		
						<div class="alert alert-success alert-dismissible">
							<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
							{{ Session::get('userSuccess')}}
						</div>
					@endif
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">New <span class="color--theme">Books</span></h2>
							
						</div>
					</div>
				</div>
				<!-- Start Single Tab Content -->
				<div class="furniture--4 border--round arrows_style owl-carousel owl-theme row mt--50">
					@foreach ($newBooks as $book)
						
						<!-- Start Single Product -->
						<div class="product product__style--3">
							<div class="col-lg-3 col-md-4 col-sm-6 col-12">
								<div class="product__thumb">
									<a class="first__img" href="{{route('books.view', $book->id)}}"><img src="{{url('storage/images/books/1.jpg')}}" alt="product image"></a>
									<a class="second__img animation1" href="{{route('books.view', $book->id)}}"><img src="{{url('storage/images/books/2.jpg')}}" alt="product image"></a>
									<div class="hot__box">
										<span class="hot-label">New</span>
									</div>
								</div>
								<div class="product__content content--center">
									<h4><a href="{{route('books.view', $book->id)}}">{{ $book->name}}</a></h4>
									<ul class="prize d-flex">
										<li>USD {{ number_format($book->price, 2) }}</li>
										{{-- <li class="old_prize">$35.00</li> --}}
									</ul>
								</div>
							</div>
						</div>
						<!-- Start Single Product -->
					@endforeach
				</div>
				<!-- End Single Tab Content -->
			</div>
		</section>
		<!-- Start BEst Seller Area -->

		<!-- Start Best Seller Area -->
		<section class="wn__bestseller__area bg--white pt--80  pb--30">
			<div class="container">
				<div class="row">
					<div class="col-lg-12">
						<div class="section__title text-center">
							<h2 class="title__be--2">All <span class="color--theme">Books</span></h2>
							
						</div>
					</div>
				</div>
				<div class="tab__container mt--60">
					<!-- Start Single Tab Content -->
					<div class="row single__tab tab-pane fade show active" id="nav-all" role="tabpanel">
						<div class="product__indicator--4 arrows_style owl-carousel owl-theme">
							@for ($i = 0, $count = count($allBooks); $i < $count; $i+=2)
							<div class="single__product">
								@for ($j = $i,$jCout = 0; $jCout <2 ; $jCout++, $j++)
										<!-- Start Single Product -->
										<div class="col-lg-3 col-md-4 col-sm-6 col-12">
											<div class="product product__style--3">
												<div class="product__thumb">
													<a class="first__img" href="{{route('books.view', $allBooks[$j]->id)}}">
														<img src="{{url('storage/images/books/1.jpg')}}" alt="product image">
													</a>
													<a class="second__img animation1" href="{{route('books.view', $allBooks[$j]->id)}}">
														<img src="{{url('storage/images/books/2.jpg')}}" alt="product image">
													</a>
													{{-- <div class="hot__box">
														<span class="hot-label">BEST SALER</span>
													</div> --}}
												</div>
												<div class="product__content content--center content--center">
													<h4><a href="{{route('books.view', $allBooks[$j]->id)}}">{{ $allBooks[$j]->name }}</a></h4>
													<ul class="prize d-flex">
														<li>USD {{ number_format($allBooks[$j]->price, 2) }}</li>
														{{-- <li class="old_prize">$35.00</li> --}}
													</ul>
												</div>
											</div>
										</div>
										@endfor
										<!-- Start Single Product -->
									</div>
							@endfor

						</div>
					</div>
					<!-- End Single Tab Content -->

				</div>
			</div>
		</section>
		<!-- Start BEst Seller Area -->
		<!-- Footer Area -->
		<footer id="wn__footer" class="footer__area bg__cat--8 brown--color">
			<div class="footer-static-top">
				<div class="container">
					<div class="row">
						<div class="col-lg-12">
							<div class="footer__widget footer__menu">
								<div class="ft__logo">
									<a href="{{ url('/') }}">
										<img src="{{url('storage/images/logo/3.png')}}" alt="logo">
									</a>
									
								</div>
								<div class="footer__content">
									<ul class="social__net social__net--2 d-flex justify-content-center">
										<li><a href="#"><i class="bi bi-facebook"></i></a></li>
										<li><a href="#"><i class="bi bi-google"></i></a></li>
										<li><a href="#"><i class="bi bi-twitter"></i></a></li>
										<li><a href="#"><i class="bi bi-linkedin"></i></a></li>
										<li><a href="#"><i class="bi bi-youtube"></i></a></li>
									</ul>
									
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="copyright__wrapper">
				<div class="container">
					<div class="row">
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="copyright">
								<div class="copy__right__inner text-left">
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://www.neosofttech.com/">NeoSOFT Technologies</a> All Rights Reserved</p>
								</div>
							</div>
						</div>
						<div class="col-lg-6 col-md-6 col-sm-12">
							<div class="payment text-right">
								<img src="{{url('storage/images/icons/payment.png')}}" alt="" />
							</div>
						</div>
					</div>
				</div>
			</div>
		</footer>
		<!-- //Footer Area -->

	</div>
	<!-- //Main wrapper -->

	@endsection