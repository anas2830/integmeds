@extends('Backend.Layout.app')

@section('site-title', 'Terms and Conditions')

@section('main-content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Terms and Conditions</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Pages</a></li>
                        <li class="breadcrumb-item active">Terms and Conditions</li>
                    </ol>
                </div>

            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <form method="POST" action="{{ route('terms-condition-settings.update') }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="card mb-4">
                    <div class="card-body">
                        <h4 class="card-title">Terms and Conditions</h4>
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
                                <div class="form-group">
                                    <textarea id="content" name="content" class="form-control @error('content') is-invalid @enderror" rows="5">{{ $termsCondition->content }}</textarea>
                                    @error('content')
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
        .create(document.querySelector('#content'), {
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
</script>
@endpush
