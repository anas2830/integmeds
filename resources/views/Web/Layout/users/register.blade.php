@extends('Web.Layout.app')

@section('site-title', 'User Login')

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
                            <form action="#">
                                <div class="user_details">
                                    <div class="input_box">
                                        <label for="name">Full Name</label>
                                        <input type="text" id="name" placeholder="Enter your name" required>
                                    </div>
                                    <div class="input_box">
                                        <label for="username">Username</label>
                                        <input type="text" id="username" placeholder="Enter your username" required>
                                    </div>
                                    <div class="input_box">
                                        <label for="email">Email</label>
                                        <input type="email" id="email" placeholder="Enter your email" required>
                                    </div>
                                    <div class="input_box">
                                        <label for="phone">Phone Number</label>
                                        <input type="number" id="phone" placeholder="Enter your number" required>
                                    </div>
                                    <div class="input_box">
                                        <label for="pass">Password</label>
                                        <input type="password" id="pass" placeholder="Enter your password" required>
                                    </div>
                                    <div class="input_box">
                                        <label for="confirmPass">Confirm Password</label>
                                        <input type="password" id="confirmPass" placeholder="Confirm your password" required>
                                    </div>
                                </div>
                                <div class="reg_btn">
                                    <input type="submit" value="Register">
                                </div>
                                  <div class="sign-up-box">
                                     <p>Already have an account?</p><a href="login.php">Login</a>
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
