<div class="sidebar-title">
    <h2>Tags</h2>
</div>
<div class="sidefilter-cat-wrap">
    @foreach ($tags as $tag)
        <div class="sidef-cat-list">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="tag{{ $tag->id }}">
                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        </div>
    @endforeach
</div>