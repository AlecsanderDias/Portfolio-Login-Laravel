<x-mail::message>
# Confirmação de Registro

Este é um email para confirmar a sua conta registrada no sistema de Login.
<br>
Usuário: {{ $username }}

<x-mail::button :url="route('login.index')">
Confirm Link
</x-mail::button>

Obrigado,<br>
{{ config('app.name') }}
</x-mail::message>