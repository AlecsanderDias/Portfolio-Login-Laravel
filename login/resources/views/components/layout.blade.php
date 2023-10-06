<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Login do Sistema</title>
    </head>
    <body class="bg-slate-400 absolute flex w-full h-full justify-center">
        {{ $slot }}
    </body>
</html>