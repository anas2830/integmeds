<div class="sidebar-special-offer">
    <div class="sidebar-title">
        <h2>Special Offers</h2>
    </div>
    <div class="sbar-sp-offer-list-wrap">
        @foreach ($specialOffers as $specialOffer)     
            <div class="sbar-sp-offer-list">
                <a href="{{ route('product-details', $specialOffer->slug) }}">
                    <div class="row gx-3">
                        <div class="col-4">
                            <div class="sbar-sp-offer-img">
                                <img class="img-fluid"
                                    src="{{ asset(optional($specialOffer->firstImage)->image_url) }}"
                                    alt="{{ $specialOffer->product_name }}" title="{{ $specialOffer->product_name }}">
                            </div>
                        </div>
                        <div class="col-8 d-flex align-items-center">
                            <div class="sbar-sp-offer-text">
                                <h3>{{ $specialOffer->product_name }}</h3>
                                <div class="sdbar-product-price">
                                    <span class="old-price">${{ $specialOffer->regular_price }}</span>
                                    <span class="new-price">$ {{ $specialOffer->sale_price }}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>