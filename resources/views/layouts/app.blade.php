<?php
if (!isset($seo)) {
    $seo = (object) ['seo_title' => $siteSetting->site_name, 'seo_description' => $siteSetting->site_name, 'seo_keywords' => $siteSetting->site_name, 'seo_other' => ''];
}
?>
<!DOCTYPE html>
<html class="no-js" lang="{{ app()->getLocale() }}" class="{{ session('localeDir', 'ltr') }}"
    dir="{{ session('localeDir', 'ltr') }}">

<head>
    <meta charset="utf-8" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ __($seo->seo_title) }}</title>
    <meta name="Description" content="{!! $seo->seo_description !!}">
    <meta name="Keywords" content="{!! $seo->seo_keywords !!}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {!! $seo->seo_other !!}

    <link rel="shortcut icon" href="{{ asset('/') }}favicon.ico">

    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('new_template/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('new_template/css/main.css?v=1.0') }}" />


   
    <link href="{{asset('/')}}js/revolution-slider/css/settings.css" rel="stylesheet">
   
    <link href="{{asset('/')}}css/owl.carousel.css" rel="stylesheet">

    <link href="{{asset('/')}}css/all.min.css" rel="stylesheet">
    <link href="{{asset('/')}}css/main.css" rel="stylesheet"> 

 
    {{--  
    <link href="{{asset('/')}}css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset('/')}}css/all.min.css" rel="stylesheet">
  
    <link href="{{asset('/')}}css/main.css" rel="stylesheet">
 
    <link href="{{ asset('/') }}admin_assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="{{ asset('/') }}admin_assets/global/plugins/select2/css/select2-bootstrap.min.css" rel="stylesheet" type="text/css" />  --}}



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->

    <!--[if lt IE 9]>

          <script src="{{ asset('/') }}js/html5shiv.min.js"></script>

          <script src="{{ asset('/') }}js/respond.min.js"></script>

        <![endif]-->

    @stack('styles')



    {!! $siteSetting->ganalytics !!}

    {!! $siteSetting->google_tag_manager_for_head !!}

    <link href="https://vjs.zencdn.net/7.14.3/video-js.css" rel="stylesheet" />
    
    <link rel="stylesheet" href="{{ asset('new_template/css/override.css') }}" />

    <link rel="stylesheet" href="{{ asset('new_template/css/responsive.css') }}" />

    @if (session('localeDir', 'ltr') == 'rtl')
    <link rel="stylesheet" href="{{ asset('new_template/css/rtl-style.css') }}" />
    @endif

</head>

<body>

    @include('includes.preloader')
    @include('includes.header')

    <main class="main">
        @yield('content')
    </main>

    @include('includes.footer')
    @include('includes.script')

</body>
</html>
