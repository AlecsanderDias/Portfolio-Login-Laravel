<x-layout>
    <div class="flex flex-col h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center rounded-md">
        <form action="{{ route('password.recovery') }}" method="post" class="h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center flex rounded-md">
            @csrf
            <div class="w-3/4 h-3/4 flex flex-col justify-center align-center self-center gap-5">
                <label for="user" class="text-2xl text-white">Nome de Usuário ou Email</label>
                <input type="text" id="user" name="user" class="rounded-md p-1">
                <button type="submit" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400">Acessar</button>
            </div>
        </form>
        <a href="{{ route('login.index') }}" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400 w-1/8">Voltar</a>
    </div>
</x-layout>