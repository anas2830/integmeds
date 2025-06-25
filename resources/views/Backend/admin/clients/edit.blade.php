
@extends('Backend.Layout.app')
@section('site-title', 'Edit Client')
@section('main-content')

@foreach ($errors->all() as $error)
    {{ $error }}<br/>
@endforeach

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Edit Client</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('clients.index') }}">Clients</a></li>
                        <li class="breadcrumb-item active">Edit Client</li>
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
                    <form action="{{ route('clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="input-group input-group-dynamic mt-4">
                                                <div class="col-sm-3">
                                                    <label class="form-check-label" for="customSwitchsizelg">Status</label>
                                                </div>
                                                <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                                    <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" name="status"
                                                           value="1" {{ $client->status == 1 ? 'checked' : '' }}>
                                                    <label class="custom-control-label" for="customSwitchsizelg"></label>
                                                </div>
                                            </div>
                                            
                                            @error('status')
                                                <small class="invalid-feedback">{{ $message }}</small>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <p class="mb-3 font-weight-bold">Client Image</p>
        
                                        <div class="dropzone single-upload dz-clickable" data-max-size="2" data-max-files="15" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp">
                                        <div class="dz-default dz-message needsclick"><div class="mb-3"><i class="display-4 text-muted bx bxs-cloud-upload"></i></div><h4>Drop files here or click to upload.</h4></div></div>
                                        <input type="hidden" name="client_image" id="uploaded_file">
                                        <input type="hidden" name="file_to_delete" id="fileToDelete">

                                        @error('client_image')
                                            <small class="invalid-feedback">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                            <a href="{{ route('clients.index') }}" class="btn btn-secondary w-md">Back to list</a>
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


