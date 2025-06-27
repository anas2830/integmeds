@extends('Web.Layout.app')

@section('site-title', 'Bundle')

@section('content')
<div class="bundle-page">
    <div class="container">
        <x-Web.common.product-bundle :productBundles="$productBundles" >
        </x-Web.common.product-bundle>
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <div class="pagination-area">
                    {{ $productBundles->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

