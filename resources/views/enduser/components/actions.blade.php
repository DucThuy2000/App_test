<div class="action-links">
    <a href="#" class="cart-btn" title="Add to Cart" data-url="{{ route("cart.addToCart", ["id" => $id_cart]) }}">
        <i class="icon-basket-loaded"></i>
    </a>
    <a href="" class="wishlist-btn" title="Add to Wish List" data-url="{{ route("wishList.addWishList", ["id" => $id_cart]) }}">
        <i class="icon-heart"></i>
    </a>
</div>
