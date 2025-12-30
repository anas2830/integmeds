@extends('Web.Layout.app')

@section('site-title', 'Terms and Conditions')

@push('dynamic_meta')
    @include('Web.Layout.partials.common-meta')
@endpush

@section('content')
<div class="product-and-sidebar mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-policy-page">
                    {!! purify($termsCondition->content) !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
@endpush

