<x-layout title="Home" username="{{ $username }}">
        @auth
                <p>{{ $username }}</p>
                <p>{{ $email }}</p>
                @if($verificado == null)
                        <p>{{ "Email precisa ser verificado!" }}</p>
                        <form action="{{ route('verification.send') }}" method="post" class="bg-green-300 cursor-pointer">
                                @csrf
                                <button type="submit" id="resend" @if($disable) disabled @endif>Reenviar Email</button>
                        </form>
                @else
                        <p>{{ "Email verificado!" }}</p> 
                @endif
                <a href="{{ route('logout') }}" class="bg-red-500">Sair</a>
        @endauth
        {{ "Menu Home $disable $message" }}
</x-layout>