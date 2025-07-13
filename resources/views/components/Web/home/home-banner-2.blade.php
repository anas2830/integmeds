<section class="brand-area">
    <div class="row">
        <div class="col-lg-12">
            <div class="brand-banner">
                <img class="img-fluid"
                    src="{{ asset($banner['image'] ?? 'web_assets/images/bg/American-Number-1-Brand.png') }}"
                    alt="{{ $banner['title'] }}" title="{{ $banner['title'] }}">
                <div class="brand-text">
                    <h2>{{ $banner['title'] }}</h2>
                    <p>{{ $banner['description'] }}</p>
                    <div class="common-btn-wrap mt-3">
                        <div class="common-btn-borders">
                            <a class="common-btn" href="{{ $banner['btn_url'] }} ?? '#' ">{{ $banner['btn_text'] }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>