@extends('Web.Layout.app')

@section('site-title', 'Address')

@section('content')
<div class="dashboard-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4">
                @include('Web.Layout.users.partials.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">
                <div class="order-content">
                    <div class="dash-heading">
                        <h1>Address</h1>
                    </div>
                    <div class="row mb-4">
                        <div class="col-md-6">
                            <div class="address-address-box-wrap">
                                <div class="account-address-box">
                                    <h6>Billing address</h6>
                                    @if($billing_address)
                                        <ul>
                                            <li>Full Name: {{ $billing_address['first_name'] }} {{ $billing_address['last_name'] }}</li>
                                            <li>Street Address: {{ $billing_address['address_line1'] }}</li>
                                            <li>Apartment, Suite, etc: {{ $billing_address['address_line2'] }}</li>
                                            <li>City: {{ $billing_address['city'] }} </li>
                                            <li>State: {{ $billing_address['state'] }}</li>
                                            <li>Postal Code: {{ $billing_address['postal_code'] }}</li>
                                            <li>Country: {{ getCountryByIsoCode($billing_address['country']) }}</li>
                                            <li>Phone: {{ $billing_address['phone'] }}</li>
                                            <li>Email: {{ $billing_address['email'] }}</li>
                                        </ul>
                                    @else
                                        <p>No billing address found</p>
                                    @endif
                                </div>
                                <div class="account-address-bottom">                                
                                    <a href="{{route('user.billing-address')}}"><i class="fa-solid fa-pen"></i>Edit</a>                                
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="address-address-box-wrap">
                                <div class="account-address-box">
                                    <h6>Shipping address</h6>
                                    @if($shipping_address)
                                        <ul>
                                            <li>Full Name: {{ $shipping_address['first_name'] }} {{ $shipping_address['last_name'] }}</li>
                                            <li>Street Address: {{ $shipping_address['address_line1'] }}</li>
                                            <li>Apartment, Suite, etc: {{ $shipping_address['address_line2'] }}</li>
                                            <li>City: {{ $shipping_address['city'] }} </li>
                                            <li>State: {{ $shipping_address['state'] }}</li>
                                            <li>Postal Code: {{ $shipping_address['postal_code'] }}</li>
                                            <li>Country: {{ getCountryByIsoCode($shipping_address['country']) }}</li>
                                            <li>Phone: {{ $shipping_address['phone'] }}</li>
                                            <li>Email: {{ $shipping_address['email'] }}</li>
                                        </ul>
                                    @else
                                        <p>No shipping address found</p>
                                    @endif
                                </div>
                                <div class="account-address-bottom">                                
                                    <a href="{{route('user.shipping-address')}}"><i class="fa-solid fa-pen"></i>Edit</a>                                
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
