<x-layout>
        @auth
                <p>{{ $username }}</p>
                <p>{{ $email }}</p>
                <a href="{{ route('logout') }}">Sair</a>
        @endauth
        {{ "Tudo certo" }}
</x-layout>