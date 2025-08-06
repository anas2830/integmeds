@extends('Web.Layout.app')

@section('site-title', 'Account')

@section('content')
<div class="dashboard-page">
    <div class="container">
        <div class="row">
            <div class="col-xl-3 col-lg-3 col-md-4">
                @include('Web.Layout.users.partials.sidebar')
            </div>
            <div class="col-xl-9 col-lg-9 col-md-8">
                <div class="order-content">
                    <div class="dash-heading">
                        <h1>Accounts Details</h1>
                        @if(session('error'))
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Error!</strong> {{ session('error') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                        @if(session('success'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <div class="people-content">
                        <form action="{{ route('user.account.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="upload-img">
                                <div class="upload__img-wrap"></div>
                                <div class="upload-file">
                                    <div class="photo-upload">
                                        <div class="photo-preview">
                                            <div id="imagePreview" 
                                                style="background-image: url('{{ asset($user->profile_image ?? 'web_assets/images/bg/dummy-image.jpg') }}');">
                                            </div>
                                        </div>
                                        <div class="photo-edit">
                                            <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg" name="profile_image">
                                            <label for="imageUpload">Upload Photo (max 2MB)</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="people-info">
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" placeholder="john doe" name="name" value="{{ $user->name }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-4">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" placeholder="john@doe.com" name="email" value="{{ $user->email }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div>
                                            <label for="text" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" placeholder="(555) 555-5555" name="phone" value="{{ $user->phone }}">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div>
                                            <label for="text" class="form-label">Address</label>
                                            <input type="text" class="form-control" placeholder="123 Main St, Apt 4, Anytown, CA 91234" name="address" value="{{ $user->address }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="update-btn-wrap text-center">
                                <button class="btn update-btn" type="submit">Update Info</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                $('#imagePreview').hide();
                $('#imagePreview').fadeIn(650);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }
    $("#imageUpload").change(function() {
        readURL(this);
    });
</script>
@endpush
