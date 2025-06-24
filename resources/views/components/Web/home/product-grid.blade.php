@props([
    'title' => '',
    'class' => '',
    'products' => [],
])

<section class="{{ $class }}">
    <div class="section-heading">
        <h2>{{ $title }}</h2>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="common-product-slider">
                @foreach ($products as $product)
                    <x-web.common.product-card :product="$product" />
                @endforeach
            </div>
        </div>
    </div>
</section>
