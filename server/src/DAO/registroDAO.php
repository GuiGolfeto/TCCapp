<?php
require_once('Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario();

    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cpf = $_POST['cpf'];
    $codigo_acesso = $_POST['codigo_acesso'];
    $senha_ecac = $_POST['senha_ecac'];

    if ($usuario->cadastrarUsuario($email, $senha, $cpf, $codigo_acesso, $senha_ecac)) {
        echo "Registro bem-sucedido";
    } else {
        echo "Erro ao registrar o usuário";
    }
}