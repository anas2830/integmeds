@extends('Web.Layout.app')

@section('site-title', 'Bundle')

@section('content')
<div class="bundle-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-heading">
                    <h2>Product Bundle</h2>
                </div>
            </div>
        </div>      
        <div class="bundle-wrap">
            <div class="row">
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_2.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Digestion, Constipation</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_3.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Diabetes/Liver/Insulin</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_4.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Woman/Female Hormone</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_6.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Cancer Support</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_10.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Autoimmune/Anti Inflammato</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_9.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Bone, Joint, and Muscle</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1633835076_May252for$4SelectRTDs_Ecomm_Scroller_2.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Children’s Health</h3>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="bundle-box">
                        <a href="{{route('bundle-details')}}">
                            <div class="bundle-img">
                                <img class="img-fluid" src="{{asset('web_assets/images/product-img/1620761771_May25MemorialDay_Ecomm_Scroller_10.avif')}}" alt="" title="">
                            </div>
                            <div class="bundle-title">
                                <h3>Skin Disease: Vitiligo</h3>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="common-btn-wrap d-flex justify-content-center mt-4">
                        <div class="common-btn-borders">
                            <a class="common-btn" href="#">Load More</a>
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

