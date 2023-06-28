<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Tai-Fil" name="description" />
    <meta content="dGl0aSBrbyBtYWxha2kK" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Taifil</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="{{asset("css/app.css")}}">
    @stack('styles')
</head>
<body class="min-h-full flex flex-col overflow-x-hidden">
    <x-user-banner/>
    @include('navFoot.client_nav')
    <main >
        @yield('content')
    </main>

    @include('navFoot.client_foot')

    <script src="{{asset("js/app.js")}}"></script>
    @stack('scripts')
</body>
</html>