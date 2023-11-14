<?php
require_once('Usuario.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = new Usuario();

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if ($usuario->cadastrarUsuario($email, $senha)) {
        echo "Registro bem-sucedido";
    } else {
        echo "Erro ao registrar o usuário";
    }
}