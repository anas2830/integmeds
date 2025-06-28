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
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Tranquil Plus</a>
                                </h4>
                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $440
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Digest & Probiotics</a>
                                </h4>

                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $225
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img1.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Organic Coconut Oil Centrifugal & Medicinal</a>
                                </h4>

                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $225
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Tranquil Plus</a>
                                </h4>
                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $440
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Digest & Probiotics</a>
                                </h4>

                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $225
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img1.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mini-product">
                    <div class="row gx-3">
                        <div class="col-8">
                            <div class="mini-product-details">
                                <h4 class="product-title">
                                    <a href="#">Organic Coconut Oil Centrifugal & Medicinal</a>
                                </h4>

                                <span class="cart-product-info">
                                    <span class="cart-product-qty">1</span>× $225
                                </span>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="product-image-container">
                                <a href="#">
                                    <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="Product" title="Product">
                                </a>
                                <a href="#" class="btn-remove" title="Remove Product"><span>×</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mini-cart-info-sticky">
            <div class="mini-cart-info-wrap">
                <div class="discount-action">
                    <div class="discount">
                        <span>Discount:</span><span>10%</span>
                    </div>
                    <div class="discount">
                        <span>Subtotal:</span><span>$100</span>
                    </div>
                </div>
                <div class="mini-cart-total">
                    <span>Total:</span>
                    <span class="cart-total-price">$134.00</span>
                </div>
                <div class="mini-cart-action">
                    <a href="{{route('shopping.cart')}}" class="btn view-cart-btn">View Cart</a>
                    <a href="{{route('checkout')}}" class="btn checkout-cart-btn">Checkout</a>
                </div>
            </div>
        </div>
    </div>
</div>
