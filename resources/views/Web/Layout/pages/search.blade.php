@extends('Web.Layout.app')

@section('site-title', "Search :: $search")

@push('dynamic_meta')
    @include('Web.Layout.partials.common-meta')
@endpush

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.css" />
@endpush

@section('content')
<div class="category-and-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />

                <x-Web.common.sidebar.sidebar-special-offer :specialOffers="$specialOffers" />
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <section class="category-page-products">
                    <div class="category-title-area mb-3">
                        <div class="row">
                            <div class="col-md-12 d-flex align-items-center">
                                <div class="page-counter">
                                    <h6>Search by : <span class="">{{$search}}</span></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        @foreach ($products as $product)
                            <div class="col-lg-3 col-6">
                                <x-Web.common.product-card :product="$product" />
                            </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                {{ $products->appends(request()->except('page'))->links() }}
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

