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
                                    <p>Showing 1–12 of 16 results</p>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="category-filter-search">
                                    <div class="selectBox">
                                        <div class="selectBox__value">Filter</div>
                                        <div class="dropdown-menu">
                                        <a href="#" class="dropdown-item active">Newest</a>
                                        <a href="#" class="dropdown-item">Best Selling</a>
                                        <a href="#" class="dropdown-item">Low to High</a>
                                        <a href="#" class="dropdown-item">High to Low</a>
                                        <a href="#" class="dropdown-item">Best Rating</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row gx-3">
                        {{-- @dd($categoryProducts) --}}
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

