<div class="bundle-d-cart-plus-minus-and-list-wrap">
    <form action="{{route('bundle.cart.submit')}}" method="post">
        @csrf
        @foreach ($bundleProducts as $bundleProduct)
            <div class="bundle-main-section">
                <div class="bundle-details-cart-plus-minus-and-pro-list">
                    <div class="sd-cart-wrap">
                        <div class="quickview-cart-plus-minus">
                            <!-- Hidden product ID -->
                            <input type="hidden" name="product_ids[]" value="{{ $bundleProduct->id }}">

                            <!-- Quantity input (no extra styling added) -->
                            <input type="text"
                                name="quantity[]"
                                value="{{ old('quantities.' . $bundleProduct->id, 1) }}"
                                min="1"
                                class="qtybutton-input product-qty">
                                {{config('app.brand_name')}}
                            <div class="dec qtybutton">-</div>
                            <div class="inc qtybutton">+</div>
                        </div>
                    </div>

                    <div class="bundle-d-product-img-text-wrap">
                        <a href="{{ route('product-details', $bundleProduct->slug) }}" class="bundle-d-product-img-text">
                            <div class="dundle-d-product-img">
                                <img class="img-fluid" src="{{ asset($bundleProduct->firstImage->image_url) }}" alt="{{ $bundleProduct->product_name }}">
                            </div>
                            <div class="dundle-d-product-list-text">
                                <h4>{{ $bundleProduct->product_name }}</h4>
                            </div>
                        </a>
                    </div>

                    <div class="bundle-d-price">
                        <span class="old-price">{{config('app.currency_symbol')}}{{ $bundleProduct->regular_price }}</span>
                        <span class="new-price">{{config('app.currency_symbol')}}{{ $bundleProduct->sale_price }}</span>
                    </div>
                </div>

                <!-- Error Message Outside the Main Product Block -->
                @error("quantities." . $bundleProduct->id)
                    <div class="mt-2 text-center">
                        <small class="text-danger d-block">{{ $message }}</small>
                    </div>
                @enderror
            </div>
        @endforeach
        <div class="inner-shop-perched-info">
            <button type="submit" class="cart-btn">Add to Cart</button>
        </div>
    </form>
</div>