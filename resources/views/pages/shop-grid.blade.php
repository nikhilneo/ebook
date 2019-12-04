
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Books</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Books</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start Shop Page -->
        <div class="page-shop-sidebar left--sidebar bg--white section-padding--lg">
        	<div class="container">
        		<div class="row">
					<div class="col-lg-12 col-12 text-center">
						@if(Session::has('userSuccess'))
	
							<div class="alert alert-success alert-dismissible">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
								{{ Session::get('userSuccess')}}
							</div>
						@endif
					</div>
        			<div class="col-lg-3 col-12 order-2 order-lg-1 md-mt-40 sm-mt-40">
        				<div class="shop__sidebar">
        					<aside class="wedget__categories poroduct--cat">
        						<h3 class="wedget__title">Books Categories</h3>
        						<ul>
        							<li><a href="#">Biography <span>(3)</span></a></li>
        							<li><a href="#">Business <span>(4)</span></a></li>
        							<li><a href="#">Cookbooks <span>(6)</span></a></li>
        							<li><a href="#">Health & Fitness <span>(7)</span></a></li>
        							<li><a href="#">History <span>(8)</span></a></li>
        							<li><a href="#">Mystery <span>(9)</span></a></li>
        							<li><a href="#">Inspiration <span>(13)</span></a></li>
        							<li><a href="#">Romance <span>(20)</span></a></li>
        							<li><a href="#">Fiction/Fantasy <span>(22)</span></a></li>
        							<li><a href="#">Self-Improvement <span>(13)</span></a></li>
        							<li><a href="#">Humor Books <span>(17)</span></a></li>
        							<li><a href="#">Harry Potter <span>(20)</span></a></li>
        							<li><a href="#">Land of Stories <span>(34)</span></a></li>
        							<li><a href="#">Kids' Music <span>(60)</span></a></li>
        							<li><a href="#">Toys & Games <span>(3)</span></a></li>
        							<li><a href="#">hoodies <span>(3)</span></a></li>
        						</ul>
        					</aside>
        				</div>
        			</div>
        			<div class="col-lg-9 col-12 order-1 order-lg-2">
        				<div class="row">
        					<div class="col-lg-12">
								<div class="shop__list__wrapper d-flex flex-wrap flex-md-nowrap justify-content-between">
									<div class="shop__list nav justify-content-center" role="tablist">
			                        </div>
			                        {{-- <p>Showing 1–12 of 40 results</p> --}}
			                        <p>All the books are here.</p>
			                        <div class="orderby__wrapper">
			                        </div>
		                        </div>
        					</div>
        				</div>
        				<div class="tab__container">
	        				<div class="shop-grid tab-pane fade show active" id="nav-grid" role="tabpanel">
	        					<div class="row">
									@foreach ($books as $book)
										<!-- Start Single Product -->
										<div class="product product__style--3 col-lg-4 col-md-4 col-sm-6 col-12">
												<div class="product__thumb">
													<a class="first__img" href="{{route('books.view', $book->id)}}"><img src="/storage/images/books/1.jpg" alt="product image"></a>
													<a class="second__img animation1" href="{{ route('books.view', $book->id) }}"><img src="{{url('storage/images/books/2.jpg')}}" alt="product image"></a>
												</div>
												<div class="product__content content--center">
													<h4><a href="{{ route('books.view', $book->id) }}">{{ $book->name }}</a></h4>
													<ul class="prize d-flex">
														<li>USD {{ number_format($book->price,2) }}</li>
													</ul>
												</div>
											</div>
											<!-- End Single Product -->
									@endforeach
								</div>
								<div class="row">
									<div class="col-md-6">
										
										{{-- Pagination Classes are added by jquery --}}
										{{ $books->links() }}
									</div>
								</div>
	        				</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End Shop Page -->
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

@section('scripts')
	<script>
		$(document).ready(function(){
			$("ul.pagination").addClass("wn__pagination");
			var disabledText = $("ul.pagination>li.disabled").text();
			$("ul.pagination>li.disabled").html("<a href='#'>"+disabledText+"</a>");
		});
	</script>
@endsection