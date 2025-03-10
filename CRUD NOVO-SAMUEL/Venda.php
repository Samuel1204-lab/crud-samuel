<?php
require_once "Database.php";
require_once "Cliente.php";
require_once "Produto.php";
class Vendedor {
    private $conn;
    private $table = "vendedores";

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
}

class Venda {
    private $conn;
    private $table = "vendas";

    public function __construct() {
        $database = new Database();
        $this->conn = $database->getConnection();
    }

    public function registrarVenda($vendedor_id, $cliente_id, $produto_id, $quantidade) {
        $query = "INSERT INTO " . $this->table . " (vendedor_id, cliente_id, produto_id, quantidade, data_venda) VALUES (:vendedor_id, :cliente_id, :produto_id, :quantidade, NOW())";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':vendedor_id', $vendedor_id, PDO::PARAM_INT);
        $stmt->bindParam(':cliente_id', $cliente_id, PDO::PARAM_INT);
        $stmt->bindParam(':produto_id', $produto_id, PDO::PARAM_INT);
        $stmt->bindParam(':quantidade', $quantidade, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function listarVendas() {
        $query = "SELECT v.id, c.nome AS cliente, p.nome AS produto, v.quantidade, ve.nome AS vendedor, v.data_venda 
                  FROM " . $this->table . " v 
                  JOIN clientes c ON v.cliente_id = c.id 
                  JOIN produtos p ON v.produto_id = p.id 
                  JOIN vendedores ve ON v.vendedor_id = ve.id";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}


// registrar-venda.php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $venda = new Venda();
    $vendedor_id = $_POST['vendedor_id'];
    $cliente_id = $_POST['cliente_id'];
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    if ($venda->registrarVenda($vendedor_id, $cliente_id, $produto_id, $quantidade)) {
        echo "<script>alert('Venda registrada com sucesso!'); window.location.href='ListarVendas.php';</script>";
    } else {
        echo "<script>alert('Erro ao registrar venda!');</script>";
    }
}

