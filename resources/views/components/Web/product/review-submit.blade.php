<div id="success-msg"></div>

<h4 class="title">{{ $userReview ? 'Update your review' : 'Add a review' }}</h4>
<form id="reviewForm">
    <div class="form-rating">
        <label>Your Rating</label>
        <ul class="rating-stars">
            <li>
                @for($i = 1; $i <= 5; $i++)
                <i class="fas fa-star {{ $userReview && $userReview->rating >= $i ? 'star-selected' : '' }}" data-rating="{{ $i }}"></i>
            @endfor
            </li>
        </ul>
        <input type="hidden" name="rating" id="rating" value="{{ $userReview->rating ?? 0 }}">
    </div>
    <div class="from-grp">
        <label for="comment">Write Your Comment <span>*</span></label>
        <textarea name="review" id="review" cols="30" rows="5" required>{{ $userReview->review ?? '' }}</textarea>
    </div>
    <input type="hidden" name="product_id" value="{{ $product->id }}">
    <button type="submit" class="btn gradient-btn">Submit Now <i class="fas fa-paper-plane"></i></button>
</form>