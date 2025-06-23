@extends('Web.Layout.app')

@section('site-title', 'Privacy Policy')

@section('content')

<div class="forgot-password-page">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="feature-box">
                    <div class="feature-box-content">
                        <form action="#">
                            <p> Lost your password? Please enter your username or email address. You will receive a link to create a new password via email. </p>
                            <div class="form-group">
                                <label for="reset-email" class="font-weight-normal">Username or email</label>
                                <input type="email" class="form-control" id="reset-email" name="reset-email" required="">
                                <span>Lorem ipsum dolor sit amet.</span>
                            </div>
                            <div class="form-footer">
                                <a href="login.html">Click here to login</a>
                                <button type="submit" class="btn form-footer-btn"> Reset Password </button>
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
