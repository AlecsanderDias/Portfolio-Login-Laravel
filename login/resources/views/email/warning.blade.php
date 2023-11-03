<x-layout title="Confirmação de Email">
    <section class="flex flex-col h-2/4 w-1/4 outline-5 bg-white self-center justify-center rounded-md outline-black shadow-xl">
        <div class="self-center w-3/4 flex flex-col gap-5">
            <h2 class="text-3xl text-center font-sans font-medium text-green-800">Cadastrado com sucesso!</h2>
            <h3 class="text-2xl text-center font-sans font-medium text-green-800">Clique no link enviado no seu email para confirmar o seu registro!</h3>
            <h4 class="text-xl text-center font-sans font-medium text-green-800"> Email registrado: {{ $email }}</h4>
        </div>
    </section>
    <h1>
        {{ "Clique no link enviado no seu email para confirmar o seu registro!" }}
    </h1>
    <h2>
        {{ "Email registrado: $email"  }}
    </h2>
</x-layout>