
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Book Details</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Book Details</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- Start main Content -->
        <div class="maincontent bg--white pt--80 pb--55">
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
        			<div class="col-lg-9 col-12">
        				<div class="wn__single__product">
        					<div class="row">
        						<div class="col-lg-6 col-12">
        							<div class="wn__fotorama__wrapper">
	        							<div class="fotorama wn__fotorama__action" data-nav="thumbs">
		        							  <a href="1.jpg"><img src="/storage/images/product/1.jpg" alt=""></a>
		        							  <a href="2.jpg"><img src="/storage/images/product/2.jpg" alt=""></a>
		        							  <a href="3.jpg"><img src="/storage/images/product/3.jpg" alt=""></a>
		        							  <a href="4.jpg"><img src="/storage/images/product/4.jpg" alt=""></a>
		        							  <a href="5.jpg"><img src="/storage/images/product/5.jpg" alt=""></a>
		        							  <a href="6.jpg"><img src="/storage/images/product/6.jpg" alt=""></a>
		        							  <a href="7.jpg"><img src="/storage/images/product/7.jpg" alt=""></a>
		        							  <a href="8.jpg"><img src="/storage/images/product/8.jpg" alt=""></a>
	        							</div>
        							</div>
        						</div>
        						<div class="col-lg-6 col-12">
        							<div class="product__info__main">
        								<h1>{{ $book->name }}</h1>
        								<p><strong>Edition</strong> {{ $book->eddition }}</h1>
        								<p><strong>Published On</strong> {{ date('d/m/Y', strtotime($book->publish_date)) }}</p>
        								<p><strong>Author</strong> {{ $book->author }} </p>
        								<div class="price-box">
        									<span>USD {{ number_format($book->price,2) }}</span>
        								</div>
										@if ($book->quantity == 0)
											<p class="lead"> Sorry Book is Out of Stock</p>
										@else
											
											<form action="{{ route('cart.add') }}" method="Post">
												{{ csrf_field() }}
												<div class="box-tocart d-flex">
													<input type="hidden" name="prevUrl" value="{{$prevUrl}}">
													<span>Qty</span>
													<input type="hidden" name="book_id" value="{{ $book->id }}">					<input id="quantity" class="input-text qty" name="quantity" min="1" max="{{$book->quantity}}" value="1" title="Qty" type="number">
													<div class="addtocart__actions">
														<button class="tocart" type="submit" title="Add to Cart">Add to Cart</button>
													</div>
													<div class="active">
													</div>
													<div class="product-addto-links clearfix">
														@php
															$anchor = '<a class="wishlist" href="#"
                                            				onclick="event.preventDefault();
                                                			document.getElementById('."'wishlist-store-form'".').submit();">
																</a>';
															$wishID = 0;
														@endphp
														@if (Auth::check())
															
															@foreach ($book->wishlists as $wish)
																@if ($wish->user_id == Auth::user()->id)
																	@php
																		
																		$anchor = '<a class="wishlist active" href="#"
                                            								onclick="event.preventDefault();
																			document.getElementById('."'wishlist-destroy-form'".').submit();"></a>';
																		$wishID = $wish->id;
																		break;
																	@endphp
																@endif
															@endforeach
															{!! $anchor !!}
														@endif
													</div>
												</div>
											</form>
										@endif
										<form id="wishlist-store-form" action="{{ route('wishlist.store') }}" method="POST" style="display: none;">
											{{ csrf_field() }}
											<input type="hidden" name="book_id" value="{{ $book->id }}">
                                        </form>
										<form id="wishlist-destroy-form" action="{{ route('wishlist.destroy', $wishID) }}" method="POST" style="display: none;">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
                                        </form>
        							</div>
        						</div>
        					</div>
        				</div>
        			</div>
        		</div>
        	</div>
        </div>
        <!-- End main Content -->
		<!-- Start Search Popup -->
		<div class="box-search-content search_active block-bg close__top">
			<form id="search_mini_form--2" class="minisearch" action="#">
				<div class="field__search">
					<input type="text" placeholder="Search entire store here...">
					<div class="action">
						<a href="#"><i class="zmdi zmdi-search"></i></a>
					</div>
				</div>
			</form>
			<div class="close__wrap">
				<span>close</span>
			</div>
		</div>
		<!-- End Search Popup -->
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
		<!-- QUICKVIEW PRODUCT -->
		<div id="quickview-wrapper">
		    <!-- Modal -->
		    <div class="modal fade" id="productmodal" tabindex="-1" role="dialog">
		        <div class="modal-dialog modal__container" role="document">
		            <div class="modal-content">
		                <div class="modal-header modal__header">
		                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		                </div>
		                <div class="modal-body">
		                    <div class="modal-product">
		                        <!-- Start product images -->
		                        <div class="product-images">
		                            <div class="main-image images">
		                                <img alt="big images" src="{{url('storage/images/product/big-img/1.jpg')}}">
		                            </div>
		                        </div>
		                        <!-- end product images -->
		                        <div class="product-info">
		                            <h1>Simple Fabric Bags</h1>
		                            <div class="rating__and__review">
		                                <ul class="rating">
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                    <li><span class="ti-star"></span></li>
		                                </ul>
		                                <div class="review">
		                                    <a href="#">4 customer reviews</a>
		                                </div>
		                            </div>
		                            <div class="price-box-3">
		                                <div class="s-price-box">
		                                    <span class="new-price">$17.20</span>
		                                    <span class="old-price">$45.00</span>
		                                </div>
		                            </div>
		                            <div class="quick-desc">
		                                Designed for simplicity and made from high quality materials. Its sleek geometry and material combinations creates a modern look.
		                            </div>
		                            <div class="select__color">
		                                <h2>Select color</h2>
		                                <ul class="color__list">
		                                    <li class="red"><a title="Red" href="#">Red</a></li>
		                                    <li class="gold"><a title="Gold" href="#">Gold</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                    <li class="orange"><a title="Orange" href="#">Orange</a></li>
		                                </ul>
		                            </div>
		                            <div class="select__size">
		                                <h2>Select size</h2>
		                                <ul class="color__list">
		                                    <li class="l__size"><a title="L" href="#">L</a></li>
		                                    <li class="m__size"><a title="M" href="#">M</a></li>
		                                    <li class="s__size"><a title="S" href="#">S</a></li>
		                                    <li class="xl__size"><a title="XL" href="#">XL</a></li>
		                                    <li class="xxl__size"><a title="XXL" href="#">XXL</a></li>
		                                </ul>
		                            </div>
		                            <div class="social-sharing">
		                                <div class="widget widget_socialsharing_widget">
		                                    <h3 class="widget-title-modal">Share this product</h3>
		                                    <ul class="social__net social__net--2 d-flex justify-content-start">
		                                        <li class="facebook"><a href="#" class="rss social-icon"><i class="zmdi zmdi-rss"></i></a></li>
		                                        <li class="linkedin"><a href="#" class="linkedin social-icon"><i class="zmdi zmdi-linkedin"></i></a></li>
		                                        <li class="pinterest"><a href="#" class="pinterest social-icon"><i class="zmdi zmdi-pinterest"></i></a></li>
		                                        <li class="tumblr"><a href="#" class="tumblr social-icon"><i class="zmdi zmdi-tumblr"></i></a></li>
		                                    </ul>
		                                </div>
		                            </div>
		                            <div class="addtocart-btn">
		                                <a href="#">Add to cart</a>
		                            </div>
		                        </div><!-- .product-info -->
		                    </div><!-- .modal-product -->
		                </div><!-- .modal-body -->
		            </div><!-- .modal-content -->
		        </div><!-- .modal-dialog -->
		    </div>
		    <!-- END Modal -->
		</div>
		<!-- END QUICKVIEW PRODUCT -->

	</div>
	<!-- //Main wrapper -->
@endsection