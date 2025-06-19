@extends('Web.Layout.app')

@section('site-title', 'Change Password')

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
                        <h1>Change Password</h1>
                    </div>
                    <div class="changPassw-content">
                        <form>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Current Passwrod</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-4">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="SavePass-btn-wrap text-center">
                            <a class="btn SavePass-btn" href="#">Save</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
