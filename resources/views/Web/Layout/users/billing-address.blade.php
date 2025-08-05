@extends('Web.Layout.app')

@section('site-title', 'Billing Shipping Address')

@push('css')
    <style>
        .select2-selection{
            height: 38px;
            padding: 0.375rem 0.75rem;
            border: 1px solid #ced4da;
            border-radius: 0.375rem;
            background-color: #fff;
            line-height: 1.5;
            font-size: 1rem;
            transition: border-color .15s ease-in-out, box-shadow .15s ease-in-out;
        }
        .select2-container .select2-selection--single{
            height: 40px !important;
        }

        /* Remove the blue border when focused */
        .select2-container--default .select2-selection--single:focus {
            box-shadow: none;
            border-color: #86b7fe;
        }

        /* Match caret (dropdown arrow) style */
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 40px;
            top: 0px;
            right: 10px;
        }
    </style>
@endpush

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
                        <h1>Billing Address</h1>
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="account-billing-address-wrap">
                        <form action="{{ route('user.billing-address.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="firstName">First Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="firstName" name="first_name" required value="{{ $billing_address['first_name'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="lastName">Last Name <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="lastName" name="last_name" required value="{{ $billing_address['last_name'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Email <span class="required">*</span></label>
                                    <input type="email" class="form-control" placeholder="" required name="email" value="{{ $billing_address['email'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone <span class="required">*</span></label>
                                    <input type="text" class="form-control" placeholder="" required name="phone" value="{{ $billing_address['phone'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Country/Region <span class="required">*</span></label>
                                    <select class="select2 form-control" name="country" id="country" required style="width: 100%;">
                                        <option value="">Please choose your country/region</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country['iso2'] }}" {{ $billing_address['country'] == $country['iso2'] ? 'selected' : '' }}>{{ $country['name'] }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address">Street Address <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="address" name="address_line1" placeholder="1234 Main St" required value="{{ $billing_address['address_line1'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="address2">Apartment, Suite, etc. <span class="text-muted">(Optional)</span></label>
                                    <input type="text" class="form-control" id="address2" name="address_line2" placeholder="Apartment or suite" value="{{ $billing_address['address_line2'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="city">City <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="city" name="city" required value="{{ $billing_address['city'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="state">State/Province/Region <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="state" name="state" required value="{{ $billing_address['state'] }}">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="zip">Postal / Zip Code <span class="required">*</span></label>
                                    <input type="text" class="form-control" id="zip" name="postal_code" required value="{{ $billing_address['postal_code'] }}">
                                </div>

                                <div class="col-md-12">
                                    <div class="update-btn-wrap text-center">
                                        <button class="btn update-btn" type="submit">Update Address</button>
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