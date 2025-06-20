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
                    </div>
                    <div class="people-content">
                        <div class="upload-img">
                            <div class="upload__img-wrap"></div>
                            <div class="upload-file">
                                <div class="photo-upload">
                                    <div class="photo-preview">
                                        <div id="imagePreview" style="background-image: url(/web_assets/images/bg/dummy-image.jpg);">
                                        </div>
                                    </div>
                                    <div class="photo-edit">
                                        <input type="file" id="imageUpload" accept=".png, .jpg, .jpeg">
                                        <label for="imageUpload">Upload Photo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="people-info">
                            <form>
                                <div class="row">
                                    <div class="col-xl-6">
                                        <div class="mb-4">
                                            <label for="name" class="form-label">Name</label>
                                            <input type="text" class="form-control" value="Arshaful Islam">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="mb-4">
                                          <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" value="arshaful@gmail.com">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div>
                                          <label for="text" class="form-label">Mobile</label>
                                            <input type="text" class="form-control" value="01758038106">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div>
                                          <label for="text" class="form-label">Address</label>
                                          <input type="text" class="form-control" value="123 Main St, Apt 4, Anytown, CA 91234">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="update-btn-wrap text-center">
                            <a class="btn update-btn" href="#">Update Info</a>
                        </div>
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
