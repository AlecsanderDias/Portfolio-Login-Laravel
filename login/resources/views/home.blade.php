<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Login do Sistema</title>
    </head>
    <body class="bg-slate-400">
        <form action="POST" class="container outline-2 bg-slate-600">
            @csrf
            <label for="" class="text-lg">Usuário</label>
            <input type="text">
            <label for="" class="text-lg">Senha</label>
            <input type="password">
        </form>
    </body>
</html>