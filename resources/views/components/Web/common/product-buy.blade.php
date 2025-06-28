@if($product->quantity > 0)
    <div class="sd-cart-wrap">
        <form action="#">
            <div class="quickview-cart-plus-minus">
                <input type="text" value="1" class="qtybutton-input product-qty" name="quantity">
                <div class="dec qtybutton">-</div>
                <div class="inc qtybutton">+</div>
            </div>
        </form>
    </div>
    
    <a href="#" class="cart-btn" id="add-to-cart" data-product-id="{{ $product->id }}">Add to Cart</a>
    @auth
        <a href="#" data-prod-id="{{ $product->id }}" id="wishlist-btn" class="wishlist-btn {{ $alreadyInWishlist ? 'bg-success' : '' }}" title="Wishlist"><i class="fas fa-heart"></i></a>
    @else
        <a href="{{ route('user.login') }}" class="wishlist-btn" title="Wishlist"><i class="fas fa-heart"></i></a>
    @endauth
@else
    <a class="cart-btn sold-out-cart">Out of Stock</a>
@endif