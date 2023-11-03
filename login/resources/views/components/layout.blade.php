<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ $title }}</title>
    </head>
    <body>
        @auth
        <nav class="bg-white w-full p-4 pr-8 flex flex-row-reverse">
            <button class="bg-slate-400 rounded-full w-8 h-8 text-white text-sm font-medium">{{ $username[0] }}</button>
        </nav>
        @endauth
        <main class="bg-slate-100 fixed flex flex-col w-full h-full justify-center">
            @if($message != null || $errors->all())
            <ul class="bg-gray-200 w-1/4 outline-5 px-5 py-3 self-center mb-6 flex flex-col rounded-md shadow-md">
                @if(isset($message))
                <li class="text-green-900 text-base font-sans font-medium">{{ $message }}</li>
                @endif
                @if($errors->all())
                @foreach($errors->all() as $error)
                <li class="text-red-900 text-base font-sans font-medium">{{ $error }}</li>
                @endforeach
                @endif
            </ul>
            @endif
            {{ $slot }}
        </main>
    </body>
</html>