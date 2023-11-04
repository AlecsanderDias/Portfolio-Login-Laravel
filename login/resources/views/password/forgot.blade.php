<x-layout title="Esqueci a Senha" message="{{ $message }}">
    <section class="flex flex-col h-2/4 w-1/4 outline-5 bg-white self-center justify-center rounded-md outline-black shadow-xl">
        <div class="self-center h-3/4 w-3/4 flex flex-col gap-5">
            <h2 class="text-2xl text-center font-sans font-medium">Insira o email cadastrado que receberá um link, para trocar a senha</h2>
            <form action="{{ route('password.recovery') }}" method="post" class="flex flex-col gap-4 pb-4">
                @csrf
                <label for="email" class="text-xl text-slate-800 font-sans font-medium">Email</label>
                <input type="email" id="email" name="email" class="rounded-md p-1 outline outline-2 outline-black bg-slate-100">
                <button type="submit" class="rounded-md outline-black text-white bg-slate-600 p-2 font-sans font-medium">Enviar</button>
            </form>
            <a href="{{ route('login.index') }}" class="text-center rounded-md outline-black text-white bg-slate-400 py-2 px-1
             font-sans font-medium">Voltar</a>
        </div>
    </section>
</x-layout>