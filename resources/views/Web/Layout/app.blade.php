<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Integrative Medicine –  @yield('site-title')</title>

    <meta http-equiv="refresh" content="">
    <meta name="author" content="Integrative Medicine">
    <meta name="Developer" content="wesoft">
    <meta name="resource-type" content="document">
    <meta name="contact" content="contact@integmeds.com">
    <meta name="copyright" content="Copyright (c) <?php echo date('Y'); ?>. All Rights &reg; Reserved by https://www.integmeds.com">

    <meta name="robots" content="index, follow">
    <meta name="googlebot" content="index, follow">
    <meta name="googlebot-news" content="index, follow">
    <meta name="msnbot" content="index, follow">

    <meta property="fb:app_id" content="">
    @stack('dynamic_meta')

    <link type="image/x-icon" rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">
    <link type="image/x-icon" rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
    @include('Web.Layout.partials.styles')

    @stack('css')
</head>

<body>
    <div id="success-msg"></div>
    @include('Web.Layout.common.success')
    @include('Web.Layout.partials.header')


    <!-- Back to top button -->
	<a id="button"><i class="fas fa-angle-double-up"></i></a>

    <!-- quick-view-modal -->
    <div id="quick-view-container"></div>

    <main>
        @yield('content')
    </main>

    @include('Web.Layout.partials.footer')

    @include('Web.Layout.partials.scripts')
    @stack('script')
    @include('Web.Layout.partials.custom-scripts')
</body>

</html>