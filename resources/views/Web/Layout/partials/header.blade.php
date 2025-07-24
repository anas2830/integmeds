

<header class="header-area">
    <div class="header-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 d-flex align-items-center">
                    <a class="" href="{{route('/')}}">
                        <div class="logo d-none d-lg-block">
                            <img class="img-fluid" src="{{asset('assets/images/logo-light.png')}}" alt="" title="">
                        </div>
                    </a>
                </div>
                <div class="col-lg-6 d-flex align-items-center">
                <div class="wrap">
                    <form action="{{route('search')}}" method="GET">
                        <div class="search">
                            <input type="text" class="searchTerm" placeholder="Search Products...." data-url="{{ route('search-suggestions') }}" name="search">
                            <button type="submit" class="searchButton">
                                <i class="fa fa-search"></i>
                            </button>
                            <ul class="suggestions" >

                            </ul>
                        </div>
                    </form>
                </div>
                </div>
                <div class="col-lg-3 d-flex align-items-center justify-content-end">
                    <div class="cart-login-wrap d-none d-lg-block">
                        <ul>
                            @auth
                                <li><a href="{{ route('user.wishlist') }}"><i class="fa-regular fa-heart"></i></a></li>
                            @else
                                <li><a href="{{ route('user.login') }}"><i class="fa-regular fa-heart"></i></a></li>
                            @endauth
                            <li class="shopping-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><a><i class="fa-solid fa-cart-shopping"></i></a><span class="cart_count">{{ $cartDataCount }}</span></li>
                            <li>
                                @auth
                                    <a class="user-btn" href="#"><i class="fa-solid fa-user"></i></a>
                                    <div class="user-logininfo">
                                        <div class="user-profile" id="user-hide">
                                            <div class="user-name">
                                                <div class="user-login-img">
                                                    <img class="img-fluid" 
                                                        @if(Auth::user()->profile_image)
                                                            src="{{ asset(Auth::user()->profile_image) }}"
                                                        @else
                                                            src="{{asset('web_assets/images/bg/profile-photo.png')}}"
                                                        @endif
                                                        alt="User Profile" title="User Profile">
                                                </div>
                                                <h5>{{Auth::user()->name}}</h5>
                                            </div>
                                            <div class="user-iteme-wrapper">
                                                <ul>
                                                    <li><a href="{{route('user.orders')}}"><i class="fa-regular fa-file-lines"></i>Orders</a> </li>
                                                    <li><a href="{{route('user.account')}}"><i class="fa-regular fa-user"></i>Account details</a></li>
                                                    <li><a href="{{route('user.address')}}"><i class="fa-solid fa-location-dot"></i>Addresses</a> </li>
                                                    <li>
                                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                                        </a>
                                                    
                                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                            @csrf
                                                        </form>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <a class="user-btn" href="{{route('user.login')}}"><i class="fa-solid fa-user"></i></a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg navbar-light d-none d-lg-block">
                        <div class="container-fluid">
                            <a class="navbar-brand" href="{{route('/')}}">
                                <div class="logo">
                                    <img class="img-fluid" src="{{asset('web_assets/images/logo/sticky-logo.png')}}" alt="" title="">
                                </div>
                            </a>
                            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                                data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false"
                                aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"><i class="fa-solid fa-bars"></i></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-center" id="navbarNav">
                                <ul class="navbar-nav">
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('/')}}">Home</a>
                                    </li>
                                    <li class="nav-item dropdown position-relative">
                                        <a class="nav-link" href="{{ url('category') }}">Shop</a>
                                        <a class="nav-link dropdown-toggle position-absolute top-0 end-0 pe-2" href="#" id="navbarDropdown"
                                           role="button" data-bs-toggle="dropdown" aria-expanded="false"></a>
                                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                            @foreach ($categories as $category)
                                                <li><a class="dropdown-item" href="{{route('category', $category->slug)}}">{{$category->name}}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    <li class="nav-item dropdown has-megamenu">
                                        <div class="mega-drop-wrap position-relative">
                                            <a class="nav-link" href="{{ route('bundle') }}">Product Bundle</a>
                                            <a class="nav-link dropdown-toggle position-absolute top-0 end-0 pe-2" href="{{ route('bundle') }}" data-bs-toggle="dropdown"></a>
                                        </div>
                                        <div class="dropdown-menu megamenu" role="menu">
                                            <div class="row w-100 ">
                                                <div class="col-lg-12">
                                                    <div class="mega-items-wrap">
                                                        <ul>
                                                            @foreach ($bundles as $bundle)
                                                            <li>
                                                                <div class="items-list">
                                                                    <a href={{ route('bundle-details', $bundle->id)  }}>{{$bundle->name}}</a>
                                                                </div>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('about-us')}}">About No.1 US Brand</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('contact')}}">Contact</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('user.dashboard') }}">My account</a>
                                    </li>
                                </ul>
                                <div class="sticky-menu-cart">
                                    <div class="cart-login-wrap">
                                        <ul>
                                            @auth
                                                <li><a href="{{ route('user.wishlist') }}"><i class="fa-regular fa-heart"></i></a></li>
                                            @else
                                                <li><a href="{{ route('user.login') }}"><i class="fa-regular fa-heart"></i></a></li>
                                            @endauth
                                            <li class="shopping-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><a><i class="fa-solid fa-cart-shopping"></i></a><span class="cart_count">{{ $cartDataCount }}</span></li>
                                            <li>
                                                @auth
                                                    <a class="user-btn" href="#"><i class="fa-solid fa-user"></i></a>
                                                    <div class="user-logininfo">
                                                        <div class="user-profile" id="user-hide">
                                                            <div class="user-name">
                                                                <div class="user-login-img">
                                                                    <img class="img-fluid" 
                                                                        @if(Auth::user()->profile_image)
                                                                            src="{{ asset(Auth::user()->profile_image) }}"
                                                                        @else
                                                                            src="{{asset('web_assets/images/bg/profile-photo.png')}}"
                                                                        @endif
                                                                        alt="User Profile" title="User Profile">
                                                                </div>
                                                                <h5>{{Auth::user()->name}}</h5>
                                                            </div>
                                                            <div class="user-iteme-wrapper">
                                                                <ul>
                                                                    <li><a href="{{route('user.orders')}}"><i class="fa-regular fa-file-lines"></i>Orders</a> </li>
                                                                    <li><a href="{{route('user.account')}}"><i class="fa-regular fa-user"></i>Account details</a></li>
                                                                    <li><a href="{{route('user.address')}}"><i class="fa-solid fa-location-dot"></i>Addresses</a> </li>
                                                                    <li>
                                                                        <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                            <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                                                        </a>
                                                                    
                                                                        <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                                            @csrf
                                                                        </form>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @else
                                                    <a class="user-btn" href="{{route('user.login')}}"><i class="fa-solid fa-user"></i></a>
                                                @endauth
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </nav>
                    <!--mobile-navbar-part-start-->
                    <div class="mobile-menu-area d-block d-lg-none">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="mobile-topbar">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="bars">
                                                <i class="fas fa-bars"></i>
                                            </div>
                                            <div class="logo">
                                                <a href="{{route('/')}}">
                                                    <img class="img-fluid" src="{{asset('web_assets/images/logo/footer-logo.png')}}" alt="Integmeds" title="Integmeds">
                                                </a>
                                            </div>
                                            <div class="cart-login-wrap">
                                                <ul>
                                                    @auth
                                                        <li><a href="#"><i class="fa-regular fa-heart"></i></a></li>
                                                    @else
                                                        <li><a href="{{ route('user.login') }}"><i class="fa-regular fa-heart"></i></a></li>
                                                    @endauth
                                                    <li class="shopping-cart" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight"><a><i class="fa-solid fa-cart-shopping"></i></a><span class="cart_count">{{ $cartDataCount }}</span></li>
                                                    <li>
                                                        @auth
                                                            <a class="user-btn" href="#"><i class="fa-solid fa-user"></i></a>
                                                            <div class="user-logininfo">
                                                                <div class="user-profile" id="user-hide">
                                                                    <div class="user-name">
                                                                        <div class="user-login-img">
                                                                            <img class="img-fluid" src="{{Auth::user()->profile_image ?? asset('web_assets/images/bg/profile-photo.png')}}"
                                                                                alt="User Profile" title="User Profile">
                                                                        </div>
                                                                        <h5>{{Auth::user()->name}}</h5>
                                                                    </div>
                                                                    <div class="user-iteme-wrapper">
                                                                        <ul>
                                                                            <li><a href="{{route('user.orders')}}"><i class="fa-regular fa-file-lines"></i>Orders</a> </li>
                                                                            <li><a href="{{route('user.account')}}"><i class="fa-regular fa-user"></i>Account details</a></li>
                                                                            <li><a href="{{route('user.address')}}"><i class="fa-solid fa-location-dot"></i>Addresses</a> </li>
                                                                            <li>
                                                                                <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                                                    <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
                                                                                </a>
                                                                            
                                                                                <form id="logout-form" action="{{ route('user.logout') }}" method="POST" style="display: none;">
                                                                                    @csrf
                                                                                </form>
                                                                            </li>
                                                                        </ul>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @else
                                                            <a class="user-btn" href="{{ route('user.login') }}"><i class="fa-solid fa-user"></i></a>
                                                        @endauth
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mobile-menu-overlay"></div>
                                    <div class="mobile-menu-main">
                                        <div class="logo">
                                            <a href="#">
                                                <img class="img-fluid" src="{{asset('web_assets/images/logo/Integmeds-Logo.png')}}.webp" alt="Integmeds" title="Integmeds">
                                            </a>
                                        </div>
                                        <div class="close-mobile-menu"><i class="fas fa-times"></i></div>
                                        <div class="menu-body">
                                            <div class="menu-list">
                                                <ul class="list-unstyled">
                                                    <li class="sub-mobile-menu">
                                                        <a href="{{route('/')}}">Home</a>
                                                    </li>
                                                    <li class="sub-mobile-menu">
                                                        <div class="sub-menu-mobile-link">
                                                            <a href="{{ url('category') }}">Shop</a>
                                                            <span class="accordion-click"><i class="fas fa-angle-down"></i></span>
                                                        </div>
                                                        <ul class="list-unstyled">
                                                            <li>
                                                                <a href="{{route('category')}}">Supplement, Natural Medicine</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('category')}}">Functional Food</a>
                                                            </li>
                                                            <li>
                                                                <a href="{{route('category')}}">Natural Self Care</a>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mobile-menu">
                                                        <div class="sub-menu-mobile-link">
                                                            <a href="{{ route('bundle') }}">Product Bundles</a>
                                                            <span class="accordion-click"><i class="fas fa-angle-down"></i></span>
                                                        </div>
                                                        <ul class="list-unstyled">
                                                            <li><a href="">Digestion support, Colon, Stomach, Gallbladder Support</a></li>
                                                            <li><a href="">Diabetes, Insulin Resistance, weight loss </a></li>
                                                            <li><a href="">Woman, Female Hormone, Thyroid </a></li>
                                                            <li><a href="">Cancer Support and Prevention </a></li>
                                                            <li><a href="">Autoimmune, Anti Inflamatory </a></li>
                                                            <li><a href="">Bone, Joint, and Muscle </a></li>
                                                            <li><a href="">Children’s Health/ Children Care (ages 4 and older) </a></li>
                                                            <li><a href="">Skin Disease: Vitiligo, Psoriasis, dermatitis, etc. </a></li>
                                                            <li><a href="">ASD, Neurological support, Autistic Brain and Cognitive enhenser </a></li>
                                                            <li><a href="">Immune support and Vitality</a></li>
                                                            <li><a href="">Fitness / Body Building / Protein</a></li>
                                                            <li><a href="">Vitamins and Minerals</a></li>
                                                            <li><a href="">Heavy Metal Cleanse</a></li>
                                                            <li><a href="">Organ Support (Liver, Kidney)</a></li>
                                                            <li><a href="">Fish Oils and Omegas</a></li>
                                                        </ul>
                                                    </li>
                                                    <li class="sub-mobile-menu">
                                                        <a href="{{route('about-us')}}">About No.1 US Brand</a>
                                                    </li>
                                                    <li class="sub-mobile-menu">
                                                        <a href="{{route('contact')}}">Contact</a>
                                                    </li>
                                                    <li class="sub-mobile-menu">
                                                        <a href="{{route('user.account')}}">My account</a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="social-icon">
                                            <ul class="list-unstyled">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-linkedin-in"></i></a></li>
                                                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--mobile-navbar-part-end-->
                </div>
            </div>
        </div>
    </div>
    <div id="mini-cart-area">
        @include('Web.Layout.partials.cart.minicart')
    </div>
</header>

