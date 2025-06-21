@extends('Web.Layout.app')

@section('site-title', 'Wishlist')

@section('content')
<div class="dashboard-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4">
                @include('Web.Layout.users.partials.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">
                <div class="order-content">
                    <div class="dash-heading">
                        <h1>Wishlist</h1>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="my-cart-item-details-wrap">
                                <div class="cart-item-innerBox">
                                    <div class="cart-item-innerBox-left">
                                        <div class="cart-img-item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt=""
                                                    title="">
                                            </a>
                                        </div>
                                        <div class="cart-item-contentBox">
                                            <h5><a href="#">Sugar Balancer</a></h5>
                                            <div class="cart-item-link-meta">
                                                <span> Diabetes, Insulin Resistance</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-inner-price-quantity">
                                        <div class="cart-item-innerBox-middle">
                                            <div class="cart-item-middle">
                                                <div class="cart-price">
                                                    <span>$ 375</span>
                                                    <span class="old-price">$ 500</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-contentBox-Right">
                                            <a type="button" class="btn product-cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                                            <div class="automation-btn-delete"> <a href="#"><i
                                                        class="fas fa-trash-alt"></i>Remove</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-cart-item-details-wrap">
                                <div class="cart-item-innerBox">
                                    <div class="cart-item-innerBox-left">
                                        <div class="cart-img-item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt=""
                                                    title="">
                                            </a>
                                        </div>
                                        <div class="cart-item-contentBox">
                                            <h5><a href="#">Sugar Balancer</a></h5>
                                            <div class="cart-item-link-meta">
                                                <span> Diabetes, Insulin Resistance</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-inner-price-quantity">
                                        <div class="cart-item-innerBox-middle">
                                            <div class="cart-item-middle">
                                                <div class="cart-price">
                                                    <span>$ 375</span>
                                                    <span class="old-price">$ 500</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-contentBox-Right">
                                            <a type="button" class="btn product-cart"><i
                                                    class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                                            <div class="automation-btn-delete"> <a href="#"><i
                                                        class="fas fa-trash-alt"></i>Remove</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-cart-item-details-wrap">
                                <div class="cart-item-innerBox">
                                    <div class="cart-item-innerBox-left">
                                        <div class="cart-img-item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                            </a>
                                        </div>
                                        <div class="cart-item-contentBox">
                                            <h5><a href="#">Sugar Balancer</a></h5>
                                            <div class="cart-item-link-meta">
                                                <span> Diabetes, Insulin Resistance</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-inner-price-quantity">
                                        <div class="cart-item-innerBox-middle">
                                            <div class="cart-item-middle">
                                                <div class="cart-price">
                                                    <span>$ 375</span>
                                                    <span class="old-price">$ 500</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-contentBox-Right">
                                            <a type="button" class="btn product-cart"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                                            <div class="automation-btn-delete"> <a href="#"><i class="fas fa-trash-alt"></i>Remove</a></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="my-cart-item-details-wrap">
                                <div class="cart-item-innerBox">
                                    <div class="cart-item-innerBox-left">
                                        <div class="cart-img-item">
                                            <a href="#">
                                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/product-new-img2.png')}}" alt="" title="">
                                            </a>
                                        </div>
                                        <div class="cart-item-contentBox">
                                            <h5><a href="#">Sugar Balancer</a></h5>
                                            <div class="cart-item-link-meta">
                                                <span> Diabetes, Insulin Resistance</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="cart-item-inner-price-quantity">
                                        <div class="cart-item-innerBox-middle">
                                            <div class="cart-item-middle">
                                                <div class="cart-price">
                                                    <span>$ 375</span>
                                                    <span class="old-price">$ 500</span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cart-item-contentBox-Right">
                                            <a type="button" class="btn product-cart"><i class="fa-solid fa-cart-shopping"></i>Add to Cart</a>
                                            <div class="automation-btn-delete"> <a href="#"><i class="fas fa-trash-alt"></i>Remove</a></div>
                                        </div>
                                    </div>
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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
