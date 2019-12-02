
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">My Profile</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My Profile</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->

        <!-- Start Team Area -->
        <section class="wn__team__area pt--40 bg--white">
        	<div class="container">
        		<div class="row d-flex justify-content-center">
                    <!-- Start Single Team -->
                    <div class="col-lg-4">
                        @if(Session::has('userSuccess'))
    
                            <div class="alert alert-success alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('userSuccess')}}
                            </div>
                        @endif
        				<div class="wn__team text-center">
        					<div class="thumb">
                                <i class="fa fa-user-circle fa-5x"></i>
                                {{-- <img src="/storage/images/about/team/1.jpg" alt="Team images"> --}}
        					</div>
        					<div class="content">
                                
        						<h4>{{ Auth::user()->name }}</h4>
        						<p>{{ Auth::user()->email }}</p>
        						{{-- <ul class="team__social__net">
        							<li><a href="#"><i class="icon-social-twitter icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-tumblr icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-facebook icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-linkedin icons"></i></a></li>
        							<li><a href="#"><i class="icon-social-pinterest icons"></i></a></li>
        						</ul> --}}
        					</div>
        				</div>
        			</div>
        			<!-- End Single Team -->
        		</div>
        	</div>
        </section>
        <!-- End Team Area -->
		<!-- Start BEst Seller Area -->
		<section class="wn__product__area brown--color pt--40">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="section__title text-center">
                            <h2 class="title__be--2">Orderd <span class="color--theme">Books</span></h2>
                            
                        </div>
                    </div>
                </div>
                <!-- Start Single Tab Content -->
                <div class="row pt--40 pb--50">
                    <table class="table">
                        <thead>
                            <th>#</th>
                            <th>Books</th>
                            <th>Total Amount</th>
                            <th>Order Status</th>
                            <th>Orderd On</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                                
                                <tr>
                                    <th>{{ $order->id }}</th>
                                    <th>
                                        @php
                                            $comma = "";
                                        @endphp
                                        @foreach ($order->books as $book)
                                            {{ $comma.$book->name }}
                                            @php
                                                $comma = ", ";
                                            @endphp
                                        @endforeach
                                    </th>
                                    <td>USD {{ number_format($order->grand_total, 2) }}</td>
                                    <td>{{$order->status }}</td>
                                    <td>{{ date('d/m/Y h:i:s a', strtotime($order->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('show.cart.details', $order->id)}}" class="btn btn-default btn xs">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($orders) == 0 || $orders == null)
                                <tr>
                                    <td colspan="5" class="text-center">You have not orderd any book yet.</td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                <!-- End Single Tab Content -->
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