<x-mail::message>
# Solicitação de Troca de Senha

Uma solicitação de troca de senha foi feita para este usuário.
<br>
Usuário: {{ $username }}
<br> 
Acesse o link para trocar a sua senha.

<x-mail::button :url="$url">
Trocar a senha
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>
