@extends('Web.Layout.app')

@section('site-title', 'Privacy Policy')

@section('content')

<div class="forgot-password-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="feature-box">
                    <div class="feature-box-content">
                        <form action="{{ route('reset-password.post', $token) }}" method="POST">
                            @csrf
                            <div class="log-in-title">
                                <h4>Update your password</h4>
                            </div>
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert" style="font-size: 16px;">
                                    <strong>Error!</strong> {{ $errors->first() }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif
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
                            <div class="form-group input_box">
                                <label for="password" class="font-weight-normal required">Password</label>
                                <input type="password" class="form-control" id="password" name="password" required="">
                            </div>
                            <div class="form-group input_box mt-3">
                                <label for="password_confirmation" class="font-weight-normal required">Confirm Password</label>
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required="">
                            </div>
                            <div class="form-footer">
                                <a href="{{ route('user.login') }}">Click here to login</a>
                                <button type="submit" class="btn form-footer-btn"> Update Password </button>
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

@endpush
