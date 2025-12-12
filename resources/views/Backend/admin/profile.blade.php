
@extends('Backend.Layout.app')

@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Profile Update</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        <li class="breadcrumb-item active">Profile Update</li>
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
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif  
            @error('error')
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ $message }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @enderror
            <div class="card">
                <div class="card-body">
                    {{-- <h4 class="card-title mb-4">Admin Profile</h4> --}}

                    <form action="{{ route('profile.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" value="{{ $admin['id'] }}">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input">Name</label>
                                    <input type="text" class="form-control w-100" name="name" value="{{ $admin['name'] }}" required>
                                    @error('admin_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-email-input">Email</label>
                                    <input type="email" readonly class="form-control w-100" name="email" value="{{ $admin['email'] }}">
                                    @error('admin_email')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Password</label>
                                    <input type="password" class="form-control w-100" name="admin_password">
                                    @error('admin_password')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Confirm Password</label>
                                    <input type="password" class="form-control w-100" name="admin_confirm_password">
                                    @error('admin_confirm_password')<span class="text-danger">{{ $message }}</span>@enderror
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
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Update</button>
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
