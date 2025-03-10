<?php
require_once "Venda.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $venda = new Venda();
    $vendedor_id = $_POST['vendedor_id'];
    $cliente_id = $_POST['cliente_id'];
    $produto_id = $_POST['produto_id'];
    $quantidade = $_POST['quantidade'];

    if ($venda->registrarVenda($vendedor_id, $cliente_id, $produto_id, $quantidade)) {
        echo "<script>alert('Venda registrada com sucesso!'); window.location.href='listar-vendas.php';</script>";
    } else {
        echo "<script>alert('Erro ao registrar venda!');</script>";
    }
}
