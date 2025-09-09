<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboards</span>
                    </a>
                </li>
                @if(Auth::guard('admin')->check())
                    {{-- <li>
                        <a href="javascript: void(0);" class="has-arrow waves-effect">
                            <i class="bx bx-user"></i>
                            <span>Editor Management</span>
                        </a>
                        <ul class="sub-menu" aria-expanded="false">
                            <li><a href="{{ route('manage-editor.index') }}">Editor List</a></li>
                            <li><a href="{{ route('manage-editor.create') }}">Create</a></li>
                        </ul>
                    </li> --}}
                @endif

                <li class="menu-title">Product Management</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-list-ul"></i>
                        <span>Category</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-category.index') }}">List</a></li>
                        <li><a href="{{ route('product-category.create') }}">Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-crown"></i>
                        <span>Brand</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-brand.index') }}">List</a></li>
                        <li><a href="{{ route('product-brand.create') }}">Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-tag"></i>
                        <span>Tag</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-tag.index') }}">List</a></li>
                        <li><a href="{{ route('product-tag.create') }}">Create</a></li>
                    </ul>
                </li>

               <!--  <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx  bx-ruler'></i>
                        <span>Size</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-size.index') }}">List</a></li>
                        <li><a href="{{ route('product-size.create') }}">Create</a></li>
                    </ul>
                </li> -->

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-gift"></i>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('cupon.index') }}">List</a></li>
                        <li><a href="{{ route('cupon.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-box"></i>
                        <span>Bundle</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-bundle.index') }}">List</a></li>
                        <li><a href="{{ route('product-bundle.create') }}">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-image"></i>
                        <span>Slider</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('slider.index') }}">List</a></li>
                        <li><a href="{{ route('slider.create') }}">Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-image"></i>
                        <span>Clients</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('clients.index') }}">List</a></li>    
                        <li><a href="{{ route('clients.create') }}">Create</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-comment"></i>
                        <span>Review</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product-review.index') }}">Product Review</a></li>
                        <li><a href="{{ route('bundle-review.index') }}">Bundle Review</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ route('order.list') }}" class="waves-effect">
                        <i class="bx bx-cart"></i><span class="badge badge-pill badge-info float-right">{{pendingPaidOrderCount()}}</span>
                        <span>Order List</span>
                    </a>
                </li>
                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class='bx bx-car'></i> 
                        <span>Shipping</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('shipping-method.index') }}">List</a></li>
                        <li><a href="{{ route('shipping-method.create') }}">Create</a></li>
                    </ul>
                </li>

                <li class="menu-title">Apps</li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-store"></i>
                        <span>Product</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="{{ route('product.index') }}">List</a></li>
                        <li><a href="{{ route('product.create') }}">Add Product</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Settings</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('site.settings') }}">Site Settings</a></li>
                        <li><a href="{{ route('home.page.sidebar.settings') }}">Home Page Sidebar Banner</a></li>
                        <li><a href="{{ route('home.page.body.settings') }}">Home Page Body Banner</a></li>
                    </ul>
                </li>

                <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-cog"></i>
                        <span>Pages</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('privacy-policy-settings') }}">Privacy Policy</a></li>
                        <li><a href="{{ route('terms-condition-settings') }}">Terms & Conditions</a></li>
                        <li><a href="{{ route('about-us-settings') }}">About Us</a></li> 
                        <li><a href="{{ route('contact-us-settings') }}">Contact Us</a></li>
                    </ul>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-file"></i>
                        <span>Report</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="true">
                        <li><a href="{{ route('inventory.report.index') }}">Inventory Report</a></li>
                        <li><a href="{{ route('sales.report.index') }}">Sales Report</a></li>
                    </ul>
                </li> --}}

            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>