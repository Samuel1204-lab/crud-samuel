<?php
require_once "../../../app/models/Cliente.php";

if (isset($_GET['id'])) {
    $clientes = new Cliente();
    $clientes->deletar($_GET['id']);
    header("Location: ListarClientes.php");
}
?>