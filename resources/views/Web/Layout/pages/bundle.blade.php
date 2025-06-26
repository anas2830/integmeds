@extends('Web.Layout.app')

@section('site-title', 'Bundle')

@section('content')
<div class="bundle-page">
    <div class="container">
        <x-Web.common.product-bundle :productBundles="$productBundles" >
            <div class="row">
                <div class="col-lg-12">
                    <div class="common-btn-wrap d-flex justify-content-center mt-4">
                        <div class="common-btn-borders">
                            <a class="common-btn" href="{{ route('bundle') }}">Load More</a>
                        </div>
                    </div>
                </div>
            </div>
        </x-Web.common.product-bundle>
    </div>
</div>
@endsection

@push('script')

@endpush

