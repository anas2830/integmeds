<div class="sidebar-bundle">
    <div class="sidebar-title">
        <h2>Product Bundle</h2>
    </div>
    <div class="sidebar-bundle-list-wrap">
        @foreach ($productBundles as $productBundle)     
        <div class="sidebar-bundle-list">
            <a href="{{ route('bundle-details', $productBundle->id) }}">
                <div class="row gx-2">
                    <div class="col-3">
                        <div class="sidebar-bundle-img">
                            <img class="img-fluid"
                                src="{{ asset($productBundle->icon_path) }}"
                                alt="{{ $productBundle->title }}" title="{{ $productBundle->name }}">
                        </div>
                    </div>
                    <div class="col-9 d-flex align-items-center">
                        <div class="sidebar-bundle-title">
                            <h3>{{ $productBundle->name }}</h3>
                        </div>
                    </div>
                </div>
            </a>
            </div>
        @endforeach
    </div>
</div>