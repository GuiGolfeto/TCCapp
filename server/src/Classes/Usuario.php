<?php
require_once('../../db/DatabaseConnection.php');

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function cadastrarUsuario($email, $senha)
    {
        $conexao = $this->db->getConexao();

        $query = "INSERT INTO usuarios (email, senha) VALUES (?, ?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(1, $email);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
