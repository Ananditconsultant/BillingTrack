<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('fi.headerTitleText') }}</title>

    <link rel="stylesheet" href="/css/app.css">

    <script src="/js/app.js"></script>


    @include('layouts._head')

    @include('layouts._js_global')

    @yield('head')

    @yield('javascript')

</head>
<body class="{{ $skinClass }} hold-transition sidebar-mini">

<div class="wrapper">

    @include('layouts._header')

    @include('layouts.sidebar')

    <div class="content-wrapper">
        @yield('content')
    </div>

</div>

<div id="modal-placeholder"></div>

@stack('scripts')
</body>
</html>