@extends('Backend.Layout.app')
@section('site-title', 'Edit Product Size')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Product Size</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('product-size.index') }}">Product Size</a></li>
                        <li class="breadcrumb-item active">Edit Product Size</li>
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
                    <form action="{{ route('product-size.update', $productSize->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input required">Name <span class="required-icon">*</span></label>
                                    <input type="text" class="form-control w-100" name="size_name" value="{{ $productSize->name }}" required>
                                    @error('size_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="input-group input-group-dynamic">
                                    <div class="col-sm-3"><label class="form-check-label" for="status">Status</label></div>
                                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" value="1" name="status" {{ $productSize->status == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitchsizelg"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                            <a href="{{ route('product-size.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection