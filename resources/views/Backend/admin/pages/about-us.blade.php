@extends('Backend.Layout.app')

@section('site-title', 'About Us')

@section('main-content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">About Us</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">About Us</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('about-us-settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card mb-4">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show text-white mb-3 mt-3" role="alert">
                                        <span class="text-sm">{{ session('success') }}</span>
                                        <button type="button" class="close text-white" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                @endif
                                <h4 class="card-title">Top Section</h4>
                                <div class="form-group">
                                    <label for="top_title">Top Title</label>
                                    <input type="text" name="top_title" class="form-control @error('top_title') is-invalid @enderror" value="{{ $aboutUs->top_title }}">
                                    @error('top_title')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="top_content">Top Content</label>
                                    <textarea id="top_content" name="top_content" class="form-control @error('top_content') is-invalid @enderror" rows="5">{{ $aboutUs->top_content }}</textarea>
                                    @error('top_content')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>  
                                <div class="row">
                                    <div class="col-sm-4">
                                        <p class="mb-3 font-weight-bold">Top Image</p>
                                        <div class="dropzone top-image-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                        <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                        <input type="hidden" name="top_image" id="top_image_uploaded_file">
                                        <input type="hidden" name="top_image_file_to_delete" id="top_image_fileToDelete">
                                        @error('top_image')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col-sm-4">
                                        <p class="mb-3 font-weight-bold">Middle First Image</p>
                                        <div class="dropzone middle-first-image-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                        <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                        <input type="hidden" name="middle_first_image" id="middle_first_image_uploaded_file">
                                        <input type="hidden" name="middle_first_image_file_to_delete" id="middle_first_image_fileToDelete">
                                        @error('middle_first_image')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>  
                                    <div class="col-sm-4">
                                        <p class="mb-3 font-weight-bold">Middle Second Image</p>
                                        <div class="dropzone middle-second-image-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                        <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                        <input type="hidden" name="middle_second_image" id="middle_second_image_uploaded_file">
                                        <input type="hidden" name="middle_second_image_file_to_delete" id="middle_second_image_fileToDelete">
                                        @error('middle_second_image')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <h4 class="card-title mt-4">Bottom Section</h4>
                                <div class="form-group">
                                    <label for="bottom_title">Bottom Title</label>
                                    <input type="text" name="bottom_title" class="form-control @error('bottom_title') is-invalid @enderror" value="{{ $aboutUs->bottom_title }}">
                                    @error('bottom_title')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bottom_content">Bottom Content</label>
                                    <textarea id="bottom_content" name="bottom_content" class="form-control @error('bottom_content') is-invalid @enderror" rows="5">{{ $aboutUs->bottom_content }}</textarea>
                                    @error('bottom_content')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bottom_button_text">Bottom Button Text</label>
                                    <input type="text" name="bottom_button_text" class="form-control @error('bottom_button_text') is-invalid @enderror" value="{{ $aboutUs->bottom_button_text }}">
                                    @error('bottom_button_text')    
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="bottom_button_url">Bottom Button URL</label>
                                    <input type="text" name="bottom_button_url" class="form-control @error('bottom_button_url') is-invalid @enderror" value="{{ $aboutUs->bottom_button_url }}">    
                                    @error('bottom_button_url')
                                        <small class="invalid-feedback">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('custom-scripts')
<script src="https://cdn.ckeditor.com/ckeditor5/41.2.1/classic/ckeditor.js"></script>
<script>

    ClassicEditor
        .create(document.querySelector('#top_content'), {
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
        .create(document.querySelector('#bottom_content'), {
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


        $(document).ready(function () {
            // Initialize Dropzone
            const topImageUploadedFiles = [];
            const middleFirstImageUploadedFiles = [];
            const middleSecondImageUploadedFiles = [];
            initDropzone(
                '.dropzone.top-image-upload',
                false,
                topImageUploadedFiles,
                'top_image_uploaded_file',
                'top_image_fileToDelete',
                @json($topImageFileArray)
            );
            initDropzone(
                '.dropzone.middle-first-image-upload',
                false,
                middleFirstImageUploadedFiles,
                'middle_first_image_uploaded_file',
                'middle_first_image_fileToDelete',
                @json($middleFirstImageFileArray)
            );
            initDropzone(
                '.dropzone.middle-second-image-upload',
                false,
                middleSecondImageUploadedFiles,
                'middle_second_image_uploaded_file',
                'middle_second_image_fileToDelete',
                @json($middleSecondImageFileArray)
            );
        });
</script>
@endpush
