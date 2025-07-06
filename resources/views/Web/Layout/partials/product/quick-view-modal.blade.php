<div class="modal quick-view-modal fade" id="quick-view-modal" tabindex="-1" aria-labelledby="quick-view-modal" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="quick-view-modal-body">
                    <div class="row">
                        <div class="col-lg-5 col-sm-5 ">
                            <div class="quick-view-img">
                                <div class="swiper modal-slide-1">
                                    <div class="swiper-wrapper ratio_square-2">
                                        <x-Web.common.swiper-images :images="$product->images" />
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                                <div class="swiper modal-slide-2">
                                    <div class="swiper-wrapper ratio3_4">
                                        <x-Web.common.swiper-images :images="$product->images" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7 col-sm-7">
                            <div class="inner-shop-details-content">
                                <h4 class="title">{{$product->product_name}}</h4>
                                <div class="inner-shop-details-meta">
                                    <ul>
                                        <li>Brands : <a href="#">Integmeds</a></li>
                                        <li class="inner-shop-details-review">
                                            <div class="rating">
                                                <x-Web.common.star-rating :rating="$product->product_reviews_avg_rating ?? 0" />
                                            </div>
                                            <span>({{ number_format($product->product_reviews_avg_rating ?? 0, 1) }})</span>
                                        </li>
                                        <li>ID : <span>{{$product->ups_code}}</span></li>
                                    </ul>
                                </div>
                                <div class="inner-shop-details-price">
                                    <h2 class="price">${{$product->sale_price}}</h2>
                                    @if($product->quantity > 0)
                                        <h5 class="stock-status text-success">- In Stock</h5>
                                    @else
                                        <h5 class="stock-status text-danger">- Out of Stock</h5>
                                    @endif
                                </div>
                                <p>{{$product->short_description}}</p>
                                <div class="inner-shop-details-list">
                                    <ul>
                                        <li>
                                            Category:
                                            @foreach($product->categories as $category)
                                                <a href="{{ route('category') }}">{{ $category->name }}</a> @if(!$loop->last), @endif
                                            @endforeach
                                        </li>
                                    </ul>
                                </div>
                                <div class="inner-shop-perched-info product-buy-section">
                                    <x-Web.common.product-buy :product="$product" :alreadyInWishlist="$alreadyInWishlist" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>