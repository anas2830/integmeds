@extends('Backend.Layout.app')

@section('site-title', 'Inventory Report')

@section('main-content')
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Inventory Report</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                        <li class="breadcrumb-item active">Inventory Report</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('inventory.report.preview') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> Product Type</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <label class="control-label">Product Type </label>

                                <select name="product_type" id="productType" class="form-control select2">
                                    <option value="all">All</option>
                                    <option value="customize">Customize</option>
                                </select>
                            </div>
                            <div class="col-sm-6 d-none" id="productSelectBox">
                                <div class="form-group">
                                    <label class="control-label">Products </label>
                                    <select name="products[]" class="form-control select2" multiple>
                                        <option value="">Select Product</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('products')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <label class="control-label">Date Up to </label>
                                <input type="date" name="date_upto" id="date_upto" class="form-control" value="{{ request('date_upto') ?? now()->toDateString() }}">
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Preview</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

@endsection


@push('custom-scripts')
<script>
    $(document).ready(function () {
        // Initialize Select2
        $('#productType').on('change', function () {
            if ($(this).val() === 'customize') {
                $('#productSelectBox').removeClass('d-none');
                $('.select2').select2({
                    placeholder: "Select products",
                    width: '100%',
                    allowClear: true
                });
            } else {
                $('#productSelectBox').addClass('d-none');
            }
        });

    });
</script>

@endpush

