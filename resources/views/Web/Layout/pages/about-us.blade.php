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
                                <h2>Who we are</h2>
                            </div>
                            <div class="number-no-text-wrap">
                                <p>Welcome to IntegMeds, the No. 1 supplement company in the USA. We specialize in advanced nutritional medicine, offering a comprehensive range of supplements designed to enhance your health and well-being. Our mission is to provide targeted solutions for detoxification, digestive health, blood sugar management, cellular energy boosting, and mood support.</p>
                                <p>Our Supplements are fully GMP and ISO certified, made in USA in a FDA monitored lab.</p>
                                <p>At IntegMeds, we are committed to scientific integrity and quality. Each of our supplements is meticulously formulated based on the latest research to ensure both effectiveness and safety. We source only the highest quality ingredients, ensuring our products support your optimal health.</p>
                                <p>Whether you need to detoxify, manage blood sugar levels, boost cellular energy, or support a positive mood, IntegMeds offers comprehensive solutions to help you achieve and maintain your health goals. Trust us to be your partner in health, delivering the best supplements in the industry to support your journey towards a healthier, more vibrant life.</p>
                                <p>Explore our range of products and discover why IntegMeds is the leading choice for families and individuals seeking superior nutritional support. Your health is our priority, and we are dedicated to helping you thrive.</p>
                            </div>
                            <div class="number-no-img-wrap">
                                <img class="img-fluid" src="{{asset('web_assets/images/bg/Suppliment-Award-Manipulation-scaled.jpg')}}" alt="" title="">
                            </div>
                            <div class="number-no-img-wrap">
                                <div class="row">
                                    <div class="col-lg-6 d-flex align-items-center">
                                        <img class="img-fluid" src="{{asset('web_assets/images/bg/Scan-Dec-2-2024-at-3.38-PM-1.png')}}" alt="" title="">
                                    </div>
                                    <div class="col-lg-6">
                                        <img class="img-fluid" src="{{asset('web_assets/images/bg/award-ny.png')}}" alt="" title="">
                                    </div>
                                </div>
                            </div>
                            <div class="partner-slider-area">
                                <div class="partner-slider-wrap">
                                    <div class="items">
                                        <div class="partner-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/partner-slider/GMP.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="partner-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/partner-slider/FDA.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="partner-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/partner-slider/Made-in-USA.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="partner-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/partner-slider/ISO-1.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                    <div class="items">
                                        <div class="partner-img">
                                            <img class="img-fluid" src="{{asset('web_assets/images/partner-slider/GMP.png')}}" alt="" title="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="section-heading">
                                <h2>Why we are number #1</h2>
                            </div>
                            <div class="number-no-text-wrap">
                                <p>IntegMeds has earned the title of the No. 1 supplement company in the USA due to our unwavering commitment to quality, scientific integrity, and customer well-being. Here’s why we stand out:</p>
                                <p>1. *Advanced Nutritional Solutions*: We specialize in cutting-edge nutritional medicine, offering a diverse range of supplements that target essential health areas such as detoxification, digestive health, blood sugar management, cellular energy, and mood support. Our products are designed to meet the unique health needs of our customers with precision.</p>
                                <p>2. *Quality Assurance*: Our supplements are GMP and ISO certified, ensuring the highest standards of production. All our products are made in the USA in an FDA-monitored lab, which guarantees strict adherence to quality, safety, and regulatory standards.</p>
                                <p>3. *Science-Backed Formulations*: At IntegMeds, we prioritize research-based formulations. Each supplement is developed using the latest scientific research, ensuring that our products are not only effective but also safe. Our approach to nutrition is rooted in scientific rigor and a focus on results.</p>
                                <p>4. *Superior Ingredients*: We source only the highest quality ingredients, meticulously selected for their purity, potency, and effectiveness. This ensures that every supplement we offer supports optimal health and wellness, helping our customers achieve their health goals.</p>
                                <p>5. *Commitment to Health*: Our mission is to support the health and well-being of families and individuals by providing targeted nutritional solutions. We prioritize our customers’ health and continually strive to be a trusted partner in their journey towards a healthier, more vibrant life.</p>
                                <p>These qualities are what set IntegMeds apart, making us the leading choice for those seeking comprehensive, trustworthy, and effective nutritional supplements.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="common-btn-wrap d-flex justify-content-center mt-4 mb-lg-0 mb-4">
                                <div class="common-btn-borders">
                                    <a class="common-btn" href="{{route('bundle') }}"> view our products</a>
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

