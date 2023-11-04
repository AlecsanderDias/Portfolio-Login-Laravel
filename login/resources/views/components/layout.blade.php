<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite('resources/css/app.css')
        <title>{{ $title }}</title>
    </head>
    <body class="absolute flex flex-col w-full h-full">
        @auth
        <nav class="bg-white h-12 w-full p-4 pr-8 flex flex-row-reverse align-center">
            <button class="bg-slate-400 rounded-full w-8 h-8 text-white text-sm font-medium self-center" id="user-icon">{{ $username[0] }}</button>
            <div class="absolute top-14 w-48 bg-white rounded-md py-3" id="user-menu" hidden>
                <span class="block text-black font-sans font-medium px-3 py-2">{{ $username }}</span>
                <span class="block text-black font-sans font-medium px-3 py-2">{{ $email }}</span>
                @if($verification)
                    <span class="block text-green-800 font-sans font-medium px-3 py-2">Usuário verificado</span>
                @else
                    <span class="block text-red-500 font-sans font-medium px-3 py-2">Usuário não foi verificado</span>
                    <a class="block text-black font-sans font-medium px-3 py-2 hover:bg-slate-200">
                        <form action="{{ route('verification.send') }}" method="post">
                            @csrf
                            <button type="submit" id="resend" @if($disable) disabled @endif>Reenviar Email</button>
                        </form>
                    </a>
                @endif
                <a href="{{ route('logout') }}" class="block text-black font-sans font-medium px-3 py-2 hover:bg-slate-200">Sair</a>
            </div>
        </nav>
        @endauth
        <main class="bg-slate-100 flex flex-col justify-center h-full">
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
        <script>
            if(document.getElementById('user-icon') != null) {
                const icon = document.getElementById('user-icon');
                const menu = document.getElementById('user-menu');    
                document.addEventListener('click', event => {
                    const isMenu = menu.contains(event.target);
                    const isIcon = icon.contains(event.target);
                    if(!isMenu && !isIcon && !menu.hasAttribute('hidden')) menu.setAttribute('hidden', '');
                });
                icon.addEventListener('click', () => {
                    menu.hasAttribute('hidden') ? menu.removeAttribute('hidden') : menu.setAttribute('hidden', '');
                });
            }
        </script>
    </body>
</html>