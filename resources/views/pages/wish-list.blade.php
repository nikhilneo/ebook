﻿
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Wishlist</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Wishlist</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="wishlist-area section-padding--lg bg__white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="wishlist-content">
                            <form action="#">
                                <div class="wishlist-table wnro__table table-responsive">
                                    <table>
                                        <thead>
                                            <tr>
                                                <th class="">#</th>
                                                <th class="product-thumbnail"></th>
                                                <th class="product-name"><span class="nobr">Product Name</span></th>
                                                <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                                <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                                <th class="product-add-to-cart"></th>
                                                <th class="product-remove"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php
                                                $count = 0;
                                            @endphp
                                            @foreach ($wishlists as $wish)
                                                
                                            <tr>
                                                <td class="product-remove">
                                                        &nbsp; &nbsp; &nbsp; &nbsp;
                                                        {{ ++$count }}
                                                </td>
                                                <td class="product-thumbnail"><a href="#"><img src="/storage/images/product/sm-3/1.jpg" alt=""></a></td>
                                                <td class="product-name">
                                                    <a href="#">
                                                        {{$wish->book->name}}
                                                    </a>
                                                </td>
                                                <td class="product-price">
                                                    <span class="amount">
                                                        {{number_format($wish->book->price, 2)}}
                                                    </span>
                                                </td>
                                                <td class="product-stock-status">
                                                    <span class="wishlist-in-stock">
                                                        {{($wish->book->quantity > 0 )?  "In ": "Out Of "}}Stock
                                                    </span>
                                                </td>
                                                <td class="product-add-to-cart">
                                                    @if ($wish->book->quantity > 0)
                                                    <a href="#"> Move to Cart</a>
                                                    @endif
                                                </td>
                                                <td class="product-remove">
                                                    <a href="#" class="text-danger">
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @if (count($wishlists) < 0)
                                                
                                            <tr>
                                                <td colspan="7">
                                                    <p class="lead text-center"> No Data Found. Please add some books in the wishlist.</p>
                                                </td>
                                            </tr>
                                            @endif

                                        </tbody>
                                    </table>
                                </div>  
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- cart-main-area end --> 
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