@extends('Web.Layout.app')

@section('site-title', '')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@endpush

@section('content')

    {{-- Homepage Hero Slider --}}
    <x-Web.sliders :sliders="$sliders" />

    <div class="product-and-sidebar">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <x-Web.sidebar-product-bundle :productBundles="$productBundles" />
                    <div class="sidebar-product-banner">
                        <div class="sidebar-product-banner-img">
                            <img class="img-fluid" src="{{ asset('web_assets/images/bg/New-Side-banner.png') }}"
                                alt="" title="">
                        </div>
                        <div class="s-product-banner-text">
                            <h2>Integmeds New Arrivals</h2>
                            <p>At Integmeds, we are committed to enhancing your health and well-being through the power of
                                nature, offering a range of organic and nutrient-dense products designed to support a
                                holistic lifestyle, nurture vitality, and promote sustainable wellness.</p>
                            <div class="common-btn-wrap mt-4">
                                <div class="common-btn-borders">
                                    <a class="common-btn" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <x-Web.sidebar-special-offer :specialOffers="$specialOffers" />
                    <div class="sidebar-product-banner">
                        <div class="sidebar-product-banner-img">
                            <img class="img-fluid" src="{{ asset('web_assets/images/bg/New-Side-banner-4.png') }}"
                                alt="" title="">
                        </div>
                        <div class="s-product-banner-text">
                            <h2>Integmeds New Arrivals</h2>
                            <p>Integmeds is dedicated to improving your health naturally.</p>
                            <div class="common-btn-wrap mt-4">
                                <div class="common-btn-borders">
                                    <a class="common-btn" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-best-seller">
                        <div class="sidebar-title">
                            <h2>Best Seller</h2>
                        </div>
                        <div class="sbar-sp-offer-list-wrap">
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Female Care</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Senna Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Stevia Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Female Care</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Senna Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Stevia Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Female Care</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Senna Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Stevia Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Female Care</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Senna Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="sbar-best-seller-list">
                                <a href="#">
                                    <div class="row gx-3">
                                        <div class="col-4">
                                            <div class="sbar-best-seller-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                        <div class="col-8 d-flex align-items-center">
                                            <div class="sbar-best-seller-text">
                                                <h3>Organic Stevia Leaf Powder</h3>
                                                <div class="sb-rating-start">
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                    <i class="fa-solid fa-star"></i>
                                                </div>
                                                <div class="sdbar-product-price">
                                                    <span class="old-price">$64.95</span>
                                                    <span class="new-price">$25.08</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="sidebar-product-banner">
                        <div class="sidebar-product-banner-img">
                            <img class="img-fluid" src="{{ asset('web_assets/images/bg/New-Banner-New-.png') }}"
                                alt="" title="">
                        </div>
                        <div class="s-product-banner-text">
                            <h2>Integmeds Medicine</h2>
                            <p>American Number #1 Natural Supplement For Your Happy Life</p>
                            <div class="common-btn-wrap mt-4">
                                <div class="common-btn-borders">
                                    <a class="common-btn" href="#">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <section class="most-popular-product-area">
                        <div class="section-heading">
                            <h2>Most Popular</h2>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="common-product-slider">
                                    <div class="items">
                                        <div class="common-product-box">
                                            <div class="common-product-img">
                                                <a href="{{ route('product-details') }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                        alt="" title="">
                                                </a>
                                            </div>
                                            <div class="common-products-info-wrap">
                                                <div class="comm-products-title">
                                                    <h3><a href="#">Sugar Balancer</a></h3>
                                                    <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                                </div>
                                                <div class="rating">
                                                    <div class="rating-start">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </div>
                                                </div>
                                                <div class="common-price-and-card">
                                                    <div class="common-product-price">
                                                        <span class="old-price">$64.95</span>
                                                        <span class="new-price">$25.08</span>
                                                    </div>
                                                    <div class="common-cart-wrap">
                                                        <a class="btn" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-badge">
                                                <span>50% Off</span>
                                            </div>
                                            <div class="quick-view">
                                                <a href="#" title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="common-product-box">
                                            <div class="common-product-img">
                                                <a href="{{ route('product-details') }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                        alt="" title="">
                                                </a>
                                            </div>
                                            <div class="common-products-info-wrap">
                                                <div class="comm-products-title">
                                                    <h3><a href="{{ route('product-details') }}">Sugar Balancer</a></h3>
                                                    <p><a href="{{ route('product-details') }}"> Diabetes, Insulin
                                                            Resistance</a></p>
                                                </div>
                                                <div class="rating">
                                                    <div class="rating-start">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </div>
                                                </div>
                                                <div class="common-price-and-card">
                                                    <div class="common-product-price">
                                                        <span class="old-price">$64.95</span>
                                                        <span class="new-price">$25.08</span>
                                                    </div>
                                                    <div class="common-cart-wrap">
                                                        <a class="btn" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-badge">
                                                <span>50% Off</span>
                                            </div>
                                            <div class="quick-view">
                                                <a href="#" title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="common-product-box">
                                            <div class="common-product-img">
                                                <a href="{{ route('product-details') }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                        alt="" title="">
                                                </a>
                                            </div>
                                            <div class="common-products-info-wrap">
                                                <div class="comm-products-title">
                                                    <h3><a href="{{ route('product-details') }}">Sugar Balancer</a></h3>
                                                    <p><a href="{{ route('product-details') }}"> Diabetes, Insulin
                                                            Resistance</a></p>
                                                </div>
                                                <div class="rating">
                                                    <div class="rating-start">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </div>
                                                </div>
                                                <div class="common-price-and-card">
                                                    <div class="common-product-price">
                                                        <span class="old-price">$64.95</span>
                                                        <span class="new-price">$25.08</span>
                                                    </div>
                                                    <div class="common-cart-wrap">
                                                        <a class="btn" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-badge">
                                                <span>50% Off</span>
                                            </div>
                                            <div class="quick-view">
                                                <a href="#" title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="common-product-box">
                                            <div class="common-product-img">
                                                <a href{{ route('product-details') }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                        alt="" title="">
                                                </a>
                                            </div>
                                            <div class="common-products-info-wrap">
                                                <div class="comm-products-title">
                                                    <h3><a href="{{ route('product-details') }}">Sugar Balancer</a></h3>
                                                    <p><a href="{{ route('product-details') }}"> Diabetes, Insulin
                                                            Resistance</a></p>
                                                </div>
                                                <div class="rating">
                                                    <div class="rating-start">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </div>
                                                </div>
                                                <div class="common-price-and-card">
                                                    <div class="common-product-price">
                                                        <span class="old-price">$64.95</span>
                                                        <span class="new-price">$25.08</span>
                                                    </div>
                                                    <div class="common-cart-wrap">
                                                        <a class="btn" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-badge">
                                                <span>50% Off</span>
                                            </div>
                                            <div class="quick-view">
                                                <a href="#" title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="common-product-box">
                                            <div class="common-product-img">
                                                <a href="{{ route('product-details') }}">
                                                    <img class="img-fluid"
                                                        src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                        alt="" title="">
                                                </a>
                                            </div>
                                            <div class="common-products-info-wrap">
                                                <div class="comm-products-title">
                                                    <h3><a href="{{ route('product-details') }}">Sugar Balancer</a></h3>
                                                    <p><a href="{{ route('product-details') }}"> Diabetes, Insulin
                                                            Resistance</a></p>
                                                </div>
                                                <div class="rating">
                                                    <div class="rating-start">
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star"></i>
                                                        <i class="fa-solid fa-star-half"></i>
                                                    </div>
                                                </div>
                                                <div class="common-price-and-card">
                                                    <div class="common-product-price">
                                                        <span class="old-price">$64.95</span>
                                                        <span class="new-price">$25.08</span>
                                                    </div>
                                                    <div class="common-cart-wrap">
                                                        <a class="btn" href="#">Add to cart</a>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="products-badge">
                                                <span>50% Off</span>
                                            </div>
                                            <div class="quick-view">
                                                <a href="#" title="Quick View" data-bs-toggle="modal"
                                                    data-bs-target="#quick-view-modal"><i
                                                        class="fa-regular fa-eye"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <x-Web.product-bundle :productBundles="$productBundles" >
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="common-btn-wrap d-flex justify-content-center mt-4">
                                    <div class="common-btn-borders">
                                        <a class="common-btn" href="{{ route('bundle') }}">See More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </x-Web.product-bundle>

                    <section class="offer-segment-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="offer-segment-img-wrap">
                                    <div class="offer-segment-img">
                                        <img class="img-fluid"
                                            src="{{ asset('web_assets/images/bg/offer-segment-bg.png') }}" alt=""
                                            title="">
                                    </div>
                                    <div class="offer-segment-img-text">
                                        <img class="img-fluid"
                                            src="{{ asset('web_assets/images/bg/offer-segment-text.png') }}"
                                            alt="" title="">
                                    </div>
                                </div>
                                <div class="offer-segment-text-wrap">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-6 d-flex align-items-center">
                                            <div class="offer-segment-text">
                                                <h2>Beyond Raw® LIT®</h2>
                                                <p>Your go-to pre-workout for intense energy, focus, and pumps in flavors
                                                    that always deliver*.</p>
                                                <div class="common-btn-wrap mt-4">
                                                    <div class="common-btn-borders">
                                                        <a class="common-btn" href="#">Shop Now</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-md-6">
                                            <div class="offer-product-img">
                                                <img class="img-fluid"
                                                    src="{{ asset('web_assets/images/bg/offer-product.png') }}"
                                                    alt="" title="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="new-arrivals-area">
                        <div class="section-heading">
                            <h2>New Arrivals</h2>
                        </div>
                        <div class="row gx-3">
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-badge">
                                        <span>50% Off</span>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-badge">
                                        <span>50% Off</span>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="brand-area">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="brand-banner">
                                    <img class="img-fluid"
                                        src="{{ asset('web_assets/images/bg/American-Number-1-Brand.png') }}"
                                        alt="" title="">
                                    <div class="brand-text">
                                        <h2>American Number #1 Brand</h2>
                                        <p>We help patients identify the root cause of their health condition and regain
                                            perfect health with proper nutrition, evidence based functional alternative</p>
                                        <div class="common-btn-wrap mt-3">
                                            <div class="common-btn-borders">
                                                <a class="common-btn" href="#">Shop Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="top-rated-area">
                        <div class="section-heading">
                            <h2>Top Rated</h2>
                        </div>
                        <div class="row gx-3">
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-badge">
                                        <span>50% Off</span>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img1.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="products-badge">
                                        <span>50% Off</span>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-6">
                                <div class="common-product-box">
                                    <div class="common-product-img">
                                        <a href="#">
                                            <img class="img-fluid"
                                                src="{{ asset('web_assets/images/product-img/product-new-img2.png') }}"
                                                alt="" title="">
                                        </a>
                                    </div>
                                    <div class="common-products-info-wrap">
                                        <div class="comm-products-title">
                                            <h3><a href="#">Sugar Balancer</a></h3>
                                            <p><a href="#"> Diabetes, Insulin Resistance</a></p>
                                        </div>
                                        <div class="rating">
                                            <div class="rating-start">
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star"></i>
                                                <i class="fa-solid fa-star-half"></i>
                                            </div>
                                        </div>
                                        <div class="common-price-and-card">
                                            <div class="common-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                            <div class="common-cart-wrap">
                                                <a class="btn" href="#">Add to cart</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="quick-view">
                                        <a href="#" title="Quick View" data-bs-toggle="modal"
                                            data-bs-target="#quick-view-modal"><i class="fa-regular fa-eye"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="special-products-area">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="special-product-wrap">
                                    <div class="sp-product-img">
                                        <img class="img-fluid"
                                            src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                            alt="" title="">
                                    </div>
                                    <div class="special-product-text">
                                        <h3>IMMUNE PLUS</h3>
                                        <p>Elevate Your Health with Nature’s Finest, Nutrient-Packed Essentials for a
                                            Stronger, Balanced Immune System and Vibrant Well-Being</p>
                                    </div>
                                    <div class="common-btn-wrap mt-3 d-flex justify-content-center">
                                        <div class="common-btn-borders">
                                            <a class="common-btn" href="#">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="special-product-wrap">
                                    <div class="sp-product-img">
                                        <img class="img-fluid"
                                            src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                            alt="" title="">
                                    </div>
                                    <div class="special-product-text">
                                        <h3>GALL BLADDER CARE</h3>
                                        <p>Holistic, Natural Solutions to Promote and Maintain Optimal Gallbladder Function
                                            and Enhance Your Digestive Health for Long-Term Well-being</p>
                                    </div>
                                    <div class="common-btn-wrap mt-3 d-flex justify-content-center">
                                        <div class="common-btn-borders">
                                            <a class="common-btn" href="#">Shop Now</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="special-product-wrap">
                                    <div class="sp-product-img">
                                        <img class="img-fluid"
                                            src="{{ asset('web_assets/images/product-img/Sugar-Balancer3.png') }}"
                                            alt="" title="">
                                    </div>
                                    <div class="special-product-text">
                                        <h3>DIGEST PRO</h3>
                                        <p>Enhance Healthy Digestion and Inflammatory Support with Natural, Targeted
                                            Solutions for a Balanced and Comforted Digestive System</p>
                                    </div>
                                    <div class="common-btn-wrap mt-3 d-flex justify-content-center">
                                        <div class="common-btn-borders">
                                            <a class="common-btn" href="#">Shop Now</a>
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
