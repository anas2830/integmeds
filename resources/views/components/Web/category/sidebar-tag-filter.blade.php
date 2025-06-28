<div class="sidebar-title">
    <h2>Tags</h2>
</div>
<div class="sidefilter-cat-wrap">
    @foreach ($tags as $tag)
        <div class="sidef-cat-list">
            <div class="form-check">
                <input class="form-check-input tag-filter" type="checkbox" name="tags[]" value="{{ $tag->id }}" id="tag{{ $tag->id }}" {{ in_array($tag->id, request('tags', [])) ? 'checked' : '' }}>
                <label class="form-check-label" for="tag{{ $tag->id }}">{{ $tag->name }}</label>
            </div>
        </div>
    @endforeach
</div>