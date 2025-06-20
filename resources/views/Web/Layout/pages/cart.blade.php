@extends('Web.Layout.app')

@section('site-title', 'Cart')

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
                <section class="cart-page-wrap">
                    <div class="main-cart-wrapper">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <span class="d-flex gap-4 align-items-center">
                                                <a href="shop-cart.html" class="remove-icon">
                                                    <img src="{{asset('web_assets/images/icon/remove-icon.svg')}}" alt="img">
                                                </a>
                                                <span class="main-cart-img">
                                                    <img src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="img">
                                                </span>
                                                <span class="cart-title">
                                                    simple Things You To Save Book
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="cart-price">$30.00</span>
                                        </td>
                                        <td>
                                            <span class="quantity-basket">
                                                <span class="qty">
                                                    <button class="qtyminus" aria-hidden="true">−</button>
                                                    <input type="number" name="qty" id="qty2" min="1" max="10" step="1" value="1">
                                                    <button class="qtyplus" aria-hidden="true">+</button>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="subtotal-price">$120.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex gap-4 align-items-center">
                                                <a href="shop-cart.html" class="remove-icon">
                                                    <img src="{{asset('web_assets/images/icon/remove-icon.svg')}}" alt="img">
                                                </a>
                                                <span class="main-cart-img">
                                                    <img src="{{asset('web_assets/images/product-img/product-new-img1.png')}}" alt="img">
                                                </span>
                                                <span class="cart-title">
                                                    Qple GPad With Retina Sisplay
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="cart-price">$30.00</span>
                                        </td>
                                        <td>
                                            <span class="quantity-basket">
                                                <span class="qty">
                                                    <button class="qtyminus" aria-hidden="true">−</button>
                                                    <input type="number" name="qty" id="qty3" min="1" max="10" step="1" value="1">
                                                    <button class="qtyplus" aria-hidden="true">+</button>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="subtotal-price">$120.00</span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <span class="d-flex gap-4 align-items-center">
                                                <a href="shop-cart.html" class="remove-icon">
                                                    <img src="{{asset('web_assets/images/icon/remove-icon.svg')}}" alt="img">
                                                </a>
                                                <span class="main-cart-img">
                                                    <img src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="img">
                                                </span>
                                                <span class="cart-title">
                                                    Flovely and Unicom Erna
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="cart-price">$30.00</span>
                                        </td>
                                        <td>
                                            <span class="quantity-basket">
                                                <span class="qty">
                                                    <button class="qtyminus" aria-hidden="true">−</button>
                                                    <input type="number" name="qty" id="qty" min="1" max="10" step="1" value="1">
                                                    <button class="qtyplus" aria-hidden="true">+</button>
                                                </span>
                                            </span>
                                        </td>
                                        <td>
                                            <span class="subtotal-price">$120.00</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-page-summary">
                            <h3>Billing summary</h3>
                            <h6>subtotal <span>$395.00</span></h6>
                            <h6>Tax <span>(+) $100.00</span></h6>
                            <h6>Discount <span>(-) $45.00</span></h6>
                            <h4>Total <span>$410.00</span></h4>

                            <form action="#">
                                <input class="form-control" type="text" placeholder="Coupon code">
                                <button type="submit" class="common_btn">Apply</button>
                                <p>
                                    Coupon Code: HEM4556JL
                                    <a href="#"><i class="fal fa-times" aria-hidden="true"></i></a>
                                </p>
                            </form>
                        </div>
                        <div class="cart-summary-btn">
                            <a class="checkout-bnt" href="{{route('checkout')}}">Proccess to Checkout <i class="fas fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

