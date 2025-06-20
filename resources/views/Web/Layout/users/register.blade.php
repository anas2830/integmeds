@extends('Web.Layout.app')

@section('site-title', 'User Registration')

@section('content')
<section>
    <div class="registration-page-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 m-auto">
                    <div class="regi-box">
                        <div class="regi-title">
                            <h4>Registration</h4>
                        </div>
                            <form action="{{ route('user.register.post') }}" method="POST">
                                @csrf
                                <div class="input_box mb-4">
                                    <label for="name">Full Name</label>
                                    <input type="text"
                                           name="name"
                                           id="name"
                                           placeholder="Enter your name"
                                           maxlength="100"
                                           required
                                           value="{{ old('name') }}"
                                           class="form-control @error('name') is-invalid @enderror">
                                    @error('name')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="input_box mb-4">
                                    <label for="email">Email</label>
                                    <input type="email"
                                           name="email"
                                           maxlength="100"
                                           id="email"
                                           placeholder="Enter your email"
                                           required
                                           value="{{ old('email') }}"
                                           class="form-control @error('email') is-invalid @enderror">
                                    @error('email')
                                        <span class="invalid-feedback">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="user_details">
                                    
                                    
                                    <div class="input_box">
                                        <label for="password">Password</label>
                                        <input type="password"
                                               name="password"
                                               id="password"
                                               maxlength="50"
                                               placeholder="Enter your password"
                                               required
                                               class="form-control @error('password') is-invalid @enderror">
                                        @error('password')
                                            <span class="invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="input_box">
                                        <label for="password_confirmation">Confirm Password</label>
                                        <input type="password"
                                               name="password_confirmation"
                                               id="password_confirmation"
                                               placeholder="Confirm your password"
                                               required
                                               class="form-control">
                                    </div>
                                </div>
                                <div class="reg_btn">
                                    <input type="submit" value="Register">
                                </div>
                                <div class="sign-up-box">
                                    <p>Already have an account?</p><a href="{{route('user.login')}}">Login</a>
                                </div>
                            </form>
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
