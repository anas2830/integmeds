
@extends('Backend.Layout.app')
@section('site-title', 'Create Product Category')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Product Category</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('product-category.index') }}">Product Category</a></li>
                        <li class="breadcrumb-item active">Create Product Category</li>
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
                    <form action="{{ route('product-category.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-firstname-input required">Name <span class="required-icon">*</span></label>
                                    <input type="text" class="form-control w-100" name="category_name" required>
                                    @error('category_name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-email-input">Parent Category</label>
                                    <select class="form-control w-100 select2" name="parent_category_id">
                                        <option value="">Select Parent Category</option>
                                        @foreach($parent_categories as $parent_category)
                                            <option value="{{ $parent_category->id }}">{{ $parent_category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('parent_category_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                        </div>
        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="formrow-password-input">Description</label>
                                    <textarea class="form-control w-100" name="description" maxlength="200" oninput="updateCharCount()"></textarea>
                                    <small id="char-count" class="text-muted position-absolute" style="right: 10px;">0/200</small>
                                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                            <div class="col-md-6 mt-4">
                                <div class="input-group input-group-dynamic">
                                    <div class="col-sm-3"><label class="form-check-label" for="status">Status</label></div>
                                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" value="1" name="status" checked="">
                                        <label class="custom-control-label" for="customSwitchsizelg"></label>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="btn btn-primary w-md">Create</button>
                            <a href="{{ route('product-category.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection


@push('custom-scripts')
    <script>
        function updateCharCount() {
            const textarea = document.querySelector('textarea[name="description"]');
            const charCount = document.getElementById('char-count'); 
            charCount.textContent = textarea.value.length + '/200';
        }
    </script>
@endpush


