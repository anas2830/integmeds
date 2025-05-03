
@extends('Backend.Layout.app')
@section('site-title', 'Update Editors')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Form Layouts</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Forms</a></li>
                        <li class="breadcrumb-item active">Form Layouts</li>
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
                    <h4 class="card-title mb-4">Form grid layout</h4>
                    <form action="{{ route('manage-editor.update', $editor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Name</label>
                                    <input type="text" class="form-control w-100" name="editor_name" required value="{{ old('editor_name', $editor->name) }}">
                                    @error('editor_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-email-input">Email</label>
                                    <input type="email" class="form-control w-100" name="editor_email" required value="{{ old('editor_email', $editor->email) }}">
                                    @error('editor_email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Password</label>
                                    <input type="password" class="form-control w-100" name="editor_password">
                                    @error('editor_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Confirm Password</label>
                                    <input type="password" class="form-control w-100" name="editor_confirm_password">
                                    @error('editor_confirm_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Profile Image</label>
                                    <div class="dropzone single-upload" data-max-size="2" data-accepted-files=".jpeg,.jpg,.png,.gif,.webp"></div>
                                    <input type="hidden" name="profile_image" id="uploaded_files_single">
                                    <input type="hidden" name="files_to_delete" id="filesToDelete">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-group input-group-dynamic">
                                    <div class="col-sm-3"><label class="form-check-label" for="editor_status">Status</label></div>
                                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" value="1" name="editor_status" {{ old('editor_status', $editor->status) == 1 ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitchsizelg"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
                            <a href="{{ route('manage-editor.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection

@push('custom-scripts')


<script>
    const uploadedFilesSingle = [];
    initDropzone('.dropzone.single-upload', false, uploadedFilesSingle, 'uploaded_files_single', 'filesToDelete', @json($existingFilesArray));
</script>

@endpush
