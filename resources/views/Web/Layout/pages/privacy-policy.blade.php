@extends('Web.Layout.app')

@section('site-title', 'Privacy Policy')



@section('content')
<div class="product-and-sidebar mt-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="privacy-policy-page">
                    {!! $privacyPolicy->content !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush

