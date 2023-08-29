<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <link rel="icon" type="image/png" href="/images/tf logo.png">
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport" />
    <meta content="Tai-Fil" name="description" />
    <meta content="dGl0aSBrbyBtYWxha2kK" name="author" />

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | Tai-Fil Manpower Services Corp.</title>

    @stack('styles')

</head>
<body>
    {{-- <div id="page-loader" class="fade show"><span class="spinner"></span></div> --}}

    <div id="page-container" class="page-container fade page-sidebar-fixed page-header-fixed">
        @include('navFoot.admin_header')
        @include('navFoot.admin_sidebar')

        <div id="content" class="content">
            @yield('content')
        </div>
    </div>

    @stack('modals')
    @include('navFoot.admin_dialog')
    @stack('scripts')
</body>
</html>
