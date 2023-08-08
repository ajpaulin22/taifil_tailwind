<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Tai-Fil" name="description" />
    <meta content="dGl0aSBrbyBtYWxha2kK" name="author" />

    <link rel="icon" type="image/png" href="/images/tf logo.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Tai-Fil Manpower</title>

    <!-- Fonts -->

    @stack('styles')
</head>
<body class="">

    @yield('content')
    <script src="{{asset("js/app.js")}}"></script>
    @stack('scripts')
</body>
</html>