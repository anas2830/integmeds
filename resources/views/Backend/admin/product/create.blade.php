@extends('Backend.Layout.app')

@section('site-title', 'Add Product')

@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Add Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Product</a></li>
                        <li class="breadcrumb-item active">Add Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Basic Information</h4>
                        <p class="card-title-desc">Fill all information below</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="productname">
                                        Product Name <span class="text-danger">*</span>
                                    </label>
                                    <input id="product_name" name="product_name" type="text"
                                           class="form-control @error('product_name') is-invalid @enderror"
                                           value="{{ old('product_name') }}" required
                                           placeholder="Enter product name" maxlength="255">
                                    @error('product_name')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="sku">
                                        SKU <span class="text-danger">*</span>
                                    </label>
                                    <input id="sku" name="sku" type="text"
                                           class="form-control @error('sku') is-invalid @enderror"
                                           value="{{ old('sku') }}" required
                                           placeholder="Enter SKU" maxlength="255">
                                    @error('sku')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description"
                                            class="form-control @error('short_description') is-invalid @enderror"
                                            rows="3">{{ old('short_description') }}</textarea>
                                    @error('short_description')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="ups_code">
                                        UPS Code
                                    </label>
                                    <input id="ups_code" name="ups_code" type="text"
                                           class="form-control @error('ups_code') is-invalid @enderror"
                                           value="{{ old('ups_code') }}"
                                           placeholder="Enter UPS code" maxlength="255">
                                    @error('ups_code')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description"
                                              class="form-control @error('description') is-invalid @enderror"
                                              rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="research">Research</label>
                                    <textarea id="research" name="research"
                                              class="form-control @error('research') is-invalid @enderror"
                                              rows="5">{{ old('research') }}</textarea>
                                    @error('research')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> Categorization</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Category <span class="text-danger">*</span></label>
                                    <select name="categories[]" class="form-control select2" multiple required>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}" 
                                                {{ (collect(old('categories'))->contains($category->id)) ? 'selected' : '' }}>
                                                {{ $category->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('categories')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Brand</label>
                                    <select name="brand_id[]" class="form-control select2" multiple>
                                        <option value="">Select Brand</option>
                                        @foreach($brands as $brand)
                                            <option value="{{ $brand->id }}" {{ old('brand_id') == $brand->id ? 'selected' : '' }}>
                                                {{ $brand->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('brand_id')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Tags</label>
                                    <select name="tags[]" class="form-control select2" multiple>
                                        @foreach($tags as $tag)
                                            <option value="{{ $tag->id }}" {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }}>
                                                {{ $tag->name }}
                                            </option>
                                        @endforeach
                                    </select>     
                                    @error('tags')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror                               
                                </div>
                            </div>
                            {{-- <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="control-label">Sizes</label>
                                    <select name="sizes[]" class="form-control select2" multiple>
                                        @foreach($sizes as $size)
                                            <option value="{{ $size->id }}" 
                                                {{ (collect(old('sizes'))->contains($size->id)) ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Pricing</h4>

                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="purchase_price">Purchase Price</label>
                                    <input id="purchase_price" name="purchase_price" type="number" step="0.01" class="form-control" placeholder="Enter original price" value="{{ old('purchase_price') }}">
                                    @error('purchase_price')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <input id="regular_price" name="regular_price" type="number" step="0.01" class="form-control" placeholder="Enter regular price" value="{{ old('regular_price') }}">
                                    @error('regular_price')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <input id="sale_price" name="sale_price" type="number" step="0.01" class="form-control" placeholder="Enter sale price" value="{{ old('sale_price') }}">
                                    @error('sale_price')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Product Images <span class="text-danger">(600 x 600)</span></h4>

                        <div class="dropzone multiple-upload" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">

                        </div>
                        <input type="hidden" name="product_images[]" id="uploaded_files">
                        <input type="hidden" name="files_to_delete" id="filesToDelete">
                    </div>
                </div> <!-- end card-->
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Inventory</h4>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="stock_quantity" class="required">Stock Quantity <span class="text-danger">*</span></label>
                                    <input id="stock_quantity" name="stock_quantity" maxlength="10" type="number" min="0" class="form-control" placeholder="Enter stock quantity" required value="{{ old('stock_quantity', 0) }}">
                                    @error('stock_quantity')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="status" class="required">Status <span class="text-danger">*</span></label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Active</option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Inactive</option>
                                    </select>
                                    @error('status')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Dimensions & Weight</h4>

                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label for="weight">Weight (gram) <span class="text-danger">*</span></label>
                                    <input id="weight" name="weight" type="number" step="0.01" min="0" class="form-control" placeholder="Enter weight" value="{{ old('weight') }}" required>
                                    @error('weight')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="length">Length (cm) <span class="text-danger">*</span></label>
                                    <input id="length" name="length" type="number" step="0.01" max="10" class="form-control" placeholder="Length" value="{{ old('length') }}" required>
                                    @error('length')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="width">Width (cm) <span class="text-danger">*</span></label>
                                    <input id="width" name="width" type="number" step="0.01" max="10" class="form-control" placeholder="Width" value="{{ old('width') }}" required>
                                    @error('width')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label for="height">Height (cm) <span class="text-danger">*</span></label>
                                    <input id="height" name="height" type="number" step="0.01" max="5" class="form-control" placeholder="Height" value="{{ old('height') }}" required>
                                    @error('height')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Video</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_url_0">YouTube Video Link for Intro 1</label>
                                    <input id="video_url_0" name="video_url[]" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link for intro" value="{{ old('video_url.0') }}">
                                    @error('video_url.0')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_url_1">YouTube Video Link for Intro 2</label>
                                    <input id="video_url_1" name="video_url[]" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link for intro" value="{{ old('video_url.1') }}">
                                    @error('video_url.1')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_url_2">YouTube Video Link for Intro 3</label>
                                    <input id="video_url_2" name="video_url[]" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link for intro" value="{{ old('video_url.2') }}">
                                    @error('video_url.2')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_en">YouTube Video Link Details (English)</label>
                                    <input id="video_en" name="video_en" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link (EN)" value="{{ old('video_en') }}">
                                    @error('video_en')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_bn">YouTube Video Link Details (Bangla)</label>
                                    <input id="video_bn" name="video_bn" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link (BN)" value="{{ old('video_bn') }}">
                                    @error('video_bn')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">

                        <h4 class="card-title">Meta Data</h4>
                        <p class="card-title-desc">Fill all information below</p>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_title">Meta title</label>
                                    <input id="meta_title" name="meta_title" type="text" class="form-control" maxlength="255" value="{{ old('meta_title') }}">
                                    @error('meta_title')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input id="meta_keywords" name="meta_keywords" type="text" class="form-control" maxlength="255" value="{{ old('meta_keywords') }}">
                                    @error('meta_keywords')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="5" maxlength="255">{{ old('meta_description') }}</textarea>
                                    @error('meta_description')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Create</button>
                        <a href="{{ route('product.index') }}" class="btn btn-secondary w-md">Back to list</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

@endsection


@push('custom-scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>
    ClassicEditor
        .create(document.querySelector('#description'), {
            extraPlugins: [customUploadAdapterPlugin],
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', 'link', 'imageUpload', '|',
                'undo', 'redo'
            ],
        })
        .then(editor => {
            editor.ui.view.editable.element.style.minHeight = '200px';
        })
        .catch(error => console.error(error));
         
        ClassicEditor
        .create(document.querySelector('#research'), {
            extraPlugins: [customUploadAdapterPlugin],
            toolbar: [
                'heading', '|',
                'bold', 'italic', 'underline', '|',
                'bulletedList', 'numberedList', '|',
                'blockQuote', 'link', 'imageUpload', '|',
                'undo', 'redo'
            ],
        })
        .then(editor => {
            editor.ui.view.editable.element.style.minHeight = '200px';
        })
        .catch(error => console.error(error));
</script>
<script>
    $(document).ready(function () {
        // Initialize Select2
        $('.select2').select2({
            placeholder: "Select an option",
            width: '100%',
            allowClear: true
        });
        // Initialize Dropzone
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

