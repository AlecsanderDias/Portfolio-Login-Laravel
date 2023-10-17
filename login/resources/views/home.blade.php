<x-layout>
        @auth
                <a href="{{ route('logout') }}">Sair</a>
        @endauth
        {{ $login }}
</x-layout>