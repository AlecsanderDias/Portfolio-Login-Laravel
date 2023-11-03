<x-layout title="Trocar a Senha">
    <section class="flex flex-col h-2/4 w-1/4 outline-5 bg-white self-center justify-center rounded-md outline-black shadow-xl">
        <div class="self-center w-3/4 flex flex-col gap-5">
            <h2 class="text-3xl text-center font-sans font-medium">Insira a nova senha para sua conta</h2>
            <form action="{{ route('reset.form') }}" method="post" class="flex flex-col gap-4 pb-4">
                @csrf
                <input type="text" id="token" name="token" value="{{ $token }}" hidden>
                <input type="email" id="email" name="email" value="{{ $email }}" hidden>
                <label for="password" class="text-xl text-slate-800 font-sans font-medium">Nova Senha</label>
                <input type="password" id="password" name="password" class="rounded-md p-1 outline outline-2 outline-black bg-slate-100">
                <label for="password_confirmation" class="text-xl text-slate-800 font-sans font-medium">Confirmar Nova Senha</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="rounded-md p-1 outline outline-2
                 outline-black bg-slate-100">
                <button type="submit" class="rounded-md outline-black text-white bg-slate-600 p-2 font-sans font-medium">Trocar Senha</button>
            </form>
        </div>
    </section>
</x-layout>