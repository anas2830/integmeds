
@extends('Backend.Layout.app')
@section('site-title', 'Edit Product Bundle')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Product Bundle</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('product-bundle.index') }}">Product Bundle</a></li>
                        <li class="breadcrumb-item active">Edit Product Bundle</li>
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
                    <form action="{{ route('product-bundle.update', $productBundle['id']) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="name">
                                                Name <span class="text-danger">*</span>
                                            </label>
                                            <input id="name" 
                                                name="name" 
                                                type="text" 
                                                class="form-control @error('name') is-invalid @enderror" 
                                                value="{{ old('name') ?? $productBundle->name }}" 
                                                required
                                                placeholder="Enter bundle name"
                                                maxlength="255"
                                            >
                                            @error('name')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-dynamic mt-4">
                                                <div class="col-sm-3">
                                                    <label class="form-check-label" for="customSwitchsizelg">Status</label>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" name="status"
                                                           value="1" {{ $productBundle->status == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitchsizelg"></label>
                                                </div>
                                            </div>
                                            @error('status')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="description">Description</label>
                                            <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') ?? $productBundle->description }}</textarea>
                                            @error('description')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="min_price">
                                                Minimum Price <span class="text-danger">*</span>
                                            </label>
                                            <input id="min_price" 
                                                name="min_price" 
                                                type="number"
                                                min="0" 
                                                step="0.01"
                                                class="form-control @error('min_price') is-invalid @enderror" 
                                                value="{{ old('min_price') ?? $productBundle->min_price }}" 
                                                required
                                                placeholder="Enter bundle minimum price"
                                                maxlength="255"
                                            >
                                            @error('min_price')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="max_price">
                                                Maximum Price <span class="text-danger">*</span>
                                            </label>
                                            <input id="max_price" 
                                                name="max_price" 
                                                type="number"
                                                min="0" 
                                                step="0.01"
                                                class="form-control @error('max_price') is-invalid @enderror" 
                                                value="{{ old('max_price') ?? $productBundle->max_price }}" 
                                                required
                                                placeholder="Enter bundle maximum price"
                                                maxlength="255"
                                            >
                                            @error('max_price')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group">
                                            <label class="control-label">Select Product for Bundle<span class="text-danger">*</span></label>
                                            <select name="bundle_products[]" class="form-control select2" multiple required>
                                                @foreach($products as $product)
                                                    <option value="{{ $product->id }}" 
                                                        {{ (collect(old('bundle_products', $selectedProducts))->contains($product->id)) ? 'selected' : '' }}>
                                                        {{ $product->product_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('bundle_products')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <label class="control-label">Youtube video id</label>
                                            <input type="text" name="bundle_youtube_link" class="form-control" value="{{ $productBundle->bundle_youtube_link }}">
                                            @error('bundle_youtube_link')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <p class="mb-3 font-weight-bold">Bundle icon (Small) <span class="text-danger">(150 x 150)</span></p>
        
                                <div class="dropzone single-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
        
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="bundle_icon" id="uploaded_file">
                                <input type="hidden" name="file_to_delete" id="fileToDelete">
                            </div>
                            @error('bundle_icon')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <p class="mb-3 font-weight-bold">Bundle Images (Big) <span class="text-danger">(822 x 600)</span></p>
        
                                <div class="dropzone multiple-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
        
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="bundle_images[]" id="uploaded_files">
                                <input type="hidden" name="files_to_delete[]" id="filesToDelete">
                            </div>
                            @error('bundle_images')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Save Changes</button>
                            <a href="{{ route('product-bundle.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection


@push('custom-scripts')
<script>
    $(document).ready(function () {

        // Initialize Select2
        $('.select2').select2({
            placeholder: "Select an option",
            width: '100%',
            allowClear: true
        });
        // Initialize Dropzone
        const uploadedFile = [];
        initDropzone(
            '.dropzone.single-upload',
            false,
            uploadedFile,
            'uploaded_file',
            'fileToDelete',
            @json($existingIconFile)
        );
        const uploadedFiles = [];
        initDropzone(
            '.dropzone.multiple-upload',
            true,
            uploadedFiles,
            'uploaded_files',
            'filesToDelete',
            @json($existingFilesArray)
        );
    });
</script>
@endpush


