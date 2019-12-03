<!-- Header -->
<header id="wn__header" class="header__area header__absolute sticky__header">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <div class="logo">
                    <a href="{{url('/')}}">
                        <img src="{{url('storage/images/logo/logo.png')}}" alt="logo images">
                    </a>
                </div>
            </div>
            <div class="col-lg-8 d-none d-lg-block">
                <nav class="mainmenu__nav">
                    <ul class="meninmenu d-flex justify-content-start">
                        <li class="drop with--one--item"><a href="{{url('/')}}">Home</a></li>
                        <li class="drop with--one--item"><a href="{{url('/about')}}">About</a></li>
                        {{-- <li class="drop"><a href="#">Shop</a>
                            <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">Shop Layout</li>
                                    <li><a href="{{url('/shop-grid')}}">Shop Grid</a></li>
                                    <li><a href="/single-product">Single Product</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Shop Page</li>
                                    <li><a href="pages/my-account">My Account</a></li>
                                    <li><a href="{{url('/cart')}}">Cart Page</a></li>
                                    <li><a href="/checkout">Checkout Page</a></li>
                                    <li><a href="{{url('/wish-list')}}">Wishlist Page</a></li>
                                    <li><a href="/error404">404 Page</a></li>
                                    <li><a href="/faq">Faq Page</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Bargain Books</li>
                                    <li><a href="{{url('/shop-grid')}}">Bargain Bestsellers</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Activity Kits</a></li>
                                    <li><a href="{{url('/shop-grid')}}">B&N Classics</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Books Under $5</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Bargain Books</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        <li class="drop"><a href="{{url('/shop-grid')}}">Books</a>
                            {{-- <div class="megamenu mega03">
                                <ul class="item item03">
                                    <li class="title">Categories</li>
                                    <li><a href="{{url('/shop-grid')}}">Biography </a></li>
                                    <li><a href="{{url('/shop-grid')}}">Business </a></li>
                                    <li><a href="{{url('/shop-grid')}}">Cookbooks </a></li>
                                    <li><a href="{{url('/shop-grid')}}">Health & Fitness </a></li>
                                    <li><a href="{{url('/shop-grid')}}">History </a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Customer Favourite</li>
                                    <li><a href="{{url('/shop-grid')}}">Mystery</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Religion & Inspiration</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Romance</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Fiction/Fantasy</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Sleeveless</a></li>
                                </ul>
                                <ul class="item item03">
                                    <li class="title">Collections</li>
                                    <li><a href="{{url('/shop-grid')}}">Science </a></li>
                                    <li><a href="{{url('/shop-grid')}}">Fiction/Fantasy</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Self-Improvemen</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Home & Garden</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Humor Books</a></li>
                                </ul>
                            </div> --}}
                        </li>
                        {{-- <li class="drop"><a href="{{url('/shop-grid')}}">Kids</a>
                            <div class="megamenu mega02">
                                <ul class="item item02">
                                    <li class="title">Top Collections</li>
                                    <li><a href="{{url('/shop-grid')}}">American Girl</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Diary Wimpy Kid</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Finding Dory</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Harry Potter</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Land of Stories</a></li>
                                </ul>
                                <ul class="item item02">
                                    <li class="title">More For Kids</li>
                                    <li><a href="{{url('/shop-grid')}}">B&N Educators</a></li>
                                    <li><a href="{{url('/shop-grid')}}">B&N Kids' Club</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Kids' Music</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Toys & Games</a></li>
                                    <li><a href="{{url('/shop-grid')}}">Hoodies</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- <li class="drop"><a href="#">Pages</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    <li><a href="{{url('/about')}}">About Page</a></li>
                                    <li class="label2"><a href="/portfolio">Portfolio</a>
                                        <ul>
                                            <li><a href="/portfolio">Portfolio</a></li>
                                            <li><a href="/portfolio-details">Portfolio Details</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="pages/my-account">My Account</a></li>
                                    <li><a href="{{url('/cart')}}">Cart Page</a></li>
                                    <li><a href="/checkout">Checkout Page</a></li>
                                    <li><a href="{{url('/wish-list')}}">Wishlist Page</a></li>
                                    <li><a href="/error404">404 Page</a></li>
                                    <li><a href="/faq">Faq Page</a></li>
                                    <li><a href="/team">Team Page</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        {{-- <li class="drop"><a href="/blog">Blog</a>
                            <div class="megamenu dropdown">
                                <ul class="item item01">
                                    <li><a href="/blog">Blog Page</a></li>
                                    <li><a href="/blog-details">Blog Details</a></li>
                                </ul>
                            </div>
                        </li> --}}
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-6 col-sm-6 col-6 col-lg-2">
                <ul class="header__sidebar__right d-flex justify-content-end align-items-center">
                    <li class="shop_search"><a class="search__active" href="#"></a></li>
                    <li class="shopcart">
                        <a class="" href="{{ route('cart.show') }}">
                            <span class="product_qun">
                                @if(Auth::check())
                                    @php
                                        $cartCount = 0;
                                    @endphp
                                    @foreach (Auth::user()->carts as $cart)
                                        @if ($cart->status === 'Cart')
                                            
                                            @php
                                                $cartCount++;
                                            @endphp
                                        @endif
                                    @endforeach   
                                    {{ $cartCount}}
                                @elseif(Session::has('cartCount'))
                                    {{ Session::get('cartCount')}}
                                @else 
                                    0
                                @endif
                            </span>
                        </a>
                    </li>
                    @if ( !(Auth::guard('web')->check()) )
                        <li class="setting__bar__icon"><a class="" href="{{url('/my-account')}}"></a></li>
                    @else
                        <li class=""><a class="setting__active text-danger" href="#"><span> {{ str_limit(Auth::user()->name, $limit = 6, $end = '...') }}</span></a>
                            <div class="searchbar__content setting__block">
                                <div class="content-inner">
                                    <div class="switcher-currency">
                                        <strong class="label switcher-label">
                                            
                                            <a href="{{ route('wishlist.index')}}"><i class="fa fa-heart"></i> My Wishlist</a>
                                        </strong>
                                        <strong class="label switcher-label">
                                            
                                            <a href="{{ route('myProfile')}}"><i class="fa fa-user"></i> My Profile</a>
                                        </strong>
                                        <strong class="label switcher-label">
                                            
                                            <a href="{{ route('changePassword')}}"><i class="fa fa-key"></i> Change Password</a>
                                        </strong>
                                        <strong class="label switcher-label">
                                            <a href="{{ url('logout') }}"
                                            onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                                <i class="fa fa-lock"></i> Logout
                                            </a>
                                            
                                            <form id="logout-form" action="{{ url('logout') }}" method="POST" style="display: none;">
                                                {{ csrf_field() }}
                                            </form>
                                        </strong>
                                    </div>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- Start Mobile Menu -->
        <div class="row d-none">
            <div class="col-lg-12 d-none">
                <nav class="mobilemenu__nav">
                    <ul class="meninmenu">
                        <li><a href="{{url('/')}}">Home</a></li>
                        <li><a href="{{url('/about')}}">About Page</a></li>
                        {{-- <li><a href="#">Pages</a>
                            <ul>
                                <li><a href="{{url('/about')}}">About Page</a></li>
                                <li><a href="/portfolio">Portfolio</a>
                                    <ul>
                                        <li><a href="/portfolio">Portfolio</a></li>
                                        <li><a href="/portfolio-details">Portfolio Details</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{url('/my-account')}}">My Account</a></li>
                                <li><a href="{{url('/cart')}}">Cart Page</a></li>
                                <li><a href="/checkout">Checkout Page</a></li>
                                <li><a href="{{url('/wish-list')}}">Wishlist Page</a></li>
                                <li><a href="/error404">404 Page</a></li>
                                <li><a href="/faq">Faq Page</a></li>
                                <li><a href="/team">Team Page</a></li>
                            </ul>
                        </li>
                        <li><a href="{{url('/shop-grid')}}">Shop</a>
                            <ul>
                                <li><a href="{{url('/shop-grid')}}">Shop Grid</a></li>
                                <li><a href="/single-product">Single Product</a></li>
                            </ul>
                        </li>
                        <li><a href="/blog">Blog</a>
                            <ul>
                                <li><a href="/blog">Blog Page</a></li>
                                <li><a href="/blog-details">Blog Details</a></li>
                            </ul>
                        </li> --}}
                        <li><a href="{{url('/shop-grid')}}">Books</a></li>
                        <li><a href="{{url('/contact')}}">Contact</a></li>
                    </ul>
                </nav>
            </div>
        </div>
        <!-- End Mobile Menu -->
        <div class="mobile-menu d-block d-lg-none">
        </div>
        <!-- Mobile Menu -->	
    </div>		
</header>
<!-- //Header -->
<!-- Start Search Popup -->
<div class="brown--color box-search-content search_active block-bg close__top">
    <form id="search_mini_form" class="minisearch" action="#">
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