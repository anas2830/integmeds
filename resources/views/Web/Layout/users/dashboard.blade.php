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
                        <img class="img-fluid" src="{{asset('web_assets/images/logo/Integmeds-Logo.png.webp')}}" alt="Integmeds" title="Integmeds">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
