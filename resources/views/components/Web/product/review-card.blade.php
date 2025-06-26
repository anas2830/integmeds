@props(['review'])

<div class="review-info">
    <div class="review-img">
        <img src="{{ $review->user && $review->user->profile_image ? asset($review->user->profile_image) : asset('web_assets/images/bg/profile-photo.png') }}" alt="{{ $review->user->name }}" class="img-fluid">
    </div>
    <div class="review-content">
        <ul class="review-rating">
            <li>
                <x-Web.common.star-rating :rating="$review->rating" />
            </li>
        </ul>
        <div class="review-meta">
            <h6>{{ $review->user->name }}
                <span>- {{ \Carbon\Carbon::parse($review->created_at)->format('M d, Y') }}</span>
            </h6>
        </div>
        <p>{{ $review->review }}</p>
    </div>
</div>
