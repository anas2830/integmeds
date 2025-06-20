<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, user-scalable=no">
    <title>  Integrative Medicine – American Number #1 Supplement Brand</title>

    <meta name="description" content="Integrative Medicine – American Number #1 Supplement Brand">
    <meta name="keywords" content="Integrative Medicine , American Number #1, Supplement Brand">

    <meta http-equiv="refresh" content="">
    <meta name="author" content="Integrative Medicine">
    <meta name="Developer" content="Emial">
    <meta name="resource-type" content="document">
    <meta name="contact" content="contact@integmeds.com">
    <meta name="copyright" content="Copyright (c) 2025. All Rights &reg; Reserved by https://www.integmeds.com">

    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <meta name="msnbot" content="index, follow">

    <meta property="fb:app_id" content="">
    <meta property="og:site_name" content="Integrative Medicine – American Number #1 Supplement Brand">
    <meta property="og:title" content="Integrative Medicine – American Number #1 Supplement Brand">
    <meta property="og:description" content="Integrative Medicine – American Number #1 Supplement Brand">
    <meta property="og:url" content="">
    <meta property="og:type" content="article">
    <meta property="og:image" content="logo-fb.jpg">
    <meta property="og:locale" content="en_US">

    <link rel="image_src" href="logo-fb.jpg">
    <link rel="canonical" href="">

    <link type="image/x-icon" rel="shortcut icon" href="favicon.ico">
    <link type="image/x-icon" rel="icon" href="favicon.ico">
    @include('Web.Layout.partials.styles')

    @stack('css')
</head>

<body>
    @include('Web.Layout.partials.header')


    <!-- Back to top button -->
	<a id="button"><i class="fas fa-angle-double-up"></i></a>

    <!-- quick-view-modal -->
    @include('Web.Layout.partials.quick-view-modal')

    <main>
        @yield('content')
    </main>

    @include('Web.Layout.partials.footer')

    @include('Web.Layout.partials.scripts')
    @stack('script')
    @include('Web.Layout.partials.custom-scripts')
</body>

</html>