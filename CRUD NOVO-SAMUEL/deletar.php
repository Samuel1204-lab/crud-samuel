<?php
require_once "models/Produto.php";

if (isset($_GET['id'])) {
    $produto = new Produto();
    $produto->deletar($_GET['id']);
    header("Location: ListarProdutos.php");
}
?>