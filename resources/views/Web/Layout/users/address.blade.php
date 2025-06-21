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
                                    @if($user->billing_address)
                                        <ul>
                                            <li>Kashem Ali</li>
                                            <li>Dhaka</li>
                                            <li>Mobile: 012-345-6789</li>
                                            <li>kashem@example.com</li>
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
                                    @if($user->shipping_address)
                                        <ul>
                                            <li>Kashem Ali</li>
                                            <li>Dhaka</li>
                                            <li>Mobile: 012-345-6789</li>
                                            <li>kashem@example.com</li>
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
