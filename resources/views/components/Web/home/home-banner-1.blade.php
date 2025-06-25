<section class="offer-segment-area">
    <div class="row">
        <div class="col-lg-12">
            <div class="offer-segment-img-wrap">
                <div class="offer-segment-img">
                    {{-- Dynamic cover_image or fallback --}}
                    <img class="img-fluid"
                         src="{{ asset($banner['cover_image'] ?? 'web_assets/images/bg/offer-segment-bg.png') }}"
                         alt="{{ $banner['title'] }}" title="{{ $banner['title'] }}">
                </div>
                <div class="offer-segment-img-text">
                    {{-- Always default overlay image --}}
                    <img class="img-fluid" src="{{ asset('web_assets/images/bg/offer-segment-text.png') }}" alt="" title="">
                </div>
            </div>
            <div class="offer-segment-text-wrap">
                <div class="row">
                    <div class="col-lg-6 col-md-6 d-flex align-items-center">
                        <div class="offer-segment-text">
                            @if(!empty($banner['title']))
                                <h2>{{ $banner['title'] }}</h2>
                            @endif

                            @if(!empty($banner['description']))
                                <p>{{ $banner['description'] }}</p>
                            @endif

                            @if(!empty($banner['btn_text']) && !empty($banner['btn_url']))
                                <div class="common-btn-wrap mt-4">
                                    <div class="common-btn-borders">
                                        <a class="common-btn" href="{{ $banner['btn_url'] }}">
                                            {{ $banner['btn_text'] }}
                                        </a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="offer-product-img">
                            {{-- Use featured_image or fallback product image --}}
                            <img class="img-fluid"
                                 src="{{ asset($banner['featured_image'] ?? 'web_assets/images/bg/offer-product.png') }}"
                                 alt="" title="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>