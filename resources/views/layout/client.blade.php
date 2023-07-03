<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Tai-Fil" name="description" />
    <meta content="dGl0aSBrbyBtYWxha2kK" name="author" />

    <!-- CSRF Token -->
    @stack('meta')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="icon" type="image/png" href="/images/tf logo.png">
    <title>@yield('title') | Taifil</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset("css/iziToast.min.css")}}">
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    @stack('styles')
</head>
<body class="min-h-full flex flex-col overflow-x-hidden no-scrollbar">
    <x-user-banner/>
    @include('navFoot.client_nav')
    <main class="min-h-screen">
        @yield('content')
    </main>

    @include('navFoot.client_foot')
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script defer src=""></script>
    <script src="{{asset("js/app.js")}}"></script>
    @stack('scripts')
</body>
</html>