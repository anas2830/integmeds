<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}" />

    <title>Admin Login</title>
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link id="pagestyle" href="{{ asset('assets/css/dashboard.min.css') }}" rel="stylesheet" />
</head>

<body class="g-sidenav-show  bg-gray-200">
    <main class="main-content mt-0 ps">
        <div class="page-header align-items-start min-vh-100" style="background-image: url('{{ asset('assets/images/bg-pricing.jpg') }}');">
            <span class="mask bg-gradient-dark opacity-6"></span>

            <div class="container my-auto">
                <div class="row">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div class="bg-gradient-primary shadow-primary border-radius-lg py-3 pe-1" style="background-color: #01703A;background-image: none;">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Admin Login</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('admin.login') }}" class="text-start" role="form">
                                    @csrf
                                    @if ($errors->any())
                                    <div class="error-messages">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li style="color:#e91e63">{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif

                                    <div class="input-group input-group-outline my-3">
                                        <label class="form-label">Email</label>
                                        <input type="email" name="email" class="form-control" placeholder="email">
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        <label class="form-label">Password</label>
                                        <input type="password" name="password" placeholder="password" class="form-control">
                                    </div>
                                    <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" name="remember" checked="">
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-primary w-100 my-4 mb-2" style="background-color: #01703A;background-image: none;box-shadow: none;">Login</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer position-absolute bottom-2 py-2 w-100">
                <div class="container">
                    <div class="row align-items-center justify-content-lg-between">

                        <div class="col-12 my-auto">
                            <div class="copyright text-center text-sm text-white text-lg-start">
                                © <script>
                                    document.write(new Date().getFullYear())
                                </script>2024,
                                made with <i class="fa fa-heart" aria-hidden="true"></i> by
                                <a href="#" class="font-weight-bold text-white" target="_blank">ABCD</a> for a better web.
                            </div>
                        </div>

                    </div>
                </div>
            </footer>

        </div>

    </main>

</body>

</html>