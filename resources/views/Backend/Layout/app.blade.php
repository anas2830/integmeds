<!DOCTYPE html>
<html lang="en">

    
<head>
    @include('Backend.Layout.common-head')
    @stack('styles')
</head>

    <body data-sidebar="dark">

        <!-- Begin page -->
        <div id="layout-wrapper">

            @include('Backend.Layout.header')

            <!-- ========== Left Sidebar Start ========== -->
            @include('Backend.Layout.sidebar')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="main-content">
                <div class="page-content">
                    <div class="container-fluid">

                        @yield('main-content')
                        
                    </div>
                    <!-- container-fluid -->
                </div>
                <!-- End Page-content -->

               

                @include('Backend.Layout.footer')
            </div>
            <!-- end main content-->

        </div>
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        @include('Backend.Layout.right-sidebar')
        <!-- /Right-bar -->

        @include('Backend.Layout.common-end')

        @stack('custom-scripts')
    </body>
</html>