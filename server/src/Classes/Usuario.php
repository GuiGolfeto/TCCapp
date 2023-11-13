<?php
require_once('../../db/DatabaseConnection.php');

class Usuario
{
    private $db;

    public function __construct()
    {
        $this->db = new DatabaseConnection();
    }

    public function cadastrarUsuario($email, $senha, $cpf, $codigo_acesso, $senha_ecac)
    {
        $conexao = $this->db->getConexao();

        $query = "INSERT INTO usuarios (email, senha, cpf, codigo_acesso, senha_ecac) VALUES (?, ?, ?, ?, ?)";
        $stmt = $conexao->prepare($query);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $senha);
        $stmt->bindParam(3, $cpf);
        $stmt->bindParam(4, $codigo_acesso);
        $stmt->bindParam(5, $senha_ecac);

        if ($stmt->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
