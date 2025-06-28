<div class="sidebar-title">
    <h2>Categories</h2>
</div>
<div class="sidefilter-cat-wrap">
    @foreach ($categories as $category)
        <div class="sidef-cat-list">
            <div class="form-check">
                {{-- <input class="form-check-input" type="checkbox"
                    id="sidecatitem{{ $loop->index + 1 }}"
                    value="{{ $category->slug }}"
                    {{ $category->slug === request()->route('slug') ? 'checked' : '' }}> --}}
                {{-- <label class="form-check-label" for="sidecatitem{{ $loop->index + 1 }}">
                    {{ $category->name }}
                </label> --}}
                <a
                    class="form-check-label {{ request()->is('category/' . $category->slug) ? 'active' : '' }}"
                    href="{{ route('category', $category->slug) }}">
                    {{ $category->name }}
                </a>
            </div>
        </div>
    @endforeach
</div>