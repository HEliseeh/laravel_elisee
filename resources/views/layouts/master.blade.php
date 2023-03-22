<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    </head>
    <body >
        @include('messages.success')
        <title>@yield('title')</title>
        <h1>Laravel 101</h1>
        <a href="/contact-us">Contactez-nous</a>
        <a href="/about">About</a>
        <a href="/articles">Articles</a>
        <a href="/create">Créer un article</a>
        @yield('content')
    </body>
</html>
