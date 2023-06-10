<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="FTL Data Traceability" name="description" />
    <meta content="Arjay Kurt Dela Rosa" name="author" />

    <link rel="icon" type="image/png" href="/images/favicon.ico">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | FTL Traceability System</title>

    <!-- Fonts -->

    @stack('styles')
</head>
<body class="">

    @yield('content')
    
    @stack('scripts')
</body>
</html>