@extends('Web.Layout.app')

@section('site-title', 'Checkout')

@section('content')
<section class="checkout-page-area">
    <div class="container">
        <div class="coustomar-billing-details-wrap">
            <div class="row">
                <div class="col-lg-3 order-lg-1 order-2">
                    <x-Web.common.sidebar.sidebar-product-bundle :productBundles="$productBundles" />
                    <x-Web.common.sidebar.sidebar-special-offer :specialOffers="$specialOffers" />
                </div>
                <div class="col-lg-9 order-lg-2 order-1">
                    <form action="{{ route('place.order') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <form>
                                    <h4 class="mb-3">Billing Address</h4>
                                    <x-Web.checkout.billing-address :billingAddress="$billingAddress" :countries="$countries" />
                                    <div class="different-address-checkbox mb-4">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" name="ship_to_different_address" value="1" id="ship-address"
                                                {{ old('ship_to_different_address') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="ship-address">
                                                Ship to a different address?
                                            </label>
                                        </div>
                                    </div>
                                    
                                    <div class="different-address-info">
                                        <x-Web.checkout.shipping-address :shippingAddress="$shippingAddress" :countries="$countries" />
                                    </div>
                                </form>
                            </div>
                            <div class="col-lg-4">
                                <div class="checkout-order-summary-container">
                                    <h5 class="center">Your Order</h5>
                                    <div class="checkout-oder-sub-total-wrap">
                                        <div class="checkout-oder-sub-total">
                                            <p>Total ({{$cartCount}}items)</p>
                                            <p>$<span class="cart-subtotal">{{$cartSubtotal}}</span></p>
                                        </div>
                                        <div class="checkout-oder-sub-total">
                                            <p>Discount</p>
                                            <p>-$<span class="coupon-amount">{{$couponAmount ?? 0}}</span></p>
                                        </div>
                                    </div>
                                    <div class="checkout-oder-sub-total-wrap">
                                        <div class="checkout-oder-sub-total">
                                            <p>Grand Total:</p>
                                            <span class="Big-text">$ <span class="total-price">{{$cartSubtotal - $couponAmount}}</span></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @if(session('min_order_error'))
                                            <small class="text-danger">
                                                {{ session('min_order_error') }}
                                            </small>
                                        @endif
                                    </div>
                                    <div class="sidebar-payment-method">
                                        <!-- Payment Option -->
                                        <div class="payment-option">
                                            <div class="form-check mb-2">
                                                <div class="check-wrap">
                                                    <input class="form-check-input" type="radio"
                                                        name="paymentMethod" value="sslcommerz" id="ssl-commerz" checked>
                                                    <label class="form-check-label fw-bold" for="ssl-commerz"> SSL Commerz
                                                        <img src="{{asset('web_assets/images/bg/ssl-commerz.png')}}" alt="Ssl Commerz"
                                                            style="height: 20px; margin-left: 10px;"> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Email Offer -->
                                        <!-- Email Opt-In -->
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" name="newsletter_subscription" value="1" id="newsletter_subscription"
                                                {{ old('newsletter_subscription') ? 'checked' : '' }}>
                                            <label class="form-check-label" for="newsletter_subscription">
                                                I would like to receive exclusive emails with discounts and product information
                                            </label>
                                        </div>

                                        <!-- Terms and Conditions -->
                                        <div class="form-check mb-4">
                                            <input class="form-check-input @error('agree_terms') is-invalid @enderror" type="checkbox" name="agree_terms" value="1" id="agreeTerms"
                                                {{ old('agree_terms') ? 'checked' : '' }} required>
                                            <label class="form-check-label" for="agreeTerms">
                                                I have read and agree to the website terms and conditions <span class="required-star">*</span>
                                            </label>
                                            @error('agree_terms') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                        </div>

                                        <!-- Place Order Button -->
                                        <button type="submit" class="btn btn-order">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
$(document).ready(function () {
    function togglePaymentDetails() {
        if ($('#ship-address').is(':checked')) {
            $('.different-address-info').slideDown();
            $('.shipping-form-wrap input, .shipping-form-wrap select').attr('required', true);
        } else {
            $('.different-address-info').slideUp();
            $('.shipping-form-wrap input, .shipping-form-wrap select').removeAttr('required');
        }
    }

    $('#ship-address').on('change', togglePaymentDetails);

    togglePaymentDetails();
});

</script>
@endpush

