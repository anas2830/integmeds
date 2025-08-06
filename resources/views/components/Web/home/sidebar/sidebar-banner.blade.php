@if($banner)
    <div class="sidebar-product-banner">
        @if($banner->image_path)
            <div class="sidebar-product-banner-img">
                <a href="{{ $banner->button_url ?? '#' }}">
                    <img class="img-fluid" src="{{ asset($banner->image_path) }}"
                        alt="{{ $banner->title ?? '' }}" title="{{ $banner->title ?? '' }}">
                </a>
            </div>
        @endif

        <div class="s-product-banner-text">
            @if($banner->title)
                <h2>{{ $banner->title }}</h2>
            @endif

            @if($banner->short_description)
                <p>{{ $banner->short_description }}</p>
            @endif

            @if($banner->button_text && $banner->button_url)
                <div class="common-btn-wrap mt-4">
                    <div class="common-btn-borders">
                        <a class="common-btn" href="{{ $banner->button_url }}">{{ $banner->button_text }}</a>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endif
