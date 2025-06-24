@props(['product'])

@php
    $product = (object) $product; // In case array is passed
@endphp

<div class="items">
    <div class="common-product-box">
        <div class="common-product-img">
            <a href="{{ route('product-details', $product->slug ?? '') }}">
                <img class="img-fluid"
                     src="{{ asset($product->firstImage->image_url) }}"
                     alt="{{ $product->product_name ?? '' }}"
                     title="{{ $product->product_name ?? '' }}">
            </a>
        </div>

        <div class="common-products-info-wrap">
            <div class="comm-products-title">
                <h3>
                    <a href="{{ route('product-details', $product->slug ?? '') }}">
                        {{ $product->product_name ?? '' }}
                    </a>
                </h3>
                <p><a href="#">{{ optional($product->firstCategory[0])->name}}</a></p>
            </div>

            <div class="rating">
                <div class="rating-start">
                    <x-Web.common.star-rating :rating="$product->product_reviews_avg_rating ?? 0" />
                </div>
            </div>
            
       
            <div class="common-price-and-card">
                <div class="common-product-price">
                    @if(!empty($product->regular_price) && $product->regular_price > 0)
                        <span class="old-price">${{ $product->regular_price }}</span>
                    @endif
                    <span class="new-price">${{ $product->sale_price }}</span>
                </div>
                <div class="common-cart-wrap">
                    <a class="btn" href="#">Add to cart</a>
                </div>
            </div>
        </div>
        @if(!empty($product->discount_percentage) && $product->discount_percentage > 0)
            <div class="products-badge">
                <span>{{ $product->discount_percentage }}% Off</span>
            </div>
        @endif

        <div class="quick-view">
            <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal">
                <i class="fa-regular fa-eye"></i>
            </a>
        </div>
    </div>
</div>