<?php
require_once "Database.php";

class Produto {
    private $db;
    private $conn;
    private $table = "produtos";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function listarTodos() {
        $query = "SELECT * FROM " . $this->table;
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function obterPorId($id) {
        $query = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function criar($nome, $preco, $descricao) {
        $query = "INSERT INTO " . $this->table . " (nome, preco, descricao) VALUES (:nome, :preco, :descricao)";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['nome' => $nome, 'preco' => $preco, 'descricao' => $descricao]);
    }

    public function atualizar($id, $nome, $preco, $descricao) {
        $query = "UPDATE " . $this->table . " SET nome=:nome, preco=:preco, descricao=:descricao WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id, 'nome' => $nome, 'preco' => $preco, 'descricao' => $descricao]);
    }

    public function deletar($id) {
        $query = "DELETE FROM " . $this->table . " WHERE id=:id";
        $stmt = $this->conn->prepare($query);
        return $stmt->execute(['id' => $id]);
    }
}
