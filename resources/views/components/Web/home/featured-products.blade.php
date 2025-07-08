@if($featuredProducts->isNotEmpty())
<section class="special-products-area">
    <div class="row">
        @foreach($featuredProducts as $featuredProduct)
            @if($featuredProduct->product)
            <div class="col-lg-4">
                <div class="special-product-wrap">
                    <div class="sp-product-img">
                        <img class="img-fluid"
                            src="{{ asset(optional($featuredProduct->product?->firstImage)->image_url ?? 'web_assets/images/default-product.png') }}"
                            alt="{{ optional($featuredProduct->product)->product_name }}" title="{{ optional($featuredProduct->product)->product_name }}">
                    </div>
                    <div class="special-product-text">
                        <h3>{{ optional($featuredProduct->product)->product_name }}</h3>
                        <p>{{ optional($featuredProduct->product)->short_description }}</p>
                    </div>
                    @if(!empty($featuredProduct->btn_text))
                        <div class="common-btn-wrap mt-3 d-flex justify-content-center">
                            <div class="common-btn-borders">
                                <a class="common-btn" href="{{$featuredProduct->btn_url}}">{{$featuredProduct->btn_text}}</a>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endif
        @endforeach
    </div>
</section>
@endif