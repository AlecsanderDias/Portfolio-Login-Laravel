# Portfolio-Login-Laravel

Prática de criação de um pequeno sistema de login com Laravel.

Status: Atualizando

## Tecnologias utilizadas

Frameworks:
- Laravel;
- Tailwind;

## Descrição do Sistema

Este é um sistema básico de login, com registro de novos usuários que recebem um link de confirmação de email, além de poderem trocar a sua senha caso esqueçam a atual.

O sistema conta com 6 telas, sendo elas as seguintes e suas respectivas descrições:

- Tela de Login - O usuário pode usar suas credenciais (nome de usuário e senha) para entrar no sistema;
- Tela de Cadastro - O usuário pode se cadastrar no sistema preenchendo um formulário com algumas informações (Nome de Usuário, Email, Senha e Confirmar a Senha), recebendo um link para confirmar o email cadastrado;
- Tela de Confirmação de Email - O usuário após o cadastro irá para essa tela de espera, que avisa sobre um email com um link de confirmação que foi mandado ao email cadastrado.
- Tela de Enviar Link para Troca de Senha - O usuário pode trocar a senha caso tenha esquecido, através de um formulário que precisa do email que foi cadastrado no sistema, onde ele receberá um link para acessar um tela para a troca da senha;
- Tela de Troca de Senha - O usuário irá preencher um formulário com a nova senha e confirmar a nova senha, para trocar a senha anterior;
- Tela de Entrada do Sistema (Home) - Uma tela de fictícia de entrada para demonstrar o acesso aos serviços.