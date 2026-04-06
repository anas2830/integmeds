@extends('Web.Layout.app')

@section('site-title', 'Checkout')

@push('dynamic_meta')
    @include('Web.Layout.partials.common-meta')
@endpush

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
                                <h4 class="mb-3">Billing Address</h4>
                                <x-Web.checkout.billing-address :billingAddress="$billingAddress" :countries="$countries" />
                                <div class="different-address-checkbox mb-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="ship_to_different_address" value="1" id="ship-address" class="ship_to_different_address"
                                            {{ old('ship_to_different_address') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="ship-address">
                                            Ship to a different address?
                                        </label>
                                    </div>
                                </div>
                                
                                <div class="different-address-info">
                                    <x-Web.checkout.shipping-address :shippingAddress="$shippingAddress" :countries="$countries" />
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="checkout-order-summary-container">
                                    <h5 class="center">Your Order</h5>
                                    <div class="checkout-oder-sub-total-wrap">
                                        <div class="checkout-oder-sub-total">
                                            <p>Total ({{$cartCount}}items)</p>
                                            <p>{{config('app.currency_symbol')}}<span class="cart-subtotal" id="checkout-cart-subtotal">{{$cartSubtotal}}</span></p>
                                        </div>
                                        <div class="checkout-oder-sub-total">
                                            <p>Discount</p>
                                            <p>-{{config('app.currency_symbol')}}<span class="coupon-amount">{{$couponAmount ?? 0}}</span></p>
                                        </div>
                                        <div class="checkout-oder-sub-total">
                                            <p>Shipping Cost</p>
                                            <p>+{{config('app.currency_symbol')}}<span class="shipping-cost">0</span></p>
                                        </div>
                                    </div>
                                    <div class="checkout-oder-sub-total-wrap">
                                        <div class="checkout-oder-sub-total">
                                            <p>Grand Total:</p>
                                            <span class="Big-text">{{config('app.currency_symbol')}} <span class="total-price">{{$cartSubtotal - $couponAmount}}</span></span>
                                        </div>
                                    </div>
                                    <div class="mb-3">
                                        @if ($errors->has('min_order_error'))
                                            <small class="text-danger">
                                                {{ $errors->first('min_order_error') }}
                                            </small>
                                        @endif

                                        @if ($errors->has('courier_service_id'))
                                            <small class="text-danger" id="courier-service-error">
                                                {{ $errors->first('courier_service_id') }}
                                            </small>
                                        @endif

                                        @if($errors->has('error'))
                                            <small class="text-danger" id="error-message">
                                                {{ $errors->first('error') }}
                                            </small>
                                        @endif
        
                                    </div>
                                    <div class="sidebar-payment-method">

                                        
                                        @if ($shippingMethods->isNotEmpty())
                                            <div class="payment-option p-3 shipping-method">
                                                <p class="text-start mb-3">Shipping Option</p>
                                                <div class="shipping-option">
                                                    <div class="form-group">
                                                        <select name="shipping_method_id" class="form-select shipping-method-select" id="shipping_method_select">
                                                            <option value="">Select Shipping</option>
                                                            @foreach ($shippingMethods as $method)
                                                                <option value="{{ $method->id }}">
                                                                    {{ $method->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                        <div class="invalid-feedback shipping-method-error">
                                                            @if(session()->has('courier_service_id'))
                                                                {{ session()->get('courier_service_id') }}
                                                            @endif
                                                        </div>
                                                    </div>
                                                    <div id="shipping-method-loading" class="text-center py-3" style="display: none;">
                                                        <i class="fas fa-spinner fa-spin fa-2x text-success"></i>
                                                        <p class="mt-2">Loading shipping methods...</p>
                                                    </div>
                                                    <div id="shipping-method-container"></div>
                                                </div>
                                            </div>
                                        @endif
                                        <!-- Payment Option -->
                                        <div class="payment-option p-3">
                                            <p class="text-start mb-3">Payment Option</p>
                                           
                                            <div class="form-check mb-2">
                                                <div class="check-wrap">
                                                    <input class="form-check-input" type="radio" name="paymentMethod" value="stripe" id="stripe-option" checked>
                                                    <label class="form-check-label fw-bold" for="stripe-option">
                                                        Stripe
                                                        <img src="{{ asset('web_assets/images/bg/stripe.png') }}" alt="Stripe" style="height: 20px; margin-left: 10px;">
                                                    </label>
                                                </div>
                                            </div>

                                            {{-- <div class="form-check mb-2">
                                                <div class="check-wrap">
                                                    <input class="form-check-input" type="radio"
                                                        name="paymentMethod" value="sslcommerz" id="ssl-commerz">
                                                    <label class="form-check-label fw-bold" for="ssl-commerz"> SSL Commerz
                                                        <img src="{{asset('web_assets/images/bg/ssl-commerz.png')}}" alt="Ssl Commerz"
                                                            style="height: 20px; margin-left: 10px;"> </label>
                                                </div>
                                            </div>
                                            <span class="fs-small">SSL Commerz is allowed only for Bangladesh</span> --}}
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
                                                I have read and agree to the website <a href="{{ url('/terms-condition') }}" class="text-success">terms and conditions</a> <span class="required-star">*</span>
                                            </label>
                                            @error('agree_terms') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                        </div>

                                        <!-- Place Order Button -->
                                        <button type="submit" class="btn btn-order">PLACE ORDER</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')
<script>
$(document).ready(function () {

    function toggleShippingBilling() {
        const isDifferentAddress = $('#ship-address').is(':checked');
        const $formFields = $('.shipping-form-wrap input, .shipping-form-wrap select');
        const $shippingMethod = $('.shipping-method');
        const country = isDifferentAddress
            ? $('select[name="shipping[country]"]').val()
            : $('select[name="billing[country]"]').val();

        if (isDifferentAddress) {
            $('.different-address-info').slideDown();
            $formFields.attr('required', true);
        } else {
            $('.different-address-info').slideUp();
            $formFields.removeAttr('required');
        }

        resetShippingMethod();

        $shippingMethod.addClass('d-none');
        $('#courier-service-error').hide();
        updateShippingCostSummary();

        // if (country === 'US' || country === 'CA' || country === 'SA') {
        //     $shippingMethod.addClass('d-none');
        //     $('#courier-service-error').hide();
        //     updateShippingCostSummary();
        // } else {
        //     $('#courier-service-error').show();
        //     $shippingMethod.removeClass('d-none');
        // }
    }

    $('#ship-address').on('change', toggleShippingBilling);
    toggleShippingBilling();

    function resetShippingMethod() {
        $('#shipping-method-container').html('');
        $('#shipping_method_select').val(null);
        const subtotal = parseFloat($('#checkout-cart-subtotal').text()) || 0;
        const coupon = parseFloat($('.coupon-amount').text()) || 0;
        const total = parseFloat((subtotal - coupon).toFixed(2));
        $('.shipping-cost').text(0);
        $('.total-price').text(total.toFixed(2));
    }

    function getAdjustedShippingCost(baseCost) {
        return baseCost;
    }

    $('#shipping_method_select').on('change', function() {
        $('.shipping-method-error').html('').hide();

        var shippingMethodId = $(this).val();

        var postData = {
            shipping_method_id: shippingMethodId,
            billing: {
                country: $('select[name="billing[country]"]').val(),
                postal_code: $('input[name="billing[postal_code]"]').val(),
                city: $('input[name="billing[city]"]').val(),
                state: $('input[name="billing[state]"]').val(),
            },
            shipping: {
                country: $('select[name="shipping[country]"]').val(),
                postal_code: $('input[name="shipping[postal_code]"]').val(),
                city: $('input[name="shipping[city]"]').val(),
                state: $('input[name="shipping[state]"]').val(),
            },
            ship_to_different_address: $('input[name="ship_to_different_address"]').prop('checked') ? 1 : 0,
            _token: '{{ csrf_token() }}',
        };

        $.ajax({
            url: "{{ route('shipping.rates') }}",
            method: 'POST',
            data: postData,
            dataType: 'json',
            beforeSend: function () {
                $('#shipping-method-loading').show();
                $('#shipping-method-container').hide();
                $('.shipping-method-error').hide().html('');
            },
            success: function (response) {
                if (response.success) {
                    $('#shipping-method-container').html(response.html).show();

                    const $firstRadio = $('.shipping-radio').first();

                    if ($firstRadio.length) {
                        const baseShippingCost = parseFloat($firstRadio.data('charge')) || 0;
                        const shippingCost = getAdjustedShippingCost(baseShippingCost);

                        const subtotal = parseFloat($('#checkout-cart-subtotal').text()) || 0;
                        const coupon = parseFloat($('.coupon-amount').text()) || 0;
                        const total = parseFloat((subtotal + shippingCost - coupon).toFixed(2));

                        $('.shipping-cost').text(shippingCost.toFixed(2));
                        $('.total-price').text(total.toFixed(2));

                        $firstRadio.prop('checked', true);
                        updateHiddenCourierFields($firstRadio);

                        $.post("{{ route('update.shipping.cost') }}", {
                            shipping_cost: shippingCost.toFixed(2),
                            _token: '{{ csrf_token() }}'
                        });
                    }
                }
                $('#shipping-method-loading').hide();
            },
            error: function (xhr) {
                $('#shipping-method-loading').hide();
                $('#shipping-method-container').show();

                if (xhr.status === 422) {
                    var errors = xhr.responseJSON.errors;
                    var messages = [];
                    $.each(errors, function(field, msgs) {
                        messages = messages.concat(msgs);
                    });
                    $('.shipping-method-error').html(messages.join('<br>')).show();
                } else {
                    $('.shipping-method-error').text('Something went wrong, please try again.').show();
                }
                $('#shipping_method_select').val(null);
            }
        });
    });

    function updateHiddenCourierFields($radio) {
        const $parent = $radio.closest('.form-check');
        $('#selected_courier_name').val($parent.find('.shipping-courier-name').val());
        $('#selected_delivery_time').val($parent.find('.shipping-delivery-time').val());
        $('#selected_courier_total_charge').val($parent.find('.shipping-courier-total-charge').val());
    }

    $(document).on('click', '.shipping-radio', function () {
        const baseShippingCost = parseFloat($(this).data('charge')) || 0;
        const shippingCost = getAdjustedShippingCost(baseShippingCost);

        const subtotal = parseFloat($('#checkout-cart-subtotal').text()) || 0;
        const coupon = parseFloat($('.coupon-amount').text()) || 0;
        const total = parseFloat((subtotal + shippingCost - coupon).toFixed(2));

        $('.shipping-cost').text(shippingCost.toFixed(2));
        $('.total-price').text(total.toFixed(2));

        $.post("{{ route('update.shipping.cost') }}", {
            shipping_cost: shippingCost.toFixed(2),
            _token: '{{ csrf_token() }}'
        });
        if (this.checked) {
            updateHiddenCourierFields($(this));
        }
    });
    //SHIPPING COUNTRY CHANGE
    $(document).on('change', 'select[name="shipping[country]"]', function () {
        if ($('input[name="ship_to_different_address"]').prop('checked')) {
            handleAddressChange('shipping[country]');
        }
    });

    // BILLING COUNTRY CHANGE
    $(document).on('change', 'select[name="billing[country]"]', function () {
        console.log('billing country change');
        
        if (!$('input[name="ship_to_different_address"]').prop('checked')) {
            handleAddressChange('billing[country]');
        }
    });

    // SHIPPING POSTAL CODE INPUT (debounced)
    let shippingPostalTimer;
    $(document).on('input', 'input[name="shipping[postal_code]"]', function () {
        clearTimeout(shippingPostalTimer);
        shippingPostalTimer = setTimeout(() => {
            if ($('input[name="ship_to_different_address"]').prop('checked')) {
                handleAddressChange('shipping[postal_code]');
            }
        }, 400);
    });

    // BILLING POSTAL CODE INPUT (debounced)
    let billingPostalTimer;
    $(document).on('input', 'input[name="billing[postal_code]"]', function () {
        clearTimeout(billingPostalTimer);
        billingPostalTimer = setTimeout(() => {
            if (!$('input[name="ship_to_different_address"]').prop('checked')) {
                handleAddressChange('billing[postal_code]');
            }
        }, 400);
    });

    // Shared handler function
    function handleAddressChange(fieldName) {
        const isShipToDifferent = $('input[name="ship_to_different_address"]').prop('checked');
        const selectedCountry = isShipToDifferent
            ? $('select[name="shipping[country]"]').val()
            : $('select[name="billing[country]"]').val();

        // Clear previous selection
        $('#shipping_method_select').val(null);
        $('#shipping-method-container').html('');

        switch (selectedCountry) {
            case 'US': 
                $('#courier-service-error').hide();
                $('.shipping-method').toggleClass('d-none', true);
                updateShippingCostSummary({{config('shipping.fixed_rates.US')}});
                break;
            case 'CA':
                $('#courier-service-error').hide();
                $('.shipping-method').toggleClass('d-none', true);
                updateShippingCostSummary({{config('shipping.fixed_rates.CA')}});
                break;
            // case 'SA':
            //     $('#courier-service-error').hide();
            //     $('.shipping-method').toggleClass('d-none', true);
            //     updateShippingCostSummary({{config('shipping.fixed_rates.SA')}});
            //     break;
            // default:
            //     $('#courier-service-error').show();
            //     $('.shipping-method').toggleClass('d-none', false);
            //     resetShippingMethod();
            //     break;
            default:
                $('#courier-service-error').hide();
                $('.shipping-method').toggleClass('d-none', true);
                updateShippingCostSummary({{config('shipping.fixed_rates.OTHER')}});
                break;
        }
    }

    function updateShippingCostSummary(baseCost = 0) {
        const shippingCost = getAdjustedShippingCost(baseCost);
        const subtotal = parseFloat($('#checkout-cart-subtotal').text()) || 0;
        const coupon = parseFloat($('.coupon-amount').text()) || 0;
        const total = parseFloat((subtotal + shippingCost - coupon).toFixed(2));

        $('.shipping-cost').text(shippingCost.toFixed(2));
        $('.total-price').text(total.toFixed(2));

        $.post("{{ route('update.shipping.cost') }}", {
            shipping_cost: shippingCost.toFixed(2),
            _token: '{{ csrf_token() }}'
        });
    }


});

</script>
@endpush

