
@extends('Backend.Layout.app')

@section('main-content')

    <div class="card">
        <div class="card-body">
            <form action="{{ route('manage-editor.store') }}" method="POST" enctype="multipart/form-data" id="editor-form">
                @csrf
                <div class="row">
                    <div class="col-lg-6">
                        <a href="{{ route('manage-editor.index') }}" class="d-flex align-items-center text-decoration-none">
                            <span class="material-icons me-2">arrow_back</span>
                            <span>Back to List</span>
                        </a>
                    </div>
                    <div class="col-lg-6 text-right d-flex flex-column justify-content-center">
                        <button type="submit" class="btn bg-gradient-primary mb-0 ms-lg-auto me-lg-0 me-auto mt-lg-0 mt-2">Save</button>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <label>Name</label>
                            <input type="text" class="form-control w-100" name="editor_name" value="{{ old('editor_name') }}">
                            @error('editor_name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                            <label>Email</label>
                            <input type="email" class="form-control w-100" name="editor_email" value="{{ old('editor_email') }}">
                            @error('editor_email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <label>Password</label>
                            <input type="password" class="form-control w-100" name="editor_password">
                            @error('editor_password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 mt-3 mt-sm-0">
                        <div class="input-group input-group-dynamic">
                            <label>Confirm Password</label>
                            <input type="password" class="form-control w-100" name="editor_c_password">
                            @error('editor_c_password')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <div class="col-sm-3">
                                <label>Profile Image</label>
                            </div>
                            <div class="col-sm-4">
                                <div class="dropzone single-upload" data-max-size="2" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp"></div>
                                <input type="hidden" name="profile_image" id="uploaded_files_single">
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6">
                        <div class="input-group input-group-dynamic">
                            <div class="col-sm-3"><label class="form-check-label" for="editor_status">Status</label></div>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="editor_status" name="editor_status" value="1" {{ old('editor_status') == 1 ? 'checked' : '' }}>
                                @error('editor_status')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                </div>
            </form>

        </div>
    </div>


@endsection

@push('custom-scripts')


<script>

    // Initialize both Dropzone instances
    const uploadedFilesSingle = [];
    // const uploadedFilesMultiple = [];
    initDropzone('.dropzone.single-upload', false, uploadedFilesSingle, 'uploaded_files_single',"",[]);
    // initDropzone('.multiple-upload', true, uploadedFilesMultiple, 'uploaded_files_multiple');

</script>

@endpush
