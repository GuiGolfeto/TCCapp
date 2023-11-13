<?php
class DatabaseConnection
{
    private $host = 'seu_host';
    private $usuario = 'seu_usuario';
    private $senha = 'sua_senha';
    private $banco = 'seu_banco';
    private $conexao;

    public function __construct()
    {
        try {
            $this->conexao = new PDO("mysql:host=$this->host;dbname=$this->banco", $this->usuario, $this->senha);
            $this->conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die('Erro na conexão com o banco de dados: ' . $e->getMessage());
        }
    }

    public function getConexao()
    {
        return $this->conexao;
    }
}
