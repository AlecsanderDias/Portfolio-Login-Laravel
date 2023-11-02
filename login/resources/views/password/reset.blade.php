<x-layout title="Trocar a Senha">
    <div class="flex flex-col h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center rounded-md">
        <h2 class="text-3xl text-white">Insira a nova senha para sua conta</h2>
        <form action="{{ route('reset.form') }}" method="post" class="h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center flex rounded-md">
            @csrf
            <div class="w-3/4 h-3/4 flex flex-col justify-center align-center self-center gap-5">
                <input type="text" id="token" name="token" value="{{ $token }}" hidden>
                <input type="email" id="email" name="email" value="{{ $email }}" hidden>
                <label for="password" class="text-2xl text-white">Nova Senha</label>
                <input type="password" id="password" name="password" class="rounded-md p-1 mb-4">
                <label for="password_confirmation" class="text-2xl text-white">Confirmar Nova Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="rounded-md p-1 mb-4">
                <button type="submit" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400">Acessar</button>
            </div>
        </form>
    </div>
</x-layout>