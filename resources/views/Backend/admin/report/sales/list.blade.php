@extends('Backend.Layout.app')

@section('site-title', 'Sales Report')

@section('main-content')
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Sales Report</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Report</a></li>
                        <li class="breadcrumb-item active">Sales Report</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('sales.report.preview') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Select Time Period </label>
                                    <select name="type" id="reportType" class="form-control select2">
                                        <option value="last_7_days">Last 7 Days</option>
                                        <option value="running_month" selected>Running Month</option>
                                        <option value="last_month">Last Month</option>
                                        <option value="custom">Custom</option>
                                    </select>
                                    @error('type')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div id="customFilter" class="d-none flex gap-2">
                            <div class="row">
                                <div class="col-sm-6">
                                    <select name="year" class="form-control">
                                        @for($y=2025; $y<=2050; $y++)
                                            <option value="{{ $y }}">{{ $y }}</option>
                                        @endfor
                                    </select>
                                </div>
                                <div class="col-sm-6">
                                    <select name="month" class="form-control">
                                        @foreach(range(1,12) as $m)
                                            <option value="{{ $m }}">{{ date('F', mktime(0,0,0,$m,1)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
        $('#reportType').on('change', function () {
            if ($(this).val() === 'custom') {
                $('#customFilter').removeClass('d-none');
            } else {
                $('#customFilter').addClass('d-none');
            }
        });
    });
</script>

@endpush

