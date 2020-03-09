<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Instagram search - @yield('title')</title>
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="csrf-param" content="_token" />
        <link href="{{ asset('css/main.css') }}" rel="stylesheet">
        {{-- <script src="{{ asset('js/app.js') }}"></script> --}}
    </head>
    <body>
        {{-- <a href="/">Home</a>
        <a href="/about">About</a>
        <a href="{{ route('articles.index') }}">Articles</a> --}}
            <div>
                @yield('content')
            </div>
    </body>
</html>