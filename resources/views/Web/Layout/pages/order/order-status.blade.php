@extends('Web.Layout.app')

@section('site-title', 'Payment Failed')

@push('css')
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.css">
@endpush
@section('content')

@if(session()->has('order_failed'))
<div class="container py-5 text-center">
    <h2 class="text-danger mb-3">Payment Failed</h2>
    <p class="lead">{{ session('order_failed', 'Sorry! Your transaction could not be completed.') }}</p>
    <p>You will be redirected to the homepage in <span id="countdown">5</span> seconds.</p>
    <a href="{{ url('/') }}" class="btn btn-outline-danger mt-3">Go Home Now</a>
</div>
@elseif(session()->has('order_cancelled'))
<div class="container py-5 text-center">
    <h2 class="text-warning mb-3">Payment Cancelled</h2>
    <p class="lead">{{ session('message', 'You cancelled the payment process.') }}</p>
    <p>You will be redirected to the homepage in <span id="countdown">5</span> seconds.</p>
    <a href="{{ url('/') }}" class="btn btn-outline-warning mt-3">Go Home Now</a>
</div>
@endif


@endsection


@push('script')
<script>
    let seconds = 5;
    const countdownEl = document.getElementById('countdown');

    const interval = setInterval(() => {
        seconds--;
        countdownEl.textContent = seconds;
        if (seconds <= 0) {
            clearInterval(interval);
            window.location.href = "{{ url('/') }}";
        }
    }, 1000);
</script>
@endpush

