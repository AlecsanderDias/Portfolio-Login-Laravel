<x-layout>
    <div class="flex flex-col h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center rounded-md">
        <form action="{{ route('login.store') }}" method="post" class="self-center w-3/4 h-3/4 ">
            @csrf
            <div class="flex flex-col justify-center align-center self-center gap-5">
                <label for="username" class="text-2xl text-white">Usuário</label>
                <input type="text" id="username" name="username" class="rounded-md p-1">
                <label for="password" class="text-2xl text-white">Senha</label>
                <input type="password" id="password" name="password" class="rounded-md p-1 mb-4">
                <button type="submit" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400">Acessar</button>
            </div>
        </form>
        <a href="{{ route('register.index') }}" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400 w-1/8">Registrar</a>
    </div>
</x-layout>