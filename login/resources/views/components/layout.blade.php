<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>Login do Sistema</title>
    </head>
    <body class="bg-slate-400 absolute flex flex-col w-full h-full justify-center">
        <h1>Login</h1>
        @if(isset($sucesso))
            <div class="bg-gray-400">
                <ul>
                    <li class="text-green-800 text-xl">{{ $sucesso }}</li>
                </ul>
            </div>
        @endif
        @if($errors->all())
            <div class="bg-white">
                <ul>
                    @foreach($errors->all() as $error)
                        <li class="text-red-600 text-xl">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        {{ $slot }}
    </body>
</html>