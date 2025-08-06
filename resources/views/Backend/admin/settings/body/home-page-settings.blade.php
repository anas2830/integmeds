@extends('Backend.Layout.app')

@section('site-title', 'Home Page Settings')

@section('main-content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Home Page Body Settings</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Settings</a></li>
                        <li class="breadcrumb-item active">Home Page Settings</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    <span class="text-sm">{{ session('success') }}</span>
                    <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
            <form method="POST" action="{{ route('home.page.body.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Home Body Banner 1 (After Product Bundle)</h4>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <p class="mb-3 font-weight-bold">Banner Image <span class="text-danger">(1920 x 430)</span></p>
        
                                <div class="dropzone dz-clickable" id="banner-1" data-max-size="2" data-max-files="1" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
        
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="banner_1_cover_image" id="uploaded_file_1">
                                <input type="hidden" name="files_to_delete[]" id="fileToDelete1">
                            </div>
                            <div class="col-sm-6">
                                <p class="mb-3 font-weight-bold">Featured Image <span class="text-danger">(672 x 500)</span></p>
        
                                <div class="dropzone dz-clickable" id="featured-1" data-max-size="2" data-max-files="1" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
        
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="banner_1_featured_image" id="uploaded_file_2">
                                <input type="hidden" name="files_to_delete[]" id="filesToDelete2">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="banner_1_title" type="text"
                                            class="form-control"
                                            value="{{ old("banner_1_title", $banner->banner_1_title) }}"
                                            placeholder="Enter section title" maxlength="100">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="banner_1_description" class="form-control" rows="3">{{ old("banner_1_description", $banner->banner_1_description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input name="banner_1_btn_text" type="text"
                                            class="form-control"
                                            value="{{ old("banner_1_btn_text", $banner->banner_1_btn_text) }}"
                                            placeholder="Enter Button Text" maxlength="100">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input name="banner_1_btn_url" type="text"
                                            class="form-control"
                                            value="{{ old("banner_1_btn_url", $banner->banner_1_btn_url) }}"
                                            placeholder="Enter Button URL" maxlength="255">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Home Body Banner 2 (After New Arrival)</h4>
                        <div class="row mb-3">
                            <div class="col-sm-6">
                                <p class="mb-3 font-weight-bold">Banner Image <span class="text-danger">(1620 x 600)</span></p>
        
                                <div class="dropzone dz-clickable" id="banner-2" data-max-size="2" data-max-files="1" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
        
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="banner_2_image" id="uploaded_file_3">
                                <input type="hidden" name="files_to_delete[]" id="fileToDelete3">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Title</label>
                                    <input name="banner_2_title" type="text"
                                            class="form-control"
                                            value="{{ old("banner_2_title", $banner->banner_2_title) }}"
                                            placeholder="Enter section title" maxlength="100">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Short Description</label>
                                    <textarea name="banner_2_description"
                                                class="form-control"
                                                rows="3">{{ old("banner_2_description", $banner->banner_2_description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Button Text</label>
                                    <input name="banner_2_btn_text" type="text"
                                            class="form-control"
                                            value="{{ old("banner_2_btn_text", $banner->banner_2_btn_text) }}"
                                            placeholder="Enter Button Text" maxlength="100">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Button URL</label>
                                    <input name="banner_2_btn_url" type="text"
                                            class="form-control"
                                            value="{{ old("banner_2_btn_url", $banner->banner_2_btn_url) }}"
                                            placeholder="Enter Button URL" maxlength="255">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-4"> Featured Product (After Top Rated)</h4>
                        {{-- <p class="card-title-desc">Fill all information below</p> --}}
                        @for ($i = 0; $i < 3; $i++)
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label>Home Featured Products</label>
                                <select name="products[{{ $i }}][product_id]" class="form-control select2">
                                    <option value=""></option>
                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}"
                                            {{ (old("products.$i.product_id", $selectedProducts[$i]['product_id'] ?? '') == $product->id) ? 'selected' : '' }}>
                                            {{ $product->product_name }}
                                        </option>
                                    @endforeach
                                </select>
                                
                            </div>
                    
                            <div class="col-md-4">
                                <label>Button Text</label>
                                <input type="text" name="products[{{ $i }}][btn_text]" class="form-control"
                                       value="{{ old("products.$i.btn_text", $selectedProducts[$i]['btn_text'] ?? '') }}"
                                       placeholder="e.g. View More">
                            </div>
                    
                            <div class="col-md-4">
                                <label>Button URL</label>
                                <input type="text" name="products[{{ $i }}][btn_url]" class="form-control"
                                       value="{{ old("products.$i.btn_url", $selectedProducts[$i]['btn_url'] ?? '') }}"
                                       placeholder="e.g. https://example.com">
                            </div>
                        </div>
                    @endfor
                    
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Save Changes</button>
                        <a href="{{ route('dashboard') }}" class="btn btn-secondary w-md">Back to Dashboard</a>
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
    $(document).ready(function () {
        // Initialize Select2
        $('.select2').select2({
            placeholder: "Select an option",
            width: '100%',
            allowClear: true
        });
        // Initialize Dropzone
        const uploadedFiles1 = [];
        const uploadedFiles2 = [];
        const uploadedFiles3 = [];



        initDropzone(
            '#banner-1',
            false,
            uploadedFiles1,
            'uploaded_file_1',
            'fileToDelete1',
            @json($existingFilesArray['banner_1_cover_image'])
        );
        initDropzone(
            '#featured-1',
            false,
            uploadedFiles2,
            'uploaded_file_2',
            'filesToDelete2',
            @json($existingFilesArray['banner_1_featured_image'])
        );
        initDropzone(
            '#banner-2',
            false,
            uploadedFiles3,
            'uploaded_file_3',
            'fileToDelete3',
            @json($existingFilesArray['banner_2_image'])
        );


    });
</script>

@endpush

