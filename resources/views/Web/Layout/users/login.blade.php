@extends('Web.Layout.app')

@section('site-title', 'User Login')

@section('content')
<section>
    <div class="login-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 m-auto">
                    <div class="log-in-box">
                        <div class="log-in-title">
                            <h4>Login</h4>
                        </div>
                        <div class="login-box">
                            <form action="{{ route('user.login.post') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input class="form-control @error('email') is-invalid @enderror" name="email" id="email" maxlength="100"  type="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                                            @error('email')<span class="invalid-feedback small">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <input class="form-control @error('password') is-invalid @enderror" name="password" id="password" maxlength="100 " type="password" placeholder="Password">
                                            @error('password')<span class="invalid-feedback small">{{ $message }}</span>@enderror
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="forgot-box mb-3">
                                            <div>
                                                <input class="form-check-input custom-checkbox" id="remember" type="checkbox" name="remember">
                                                <label for="remember">Remember me</label>
                                            </div>
                                            <a href="#">Forgot Password?</a>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn login btn_black sm" type="submit">Log In</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="other-log-in">
                            <h6>OR</h6>
                        </div>
                        {{-- <div class="log-in-button">
                            <ul>
                                <li> <a href="https://www.google.com/" target="_blank"> <i class="fa-brands fa-google me-2"> </i>Google</a></li>
                                <li> <a href="https://www.facebook.com/" target="_blank"><i class="fa-brands fa-facebook-f me-2"></i>Facebook </a></li>
                            </ul>
                        </div> --}}
                        <div class="sign-up-box">
                            <p>Don't have an account?</p><a href="{{route('user.register')}}">Sign Up</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')

@endpush
