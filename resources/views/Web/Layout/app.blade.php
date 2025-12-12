<!DOCTYPE html>
<html lang="en">

<head>
    
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-5WXJ8VPS');</script>
    <!-- End Google Tag Manager -->
    
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-NVJV9LS7N2"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
    
      gtag('config', 'G-NVJV9LS7N2');
    </script>
    <!-- End Google tag (gtag.js) -->
    
    <!-- Meta Pixel Code -->
    <script>
    !function(f,b,e,v,n,t,s)
    {if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};
    if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
    n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];
    s.parentNode.insertBefore(t,s)}(window, document,'script',
    'https://connect.facebook.net/en_US/fbevents.js');
    fbq('init', '2368950830241780');
    fbq('track', 'PageView');
    </script>
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=2368950830241780&ev=PageView&noscript=1"
    /></noscript>
    <!-- End Meta Pixel Code -->
    
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
    
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5WXJ8VPS"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

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
    
    <!--Use the below code snippet to provide real time updates to the live chat plugin without the need of copying and paste each time to your website when changes are made via PBX-->
<call-us-selector phonesystem-url="https://integ.3cx.us" party="LiveChat674203"></call-us-selector>
 
<!--Incase you don't want real time updates to the live chat plugin when options are changed, use the below code snippet. Please note that each time you change the settings you will need to copy and paste the snippet code to your website--> 
<!--<call-us 
phonesystem-url="https://integ.3cx.us" 
style="position:fixed;font-size:16px;line-height:17px;z-index: 99999;right: 0; bottom: 0;" 
id="wp-live-chat-by-3CX" 
minimized="true" 
animation-style="noanimation" 
party="LiveChat674203" 
minimized-style="bubbleright" 
allow-call="false" 
allow-video="false" 
allow-soundnotifications="true" 
enable-mute="true" 
enable-onmobile="true" 
offline-enabled="true" 
enable="true" 
ignore-queueownership="false" 
authentication="both" 
show-operator-actual-name="true" 
aknowledge-received="true" 
gdpr-enabled="false" 
message-userinfo-format="both" 
message-dateformat="both" 
lang="browser" 
button-icon-type="default" 
greeting-visibility="none" 
greeting-offline-visibility="none" 
chat-delay="2000" 
enable-direct-call="false" 
enable-ga="false" 
></call-us>--> 
<script defer src="https://downloads-global.3cx.com/downloads/livechatandtalk/v1/callus.js" id="tcx-callus-js" charset="utf-8"></script>

</body>

</html>