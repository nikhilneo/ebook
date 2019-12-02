
@extends('main')
@section('content')
        <!-- Start Bradcaump area -->
        <div class="ht__bradcaump__area bg-image--3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="bradcaump__inner text-center">
                        	<h2 class="bradcaump-title">Cart Detail</h2>
                            <nav class="bradcaump-content">
                              <a class="breadcrumb_item" href="{{ url('/') }}">Home</a>
                              <span class="brd-separetor">/</span>
                              <span class="breadcrumb_item active">Cart Detail</span>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Bradcaump area -->
        <!-- cart-main-area start -->
        <div class="cart-main-area section-padding--lg bg--white">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 ol-lg-12">
                        @if(Session::has('userSuccess'))
    
                            <div class="alert alert-success alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('userSuccess')}}
                            </div>
                        @elseif(Session::has('userError'))
                            <div class="alert alert-danger alert-dismissible text-center">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                {{ Session::get('userError')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section__title text-center">
                                    <h2 class="title__be--2">Cart <span class="color--theme">Detail</span></h2>
                                    
                                </div>
                            </div>
                        </div>
                        {{-- <form action="#">                --}}
                            <div class="table-content wnro__table table-responsive">
                                <table>
                                    <thead>
                                        <tr class="title-top">
                                            <th class="product-thumbnail">Image</th>
                                            <th class="product-name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product-quantity">Quantity</th>
                                            <th class="product-subtotal">Total</th>
                                            <th class="product-remove">Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(Session::has('cartData'))
                                            @php
                                                $cart = Session::get('cartData');
                                            @endphp
                                            @foreach ($cart as $item)
                                                
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#"><img src="{{url('storage/images/product/sm-3/1.jpg')}}" alt="product img"></a></td>
                                                    <td class="product-name"><a href="#">{{ $item['name'] }}</a></td>
                                                    <td class="product-price"><span class="amount">USD {{ $item['price'] }}<span id="book_price_{{ $item['id'] }}" style="display: none;">{{ $item['price'] }}</span></span></td>
                                                    <td class="product-quantity"><input type="number" id="quantity_{{ $item['id'] }}" onchange="calculateTotal({{$item['id']}})" value="{{ $item['quantity'] }}" min="1" max="{{ $item['total_quantity'] }}"></td>
                                                    <td class="product-subtotal">
                                                        USD <span id="cart_total_amount_{{ $item['id'] }}"> {{ $item['grand_total'] }}</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        {{-- <a href="#">X</a> --}}
                                                        <a href="" class=""
                                                            onclick="event.preventDefault();
                                                            document.getElementById('delete-form-{{$item['id']}}').submit();">
                                                            <i class="fa fa-trash text-danger"></i>
                                                            <form id="delete-form-{{$item['id']}}" action="{{route('cart.remove', $item['id'])}}" method="post" style="display:none;">
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <input type="submit" style="display: none;">
                                                            </form>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @elseif(count($cart) > 0)
                                        @php
                                            $grand_total = 0;
                                        @endphp
                                            @foreach ($cart as $item)
                                                @php
                                                    $grand_total += $item['grand_total'];
                                                @endphp
                                                <tr>
                                                    <td class="product-thumbnail"><a href="#"><img src="{{url('storage/images/product/sm-3/1.jpg')}}" alt="product img"></a></td>
                                                    <td class="product-name"><a href="#">{{ $item['book_name'] }}</a></td>
                                                    <td class="product-price"><span class="amount">USD {{ $item['price'] }}<span id="book_price_{{ $item['book_id'] }}" style="display: none;">{{ $item['price'] }}</span></span></td>
                                                    <td class="product-quantity"><input type="number" id="quantity_{{ $item['book_id'] }}" onchange="calculateTotal({{$item['book_id']}})" value="{{ $item['quantity'] }}" min="1" max="{{$item->book->quantity}}"></td>
                                                    <td class="product-subtotal">
                                                        USD <span id="cart_total_amount_{{ $item['book_id'] }}"> {{ $item['grand_total'] }}</span>
                                                    </td>
                                                    <td class="product-remove">
                                                        {{-- <a href="#">X</a> --}}
                                                        <a href="" class=""
                                                            onclick="event.preventDefault();
                                                            document.getElementById('delete-form-{{$item['book_id']}}').submit();">
                                                            <i class="fa fa-trash text-danger"></i>
                                                            <form id="delete-form-{{$item['book_id']}}" action="{{route('cart.remove', $item['book_id'])}}" method="post" style="display:none;">
                                                                {{method_field('DELETE')}}
                                                                {{csrf_field()}}
                                                                <input type="submit" style="display: none;">
                                                            </form>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else 
                                            <tr>
                                                <td colspan="6" class="text-center">There is no data in cart.</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        {{-- </form>  --}}
                    </div>
                </div>
                @if(Session::has('cartData'))
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>GST</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>USD <span class="cart_total_amount">{{ Session::get('cartTotal') }}</span></li>
                                    <li>USD 0.00</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>USD <span class="cart_total_amount">{{ Session::get('cartTotal')}}</span></span>
                            </div>
                            <div class="cartbox__btn">
                                <ul class="cart__btn__list">
                                    <li class="text-center"><a href="{{route('paypal.checkout')}}">Check Out With PayPal</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @elseif(count($cart) > 0)
                <div class="row">
                    <div class="col-lg-6 offset-lg-6">
                        <div class="cartbox__total__area">
                            <div class="cartbox-total d-flex justify-content-between">
                                <ul class="cart__total__list">
                                    <li>Cart total</li>
                                    <li>GST</li>
                                </ul>
                                <ul class="cart__total__tk">
                                    <li>USD <span class="cart_total_amount">{{ $grand_total }}</span></li>
                                    <li>USD 0.00</li>
                                </ul>
                            </div>
                            <div class="cart__total__amount">
                                <span>Grand Total</span>
                                <span>USD <span class="cart_total_amount">{{ $grand_total }}</span></span>
                            </div>
                            <div class="cartbox__btn">
                                <ul class="cart__btn__list">
                                    <li class="text-center"><a href="{{route('paypal.checkout')}}">Check Out With PayPal</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                @endif
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

@section('scripts')
    <script>
        function calculateTotal(id){
            
            
            var url = "{{route('cart.update')}}";
            //var url = "{{route('cart.update' , ':id')}}";
            //url = url.replace(':id', id);
            $.ajax({
               type:'POST',
               url: url,
               data: {
                   "book_id": id,
                   "_token": "{{ csrf_token() }}",
                   "quantity": $('#quantity_'+id).val()
               },
               success:function(data) {
                    // Make Cahnges in the page after success
                    var old_total = $('#cart_total_amount_'+id).text();
                    var old_grand_total = $('.cart_total_amount').last().text();
                    
                    var new_total = (
                        parseInt($('#quantity_'+id).val()) * parseInt($('#book_price_'+id).text())
                    ).toFixed(2);
                    var new_grand_total = (
                        ((parseInt(new_total)) + (parseInt(old_grand_total))) - (parseInt(old_total))
                    );
                    $('#cart_total_amount_'+id).text(new_total);

                    $('.cart_total_amount').text((new_grand_total).toFixed(2));
               }
            });
        }
    </script>
@endsection