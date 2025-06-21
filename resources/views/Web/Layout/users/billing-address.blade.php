@extends('Web.Layout.app')

@section('site-title', 'Billing Shipping Address')

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
                        <h1>Accounts Details</h1>
                    </div>
                    <div class="account-billing-address-wrap">
                        <form action="{{ route('user.billing-address.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Country/Region <span class="required">*</span></label>
                                        <select class="form-select select2" name="country" id="country" required style="width: 100%;">
                                            <option value="">Please choose your country/region</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country['name'] }}">{{ $country['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Phone <span class="required">*</span></label>
                                        <input type="text" class="form-control" placeholder="" value=""
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Email <span class="required">*</span></label>
                                        <input type="email" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Region <span class="required">*</span></label>
                                        <select class="form-select" required="">
                                            <option value="">Please choose your region</option>
                                            <option>Barishal</option>
                                            <option>Chattogram</option>
                                            <option>Dhaka</option>
                                            <option>Khulna</option>
                                            <option>Mymensingh</option>
                                            <option>Rajshahi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">City <span class="required">*</span></label>
                                        <select class="form-select" required="">
                                            <option value="">Please choose your city</option>
                                            <option>Bandarban</option>
                                            <option>Brahmanbaria</option>
                                            <option>Brahmanbaria - Kasba</option>
                                            <option>Chandpur - Hayemchar</option>
                                            <option>Chattogram Sadar</option>
                                            <option>Feni - Sadar</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label class="form-label">Area <span class="required">*</span></label>
                                        <select class="form-select" required="">
                                            <option value="">Please choose your area</option>
                                            <option>Agrabad</option>
                                            <option>AK Khan</option>
                                            <option>Chandgaon</option>
                                            <option>Chawkbazar</option>
                                            <option>Khulshi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="mb-4">
                                        <label class="form-label">Address <span
                                                class="required">*</span></label>
                                        <input type="text" class="form-control"
                                            placeholder="For Example: House# 123, Street# 123, ABC Road"
                                            required="">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="account-billing-btn">
                                        <button class="btn" type="submit">Save changes</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#country').select2();
        });
    </script>
@endpush