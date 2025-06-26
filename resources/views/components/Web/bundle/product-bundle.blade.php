<div class="bundle-d-cart-plus-minus-and-list-wrap">
    @foreach ($bundleProducts as $bundleProduct)    
        <div class="bundle-details-cart-plus-minus-and-pro-list">
            <div class="sd-cart-wrap">
                <form action="#">
                    <div class="quickview-cart-plus-minus">
                        <input type="text" value="1">
                        <div class="dec qtybutton">-</div>
                        <div class="inc qtybutton">+</div>
                    <div class="dec qtybutton">-</div><div class="inc qtybutton">+</div></div>
                </form>
            </div>
            <div class="bundle-d-product-img-text-wrap">
                <a href="{{ route('product-details', $bundleProduct->slug) }}" class="bundle-d-product-img-text">
                    <div class="dundle-d-product-img">
                        <img class="img-fluid" src="{{ asset($bundleProduct->firstImage->image_url) }}" alt="{{ $bundleProduct->product_name }}" title="{{ $bundleProduct->product_name }}">
                    </div>
                    <div class="dundle-d-product-list-text">
                        <h4>{{$bundleProduct->product_name}}</h4>
                    </div>
                </a>
            </div>
            <div class="bundle-d-price">
                <span class="old-price">${{$bundleProduct->regular_price}}</span>
                <span class="new-price">${{$bundleProduct->sale_price}}</span>
            </div>
        </div>
    @endforeach
</div>