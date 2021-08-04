@extends("enduser.layout")
@section("head_meta")
    @include("enduser.meta", [
    "title" => "Danh sách yêu thích",
    "url" => Request::url(),
    ])
@stop
@section("front_content")
    <!-- breadcrumb-area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @include("enduser.components.breadcrumb", ["currentPage" => "Danh Sách Yêu Thích"])
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb-area end -->


    <!-- main-content-wrap start -->
    <div class="main-content-wrap section-ptb">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    @if(!empty($wishlist))
                    @include("enduser.components.wishlist")
                    @else
                    <div class="col-lg-12 d-flex justify-content-center">
                        <span class="cart-notification">Danh sách yêu thích trống</span>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- main-content-wrap end -->
@stop
