@php
    $rating = floatval($rating);
@endphp

@if ($rating > 0)
    @php
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars) >= 0.25 && ($rating - $fullStars) < 0.75;
        $emptyStars = 5 - $fullStars - ($halfStar ? 1 : 0);
    @endphp

    @for ($i = 0; $i < $fullStars; $i++)
        <i class="fa-solid fa-star"></i>
    @endfor

    @if ($halfStar)
        <i class="fa-solid fa-star-half"></i>
    @endif
@endif
