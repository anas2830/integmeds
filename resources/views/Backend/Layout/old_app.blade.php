<!DOCTYPE html>
<html lang="en">

<head>
    @include('Backend.Layout.common-head')
    @stack('styles')
</head>

<body class="g-sidenav-show  bg-gray-200">

    @include('Backend.Layout.sidebar')

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('Backend.Layout.header')

        <div class="container-fluid py-0">

            @yield('main-content')

            @include('Backend.Layout.copywrite-section')

        </div>


        @include('Backend.Layout.footer')
    </main>

    @include('Backend.Layout.common-end')
    @stack('custom-scripts')
</body>
</html>