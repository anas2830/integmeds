
@extends('Backend.Layout.app')
@section('site-title', 'Create Product Review')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Product Review</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('product-review.index') }}">Product Review</a></li>
                        <li class="breadcrumb-item active">Create Product Review</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

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
                    <form action="{{ route('product-review.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input required">User <span class="required-icon">*</span></label>
                                    <select class="form-control w-100 select2" name="user_id" required>
                                        <option value="">Select User</option>
                                    </select>
                                    @error('user_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-email-input required">Product <span class="required-icon">*</span></label>
                                    <select class="form-control w-100 select2" name="product_id" required>
                                        <option value="">Select Product</option>
                                    </select>
                                    @error('product_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input required">Rating <span class="required-icon">*</span></label>
                                    <input type="number" class="form-control w-100" name="rating" min="1" max="5" required>
                                    @error('rating')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input required">Review <span class="required-icon">*</span></label>
                                    <textarea class="form-control w-100" name="review" required></textarea>
                                    @error('review')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Create</button>
                            <a href="{{ route('product-review.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection


@push('custom-scripts')

@endpush


