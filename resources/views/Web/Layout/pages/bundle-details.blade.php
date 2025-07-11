@extends('Web.Layout.app')

@section('site-title', $bundle->name)

@push('dynamic_meta')
<meta name="description" content="{{ Str::limit(strip_tags($bundle->description), 300, '') }}">
<meta name="keywords" content="Integrative Medicine , American Number #1, Supplement Brand">
<meta property="og:site_name" content="{{ config('app.name') }}">
<meta property="og:title" content="{{ $bundle->name }}">
<meta property="og:description" content="{{ Str::limit(strip_tags($bundle->description), 300, '') }}">
<meta property="og:url" content="{{ route('product-details', $bundle->id) }}">
<meta property="og:type" content="article">

<meta property="og:image" content="{{ !empty($bundle->bundleImages) ? asset($bundle->bundleImages->first()->image_url) : asset('web_assets/images/logo/footer-logo.png') }}">
<meta property="og:locale" content="en_US">

<meta name="twitter:domain" content="{{ url('/') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:site" content="integmeds.com">
<meta name="twitter:title" content="{{ $bundle->name }}">
<meta name="twitter:description" content="{{ Str::limit(strip_tags($bundle->description), 300, '') }}">
<meta name="twitter:url" content="{{ route('bundle-details', $bundle->id) }}">
<meta name="twitter:image" content="{{ !empty($bundle->bundleImages) ? asset($bundle->bundleImages->first()->image_url) : asset('web_assets/images/logo/footer-logo.png') }}">
<meta name="twitter:site" content="@integmeds">
<meta name="twitter:creator" content="@integmeds">
<link rel="image_src" href="{{ !empty($bundle->bundleImages) ? asset($bundle->bundleImages->first()->image_url) : asset('web_assets/images/logo/footer-logo.png') }}">
<link rel="canonical" href="{{ route('product-details', $bundle->id) }}">
@endpush

@push('css')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />
<script type="text/javascript" src="https://platform-api.sharethis.com/js/sharethis.js#property=684f0ca79b95a90019d70ad0&product=inline-share-buttons&source=platform" async="async"></script>
@endpush



@section('content')
{{-- @dd($bundle) --}}
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
                                    <x-Web.product.gallery-slider :images="$bundle->bundleImages" />
                                 </div>
                                 <!-- THUMBNAILS -->
                                 <div class="slider-nav-thumbnails">
                                     <x-Web.product.slider-nav-thumb :images="$bundle->bundleImages" />
                                 </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inner-shop-details-content">
                                <h4 class="title">{{$bundle->name}}</h4>
                                <div class="inner-shop-details-meta">
                                    <ul>
                                        <li>Brand : <a href="#">Integmeds</a></li>
                                        <li class="inner-shop-details-review">
                                            <div class="rating">
                                                <x-Web.common.star-rating :rating="$bundle->bundle_reviews_avg_rating ?? 0" />
                                            </div>
                                            <span>({{ number_format($bundle->bundle_reviews_avg_rating ?? 0, 1) }})</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="inner-shop-details-price">
                                    <h2 class="price">{{config('app.currency_symbol')}}{{$bundle->min_price}} - {{config('app.currency_symbol')}}{{$bundle->max_price}}</h2>
                                </div>
                                <p>{{$bundle->short_description}}</p>
                                {{-- {{ $bundle->products }} --}}
                                <x-Web.bundle.product-bundle :bundleProducts="$bundle->products" />
                                <div class="inner-shop-details-bottom">
                                    <ul>                                        
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
                                            data-bs-target="#description" role="tab" aria-controls="description"
                                            aria-selected="true">Description</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link" id="review-tab" data-bs-toggle="tab"
                                            data-bs-target="#review" role="tab" aria-controls="review"
                                            aria-selected="false">Reviews ({{ count($bundle->bundleReviews) }})</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContentTwo">
                                    <div class="tab-pane fade active show" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-desc-content">
                                            {!! $bundle->description !!}
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="product-desc-content">
                                            <div class="reviews-comment">
                                                @foreach ($bundle->bundleReviews as $review)
                                                    <x-Web.product.review-card :review="$review"/>
                                                @endforeach
                                            </div>
                                            <div class="add-review">
                                                @auth
                                                    <x-Web.product.review-submit :instance="$bundle" :userReview="$userReview" type="bundle" />
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
        $('.product-image-slider').slick({
            slidesToShow: 1,
            slidesToScroll: 1,
            arrows: false,
            fade: false,
            asNavFor: '.slider-nav-thumbnails',
        });

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
            url: "{{ route('bundle.review.submit') }}",
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
    $(document).on('click', '.wishlist-btn', function(e) {
            e.preventDefault();
            const $btn = $(this);
            const productId = $(this).data('prod-id');

            $.ajax({
                url: '{{ route("user.wishlist.add") }}',
                method: 'POST',
                data: {
                    product_id: productId,
                    _token: '{{ csrf_token() }}'
                },
                success: function(res) {
                    showSuccessMessage(res.message);
                    $btn.addClass('bg-success');
                },
                error: function(xhr) {
                    
                }
            });
        });
</script>
@endpush

