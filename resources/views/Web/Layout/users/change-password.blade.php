@extends('Web.Layout.app')

@section('site-title', 'Change Password')

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
                        <h1>Change Password</h1>
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
                        @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                <strong>Error!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif
                    </div>
                    <form action="{{ route('user.password.update') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="changPassw-content">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Current Passwrod</label>
                                        <input type="password" class="form-control" name="current_password" required value="{{ old('current_password') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="mb-4">
                                        <label for="password" class="form-label">New Password</label>
                                        <input type="password" class="form-control" name="new_password" value="{{ old('new_password') }}">
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div>
                                        <label for="password" class="form-label">Confirm Password</label>
                                        <input type="password" class="form-control" name="confirm_password" value="{{ old('confirm_password') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="SavePass-btn-wrap text-center">
                            <button class="btn SavePass-btn" type="submit">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')

@endpush
