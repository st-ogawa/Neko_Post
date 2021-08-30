<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="robots" content="index, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="写真投稿,ネコ,ねこぽすと,猫写真,ねこ,写真,ねこ写真">
    <meta name="description" content="身近なネコの写真をシェアしよう。ねこぽすとは写真と画像の投稿閲覧ができるサイトです">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    

    <title>{{ config('app.name','ねこぽすと:　ねこの写真投稿サイト') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ asset('css/common.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/default.css') }}" rel="stylesheet"> 
    <link href="{{ asset('css/userRelated.css') }}" rel="stylesheet">
    <link href="{{ asset('css/image.css') }}" rel="stylesheet">
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet" media="screen and (max-width: 780px)">
    <!-- GoogleConsole -->
    <meta name="google-site-verification" content="ZjN7fTPYAsnRdhKFHVdx9GsdHkT3VyFMNkO97DZxotI" />
</head>
<body>
    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>

