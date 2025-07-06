<!-- add-to-cart-modal -->
<div class="mini-cart-area">
    <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRightLabel">
        <div class="offcanvas-header">
            <h5 id="offcanvasRightLabel">Shopping cart</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div class="mini-cart-products">
                @forelse ($cartData as $item)
                    <div class="mini-product">
                        <div class="row gx-3">
                            <div class="col-8">
                                <div class="mini-product-details">
                                    <h4 class="product-title">
                                        <a href="{{ route('product-details', $item->attributes->slug) }}">{{$item->name}}</a>
                                    </h4>
                                    <span class="cart-product-info">
                                        <span class="cart-product-qty">{{ $item->quantity }}</span>× <span>$</span> <span>{{ $item->price }}</span>
                                    </span>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="product-image-container">
                                    <a href="{{ route('product-details', $item->attributes->slug) }}">
                                        <img class="img-fluid" src="{{asset($item->attributes->product_image)}}" alt="{{ $item->name }}" title="{{ $item->name }}">
                                    </a>
                                    <a data-row-id="{{$item->id}}" href="#" class="btn-remove cart-item-remove" title="Remove Product"><span>×</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="mini-product">
                        <div class="row gx-3">
                            <div class="col-12">
                                <div class="mini-product-details">
                                    <h4 class="product-title text-center">
                                        <span>No item in the cart</span>
                                    </h4>               
                                </div>
                            </div>
                        </div>
                    </div>
                @endforelse
                <div id="no-mini-product"></div>
            </div>
        </div>
        <div class="mini-cart-info-sticky">
            <div class="mini-cart-info-wrap">
                {{-- <div class="discount-action">
                    <div class="discount">
                        <span>Discount:</span><span>10%</span>
                    </div>
                    <div class="discount">
                        <span>Subtotal:</span><span>${{$cartSubtotal}}</span>
                    </div>
                </div> --}}
                <div class="mini-cart-total">
                    <span>Total:</span>
                    <span class="cart-total-price">$ <span class="cart-subtotal">{{$cartSubtotal}}</span></span>
                </div>
                <div class="mini-cart-action">
                    <a href="{{route('shopping.cart')}}" class="btn view-cart-btn">View Cart</a>
                    <a href="{{route('checkout')}}" class="btn checkout-cart-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
