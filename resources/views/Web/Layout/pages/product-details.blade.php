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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Sugar-Balancer3.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Senna-Leaf-Powder-4-scaled.png')}}" alt="" title="">
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
                                            <img class="img-fluid" src="{{asset('web_assets/images/product-img/Organic-Turmeric-Root-Powder-2-1-scaled.png')}}" alt="" title="">
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
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
               <section class="inner-shop-details-area">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="detail-gallery">
                                <span class="zoom-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                                <!-- MAIN SLIDES -->
                                <div class="product-image-slider">
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_01_GNC_AMP_CreatineHCl189_HeroProduct.avif')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_02_GNC_AMP_CreatineHCl189_IncreaseStrength.avif')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_03_GNC_AMP_CreatineHCl189_Performance.avif')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_04_GNC_AMP_CreatineHCl189_Absorption.avif')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_05_GNC_AMP_CreatineHCl189_FactsPanel_CreatinePill_120ct.avif')}}" alt="product image" />
                                    </figure>
                                    <figure class="border-radius-10">
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/882500_EBC_Thumbnail_06_GNC_AMP_CreatineHCl189_RTB.avif')}}" alt="product image" />
                                    </figure>
                                </div>
                                <!-- THUMBNAILS -->
                                <div class="slider-nav-thumbnails">
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_01_GNC_AMP_CreatineHCl189_HeroProduct .avif')}}" alt="product image" />
                                    </div>
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_02_GNC_AMP_CreatineHCl189_IncreaseStrength.avif')}}" alt="product image" />
                                    </div>
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_03_GNC_AMP_CreatineHCl189_Performance.avif')}}" alt="product image" />
                                    </div>
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_04_GNC_AMP_CreatineHCl189_Absorption.avif')}}" alt="product image" />
                                    </div>
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_05_GNC_AMP_CreatineHCl189_FactsPanel_CreatinePill_120ct.avif')}}" alt="product image" />
                                    </div>
                                    <div>
                                        <img class="img-fluid" src="{{asset('web_assets/images/product-img/zoom-small/882500_EBC_Thumbnail_06_GNC_AMP_CreatineHCl189_RTB.avif')}}" alt="product image" />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="inner-shop-details-content">
                                <h4 class="title">Creatine HCl 189™ - 120 Tablets (60 Servings)</h4>
                                <div class="inner-shop-details-meta">
                                    <ul>
                                        <li>Brands : <a href="shop.html">Integmeds</a></li>
                                        <li class="inner-shop-details-review">
                                            <div class="rating">
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span>(4.5)</span>
                                        </li>
                                        <li>ID : <span>QZX8VGH</span></li>
                                    </ul>
                                </div>
                                <div class="inner-shop-details-price">
                                    <h2 class="price">$29.99</h2>
                                    <h5 class="stock-status">- IN Stock</h5>
                                </div>
                                <p>Mixlix food is food produced by methods complying with the standards of Rrganic farming.
                                    Standards vary Lorem ipsum dolor sit amet, consectetur adipiscing worldwide, but organic
                                    farming.</p>
                                <div class="inner-shop-details-list">
                                    <ul>
                                        <li>Type : <span>Supplement</span></li>
                                        <li>XPD : <span>19 Dec 2022</span></li>
                                        <li>CO : <span>Mixlix</span></li>
                                    </ul>
                                </div>
                                <div class="inner-shop-perched-info">
                                    <div class="sd-cart-wrap">
                                        <form action="#">
                                            <div class="quickview-cart-plus-minus">
                                                <input type="text" value="1">
                                                <div class="dec qtybutton">-</div>
                                                <div class="inc qtybutton">+</div>
                                            </div>
                                        </form>
                                    </div>
                                    <a href="#" class="cart-btn">add to cart</a>
                                    <a href="#" class="wishlist-btn" title="Wishlist"><i class="fas fa-heart"></i></a>
                                </div>
                                <div class="inner-shop-details-bottom">
                                    <ul>
                                        <li>
                                            <span>Tag : </span>
                                            <a href="#">Natural Vitamin</a>
                                        </li>
                                        <li>
                                            <span>Brands :</span>
                                            <a href="#">Integmeds</a>
                                        </li> 
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
                                            aria-selected="false">Reviews (3)</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContentTwo">
                                    <div class="tab-pane fade active show" id="video" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-video-content">
                                            <div class="row">
                                                <div class="col-lg-6">
                                                    <div class="video-product-wrap">
                                                        <iframe title="YouTube video player" src="https://www.youtube.com/embed/91IBtSdLfY4" width="100%" height="305" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="video-product-wrap">
                                                        <iframe title="YouTube video player" src="https://www.youtube.com/embed/_QZqierceLg" width="100%" height="305" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="description" role="tabpanel"
                                        aria-labelledby="description-tab">
                                        <div class="product-desc-content">
                                            <h4 class="title">The true strength of Creatine HCl 189™</h4>
                                            <p>Whey Protein Isolates (WPIs) are the purest form of whey protein that currently
                                                exists. WPIs are costly to use, but rate among the best proteins that money can
                                                buy.
                                                That’s why they’re the first ingredient you read on the Gold Standard 100% Whey™
                                                label. By using WPI as the primary ingredient along with premium ultra-filtered
                                                whey
                                                protein concentrate (WPC), we’re able to pack 24 grams of protein into every
                                                serving
                                                to support your muscle building needs after training. ON’attention to detail
                                                also
                                                extends to mixability. This superior quality powder has been instantized to mix
                                                easliy using a shaker cup or just a glass and spoon. There’s no doubt that this
                                                is
                                                the standard by which all other whey proteins are measured.</p>
                                            <h4 class="title">Creatine HCl 189 the basics :</h4>
                                            <ul class="product-desc-list">
                                                <li>82% Protein by Weight (24g of Protein Per 31.5g Serving Size).</li>
                                                <li>Whey Protein Isolates (WPI) Main Ingredient.</li>
                                                <li>Whey Protein Micro-functions from Whey Protein Isolate and Ultra-Filtered
                                                    Whey
                                                    Protein Concentrate.</li>
                                                <li>Over 4g of Naturally Occurring Glutamine &amp; Glutamic Acid in Each
                                                    Serving.</li>
                                                <li>More than 5g of the Naturally Occurring Branched Chain Amino Acids (BCAAs)
                                                    Leucine, Isoleucine, and Valine in Each Serving.</li>
                                                <li>The “Gold Standard” for Protein Quality.</li>
                                                <li>Banned Substance Tested Protein</li>
                                                <li>French Vanilla Creme Flavored Whey Protein Powder</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="research" role="tabpanel"
                                        aria-labelledby="information-tab">
                                        <div class="product-desc-content">
                                            <h4 class="title">The true strength of Creatine HCl 189™</h4>
                                            <p>Whey Protein Isolates (WPIs) are the purest form of whey protein that currently
                                                exists. WPIs are costly to use, but rate among the best proteins that money can
                                                buy.
                                                That’s why they’re the first ingredient you read on the Gold Standard 100% Whey™
                                                label. By using WPI as the primary ingredient along with premium ultra-filtered
                                                whey
                                                protein concentrate (WPC), we’re able to pack 24 grams of protein into every
                                                serving
                                                to support your muscle building needs after training. ON’attention to detail
                                                also
                                                extends to mixability. This superior quality powder has been instantized to mix
                                                easliy using a shaker cup or just a glass and spoon. There’s no doubt that this
                                                is
                                                the standard by which all other whey proteins are measured.</p>
                                            <h4 class="title">Creatine HCl 189 the basics :</h4>
                                            <ul class="product-desc-list">
                                                <li>82% Protein by Weight (24g of Protein Per 31.5g Serving Size).</li>
                                                <li>Whey Protein Isolates (WPI) Main Ingredient.</li>
                                                <li>Whey Protein Micro-functions from Whey Protein Isolate and Ultra-Filtered
                                                    Whey
                                                    Protein Concentrate.</li>
                                                <li>Over 4g of Naturally Occurring Glutamine &amp; Glutamic Acid in Each
                                                    Serving.</li>
                                                <li>More than 5g of the Naturally Occurring Branched Chain Amino Acids (BCAAs)
                                                    Leucine, Isoleucine, and Valine in Each Serving.</li>
                                                <li>The “Gold Standard” for Protein Quality.</li>
                                                <li>Banned Substance Tested Protein</li>
                                                <li>French Vanilla Creme Flavored Whey Protein Powder</li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                                        <div class="product-desc-content">
                                            <div class="reviews-comment">
                                                <div class="review-info">
                                                    <div class="review-img">
                                                        <img src="{{asset('web_assets/images/product-img/p_review_img01.jpg')}}" alt="">
                                                    </div>
                                                    <div class="review-content">
                                                        <ul class="review-rating">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="review-meta">
                                                            <h6>Chenai Simon <span>-May 12, 2022</span></h6>
                                                        </div>
                                                        <p>There are many variations of passages of lorem ipsum available, but
                                                            the
                                                            majority have suffered alteration in some form, by injected humour,
                                                            or
                                                            randomised words which don’t look even slightly believable. If you
                                                            are
                                                            going to use a passage of lorem ipsum.</p>
                                                    </div>
                                                </div>
                                                <div class="review-info">
                                                    <div class="review-img">
                                                        <img src="{{asset('web_assets/images/product-img/p_review_img02.jpg')}}" alt="">
                                                    </div>
                                                    <div class="review-content">
                                                        <ul class="review-rating">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="review-meta">
                                                            <h6>Finn Castaneda <span>-June 17, 2022</span></h6>
                                                        </div>
                                                        <p>There are many variations of passages of lorem ipsum available, but
                                                            the
                                                            majority have suffered alteration in some form, by injected humour,
                                                            or
                                                            randomised words which don’t look even slightly believable. If you
                                                            are
                                                            going to use a passage of lorem ipsum.</p>
                                                    </div>
                                                </div>
                                                <div class="review-info">
                                                    <div class="review-img">
                                                        <img src="{{asset('web_assets/images/product-img/p_review_img03.jpg')}}" alt="">
                                                    </div>
                                                    <div class="review-content">
                                                        <ul class="review-rating">
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </li>
                                                        </ul>
                                                        <div class="review-meta">
                                                            <h6>Bayley Robertson <span>-May 28, 2022</span></h6>
                                                        </div>
                                                        <p>There are many variations of passages of lorem ipsum available, but
                                                            the
                                                            majority have suffered alteration in some form, by injected humour,
                                                            or
                                                            randomised words which don’t look even slightly believable. If you
                                                            are
                                                            going to use a passage of lorem ipsum.</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="add-review">
                                                <h4 class="title">Add a review</h4>
                                                <form action="#">
                                                    <p>Your email address will not be published.Required fields are marked
                                                        <span>*</span></p>
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="from-grp">
                                                                <label for="name">Your name <span>*</span></label>
                                                                <input type="text" id="name">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="from-grp">
                                                                <label for="email">Your email <span>*</span></label>
                                                                <input type="text" id="email">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-rating">
                                                        <label>your rating</label>
                                                        <ul>
                                                            <li>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                                <i class="fas fa-star"></i>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="from-grp">
                                                        <label for="comment">Write Your review <span>*</span></label>
                                                        <textarea id="comment" cols="30" rows="10"></textarea>
                                                    </div>
                                                    <button class="btn gradient-btn">Submit Now <i
                                                            class="fas fa-paper-plane"></i></button>
                                                </form>
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
                <div class="col-md-3 col-6">
                    <div class="common-product-box">
                        <div class="common-product-img">
                            <a href="#">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img1.png')}}" alt="" title="">
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
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                </div> 
                <div class="col-md-3 col-6">
                    <div class="common-product-box">
                        <div class="common-product-img">
                            <a href="#">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
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
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="common-product-box">
                        <div class="common-product-img">
                            <a href="#">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img1.png')}}" alt="" title="">
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
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-6">
                    <div class="common-product-box">
                        <div class="common-product-img">
                            <a href="#">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
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
                            <a href="#"><i class="fa-regular fa-eye"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
@endsection

@push('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/elevatezoom/2.2.3/jquery.elevatezoom.min.js"></script>
<!-- Fancybox JS -->
<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.umd.js"></script>
@endpush

