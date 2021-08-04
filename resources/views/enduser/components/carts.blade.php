<form action="#" class="cart-table" id="cart-table" data-url="{{ route("cart.deleteProduct") }}">
    <div class="table-content table-responsive" data-url="{{ route("cart.updateCart") }}">
        <table class="table">
            <thead>
            <tr>
                <th class="plantmore-product-thumbnail">Ảnh</th>
                <th class="cart-product-name">Tên</th>
                <th class="plantmore-product-price">Giá</th>
                <th class="plantmore-product-quantity">Số lượng</th>
                <th class="plantmore-product-subtotal">Tổng tiền</th>
                <th class="plantmore-product-remove">Xóa</th>
            </tr>
            </thead>
            <tbody>
            @foreach($carts as $item)
                @php
                    $totalPrice = $item['subtotal'] * $item['quantity'];
                    $cartTotal = @$cartTotal + $totalPrice;
                @endphp
                <tr class="cart-detail">
                    <input type="hidden" name="id" class="id-product" value="{{ @$item["id"] }}">
                    <td class="plantmore-product-thumbnail">
                        <a href="{{ route("shop.productDetail", ["slug" => @$item['slug']]) }}">
                            <img src="{{ \App\Helper\Functions::getImage("product", @$item['picture'], "thumbnail") }}" alt="{{ $item['name'] }}">
                        </a>
                    </td>
                    <td class="plantmore-product-name">
                        <a href="{{ route("shop.productDetail", ["slug" => @$item['slug']]) }}">{{ @$item['name'] }}</a>
                    </td>
                    <td class="plantmore-product-price">
                        <span class="amount subtotal-text">${{ number_format(@$item['subtotal']) }}</span>
                    </td>
                    <td class="plantmore-product-quantity">
                        <input value="{{ @$item['quantity'] }}" type="number" class="quantity-input" min="0">
                    </td>
                    <td class="product-subtotal">
                        <span class="amount">${{ number_format(@$totalPrice) }}</span>
                    </td>
                    <td class="plantmore-product-remove">
                        <a class="delete-cart" href="" data-id="{{ @$item['id'] }}">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-8">
            <div class="coupon-all">
                <div class="coupon2">
                    <a href="#" class="update-btn">Cập nhật giỏ hàng</a>
                    <a href="{{ route("shop.index") }}" class=" continue-btn">Tiếp tục mua hàng</a>
                </div>

            </div>
        </div>
        <div class="col-md-4 ml-auto">
            <div class="cart-page-total">
                <h2>Đơn hàng</h2>

                <ul>
                    <li>Đơn hàng <span>${{ number_format(@$cartTotal) }}</span></li>
                    <li>Giảm giá <span>@if(isset($coupon)) -${{ $coupon -> percentage }} @else - $0 @endif</span></li>
                    <li>Tạm tính <span>${{ number_format(@$cartTotal - @$coupon -> percentage) }}</span></li>
                </ul>

                <a href="{{ route("checkout.checkLoginToCheckOut") }}" class="proceed-checkout-btn">Thanh toán</a>
            </div>
        </div>
    </div>
</form>

<style>
    .update-btn{
        margin-right: 10px;
        padding: 9px 15px;
        background: #000000;
        color: #fff;
    }

    .update-btn:hover{
        background: #c89979 !important;
        color: #fff !important;
    }
</style>
