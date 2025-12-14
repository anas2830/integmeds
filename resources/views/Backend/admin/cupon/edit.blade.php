
@extends('Backend.Layout.app')
@section('site-title', 'Create Product Size')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Cupon</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('cupon.index') }}">Cupon</a></li>
                        <li class="breadcrumb-item active">Edit Cupon</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    @error('error')
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ $message }}</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @enderror

    <div class="row">
        <div class="col-lg-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif  
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cupon.update', $cupon->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="code" class="required">Coupon Code <span class="required-icon">*</span></label>
                                    <input type="text" class="form-control" name="code" value="{{ $cupon->code }}" required>
                                    @error('code')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="type" class="required">Discount Type <span class="required-icon">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="fixed" {{ $cupon->type == 'fixed' ? 'selected' : '' }}>Fixed Amount</option>
                                        <option value="percent" {{ $cupon->type == 'percent' ? 'selected' : '' }}>Percentage</option>
                                    </select>
                                    @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="value" class="required">Discount Value <span class="required-icon">*</span></label>
                                    <input type="number" step="0.01" class="form-control" name="value" value="{{ $cupon->value }}" required>
                                    @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="min_purchase">Minimum Purchase Amount</label>
                                    <input type="number" step="0.01" class="form-control" name="min_purchase" value="{{ $cupon->min_purchase }}">
                                    @error('min_purchase')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="start_date">Start Date</label>
                                    <input type="date" class="form-control" name="start_date" value="{{ $cupon->start_date }}">
                                    @error('start_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="end_date">End Date</label>
                                    <input type="date" class="form-control" name="end_date" value="{{ $cupon->end_date }}">
                                    @error('end_date')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="usage_limit">Usage Limit</label>
                                    <input type="number" class="form-control" name="usage_limit" value="{{ $cupon->usage_limit }}">
                                    @error('usage_limit')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="input-group input-group-dynamic">
                                    <div class="col-sm-3"><label class="form-check-label" for="status">Status</label></div>
                                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" value="1" name="status" {{ $cupon->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitchsizelg"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                            <a href="{{ route('cupon.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection
