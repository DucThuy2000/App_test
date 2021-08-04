<div class="shop-sidebar mb-30">
    <h4 class="title">Lọc theo giá</h4>
    <!-- filter-price-content start -->
    <div class="filter-price-content">
        <form action="{{ @$route }}" method="GET">
            @if(Request::url() == "http://demo.clock.com/cua-hang/tim-kiem")
                <input type="hidden" value="{{ $keyword }}" name="keyword">
            @endif
            <div id="price-slider" class="price-slider"></div>
            <div class="filter-price-wapper">
                <input type="submit" class="add-to-cart-button" value="FILTER">
                <div class="filter-price-cont">
                    <span>Price:</span>
                    <div class="d-flex">
                        <input type="text" id="amount" style="border: none; outline: none">
                        <input type="hidden" name="minPrice" id="min-price">
                        <input type="hidden" name="maxPrice" id="max-price">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- filter-price-content end -->
</div>
