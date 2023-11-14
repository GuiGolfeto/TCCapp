<?php
require_once('Usuario.php');

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Allow: POST');
    http_response_code(405);
    exit;
}

// Verificar se os dados do formulário foram enviados
if (isset($_POST['email']) && isset($_POST['senha'])) {
    // Obter dados do formulário
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // Criar uma instância da classe Usuario
    $usuario = new Usuario();

    // Verificar login
    $loginSucesso = $usuario->fazerLogin($email, $senha);

    // Retornar resposta ao script AJAX
    echo json_encode(['loginSucesso' => $loginSucesso]);
} else {
    // Se os dados não foram enviados corretamente
    echo json_encode(['erro' => 'Dados do formulário ausentes']);
}
?>