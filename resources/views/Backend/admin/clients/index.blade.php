@extends('Backend.Layout.app')

@section('site-title', 'Clients')

@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Clients</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">About Us</a></li>
                        <li class="breadcrumb-item active">Clients</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('clients.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title mb-3">Clients Images</h4>

                        <div class="dropzone multiple-upload" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">

                        </div>
                        <input type="hidden" name="client_images[]" id="uploaded_files">
                        <input type="hidden" name="files_to_delete" id="filesToDelete">
                    </div>
                </div> <!-- end card-->

                <div class="card">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary mr-1 waves-effect waves-light">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- end row -->

@endsection

@push('custom-scripts')
    <script>
        $(document).ready(function () {
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