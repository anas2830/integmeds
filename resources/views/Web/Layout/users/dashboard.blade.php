@extends('Web.Layout.app')

@section('site-title', 'Dashboard')

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
                        <h1>Dashboard</h1>
                    </div>
                    <div class="dashboard-content text-center">
                        <h5>Welcome to Dashboard</h5>
                    </div>
                    <div class="dashboard-info-show">
                        <div class="row">
                            <div class="col-lg-10 m-auto">
                                <div class="row">
                                    <div class="col-6 col-md-4">
                                        <div class="dashorder-box">
                                            <a href="#" class="link-to-tab">
                                                <i class="fa-brands fa-dropbox"></i>
                                                <div class="dashorder-box-content">
                                                    <h3>TOTAL ORDERS</h3>
                                                    <span>40</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="dashorder-box">
                                            <a href="#" class="link-to-tab">
                                                <i class="fa-solid fa-spinner"></i>
                                                <div class="dashorder-box-content">
                                                    <h3>TOTAL PENDING ORDER</h3>
                                                    <span>17</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-6 col-md-4">
                                        <div class="dashorder-box">
                                            <a href="#" class="link-to-tab">
                                                <i class="fa-solid fa-check-double"></i>
                                                <div class="dashorder-box-content">
                                                    <h3>TOTAL SUCCESS ORDERS</h3>
                                                    <span>34</span>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
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
