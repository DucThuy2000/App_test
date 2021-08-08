@php
    use Harimayco\Menu\Facades\Menu;
    use Harimayco\Menu\Models\MenuItems;
    $menus = MenuItems::all();
@endphp

<header class="header">

    <!-- haeader Mid Start -->
    <div class="haeader-mid-area bg-gren border-bm-1 d-none d-lg-block ">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-4 col-5">
                    <div class="logo-area">
                        <a href="{{ route("page.index") }}">
                            <img src="{{ asset("picture/logo.png") }}" alt=""></a>
                    </div>
                </div>

                <div class="col-lg-6">
                    <div class="search-box-wrapper">
                        <div class="search-box-inner-wrap">
                            <form class="search-box-inner" method="GET" action="{{ route("shop.searchBrand") }}">
                                <div class="search-field-wrap">
                                    <input type="text" class="search-field search-brand" placeholder="Tìm kiếm thương hiệu..." name="keyword">

                                    <div class="search-btn">
                                        <button class="btn-confirm"><i class="icon-magnifier"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3">
                    <div class="right-blok-box text-white d-flex">

                        <div class="user-wrap">
                            <a href="{{ route("wishList.showWishList") }}">
                                <span class="cart-total" id="count-wishlist">@if(!empty($wishlist)){{ count($wishlist) }} @else 0 @endif</span>
                                <i class="icon-heart"></i>
                            </a>
                        </div>

                        <div class="shopping-cart-wrap">
                            <a href="{{ route("cart.showCart") }}">
                                <i class="icon-basket-loaded"></i>
                                <span class="cart-total count-carts">@if(!empty($carts)){{ count(@$carts) }} @else 0 @endif</span>
                            </a>
                        </div>

                        <div class="user-home ml-2">
                            @php
                                if(\Illuminate\Support\Facades\Auth::check()){
                                    $route = route("user_profile.showAccountDetail");
                                }
                                else{
                                    $route = route("auth.login");
                                }
                            @endphp
                            <a href="{{@$route}}">
                                <i class="icon-user"></i>
                            </a>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="user-logout ml-2">
                                <a href="{{ route("auth.logout") }}">
                                    <i class="icon-logout"></i>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- haeader Mid End -->

    <!-- haeader bottom Start -->
    <div class="haeader-bottom-area bg-gren header-sticky">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-12 d-none d-lg-block">
                    <div class="main-menu-area white_text">
                        <!--  Start Mainmenu Nav-->
                        <nav class="main-navigation text-center">
                            <ul>
                                @foreach($menus as $menu)
                                    @if($menu -> parent != 0)
                                        <li class="active"><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                            <ul class="sub-menu">
                                                <li><a href="index.html">Home Page 1</a></li>
                                                <li><a href="https://demo.hasthemes.com/ruiz-preview/ruiz/index-2.html">Home Page 2</a></li>
                                            </ul>
                                        </li>
                                    @else
                                        <li><a href="{{ $menu -> link }}"> {{ $menu -> label }}</a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>

                    </div>
                </div>

                <div class="col-5 col-md-6 d-block d-lg-none">
                    <div class="logo">
                        <a href="{{ route("page.index") }}">
                            <img src="{{ asset("picture/logo.png") }}" alt="">
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6 col-7 d-block d-lg-none">
                    <div class="right-blok-box text-white d-flex">

                        <div class="user-wrap">
                            <a href="{{ route("wishList.showWishList") }}">
                                <span class="cart-total" id="count-wishlist">@if(!empty($wishlist)){{ count($wishlist) }} @else 0 @endif</span>
                                <i class="icon-heart"></i>
                            </a>
                        </div>

                        <div class="shopping-cart-wrap">
                            <a href="{{ route("cart.showCart") }}">
                                <i class="icon-basket-loaded"></i>
                                <span class="cart-total count-carts">@if(!empty($carts)){{ count(@$carts) }} @else 0 @endif</span>
                            </a>
                        </div>

                        <div class="user-home ml-2">
                            @php
                                if(\Illuminate\Support\Facades\Auth::check()){
                                    $route = route("user_profile.showAccountDetail");
                                }
                                else{
                                    $route = route("auth.login");
                                }
                            @endphp
                            <a href="{{@$route}}">
                                <i class="icon-user"></i>
                            </a>
                        </div>

                        @if(\Illuminate\Support\Facades\Auth::check())
                            <div class="user-logout ml-2">
                                <a href="{{ route("auth.logout") }}">
                                    <i class="icon-logout"></i>
                                </a>
                            </div>
                        @endif

                        <div class="mobile-menu-btn d-block d-lg-none">
                            <div class="off-canvas-btn">
                                <a href="#"><img src="https://demo.hasthemes.com/ruiz-preview/ruiz/assets/images/icon/bg-menu.png" alt=""></a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <!-- haeader bottom End -->

    <!-- off-canvas menu start -->
    <aside class="off-canvas-wrapper">
        <div class="off-canvas-overlay"></div>
        <div class="off-canvas-inner-content">
            <div class="btn-close-off-canvas">
                <i class="fa fa-times"></i>
            </div>

            <div class="off-canvas-inner">

                <div class="search-box-offcanvas">
                    <form class="search-box-inner" method="GET" action="{{ route("shop.searchBrand") }}">
                        <input type="text" placeholder="Search brand..." name="keyword">
                        <button class="search-btn"><i class="icon-magnifier"></i></button>
                    </form>
                </div>

                <!-- mobile menu start -->
                <div class="mobile-navigation">

                    <!-- mobile menu navigation start -->
                    <nav>
                        <ul class="mobile-menu">
                            @foreach($menus as $menu)
                                @if($menu -> parent != 0)
                                    <li class="active"><a href="index.html">Home <i class="fa fa-angle-down"></i></a>
                                        <ul class="sub-menu">
                                            <li><a href="index.html">Home Page 1</a></li>
                                            <li><a href="https://demo.hasthemes.com/ruiz-preview/ruiz/index-2.html">Home Page 2</a></li>
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{ $menu -> link }}"> {{ $menu -> label }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </nav>
                    <!-- mobile menu navigation end -->
                </div>
                <!-- mobile menu end -->

            </div>
        </div>
    </aside>
    <!-- off-canvas menu end -->

</header>
