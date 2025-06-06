@extends('Backend.Layout.app')

@section('site-title', 'Edit Product')

@section('main-content')
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Product</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                        <li class="breadcrumb-item active">Edit Product</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('product.update', $product->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
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
                                           value="{{ old('product_name') ?? $product->product_name }}" required
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
                                           value="{{ old('sku')  ?? $product->sku}}" required
                                           placeholder="Enter SKU" maxlength="255">
                                    @error('sku')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="short_description">Short Description</label>
                                    <textarea id="short_description" name="short_description" class="form-control @error('short_description') is-invalid @enderror" rows="3">{{ old('short_description') ?? $product->short_description }}</textarea>
                                    @error('short_description')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea id="description" name="description" class="form-control @error('description') is-invalid @enderror" rows="5">{{ old('description') ?? $product->description }}</textarea>
                                    @error('description')
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
                                                {{ (collect(old('categories', $selectedCategories))->contains($category->id)) ? 'selected' : '' }}>
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
                                            <option value="{{ $brand->id }}" 
                                                {{ collect(old('brand_id', $selectedBrands))->contains($brand->id) ? 'selected' : '' }}>
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
                                            <option value="{{ $tag->id }}" 
                                                {{ collect(old('tags', $selectedTags))->contains($tag->id) ? 'selected' : '' }}>
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
                                                {{ collect(old('sizes', $selectedSizes))->contains($size->id) ? 'selected' : '' }}>
                                                {{ $size->name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    
                                    @error('sizes')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror 
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
                                    <input id="purchase_price" name="purchase_price" type="number" step="0.01" class="form-control" placeholder="Enter original price" value="{{ old('purchase_price') ?? $product->purchase_price }}">
                                    @error('purchase_price')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="regular_price">Regular Price</label>
                                    <input id="regular_price" name="regular_price" type="number" step="0.01" class="form-control" placeholder="Enter regular price" value="{{ old('regular_price') ?? $product->regular_price }}">
                                    @error('regular_price')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="sale_price">Sale Price</label>
                                    <input id="sale_price" name="sale_price" type="number" step="0.01" class="form-control" placeholder="Enter sale price" value="{{ old('sale_price') ?? $product->sale_price }}">
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
                        <h4 class="card-title mb-3">Product Images</h4>

                        <div class="dropzone multiple-upload" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">

                        </div>
                        <input type="hidden" name="product_images[]" id="uploaded_files">
                        <input type="hidden" name="files_to_delete[]" id="filesToDelete">
                    </div>
                </div> <!-- end card-->

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4">Video</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_en">YouTube Video Link (English)</label>
                                    <input id="video_en" name="video_en" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link (EN)" value="{{ old('video_en') ?? $product->video_en }}">
                                    @error('video_en')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="video_bn">YouTube Video Link (Bangla)</label>
                                    <input id="video_bn" name="video_bn" maxlength="255" type="url" class="form-control" placeholder="Enter YouTube video link (BN)" value="{{ old('video_bn') ?? $product->video_bn }}">
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
                        <h4 class="card-title mb-4">Inventory</h4>
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="stock_quantity" class="required">Stock Quantity <span class="text-danger">*</span></label>
                                    <input id="stock_quantity" name="stock_quantity" maxlength="10" type="number" min="0" class="form-control" placeholder="Enter stock quantity" required value="{{ old('stock_quantity', $product->quantity ?? 0) }}">
                                    @error('stock_quantity')
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
                                    <input id="meta_title" name="meta_title" type="text" class="form-control" maxlength="255" value="{{ old('meta_title') ?? $product->meta_title }}">
                                    @error('meta_title')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="meta_keywords">Meta Keywords</label>
                                    <input id="meta_keywords" name="meta_keywords" type="text" class="form-control" maxlength="255" value="{{ old('meta_keywords') ?? $product->meta_keywords }}">
                                    @error('meta_keywords')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="meta_description">Meta Description</label>
                                    <textarea class="form-control" name="meta_description" id="meta_description" rows="5" maxlength="255">{{ old('meta_description') ?? $product->meta_description }}</textarea>
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
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                        <a href="" class="btn btn-secondary waves-effect">Cancel</a>
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
    class uploadAdapter {
        constructor(loader) {
            this.loader = loader;
        }

        // Starts the upload process.
        upload() {
            return this.loader.file.then(file => new Promise((resolve, reject) => {
                const data = new FormData();
                data.append('file', file); // your backend expects 'file'

                fetch('{{ route('ckeditor.upload') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: data
                })
                .then(response => response.json())
                .then(result => {
                    if (result.file) {
                        // Return the URL for the uploaded image
                        resolve({ default: '{{ asset('storage/temp') }}/' + result.file });
                    } else {
                        reject('Upload failed');
                    }
                })
                .catch(() => reject('Upload failed'));
            }));
        }

        abort() {
            // Reject the upload process if aborted
        }
    }

    function customUploadAdapterPlugin(editor) {
        editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
            return new uploadAdapter(loader);
        };
    }

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

