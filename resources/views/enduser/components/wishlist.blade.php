<form action="#" class="cart-table wishlist-table" data-url="{{ route("wishList.deleteWishProduct") }}">
    <div class=" table-content table-responsive">
        <table class="table">
            <thead>
            <tr>
                <th class="plantmore-product-thumbnail">Images</th>
                <th class="cart-product-name" style="width: 340px">Product</th>
                <th class="plantmore-product-price">Unit Price</th>
                <th class="plantmore-product-add-cart">Add to cart</th>
                <th class="plantmore-product-remove">Remove</th>
            </tr>
            </thead>
            <tbody>
            @foreach($wishlist as $item)
                <tr>
                    <td class="plantmore-product-thumbnail">
                        <a href="{{ route("shop.productDetail", ["slug" => @$item['slug']]) }}">
                            <img src="{{ \App\Helper\Functions::getImage("product", @$item['picture'], "thumbnail") }}" alt="">
                        </a>
                    </td>
                    <td class="plantmore-product-name">
                        <a href="{{ route("shop.productDetail", ["slug" => @$item['slug']]) }}">{{ @$item['name'] }}</a>
                    </td>
                    <td class="plantmore-product-price"><span class="amount">${{ number_format(@$item['price']) }}</span></td>
                    <td class="plantmore-product-add-cart">
                        <a href="" class="cart-btn" data-url="{{ route("cart.addToCart", ["id" => @$item['id']]) }}">add to cart</a>
                    </td>
                    <td class="plantmore-product-remove">
                        <a href="#" class="delete-wishlist" data-id="{{ @$item['id'] }}">
                            <i class="fa fa-times"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</form>
