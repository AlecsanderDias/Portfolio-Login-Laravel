<x-layout>
    <div class="flex flex-col h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center rounded-md">
        <h2 class="text-3xl text-white">Insira o email cadastrado para receber um link para torca de senha</h2>
        <form action="{{ route('password.recovery') }}" method="post" class="h-2/4 w-3/5 outline-5 bg-slate-800 self-center justify-center flex rounded-md">
            @csrf
            <div class="w-3/4 h-3/4 flex flex-col justify-center align-center self-center gap-5">
            <label for="email" class="text-2xl text-white">Email</label>
            <input type="email" id="email" name="email" class="rounded-md p-1">
                <button type="submit" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400">Enviar</button>
            </div>
        </form>
        <a href="{{ route('login.index') }}" class="outline outline-offset-2 rounded-md outline-blue-500 text-white bg-slate-400 w-1/8">Voltar</a>
    </div>
</x-layout>