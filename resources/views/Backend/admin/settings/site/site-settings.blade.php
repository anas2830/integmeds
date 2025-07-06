@extends('Backend.Layout.app')

@section('site-title', 'Site Settings')

@section('main-content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Site Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>

    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    <span class="text-sm">{{ session('success') }}</span>
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ route('site.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Site Name</label>
                                    <input name="site_name" type="text" class="form-control"
                                        value="{{ old('site_name', $siteSettings->site_name) }}"
                                        placeholder="Enter site name" maxlength="100">
                                        @error('site_name') <small class="text-danger d-block">{{ $message }}</small> @enderror 
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Site Email</label>
                                    <input name="site_email" type="email" class="form-control"
                                        value="{{ old('site_email', $siteSettings->site_email) }}"
                                        placeholder="Enter site email" maxlength="100">
                                    @error('site_email') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                        <!-- Site Phone & Address -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Site Phone</label>
                                    <input name="site_phone" type="text" class="form-control"
                                        value="{{ old('site_phone', $siteSettings->site_phone) }}"
                                        placeholder="Enter phone number" maxlength="20">
                                    @error('site_phone') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" class="form-control" rows="3" placeholder="Enter address" maxlength="200">{{ old('address', $siteSettings->address) }}</textarea>
                                    @error('address') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Copyright Text & Description -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Copyright Text</label>
                                    <input name="copyright_text" type="text" class="form-control"
                                        value="{{ old('copyright_text', $siteSettings->copyright_text) }}"
                                        placeholder="e.g. © 2025 Your Company" maxlength="100">
                                    @error('copyright_text') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Site Description</label>
                                    <textarea name="site_description" class="form-control" rows="3" placeholder="Enter short description" maxlength="1000">{{ old('site_description', $siteSettings->site_description) }}</textarea>
                                    @error('site_description') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Currency, Minimum Order -->
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Currency</label>
                                    <input name="currency" type="text" class="form-control"
                                        value="{{ old('currency', $siteSettings->currency) }}"
                                        placeholder="e.g. USD, EUR" maxlength="20">
                                    @error('currency') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Minimum Order Amount</label>
                                    <input name="minimum_order" type="number" class="form-control"
                                        value="{{ old('minimum_order', $siteSettings->minimum_order) }}"
                                        placeholder="e.g. 50.00">
                                    @error('minimum_order') <small class="text-danger d-block">{{ $message }}</small> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save
                                Changes</button>
                            <a href="{{ route('dashboard') }}" class="btn btn-secondary w-md">Back to Dashboard</a>
                        </div>
                    </div>
            </form>
        </div>
    </div>

    <!-- end row -->
@endsection


@push('custom-scripts')
@endpush
