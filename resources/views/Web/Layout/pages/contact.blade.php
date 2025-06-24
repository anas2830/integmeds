@extends('Web.Layout.app')

@section('site-title', 'Category')

@section('content')
<section>
    <div class="contact-page-area">
        <div class="container">
            <div class="contact-page-wrapper">
                <div class="contact-page-infoBox">
                    <div class="row">
                        <div class="col-sm-6 col-lg-4 d-flex">
                            <div class="contact-page-infoCard">
                                <i class="fa-solid fa-phone"></i>
                                <h5>Telephone:</h5>
                                <p><a href="tel:+1346346">+1(346)346 - 0732</a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 d-flex">
                            <div class="contact-page-infoCard">
                                <i class="fa-regular fa-envelope"></i>
                                <h5>Email:</h5>
                                <p><a href="mailto:jhingephul@gmail.com"> jhingephul@gmail.com </a></p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-lg-4 d-flex">
                            <div class="contact-page-infoCard">
                                <address>
                                    <i class="fa-solid fa-location-dot"></i>
                                    <h5>Address:</h5>
                                    <p>12727 Featherwood Drive Suite 104 Houston, Texas 77034</p>
                                </address>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="contact-page-title">
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Let's get in touch </h3>
                            <p>We will answer any questions you may have about our online sales, rights or
                                partnership service right here. </p>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
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
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="contact-from">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Name" name="name" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="email" value="" placeholder="Email" name="email" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Phone" name="phone">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <input class="form-control" type="text" value="" placeholder="Subject" name="subject" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <textarea class="form-control" rows="3" placeholder="Write a Message" name="message" required></textarea>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <div class="d-flex align-items-center mb-2">
                                                {!! Captcha::img('flat') !!}
                                                <button type="button" class="btn btn-sm btn-outline-secondary ml-2" id="reloadCaptcha">
                                                    &#x21bb;
                                                </button>
                                            </div>
                                            <input type="text" class="form-control" name="captcha" placeholder="Enter Captcha" required>
                                            @if($errors->has('captcha'))
                                                <small class="text-danger">{{ $errors->first('captcha') }}</small>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="col-lg-12 mt-15">
                                        <button class="btn submitBtn" type="submit">Send Message</button>
                                    </div>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <div class="contact-info-text">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d443977.47070738726!2d-95.211955!3d29.616068000000002!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864099e9ec866d19%3A0xc7d24f6bb6a99e91!2s12727%20Featherwood%20Dr%20%23%20104%2C%20Houston%2C%20TX%2077034!5e0!3m2!1sen!2sus!4v1749890590345!5m2!1sen!2sus" style="border:0" width="100%" height="380" frameborder="0"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@push('script')

    <script>
       $('#reloadCaptcha').on('click', function () {
            $.ajax({
                type: 'GET',
                url: '{{ route('reload.captcha') }}',
                success: function (data) {
                    $('.contact-from img').attr('src', data.captcha_src);
                }
            });
        });
    </script>

@endpush

