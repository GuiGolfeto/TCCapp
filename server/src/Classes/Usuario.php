<?php

require_once('../../db/DatabaseConnection.php');

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function fazerLogin($email, $senha)
    {
        // Obtém a conexão do objeto DatabaseConnection
        $conexao = $this->db->getConexao();

        // Verificar se o usuário existe no banco de dados
        $query = "SELECT * FROM usuarios WHERE email = :email AND senha = :senha";
        $stmt = $conexao->prepare($query);

        // Associa os parâmetros
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR); // Lembre-se de utilizar um método de hash para senhas

        try {
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($result && count($result) > 0) {
                // Usuário encontrado, login bem-sucedido
                return true;
            } else {
                // Usuário não encontrado ou senha incorreta
                return false;
            }
        } catch (PDOException $e) {
            // Tratar exceções se ocorrer um erro durante a execução da consulta
            // Aqui, você pode logar o erro ou retornar uma mensagem adequada
            return false;
        }
    }
}

?>