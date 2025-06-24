<div class="sidebar-best-seller">
    <div class="sidebar-title">
        <h2>Best Seller</h2>
    </div>
    <div class="sbar-sp-offer-list-wrap">
        @foreach ($bestSellingProducts as $bestSeller)      
        <div class="sbar-best-seller-list">
            <a href="{{ route('product-details', $bestSeller->slug) }}">
                <div class="row gx-3">
                    <div class="col-4">
                        <div class="sbar-best-seller-img">
                            <img class="img-fluid"
                                src="{{ asset($bestSeller->firstImage->image_url) }}"
                                alt="{{ $bestSeller->product_name }}" title="{{ $bestSeller->product_name }}">
                        </div>
                    </div>
                    <div class="col-8 d-flex align-items-center">
                        <div class="sbar-best-seller-text">
                            <h3>{{ $bestSeller->product_name }}</h3>
                            <div class="sb-rating-start">
                                <x-Web.common.star-rating :rating="$bestSeller->product_reviews_avg_rating" />
                            </div>
                            <div class="sdbar-product-price">
                                <span class="old-price">${{ $bestSeller->regular_price }}</span>
                                <span class="new-price">${{ $bestSeller->sale_price }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</div>