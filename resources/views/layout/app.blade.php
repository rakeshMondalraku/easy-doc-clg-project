<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/x-icon" href="{{asset('favicon.ico')}}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('layout.css')

    @stack('style')

</head>

<body>
    @include('layout.header')

    @yield('content')

    @include('layout.footer')

    @include('layout.script')

    @stack('script')
</body>

</html>
