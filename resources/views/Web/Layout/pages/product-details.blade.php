@extends('Web.Layout.app')

@section('site-title', 'Product Details')

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=684f0ca79b95a90019d70ad0&product=inline-share-buttons&source=platform" async="async"></script>
@endpush



@section('content')
<div class="category-and-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2 ">
                <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />
                <x-Web.common.sidebar.sidebar-best-seller :bestSellingProducts="$bestSellingProducts" />
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
               <section class="inner-shop-details-area">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <x-Web.product.gallery-slider :images="$product->images" :videos="$product->videos" />
                                 </div>
                                 <!-- THUMBNAILS -->
                                 <div class="slider-nav-thumbnails">
                                     <x-Web.product.slider-nav-thumb :images="$product->images" :videos="$product->videos" />
                                 </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inner-shop-details-content">
                                <h4 class="title">{{$product->product_name}}</h4>
                                <div class="inner-shop-details-meta">
                                    <ul>
                                        <li>Brands : <a href="#">{{config('app.brand_name')}}</a></li>
                                        <li class="inner-shop-details-review">
                                            <div class="rating">
                                                <x-Web.common.star-rating :rating="$product->product_reviews_avg_rating ?? 0" />
                                            </div>
                                            @if(!empty($product->product_reviews_avg_rating) && $product->product_reviews_avg_rating > 0)
                                                <span>({{ number_format($product->product_reviews_avg_rating ?? 0, 1) }})</span>
                                            @endif
                                        </li>
                                        @if(!empty($product->ups_code))
                                            <li>ID : <span>{{$product->ups_code}}</span></li>
                                        @endif
                                    </ul>
                                </div>
                                <div class="inner-shop-details-price">
                                    <h2 class="price">{{config('app.currency_symbol')}}{{$product->sale_price}}</h2>
                                    <span class="stock-info">
                                        @if($product->quantity > 0)
                                            <h5 class="stock-status text-success">- In Stock</h5>
                                        @else
                                            <h5 class="stock-status text-danger">- Out of Stock</h5>
                                        @endif
                                    </span>
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
                                <div class="inner-shop-details-bottom">
                                    <ul>
                                        @if($product->tags->isNotEmpty())
                                            <li>
                                                <span>Tag:</span>
                                                @foreach($product->tags as $tag)
                                                    <a href="#">{{$tag->name}}</a> @if(!$loop->last) , @endif
                                                @endforeach
                                            </li>
                                        @endif
                                        
                                        <li>
                                            <span>Share :</span>
                                            <div class="sharethis-inline-share-buttons"></div>
                                        </li>                                                
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="product-desc-wrap">
                                <ul class="nav nav-tabs" id="myTabTwo" role="tablist">
                                    <li class="nav-item">
                                        <a href="#" class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#video" role="tab" aria-controls="description"
                                            aria-selected="true">Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="description-tab" data-bs-toggle="tab"
                                            data-bs-target="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="information-tab" data-bs-toggle="tab"
                                            data-bs-target="#research" role="tab" aria-controls="information"
                                            aria-selected="false">Research</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" role="tab" aria-controls="review"
                                            aria-selected="false">Reviews ({{ count($product->productReviews) }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContentTwo">
                                    <div class="tab-pane fade active show" id="video" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-video-content">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="video-product-wrap">
                                                        <iframe title="YouTube video player" src="{{ convertYoutubeToEmbed($product->video_en) }}" width="100%" height="305" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="video-product-wrap">
                                                        <iframe title="YouTube video player" src="{{ convertYoutubeToEmbed($product->video_bn) }}" width="100%" height="305" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-desc-content">
                                            {!! $product->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="research" role="tabpanel"
                                        aria-labelledby="information-tab">
                                        <div class="product-desc-content">
                                            {!! $product->research !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="product-desc-content">
                                            <div class="reviews-comment">
                                                @foreach ($product->productReviews as $review)
                                                    <x-Web.product.review-card :review="$review" />
                                                @endforeach
                                            </div>
                                            <div class="add-review">
                                                @auth
                                                    <x-Web.product.review-submit :instance="$product" :userReview="$userReview" type="product" />
                                                @else
                                                    <a href="{{ route('user.login') }}" class="btn gradient-btn">Login to add a review <i
                                                        class="fas fa-paper-plane"></i></a>
                                                @endauth
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @if($relatedProducts->isNotEmpty())
            <section class="category-page-products mt-5">
                <div class="category-title-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h2>Related products</h2>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row gx-3">
                    @foreach ($relatedProducts as $relProduct)     
                        <div class="col-md-3 col-6">
                            <x-Web.common.product-card :product="$relProduct" />
                        </div> 
                    @endforeach
                </div>
            </section>
        @endif
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
<script>
    /*Product Details*/
    var productDetails = function () {
        // Product Image Slider
        $('.product-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider-nav-thumbnails',
        });

        // Product Image Slider Thumbnails
        $('.slider-nav-thumbnails').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            asNavFor: '.product-image-slider',
            dots: false,
            focusOnSelect: true,
            prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
            nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>'
        });
        
        // Remove active class from all thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');

        // Set active class to first thumbnail slides
        $('.slider-nav-thumbnails .slick-slide').eq(0).addClass('slick-active');

        // On before slide change match active thumbnail to current slide
        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var mySlideNumber = nextSlide;
            $('.slider-nav-thumbnails .slick-slide').removeClass('slick-active');
            $('.slider-nav-thumbnails .slick-slide').eq(mySlideNumber).addClass('slick-active');
        });

        $('.product-image-slider').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
            var img = $(slick.$slides[nextSlide]).find("img");
            $('.zoomWindowContainer,.zoomContainer').remove();
            if ($(window).width() > 768) {
                $(img).elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            }
        });
        //Elevate Zoom
        if ( $(".product-image-slider").length ) {
            if ($(window).width() > 768) {
                $('.product-image-slider .slick-active img').elevateZoom({
                    zoomType: "inner",
                    cursor: "crosshair",
                    zoomWindowFadeIn: 500,
                    zoomWindowFadeOut: 750
                });
            }
        }
    };

    //Load functions
    $(document).ready(function () {
        productDetails();
    });

    // Fancybox 
    $('.zoom-icon').on('click', function (e) {
        e.preventDefault();

        const images = $('.product-image-slider figure img').map(function () {
            return {
                src: $(this).attr('src'),
                type: 'image'
            };
        }).get();

        const currentIndex = $('.product-image-slider').slick('slickCurrentSlide') + 1;

        Fancybox.show(images, {
            startIndex: currentIndex,
            Thumbs: false,
            Toolbar: true
        });
    });

    // Rating
    $('.rating-stars i').on('click', function() {
        var rating = $(this).data('rating');
        $('#rating').val(rating);

        $('.rating-stars i').each(function() {
            var starRating = $(this).data('rating');
            if (starRating <= rating) {
                $(this).addClass('star-selected');
            } else {
                $(this).removeClass('star-selected');
            }
        });
    });

    // Review Submit    
    $('#reviewForm').on('submit', function(e) {
        e.preventDefault();

        $.ajax({
            url: "{{ route('product.review.submit') }}",
            method: "POST",
            data: $(this).serialize(),
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            success: function(response) {
                showSuccessMessage(response.message);
                $('#rating').val(0);
                $('.rating-stars i').removeClass('star-selected selected');
                $('#form-review').val('');    
            },
            error: function(xhr) {
                let message = 'Submission failed!';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    message = xhr.responseJSON.message;
                }
            }
        });
    });
</script>
@endpush

