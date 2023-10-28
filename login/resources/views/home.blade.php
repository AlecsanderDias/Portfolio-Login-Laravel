<x-layout>
        @auth
                @if($message)
                <div class="bg-gray-400">
                        <ul>
                        <li class="text-green-800 text-xl">{{ $message }}</li>
                        </ul>
                </div>
                @endif
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