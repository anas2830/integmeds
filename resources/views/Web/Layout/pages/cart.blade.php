@extends('Web.Layout.app')

@section('site-title', 'Cart')

@section('content')
<div class="category-and-sidebar">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 order-lg-1 order-2 ">
                <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />
                <x-Web.common.sidebar.sidebar-best-seller :bestSellingProducts="$bestSellingProducts" />
            </div>
            <div class="col-lg-9 order-lg-2 order-1">
                <section class="cart-page-wrap">
                    <div class="main-cart-wrapper">
                        @if($cartContents->isNotEmpty())
                            <span class="cart-items-area">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if($cartContents->isEmpty())
                                                <tr>
                                                    <td colspan="4" class="text-center">No item in the cart</td>
                                                </tr>
                                            @endif

                                            <form action="{{route('shopping.cart.update')}}" method="POST">
                                                @csrf
                                                @php
                                                    $failedStockIds = old('out_of_stock_ids', $errors->get('out_of_stock_ids', []));
                                                @endphp

                                                @foreach($cartContents as $item)
                                                    <tr id="rowId_{{$item->id}}">
                                                        <td>
                                                            <span class="d-flex gap-4 align-items-center">
                                                                <a href="{{route('shopping.cart.remove.single',$item->id)}}" class="remove-icon">
                                                                    <img src="{{asset('web_assets/images/icon/remove-icon.svg')}}" alt="img">
                                                                </a>
                                                                <span class="main-cart-img">
                                                                    <img src="{{asset($item->attributes->product_image)}}" alt="{{ $item->name }}" title="{{ $item->name }}">
                                                                </span>
                                                                <span class="cart-title">
                                                                    <a href="{{ route('product-details', $item->attributes->slug) }}">{{$item->name}}</a>
                                                                </span>
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <span class="cart-price">${{ $item->price }}</span>
                                                        </td>
                                                        <td>
                                                            <input type="hidden" name="rowId[]" value="{{$item->id}}">
                                                            <span class="quantity-basket">
                                                                <span class="qty">
                                                                    <button class="qtyminus" aria-hidden="true">−</button>
                                                                    <input type="number" class="qtybutton-input" value="{{ $item->quantity }}" name="qty[]" min="1" max="100" step="1">
                                                                    <button class="qtyplus" aria-hidden="true">+</button>
                                                                </span>
                                                            </span>

                                                            @if(in_array($item->id, $failedStockIds))
                                                                <div class="out-of-stock mt-2 alert alert-danger p-1 rounded">
                                                                    Out of stock or insufficient quantity
                                                                </div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <span class="subtotal-price">${{ $item->price * $item->quantity }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="text-end">
                                                        <button type="submit" class="cart-update-btn">Update Cart</button>
                                                    </td>
                                                </tr>
                                            </form>
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @dd(session()->all()); --}}
                                <div class="cart-page-summary">
                                    <h3>Billing summary</h3>
                                    <h6>subtotal <span>$ <span class="cart-subtotal"> {{ $cartSubtotal }} </span></span></h6>
                                    {{-- <h6>Tax <span>(+) $100.00</span></h6> --}}
                                    <h6>Discount <span>(-) $ <span class="coupon-amount">{{Session::get('coupon_amount') ?? 0}}</span></span></h6>
                                    <h4>Total <span>$ <span class="total-price">{{ $cartSubtotal - Session::get('coupon_amount') }}</span></span></h4>
                                    {{-- @dd(Session::get('coupon_code')); --}}
                                    <form id="apply-coupon-form" method="POST">
                                        @csrf
                                        @if(!session()->has('coupon_code'))
                                            <input class="form-control"
                                                type="text"
                                                name="coupon_code"
                                                placeholder="Coupon code"
                                                @if(session()->has('coupon_code'))
                                                    value="{{ session('coupon_code') }}"
                                                    readonly
                                                @else
                                                    required
                                                @endif
                                            >
                                            <button type="submit" class="common_btn" id="apply-btn">Apply</button>
                                        @endif
                                    
                                        <div id="applied-coupon" class="{{ session()->has('coupon_code') ? '' : 'display:none' }}">
                                            @if(session()->has('coupon_code'))
                                                <p>
                                                    Coupon Code: <span id="coupon-name">{{ session('coupon_code') ?? '' }}</span>
                                                    <a href="{{ route('coupon.remove', session('coupon_code')) }}" id="remove-coupon"><i class="fas fa-times" aria-hidden="true"></i></a>
                                                </p>
                                            @endif
                                        </div>
                                    
                                        <small id="coupon-message" class="text-danger ms-2"></small>
                                    </form>
                                    
                                </div>
                                <div class="cart-summary-btn">
                                    <a class="checkout-bnt" href="{{route('checkout')}}">Proccess to Checkout <i class="fas fa-long-arrow-right" aria-hidden="true"></i></a>
                                </div>
                            </span>
                        @else
                            <div class="my-cart-item-details-wrap text-center p-4">
                                <span class="mt-5"> No item in the cart</span>
                            </div>
                        @endif
                        <div id="no-cart-item"></div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    $(function() {
    const $form = $('#apply-coupon-form');
    const $msg = $('#coupon-message');
    const $appliedCoupon = $('#applied-coupon');
    const $couponName = $('#coupon-name');
    const $applyBtn = $('#apply-btn');
    const $input = $form.find('input[name="coupon_code"]');
    const $discountDiv = $('.coupon-amount');
    const $toallPriceDiv = $('.total-price');
    const subtotal = parseInt($('#cart-subtotal').text().trim());

    // Apply coupon
    $form.on('submit', function(e) {
        e.preventDefault();

        let couponCode = $input.val().trim();
        if (!couponCode) {
            $msg.css('color', 'red').text('Please enter a coupon code.');
            return;
        }

        $.ajax({
            url: "{{ route('coupon.apply') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                coupon_code: couponCode
            },
            success: function(response) {
                if (response.status === 'success') {
                    showSuccessMessage(response.message);

                    const couponCode = response.coupon_code;

                    $appliedCoupon.html(
                        `<p>
                            Coupon Code: <span id="coupon-name">${couponCode}</span>
                            <a href="/remove/coupon/${couponCode}" id="remove-coupon">
                                <i class="fas fa-times" aria-hidden="true"></i>
                            </a>
                        </p>`
                    );
                    $couponName.text(couponCode);
                    $discountDiv.text(response.coupon_amount);
                    $toallPriceDiv.text(subtotal - response.coupon_amount);
                    $appliedCoupon.show();
                    $input.remove();
                    $applyBtn.remove();
                    $msg.empty();
                } else {
                    $msg.css('color', 'red').text(response.message);
                }

            },
            error: function(xhr) {
                let errors = xhr.responseJSON?.errors;
                if (errors && errors.coupon_code) {
                    $msg.css('color', 'red').text(errors.coupon_code[0]);
                } else if (xhr.responseJSON?.message) {
                    $msg.css('color', 'red').text(xhr.responseJSON.message);
                } else {
                    $msg.css('color', 'red').text('Something went wrong. Please try again.');
                }
            }
        });
    });
});

</script>
@endpush

