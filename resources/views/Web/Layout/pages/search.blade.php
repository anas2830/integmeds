@extends('Web.Layout.app')

@section('site-title', 'Category')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.css" />
@endpush

@section('content')
<div class="category-and-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="sidebar-bundle">
                    <div class="sidebar-title">
                        <h2>Product Bundle</h2>
                    </div>
                    <div class="sidebar-bundle-list-wrap">
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Digestion-Constipation-Colon-Stomach-Gallbladder-support.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Digestion, Constipation, Colon, Stomach, Gallbladder support</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Diabetes_Liver_Insulin-Resistance_weight-loss.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Diabetes/Liver/Insulin Resistance/weight loss</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Woman_Female-Hormone_Thyroid.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Woman/Female Hormone/Thyroid</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Cancer-Support-and-Prevention.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Cancer Support and Prevention</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Autoimmune_Anti-Inflammatory.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Autoimmune/Anti Inflammato</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Bone-Joint-and-Muscle.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Bone, Joint, and Muscle</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Childrens-Health_-Children-Care-ages-4-and-older.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Children’s Health/ Children Care (ages 4 and older)</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sidebar-bundle-list">
                            <a href="#">
                                <div class="row gx-2">
                                    <div class="col-3">
                                        <div class="sidebar-bundle-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/bundle-img/Skin-Disease_-Vitiligo-Psoriasis-dermatitis-etc.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-9 d-flex align-items-center">
                                        <div class="sidebar-bundle-title">
                                            <h3>Skin Disease: Vitiligo, Psoriasis, dermatitis, etc.</h3>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-special-offer">
                    <div class="sidebar-title">
                        <h2>Special Offers</h2>
                    </div>
                    <div class="sbar-sp-offer-list-wrap">
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Female Care</h3>
                                            <div class="sdbar-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Organic Senna Leaf Powder</h3>
                                            <div class="sdbar-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Organic Stevia Leaf Powder</h3>
                                            <div class="sdbar-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Female Care</h3>
                                            <div class="sdbar-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Organic Senna Leaf Powder</h3>
                                            <div class="sdbar-product-price">
                                                <span class="old-price">$64.95</span>
                                                <span class="new-price">$25.08</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="sbar-sp-offer-list">
                            <a href="#">
                                <div class="row gx-3">
                                    <div class="col-4">
                                        <div class="sbar-sp-offer-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="col-8 d-flex align-items-center">
                                        <div class="sbar-sp-offer-text">
                                            <h3>Organic Stevia Leaf Powder</h3>
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
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <section class="category-page-products">
                    <div class="category-title-area mb-3">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center">
                                <div class="page-counter">
                                    <p>Search by Sugar Balancer</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#" title="Quick View" data-bs-toggle="modal" data-bs-target="#quick-view-modal" ><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="common-product-box">
                                <div class="common-product-img">
                                    <a href="#">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                    </a>
                                </div>
                                <div class="common-products-info-wrap">
                                    <div class="comm-products-title">
                                        <h3><a href="#">Sugar Balancer</a></h3>
                                        <p><a href="{{ route('category') }}"> Diabetes, Insulin Resistance</a></p>
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
                                    <a href="#"><i class="fa-regular fa-eye"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                <nav aria-label="Page navigation example">
                                    <ul class="pagination">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item" aria-current="page">
                                        <a class="page-link" href="#">2</a>
                                        </li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
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
<script>
    $(".selectBox").on("click", function(e) {
        $(this).toggleClass("show");
        var dropdownItem = e.target;
        var container = $(this).find(".selectBox__value");
        container.text(dropdownItem.text);
        $(dropdownItem)
            .addClass("active")
            .siblings()
            .removeClass("active");
    });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.js"></script>
 <!-- price-range-js  -->
<script>
    document.querySelectorAll('.price-slider-area-wrapper').forEach(wrapper => {
        const slider = wrapper.querySelector('.skipstep');
        const lower = wrapper.querySelector('.skip-value-lower');
        const upper = wrapper.querySelector('.skip-value-upper');

        if (!slider || !lower || !upper) return;

        noUiSlider.create(slider, {
            start: [0, 1000],
            connect: true,
            behaviour: "drag",
            step: 1,
            range: {
                min: 1,
                max: 1000
            },
            format: {
                from: value => parseInt(value),
                to: value => parseInt(value)
            }
        });

        slider.noUiSlider.on("update", function (values, handle) {
            if (handle === 0) {
                lower.textContent = '$' + values[0];
            } else {
                upper.textContent = '$' + values[1];
            }
        });
    });
</script>

@endpush

