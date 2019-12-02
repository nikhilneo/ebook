
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--6">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">My Account</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">My Account</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
		<!-- Start My Account Area -->
		<section class="my_account_area pt--80 pb--55 bg--white">
			<div class="container">
				<div class="row">
					{{-- Login Form is here --}}
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Login</h3>
							<form method="POST" action="{{ url('login') }}">
								{{ csrf_field() }}
								<div class="account__form">
									<div class="input__box{{ $errors->has('email') ? ' text-danger' : '' }}">
										<label>email address <span>*</span></label>
										<input type="email" name="email" required="required">
										@if ($errors->has('email'))
											<span class="help-block">
												<strong>{{ $errors->first('email') }}</strong>
											</span>
										@endif
									</div>
									<div class="input__box{{ $errors->has('password') ? ' text-danger' : '' }}">
										<label>Password<span>*</span></label>
										<input type="password" name="password" required="required">
										@if ($errors->has('password'))
											<span class="help-block">
												<strong>{{ $errors->first('password') }}</strong>
											</span>
										@endif
									</div>
									<div class="form__btn">
										<input id="rememberme" name="remember" {{ old('remember') ? 'checked' : '' }} value="forever" type="checkbox">
											<label>
												<span>Remember me</span>
											</label>
									</div>
									<div class="form__btn">
										<button>Login</button>
										{{-- <label class="label-for-checkbox">
											<input id="rememberme" class="input-checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} value="forever" type="checkbox">
											<span>Remember me</span>
										</label> --}}
									</div>
									<a class="forget_pass" href="#">Lost your password?</a>
								</div>
							</form>
						</div>
					</div>

					{{-- Registration Form is here --}}
					<div class="col-lg-6 col-12">
						<div class="my__account__wrapper">
							<h3 class="account__title">Register</h3>
							<form  method="POST" action="{{ url('register') }}">
								{{ csrf_field() }}
								<div class="account__form">
									<div class="input__box{{ $errors->has('name') ? ' text-danger' : '' }}">
										<label>Name <span>*</span></label>
										<input type="text" name="name" required="required">
										@if ($errors->has('name'))
											<span class="help-block">
												<strong>{{ $errors->first('name') }}</strong>
											</span>
										@endif
									</div>
									<div class="input__box{{ $errors->has('reg_email') ? ' text-danger' : '' }}">
										<label>Email address <span>*</span></label>
										<input type="email" name="reg_email" required="required">
										@if ($errors->has('reg_email'))
											<span class="help-block">
												<strong>{{ $errors->first('reg_email') }}</strong>
											</span>
										@endif
									</div>
									<div class="input__box{{ $errors->has('reg_password') ? ' text-danger' : '' }}">
										<label>Password<span>*</span></label>
										<input type="password" name="reg_password" required="required">
										@if ($errors->has('reg_password'))
											<span class="help-block">
												<strong>{{ $errors->first('reg_password') }}</strong>
											</span>
										@endif
									</div>
									<div class="input__box{{ $errors->has('reg_password_confirmation') ? ' text-danger' : '' }}">
										<label>Confirm Password<span>*</span></label>
										<input type="password" name="reg_password_confirmation" required="required">
									</div>
									<div class="form__btn">
										<button>Register</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</section>
		<!-- End My Account Area -->
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
									<p>Copyright <i class="fa fa-copyright"></i> <a href="https://freethemescloud.com/">Free themes Cloud.</a> All Rights Reserved</p>
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