@extends('Web.Layout.app')

@section('site-title', 'Category')

@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/15.8.1/nouislider.min.css" />
@endpush

@section('content')
<div class="category-and-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2">
                <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />
                
                <div class="category-list d-lg-block d-none">
                    <x-Web.category.sidebar-cat-filter :categories="$categories" />
                </div>
                <div class="category-list d-lg-block d-none">
                    <x-Web.category.sidebar-tag-filter :tags="$tags" />
                </div>
                <div class="category-list d-lg-block d-none">
                   <x-Web.category.sidebar-price-filter />
                </div>
                <x-Web.common.sidebar.sidebar-special-offer :specialOffers="$specialOffers" />
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <section class="category-page-products">
                    <div class="category-title-area mb-3">
                        <div class="row">
                            <div class="col-md-10 d-flex align-items-center">
                                <div class="category-filter-wrap">
                                    <div class="sidemenu-sticky">
                                        <div class="sidemenu-sticky-d-none">
                                            <a class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBothOptions" aria-controls="offcanvasWithBothOptions"><i class="fa-solid fa-list"></i></a>
                                            <div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvasWithBothOptions" aria-labelledby="offcanvasWithBothOptionsLabel">
                                                <div class="offcanvas-header">
                                                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"><i class="fa-solid fa-circle-xmark"></i></button>
                                                </div>
                                                <div class="offcanvas-body">
                                                    <div class="category-list mt-0">
                                                        <x-Web.category.sidebar-cat-filter :categories="$categories" />
                                                    </div>
                                                    <div class="category-list">
                                                        <x-Web.category.sidebar-tag-filter :tags="$tags" />
                                                    </div>
                                                    <div class="category-list">
                                                        <x-Web.category.sidebar-price-filter />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="page-counter">
                                    <p>Showing 1–12 of {{$categoryProducts->total()}} results</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="category-filter-search">
                                    <div class="selectBox">
                                        <div class="selectBox__value">Filter</div>
                                        <div class="dropdown-menu">
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'latest']) }}" class="dropdown-item {{ request('sort') == 'latest' || !request('sort') ? 'active' : '' }}">Latest</a>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'best_selling']) }}" class="dropdown-item {{ request('sort') == 'best_selling' ? 'active' : '' }}">Best Selling</a>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_asc']) }}" class="dropdown-item {{ request('sort') == 'price_asc' ? 'active' : '' }}">Price: Low to High</a>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'price_desc']) }}" class="dropdown-item {{ request('sort') == 'price_desc' ? 'active' : '' }}">Price: High to Low</a>
                                            <a href="{{ request()->fullUrlWithQuery(['sort' => 'rating']) }}" class="dropdown-item {{ request('sort') == 'rating' ? 'active' : '' }}">Best Rating</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        @foreach ($categoryProducts as $product)
                            <div class="col-lg-3 col-6">
                                <x-Web.common.product-card :product="$product" />
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-end">
                            <div class="pagination-area">
                                {{ $categoryProducts->links() }}
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
        const lower = wrapper.querySelector('.skip-value-lower-label');
        const upper = wrapper.querySelector('.skip-value-upper-label');
        const minPrice = wrapper.querySelector('.skip-value-lower');
        const maxPrice = wrapper.querySelector('.skip-value-upper');

        if (!slider || !lower || !upper || !minPrice || !maxPrice) return;

        // ✅ Use existing input values from request() as initial slider values
        const startMin = parseInt(minPrice.value) || 0;
        const startMax = parseInt(maxPrice.value) || 1000;

        noUiSlider.create(slider, {
            start: [startMin, startMax],
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

        // ✅ Set initial label values
        lower.textContent = '$' + startMin;
        upper.textContent = '$' + startMax;

        // ✅ Update on slide
        slider.noUiSlider.on("update", function (values, handle) {
            if (handle === 0) {
                lower.textContent = '$' + values[0]; 
                minPrice.value = values[0];
            } else {
                upper.textContent = '$' + values[1];
                maxPrice.value = values[1];
            }
        });
    });


    var urlParams = new URLSearchParams(window.location.search);
    var tags = urlParams.getAll('tags[]');

    $('.tag-filter').on('change', function () {
        if($(this).is(':checked')) {
            tags.push($(this).val());
        } else {
            tags = tags.filter(tag => tag !== $(this).val());
        }
        const uniqueTags = [...new Set(tags)];
        urlParams.delete('tags[]');
        uniqueTags.forEach(tag => urlParams.append('tags[]', tag));
        window.location.href = window.location.pathname + '?' + urlParams.toString();
    });








</script>

@endpush

