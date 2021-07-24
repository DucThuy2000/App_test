<!doctype html>
<html lang="en" class="no-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Clock World</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--- META FOR FACEBOOK ---->
    <meta content="Clock" property="og:site_name"/>
    <meta property="og:type" content="website">
    <meta property="og:url" itemprop="url" content="http://demo.clock.com/"/>
    <meta property="og:image" itemprop="thumbnailUrl" content="https://anyclass.vn/images/config/msyKLtGrer.png"/>
    <meta content="Clock" itemprop="headline" property="og:title"/>
    <meta content="Clock" itemprop="description" property="og:description"/>
    <!--- END FOR FACEBOOK ---->
    <link rel="shortcut icon" href="https://anyclass.vn/images/config/saCzbSvQrl.png" />

    <!-- CSS
	============================================ -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

    <!-- Plugins CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css">
    <link rel="stylesheet" href="https://demo.hasthemes.com/ruiz-preview/ruiz/assets/css/plugins/animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/themes/dark.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- Vendor & Plugins CSS (Please remove the comment from below vendor.min.css & plugins.min.css for better website load performance and remove css files from avobe) -->
    <!--
    <script src="assets/js/vendor/vendor.min.js"></script>
    <script src="assets/js/plugins/plugins.min.js"></script>
    -->

    <!-- Main Style CSS (Please use minify version for better website load performance) -->
    <link rel="stylesheet" href="{{ asset("enduser/dist/css/style.css") }}">
    <!--<link rel="stylesheet" href="assets/css/style.min.css">-->

</head>

<body>

<div class="main-wrapper">

    <!--  Header Start -->
    @include("enduser.components.header")
    <!--  Header Start -->
    <div class="overlay-snipper">
        <div class="snipper-image" role="alert">
            <img src="{{ asset('/picture/done.gif') }}">
        </div>
    </div>

    <div class="sweet-alert">
        <div class="alert alert-info insert-alert" role="alert">
            <i class="fas fa-check-circle"></i>
            Sản phẩm được thêm thành công
        </div>

        <div class="alert alert-success update-alert" role="alert">
            <i class="fas fa-check-circle"></i>
            Cập nhật thành công
        </div>

        <div class="alert alert-danger coupon-alert" role="alert">
            <i class="fas fa-times"></i>
            Mã không hợp lệ
        </div>
    </div>
    @yield("front_content")

    <!-- footer Start -->
    @include("enduser.components.footer")
    <!-- footer End -->
</div>

<!-- JS
============================================ -->

<!-- Modernizer JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
<!-- jQuery JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
<script src="https://demo.hasthemes.com/ruiz-preview/ruiz/assets/js/vendor/bootstrap.min.js"></script>

<!-- Plugins JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/countdown/2.6.0/countdown.min.js"></script>
<script src="https://demo.hasthemes.com/ruiz-preview/ruiz/assets/js/plugins/image-zoom.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/scrollup/2.4.1/jquery.scrollUp.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://demo.hasthemes.com/ruiz-preview/ruiz/assets/js/plugins/ajax-contact.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr/dist/l10n/vn.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.min.js"></script>

<!-- Vendor & Plugins JS (Please remove the comment from below vendor.min.js & plugins.min.js for better website load performance and remove js files from avobe) -->
<!--
<script src="assets/js/vendor/vendor.min.js"></script>
<script src="assets/js/plugins/plugins.min.js"></script>
-->

<!-- Main JS -->
<script src="{{ asset("enduser/dist/js/main-script.js") }}"></script>
<script src="{{ asset("enduser/dist/js/custom.js") }}"></script>
@php
    if( isset($_GET['minPrice']) && isset($_GET['maxPrice'])){
        $minPrice = $_GET['minPrice'];
        $maxPrice = $_GET['maxPrice'];
    }
    else{
        $minPrice = 500;
        $maxPrice = 50000;
    }
@endphp
<script>
    $(document).ready(function (){
        /*----------
            price-slider active -> Model: Product
        -------------------------------*/
        {{--var maxPrice = {{ @$maxPrice }};--}}
        {{--console.log(maxPrice);--}}

        $( "#price-slider" ).slider({
            orientation: "horizontal",
            range: true,
            min: 0,
            max: {{ @$maxValue }} + 15000,
            values: [ {{ $minPrice }}, {{ $maxPrice }} ],
            slide: function( event, ui ) {
                $( "#amount" ).val('$' + ui.values[ 0 ] + '- $' + ui.values[ 1 ] );
                $( "#min-price" ).val(ui.values[ 0 ] );
                $( "#max-price" ).val(ui.values[ 1 ] );
            }
        });

        $( "#amount" ).val('$' + $( "#price-slider" ).slider( "values", 0 ) + ' - $' + $( "#price-slider" ).slider( "values", 1 ));
        $( "#min-price" ).val($( "#price-slider" ).slider( "values", 0 ));
        $( "#max-price" ).val($( "#price-slider" ).slider( "values", 1 ));
    })
</script>

</body>


<!-- Mirrored from demo.hasthemes.com/ruiz-preview/ruiz/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 08 Jun 2021 04:53:27 GMT -->
</html>
