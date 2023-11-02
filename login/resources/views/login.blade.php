<x-layout title="Login">
    <section class="flex flex-col h-2/4 w-1/4 outline-5 bg-white self-center justify-center rounded-md outline-black shadow-xl">
        <div class="self-center w-3/4 flex flex-col gap-5">
            <h2 class="text-3xl text-center font-sans font-medium">Login</h2>
            <form action="{{ route('login.store') }}" method="post" class="flex flex-col gap-4 pb-4">
                @csrf
                <label for="username" class="text-xl text-slate-800 font-sans font-medium">Usuário</label>
                <input type="text" id="username" name="username" class="rounded-md p-1 outline outline-2 outline-black bg-slate-100">
                <label for="password" class="text-xl text-slate-800 font-sans font-medium">Senha</label>
                <input type="password" id="password" name="password" class="rounded-md p-1 outline outline-2 outline-black bg-slate-100">
                <button type="submit" class="rounded-md outline-black text-white bg-slate-600 p-2 font-sans font-medium">Acessar</button>
            </form>
            <a href="{{ route('register.index') }}" class="text-center rounded-md outline-black text-white bg-slate-400 py-2 px-1 font-sans font-medium">Registrar</a>
            <a href="{{ route('forgot.password') }}" class="text-center rounded-md outline-black text-white bg-slate-400 py-2 px-1 
            font-sans font-medium">Esqueceu a senha?</a>
        </div>
    </section>
</x-layout>