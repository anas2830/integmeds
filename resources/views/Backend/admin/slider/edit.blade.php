
@extends('Backend.Layout.app')
@section('site-title', 'Edit Slider')
@section('main-content')

@foreach ($errors->all() as $error)
    {{ $error }}<br/>
@endforeach

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Slider</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('slider.index') }}">Slider</a></li>
                        <li class="breadcrumb-item active">Edit Slider</li>
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
                    <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                {{-- <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">
                                                Title
                                            </label>
                                            <input id="title" 
                                                name="title" 
                                                type="text" 
                                                class="form-control @error('title') is-invalid @enderror" 
                                                value="{{ old('title') ?? $slider->title }}" 
                                                placeholder="Enter title"
                                                maxlength="255"
                                            >
                                            @error('title')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">
                                                Subtitle
                                            </label>
                                            <input id="subtitle" 
                                                name="subtitle" 
                                                type="text" 
                                                class="form-control @error('subtitle') is-invalid @enderror" 
                                                value="{{ old('subtitle') ?? $slider->subtitle }}" 
                                                placeholder="Enter subtitle"
                                                maxlength="255"
                                            >
                                            @error('subtitle')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="button_color">
                                                Button Color
                                            </label>
                                            <input id="button_color" 
                                                name="button_color" 
                                                type="text" 
                                                class="form-control @error('button_color') is-invalid @enderror" 
                                                value="{{ old('button_color') ?? $slider->button_color }}" 
                                                placeholder="Enter button color"
                                                maxlength="255"
                                            >
                                            @error('button_color')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="title">
                                                Button Text
                                            </label>
                                            <input id="button_text" 
                                                name="button_text" 
                                                type="text" 
                                                class="form-control @error('button_text') is-invalid @enderror" 
                                                value="{{ old('button_text') ?? $slider->button_text }}" 
                                                placeholder="Enter button text"
                                                maxlength="255"
                                            >
                                            @error('button_text')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div> --}}
                                <div class="row">
                                    {{-- <div class="col-sm-6">
                                        <div class="form-group">
                                            <label for="button_url">
                                                Button URL
                                            </label>
                                            <input id="button_url" 
                                                name="button_url" 
                                                type="text" 
                                                class="form-control @error('button_url') is-invalid @enderror" 
                                                value="{{ old('button_url') ?? $slider->button_url }}" 
                                                placeholder="Enter url"
                                                maxlength="255"
                                            >
                                            @error('button_url')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div> --}}
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-dynamic mt-4">
                                                <div class="col-sm-3">
                                                    <label class="form-check-label" for="customSwitchsizelg">Status</label>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" name="status"
                                                           value="1" {{ $slider->status == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitchsizelg"></label>
                                                </div>
                                            </div>
                                            
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
                                <p class="mb-3 font-weight-bold">Slider Image <span class="text-danger">(1620 x 500)</span></p>
        
                                <div class="dropzone single-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                <input type="hidden" name="slider_image" id="uploaded_file">
                                <input type="hidden" name="file_to_delete" id="fileToDelete">
                            </div>
                            @error('slider_image')
                                <small class="invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                            <a href="{{ route('slider.index') }}" class="btn btn-secondary w-md">Back to list</a>
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
            const uploadedFiles = [];
            initDropzone(
                '.dropzone.single-upload',
                false,
                uploadedFiles,
                'uploaded_file',
                'fileToDelete',
                @json($existingFilesArray)
            );
        });
</script>
@endpush


