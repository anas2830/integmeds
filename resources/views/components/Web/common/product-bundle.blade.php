<section class="bundle-area">
    <div class="section-heading">
        <h2>Product Bundle</h2>
    </div>
    <div class="bundle-wrap">
        <div class="row">
            @foreach ($productBundles as $productBundle)     
                <div class="col-lg-3 col-6">
                    <div class="bundle-box">
                        <a href="{{ route('bundle-details', $productBundle->id) }}">
                            @if($productBundle->firstImage?->image_url)
                                <div class="bundle-img">
                                    <img class="img-fluid"
                                        src="{{ asset($productBundle->firstImage?->image_url) }}"
                                        alt="{{ $productBundle->name }}" title="{{ $productBundle->name }}">
                                </div>
                            @endif
                            <div class="bundle-title">
                                <h3>{{ $productBundle->name }}</h3>
                            </div>
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        {{ $slot }}
    </div>
</section>