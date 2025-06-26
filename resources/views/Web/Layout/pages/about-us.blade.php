@extends('Web.Layout.app')

@section('site-title', 'About Us')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@endpush

@section('content')
<div class="product-and-sidebar mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-lg-2 order-1">
                <div class="number-no-one-content-area">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="section-heading">
                                <h2>{{ $aboutUs->top_title }}</h2>
                            </div>
                            <div class="number-no-text-wrap">
                                {!! $aboutUs->top_content !!}
                            </div>
                            <div class="number-no-img-wrap">
                                <img class="img-fluid" src="{{asset($aboutUs->top_image)}}" alt="" title="">
                            </div>
                            <div class="number-no-img-wrap">
                                <div class="row">
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <img class="img-fluid" src="{{asset($aboutUs->middle_first_image)}}" alt="" title="">
                                    </div>
                                    <div class="col-lg-6">
                                        <img class="img-fluid" src="{{asset($aboutUs->middle_second_image)}}" alt="" title="">
                                    </div>
                                </div>
                            </div>


                            <div class="partner-slider-area">
                                <div class="partner-slider-wrap">
                                    @foreach($clients as $client)
                                        <div class="items">
                                            <div class="partner-img">
                                                <img class="img-fluid" src="{{asset($client->client_image)}}" alt="" title="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>


                            <div class="section-heading">
                                <h2>{{ $aboutUs->bottom_title }}</h2>
                            </div>
                            <div class="number-no-text-wrap">
                                {!! $aboutUs->bottom_content !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="common-btn-wrap d-flex justify-content-center mt-4 mb-lg-0 mb-4">
                                <div class="common-btn-borders">
                                    <a class="common-btn" href="{{ $aboutUs->bottom_button_url }}"> {{ $aboutUs->bottom_button_text }}</a>
                                </div>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>
<script>
    $(document).ready(function(){
        $('.partner-slider-wrap').slick({
            slidesToShow: 4,
            slidesToScroll: 1,
            autoplay: true,
            autoplaySpeed: 2000, 
            arrows: false,
            dots: true,
            responsive: [{
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 1, 
                    dots: false
                }
            }]
        });
    });
</script>
@endpush

