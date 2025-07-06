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
                                                            <span class="cart-price">{{config('app.currency_symbol')}}{{ $item->price }}</span>
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
                                                            <span class="subtotal-price">{{config('app.currency_symbol')}}{{ $item->price * $item->quantity }}</span>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                <tr>
                                                    <td colspan="4" class="text-end automation-btn-delete">
                                                        <a href="{{ route('shopping.cart.remove.all') }}" class="cart-empty-btn me-2">Empty Cart</a>
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
                                    <h6>subtotal <span>{{config('app.currency_symbol')}} <span class="cart-subtotal"> {{ $cartSubtotal }} </span></span></h6>
                                    {{-- <h6>Tax <span>(+) $100.00</span></h6> --}}
                                    <h6>Discount <span>(-) $ <span class="coupon-amount">{{Session::get('coupon_amount') ?? 0}}</span></span></h6>
                                    <h4>Total <span>{{config('app.currency_symbol')}} <span class="total-price">{{ $cartSubtotal - Session::get('coupon_amount') }}</span></span></h4>
                                    {{-- @dd(Session::get('coupon_code')); --}}
                                    <form id="apply-coupon-form" method="POST">
                                        @csrf
                                        @if(!session()->has('coupon_code'))
                                            <div class="coupon-input">  <!-- moved coupon-input class here -->
                                                <input
                                                    class="form-control"
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
                                            </div>          
                                        @endif
                                    
                                        <div id="applied-coupon" style="{{ session()->has('coupon_code') ? '' : 'display:none' }}">
                                            @if(session()->has('coupon_code'))
                                                <p>
                                                    Coupon Code: <span id="coupon-name">{{ session('coupon_code') ?? '' }}</span>
                                                    <a href="{{ route('coupon.remove', session('coupon_code')) }}" id="remove-coupon">
                                                        <i class="fas fa-times" aria-hidden="true"></i>
                                                    </a>
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

$(document).ready(function () {
    const msg = $('#coupon-message');
    const couponInput = $('.coupon-input');  // now the wrapper div
    const appliedCoupon = $('#applied-coupon');
    const couponName = $('#coupon-name');
    const discountDiv = $('.coupon-amount');
    const totalPriceDiv = $('.total-price');
    const subtotal = parseFloat($('.cart-subtotal').text().trim());

    console.log('subtotal:', subtotal);

    $(document).on('submit', '#apply-coupon-form', function (e) {
        e.preventDefault();

        const input = $(this).find('input[name="coupon_code"]');
        const couponCode = input.val().trim();

        if (!couponCode) {
            msg.css('color', 'red').text('Please enter a coupon code.');
            return;
        }

        $.ajax({
            url: "{{ route('coupon.apply') }}",
            method: 'POST',
            data: {
                _token: '{{ csrf_token() }}',
                coupon_code: couponCode
            },
            success: function (response) {
                if (response.status === 'success') {
                    showSuccessMessage(response.message);

                    appliedCoupon.html(`
                        <p>
                            Coupon Code: <span id="coupon-name">${response.coupon_code}</span>
                            <a href="/remove/coupon/${response.coupon_code}" id="remove-coupon">
                                <i class="fas fa-times" aria-hidden="true"></i>
                            </a>
                        </p>
                    `);

                    couponName.text(response.coupon_code);
                    discountDiv.text(response.coupon_amount);

                    // Safe parseFloat and avoid negative or NaN total
                    const couponAmount = parseFloat(response.coupon_amount) || 0;
                    const newTotal = subtotal - couponAmount;
                    totalPriceDiv.text(newTotal >= 0 ? newTotal.toFixed(2) : '0.00');

                    appliedCoupon.show();

                    couponInput.remove(); // removes the entire input+button wrapper
                    msg.empty();
                } else {
                    msg.css('color', 'red').text(response.message);
                }
            },
            error: function (xhr) {
                const errors = xhr.responseJSON?.errors;
                if (errors?.coupon_code) {
                    msg.css('color', 'red').text(errors.coupon_code[0]);
                } else if (xhr.responseJSON?.message) {
                    msg.css('color', 'red').text(xhr.responseJSON.message);
                } else {
                    msg.css('color', 'red').text('Something went wrong. Please try again.');
                }
            }
        });
    });
});

// empty cart 
const makeCartEmpty = "{{ route('shopping.cart.remove.all') }}";
$('.automation-btn-delete').on('click', function(e){
    e.preventDefault();
    const url = makeCartEmpty
    Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        type: "warning",
        showCancelButton: !0,
        confirmButtonColor: "#34c38f",
        cancelButtonColor: "#f46a6a",
        confirmButtonText: "Yes, remove it!"
    }).then(function(t) {
        console.log('t', t);
        if(t.value){
            $.ajax({
                url: url,
                type: 'get',
                success: function(response) {
                    Swal.fire({
                        title: "Removed!",
                        type: "success",
                    }).then(function(t) {
                        location.reload();
                    });
                },
                error: function(xhr) {
                    Swal.fire({
                        title: "Error!",
                        text: "There was a problem deleting the items from the cart.",
                    });
                }
            });
        }
    })
});

</script>
@endpush

