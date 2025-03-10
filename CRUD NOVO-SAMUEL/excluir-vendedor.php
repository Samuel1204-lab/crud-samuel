<?php
require_once "Vendedor.php";

if (isset($_GET["id"])) {
    $vendedor = new Vendedor();
    if ($vendedor->excluir($_GET["id"])) {
        echo "<script>alert('Vendedor excluído com sucesso!'); window.location.href='listar-vendedores.php';</script>";
    } else {
        echo "<script>alert('Erro ao excluir vendedor.'); window.history.back();</script>";
    }
}
?>
