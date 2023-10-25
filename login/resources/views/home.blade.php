<x-layout>
        @auth
                <p>{{ $username }}</p>
                <p>{{ $email }}</p>
                @if($verificado == null)
                        <p>{{ "Email precisa ser verificado!" }}</p>
                @else
                        <p>{{ "Email verificado!" }}</p> 
                @endif
                <a href="{{ route('logout') }}">Sair</a>
        @endauth
        {{ "Menu Home" }}
</x-layout>