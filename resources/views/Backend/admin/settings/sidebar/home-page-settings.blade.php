@extends('Backend.Layout.app')

@section('site-title', 'Home Page Settings')

@section('main-content')
    {{-- @foreach ($errors->all() as $error)
        {{ $error }}<br/>
    @endforeach --}}
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Home Page Sidebar Settings</h4>

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
            <form method="POST" action="{{ route('home.page.sidebar.settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
    
                @foreach ([1, 2, 3] as $id)
                    @php $banner = $banners[$id]; @endphp

                    {{-- @dump($banner) --}}
    
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="card-title">Sidebar Banner {{ $id }}</h4>
                            <div class="row mb-3">
                                <div class="col-sm-6">
                                    <label class="mb-2">Banner Image <span class="text-danger">(1056 x 2464)</span></label>
                                    <div class="dropzone"
                                         id="dropzone-banner-{{ $id }}"
                                         data-max-size="2"
                                         data-max-files="1"
                                         data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                    </div>
            
                                    <input type="hidden" name="banner_{{ $id }}[image_path]" id="banner_{{ $id }}_image_path" value="{{ $banner->image_path }}">
                                    <input type="hidden" name="filesToDelete[]" id="filesToDelete_{{ $id }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Section Title</label>
                                        <input name="banner_{{ $id }}[title]" type="text"
                                               class="form-control"
                                               value="{{ old("banner_{$id}.section_title", $banner->title) }}"
                                               placeholder="Enter section title" maxlength="100">
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Short Description</label>
                                        <textarea name="banner_{{ $id }}[short_description]"
                                                  class="form-control"
                                                  rows="3">{{ old("banner_{$id}.short_description", $banner->short_description) }}</textarea>
                                    </div>
                                </div>
                            </div>
    
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Button Text</label>
                                        <input name="banner_{{ $id }}[button_text]" type="text"
                                               class="form-control"
                                               value="{{ old("banner_{$id}.button_text", $banner->button_text) }}"
                                               placeholder="Enter Button Text" maxlength="100">
                                    </div>
                                </div>
    
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Button URL</label>
                                        <input name="banner_{{ $id }}[button_url]" type="text"
                                               class="form-control"
                                               value="{{ old("banner_{$id}.button_url", $banner->button_url) }}"
                                               placeholder="Enter Button URL" maxlength="255">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
    
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
        // Initialize Dropzone
        const uploadedFiles1 = [];
        const uploadedFiles2 = [];
        const uploadedFiles3 = [];

        initDropzone(
            '#dropzone-banner-1',
            false,
            uploadedFiles1,
            'banner_1_image_path',
            'filesToDelete_1',
            @json($existingFilesArray[1] ?? [])
        );

        initDropzone(
            '#dropzone-banner-2',
            false,
            uploadedFiles2,
            'banner_2_image_path',
            'filesToDelete_2',
            @json($existingFilesArray[2] ?? [])
        );

        initDropzone(
            '#dropzone-banner-3',
            false,
            uploadedFiles3,
            'banner_3_image_path',
            'filesToDelete_3',
            @json($existingFilesArray[3] ?? [])
        );

    });
</script>

@endpush

