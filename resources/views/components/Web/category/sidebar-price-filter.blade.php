<div class="sidebar-title">
    <h2>Price</h2>
</div>
<div class="price-slider-area-wrapper">
    <form method="GET" action="">
        @foreach(request()->except(['min_price', 'max_price']) as $key => $value)
            @if(is_array($value))
                @foreach($value as $v)
                    <input type="hidden" name="{{ $key }}[]" value="{{ $v }}">
                @endforeach
            @else
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
            @endif
        @endforeach
        
        <div class="skipstep">
            <input type="hidden" name="min_price" value="{{ request('min_price', 0) }}" class="skip-value-lower">
            <input type="hidden" name="max_price" value="{{ request('max_price', 10000) }}" class="skip-value-upper">
        </div>

        <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
            <div class="filter-price-text">
                <span class="price-title">Price:</span>
                <span class="skip-value-lower-label">{{config('app.currency_symbol')}}{{ request('min_price', 0) }}</span> -
                <span class="skip-value-upper-label">{{config('app.currency_symbol')}}{{ request('max_price', 10000) }}</span>
            </div>

            <button type="submit" class="btn price-submit-btn">Filter</button>
        </div>
    </form>

    
</div>