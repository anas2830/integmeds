@extends('Web.Layout.app')

@section('site-title', 'Category')

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
                    <div class="row">
                        <div class="col-lg-8">
                            <form>
                                <h4 class="mb-3">Billing Address</h4>
                                <div class="shipping-form-wrap">
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Name <span class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" value=""
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="firstName">Phone Number <span
                                                    class="required">*</span></label>
                                            <input type="text" class="form-control" placeholder="" value=""
                                                required="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="email">Email <span class="required">*</span></label>
                                            <input type="email" class="form-control" placeholder="">
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Region <span class="required">*</span></label>
                                            <select class="custom-select d-block w-100" required="">
                                                <option value="">Please choose your region</option>
                                                <option>Barishal</option>
                                                <option>Chattogram</option>
                                                <option>Dhaka</option>
                                                <option>Khulna</option>
                                                <option>Mymensingh</option>
                                                <option>Rajshahi</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="state">City <span class="required">*</span></label>
                                            <select class="custom-select d-block w-100" required="">
                                                <option value="">Please choose your city</option>
                                                <option>Bandarban</option>
                                                <option>Brahmanbaria</option>
                                                <option>Brahmanbaria - Kasba</option>
                                                <option>Chandpur - Hayemchar</option>
                                                <option>Chattogram Sadar</option>
                                                <option>Feni - Sadar</option>
                                            </select>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="country">Area</label>
                                            <select class="custom-select d-block w-100" required="">
                                                <option value="">Please choose your area</option>
                                                <option>Agrabad</option>
                                                <option>AK Khan</option>
                                                <option>Chandgaon</option>
                                                <option>Chawkbazar</option>
                                                <option>Khulshi</option>
                                            </select>
                                        </div>
                                        <div class="col-lg-12 mb-5">
                                            <label for="address">Address <span class="required">*</span></label>
                                            <input type="text" class="form-control"
                                                placeholder="For Example: House# 123, Street# 123, ABC Road"
                                                required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="different-address-checkbox mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="ship-address">
                                        <label class="form-check-label" for="ship-address">
                                            Ship to a different address?
                                        </label>
                                    </div>
                                </div>
                                <div class="different-address-info">
                                    <div class="shipping-form-wrap">
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Name <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="" value=""
                                                    required="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="firstName">Phone Number <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control" placeholder="" value=""
                                                    required="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="email">Email <span class="required">*</span></label>
                                                <input type="email" class="form-control" placeholder="">
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country">Region <span
                                                        class="required">*</span></label>
                                                <select class="custom-select d-block w-100" required="">
                                                    <option value="">Please choose your region</option>
                                                    <option>Barishal</option>
                                                    <option>Chattogram</option>
                                                    <option>Dhaka</option>
                                                    <option>Khulna</option>
                                                    <option>Mymensingh</option>
                                                    <option>Rajshahi</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="state">City <span class="required">*</span></label>
                                                <select class="custom-select d-block w-100" required="">
                                                    <option value="">Please choose your city</option>
                                                    <option>Bandarban</option>
                                                    <option>Brahmanbaria</option>
                                                    <option>Brahmanbaria - Kasba</option>
                                                    <option>Chandpur - Hayemchar</option>
                                                    <option>Chattogram Sadar</option>
                                                    <option>Feni - Sadar</option>
                                                </select>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <label for="country">Area</label>
                                                <select class="custom-select d-block w-100" required="">
                                                    <option value="">Please choose your area</option>
                                                    <option>Agrabad</option>
                                                    <option>AK Khan</option>
                                                    <option>Chandgaon</option>
                                                    <option>Chawkbazar</option>
                                                    <option>Khulshi</option>
                                                </select>
                                            </div>
                                            <div class="col-lg-12 mb-5">
                                                <label for="address">Address <span
                                                        class="required">*</span></label>
                                                <input type="text" class="form-control"
                                                    placeholder="For Example: House# 123, Street# 123, ABC Road"
                                                    required="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="col-lg-4">
                            <div class="checkout-order-summary-container">
                                <h5 class="center">Your Order</h5>
                                <div class="checkout-oder-sub-total-wrap">
                                    <div class="checkout-oder-sub-total">
                                        <p>Total (5 items)</p>
                                        <p>$557</p>
                                    </div>
                                    <div class="checkout-oder-sub-total">
                                        <p>Delivery Charge</p>
                                        <p>$150</p>
                                    </div>
                                    <div class="checkout-oder-sub-total">
                                        <p>Shipping Discount and Voucher</p>
                                        <p>-$55</p>
                                    </div>
                                </div>
                                <div class="checkout-oder-sub-total-wrap">
                                    <div class="checkout-oder-sub-total">
                                        <p>Grand Total:</p>
                                        <span class="Big-text">$557</span>
                                    </div>
                                </div>
                                <div class="sidebar-payment-method">
                                    <form>
                                        <!-- Credit Card Option -->
                                        <div class="payment-option">
                                            <div class="form-check mb-3">
                                                <div class="check-wrap">
                                                    <input class="form-check-input" type="radio"
                                                        name="paymentMethod" id="creditCard">
                                                    <label class="form-check-label fw-bold" for="creditCard">
                                                        Credit Card (Stripe) </label>
                                                </div>
                                                <div class="text-muted">Pay with your credit card via Stripe.
                                                </div>
                                            </div>
                                            <div class="credit-card-info">
                                                <div class="card-input position-relative">
                                                    <label for="cardNumber" class="form-label">Card Number <span
                                                            class="required-star">*</span></label>
                                                    <input type="text" class="form-control" id="cardNumber"
                                                        placeholder="1234 1234 1234 1234">
                                                    <button type="button"
                                                        class="btn btn-sm btn-success autofill-btn">Autofill
                                                        link</button>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="expiryDate" class="form-label">Expiry Date
                                                            <span class="required-star">*</span></label>
                                                        <input type="text" class="form-control" id="expiryDate"
                                                            placeholder="MM / YY">
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="cvc" class="form-label">Card Code (CVC)
                                                            <span class="required-star">*</span></label>
                                                        <input type="text" class="form-control" id="cvc"
                                                            placeholder="CVC">
                                                    </div>
                                                </div>
                                                <div class="form-check mt-3">
                                                    <input class="form-check-input" type="checkbox"
                                                        id="saveCard">
                                                    <label class="form-check-label" for="saveCard"> Save payment
                                                        information to my account for future purchases. </label>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- PayPal Option -->
                                        <div class="payment-option">
                                            <div class="form-check mb-2">
                                                <div class="check-wrap">
                                                    <input class="form-check-input" type="radio"
                                                        name="paymentMethod" id="paypal" checked>
                                                    <label class="form-check-label fw-bold" for="paypal"> PayPal
                                                        <img src="{{asset('web_assets/images/bg/paypal.svg')}}" alt="PayPal"
                                                            style="height: 20px; margin-left: 10px;"> </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="paypal-info">
                                            <p>Pay via PayPal</p>
                                        </div>

                                        <!-- Email Offer -->
                                        <div class="form-check mb-2">
                                            <input class="form-check-input" type="checkbox" id="emailOptIn">
                                            <label class="form-check-label" for="emailOptIn"> I would like to
                                                receive exclusive emails with discounts and product information
                                            </label>
                                        </div>

                                        <!-- Terms and Conditions -->
                                        <div class="form-check mb-4">
                                            <input class="form-check-input" type="checkbox" id="agreeTerms">
                                            <label class="form-check-label" for="agreeTerms">
                                                I have read and agree to the website terms and conditions <span
                                                    class="required-star">*</span>
                                            </label>
                                        </div>
                                        <!-- Place Order Button -->
                                        <button type="submit" class="btn btn-order">PLACE ORDER</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
    $(document).ready(function() {
        function togglePaymentDetails() {
            if ($('#creditCard').is(':checked')) {
                $('.credit-card-info').slideDown();
                $('.paypal-info').slideUp();
            } else {
                $('.credit-card-info').slideUp();
                $('.paypal-info').slideDown();
            }
        }

        // Initial check on page load
        togglePaymentDetails();

        // Listen for changes
        $('input[name="paymentMethod"]').on('change', function() {
            togglePaymentDetails();
        });
    });
</script>
<script>
    $(document).ready(function () {
        function togglePaymentDetails() {
            if ($('#ship-address').is(':checked')) {
                $('.different-address-info').slideDown();
            } else {
                $('.different-address-info').slideUp();
            }
        }

        $('#ship-address').on('change', togglePaymentDetails);
        
        togglePaymentDetails();
    });
</script>
@endpush

