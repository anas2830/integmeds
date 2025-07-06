
@extends('Backend.Layout.app')
@section('site-title', 'Create Shipping Method')
@section('main-content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Create Shipping Method</h4>

                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('shipping-method.index') }}">Shipping Method</a></li>
                        <li class="breadcrumb-item active">Create Shipping Method</li>
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
                    <form action="{{ route('shipping-method.store') }}" method="POST">
                        @csrf
                        <div class="row">
                            {{-- Name --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="name">Name <span class="required-icon">*</span></label>
                                    <input type="text" class="form-control w-100" name="name" value="{{ old('name') }}" maxlength="100" required>
                                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- Token --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="token">Bearer Token <span class="required-icon">*</span></label>
                                    <input type="text" class="form-control w-100" name="token" value="{{ old('token') }}" maxlength="255" required>
                                    @error('token')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- Client ID --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_id">Client ID</label>
                                    <input type="text" class="form-control w-100" name="client_id" value="{{ old('client_id') }}" maxlength="255">
                                    @error('client_id')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- Client Secret --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_secret">Client Secret</label>
                                    <input type="text" class="form-control w-100" name="client_secret" value="{{ old('client_secret', $shipping->client_secret ?? '') }}">
                                    @error('client_secret')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- Client Credentials --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="client_credentials">Client Credentials</label>
                                    <input type="text" class="form-control w-100" name="client_credentials" value="{{ old('client_credentials') }}" maxlength="255">
                                    @error('client_credentials')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- API URL --}}
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="api_url">API/Base URL</label>
                                    <input type="url" class="form-control w-100" name="api_url" value="{{ old('api_url') }}" maxlength="100">
                                    @error('api_url')<span class="text-danger">{{ $message }}</span>@enderror
                                </div>
                            </div>
                    
                            {{-- Status --}}
                            <div class="col-md-6 mt-4">
                                <div class="input-group input-group-dynamic">
                                    <div class="col-sm-3">
                                        <label class="form-check-label" for="status">Status</label>
                                    </div>
                                    <div class="custom-control custom-switch custom-switch-lg mb-3" dir="ltr">
                                        <input type="checkbox" class="custom-control-input" id="customSwitchsizelg" name="status" value="1"
                                               {{ old('status', $shipping->status ?? true) ? 'checked' : '' }}>
                                        <label class="custom-control-label" for="customSwitchsizelg"></label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="btn btn-primary w-md">Create</button>
                            <a href="{{ route('shipping-method.index') }}" class="btn btn-secondary w-md">Back to list</a>
                        </div>
                    </form>
                </div>
            </div>
         </div>
    </div>

@endsection
