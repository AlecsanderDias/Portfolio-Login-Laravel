<x-layout>
<form action="{{ route('register.store') }}" method="post" class="h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center flex rounded-md">
        @csrf
        <div class="w-3/4 h-3/4 flex flex-col justify-center align-center self-center gap-5">
            <label for="username" class="text-2xl text-white">Nome de Usuário</label>
            <input type="text" id="username" name="username" class="rounded-md p-1">
            <label for="email" class="text-2xl text-white">Email</label>
            <input type="email" id="email" name="email" class="rounded-md p-1">
            <label for="password" class="text-2xl text-white">Senha</label>
            <input type="password" id="password" name="password" class="rounded-md p-1 mb-4">
            <label for="password_confirmation" class="text-2xl text-white">Confirmar Senha</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="rounded-md p-1 mb-4">
            <button type="submit" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400">Acessar</button>
        </div>
    </form>
</x-layout>