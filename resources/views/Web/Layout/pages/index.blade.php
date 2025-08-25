@extends('Web.Layout.app')

@section('site-title', 'American Number #1 Supplement Brand')

@push('dynamic_meta')
    @include('Web.Layout.partials.common-meta')
@endpush


@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@endpush


@section('content')

    {{-- Homepage Hero Slider --}}
    <x-Web.home.sliders :sliders="$sliders" />

    <div class="product-and-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />

                    <x-Web.home.sidebar.sidebar-banner :banner="$sidebarBanners[0] ?? null" />

                    <x-Web.common.sidebar.sidebar-special-offer :specialOffers="$specialOffers" />

                    <x-Web.home.sidebar.sidebar-banner :banner="$sidebarBanners[1] ?? null" />

                    <x-Web.common.sidebar.sidebar-best-seller :bestSellingProducts="$bestSellingProducts" />

                    <x-Web.home.sidebar.sidebar-banner :banner="$sidebarBanners[2] ?? null" />
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    {{-- Most Popular --}}
                    <x-Web.home.product-grid title="Most Popular" class="most-popular-product-area" :products="$bestSellingProducts" />
                    <x-Web.common.product-bundle :productBundles="$productBundles" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="common-btn-wrap d-flex justify-content-center mt-4">
                                    <div class="common-btn-borders">
                                        <a class="common-btn" href="{{ route('bundle') }}">See More Bundles</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-Web.common.product-bundle>



                    <x-Web.home.home-banner-1 :banner="$HomePageBanners['home_banner_1']" />

                    {{-- New Arrivals --}}
                    <x-Web.home.product-grid title="New Arrivals" class="new-arrivals-area" :products="$newArrivals" />
                    

                    <x-Web.home.home-banner-2 :banner="$HomePageBanners['home_banner_2']" />

                    
                    {{-- Top Rated  --}}
                    <x-Web.home.product-grid title="Top Rated" class="top-rated-area" :products="$topRatedProducts" />

                    <x-Web.home.featured-products :featuredProducts="$featuredProducts" />

                    {{-- Partner Slider --}}
                </div>
            </div>
        </div>
    </div>
    <section class="info-box-area">
        <div class="container">
            <div class="info-box-wrap">
                <div class="row">
                    <div class="col-lg-3 d-flex justify-content-center">
                        <div class="info-box">
                            <i class="fa-solid fa-truck-fast"></i>
                            <div class="info-box-content">
                                <h4>FREE Shipping</h4>
                                <p class="text-body">On all orders over $200 delivered</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-center">
                        <div class="info-box">
                            <i class="fa-solid fa-globe"></i>
                            <div class="info-box-content">
                                <h4>International Delivery</h4>
                                <p class="text-body">International delivery available.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-center">
                        <div class="info-box">
                            <i class="fa-solid fa-money-check-dollar"></i>
                            <div class="info-box-content">
                                <h4>Easy Returns</h4>
                                <p class="text-body">We make exchanging and returning simple.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 d-flex justify-content-center">
                        <div class="info-box">
                            <i class="fa-solid fa-headset"></i>
                            <div class="info-box-content">
                                <h4>ONLINE SUPPORT 24/7</h4>
                                <p class="text-body">Friendly 24/7 customer support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
    <script>
        // hero-slider
        $('.hero-slider').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 1000,
            autoplay: true,
            fade: true,
            prevArrow: '<span class="priv_arrow"><i class="fas fa-chevron-left"></i></span>',
            nextArrow: '<span class="next_arrow"><i class="fas fa-chevron-right"></i></span>',
            slidesToShow: 1,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]

        });
        // common-product-slider
        $('.common-product-slider').slick({
            dots: false,
            arrows: true,
            infinite: true,
            speed: 1000,
            autoplay: false,
            prevArrow: '<span class="priv_arrow"><i class="fas fa-chevron-left"></i></span>',
            nextArrow: '<span class="next_arrow"><i class="fas fa-chevron-right"></i></span>',
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 3,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 2,
                        slidesToScroll: 1,
                    }
                }

            ]

        });

        // partner-slider
        $('.partner-slider-wrap').slick({
            dots: true,
            arrows: true,
            infinite: true,
            speed: 1000,
            autoplay: true,
            prevArrow: '<span class="priv_arrow"><i class="fas fa-chevron-left"></i></span>',
            nextArrow: '<span class="next_arrow"><i class="fas fa-chevron-right"></i></span>',
            slidesToShow: 4,
            slidesToScroll: 1,
            responsive: [{
                    breakpoint: 1023,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                        dots: false,
                    }
                },
                {
                    breakpoint: 992,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 768,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 600,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1
                    }
                },
                {
                    breakpoint: 480,
                    settings: {
                        slidesToShow: 1,
                        slidesToScroll: 1,
                    }
                }

            ]

        });
    </script>
@endpush
