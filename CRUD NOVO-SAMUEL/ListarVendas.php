<?php

require_once "Venda.php";
$venda = new Venda();
$vendas = $venda->listarVendas();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="listar-vendas.css">
    <title>Lista de Vendas</title>
</head>
<body>
    <h2>Lista de Vendas</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Cliente</th>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Vendedor</th>
            <th>Data da Venda</th>
        </tr>
        <?php foreach ($vendas as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['cliente'] ?></td>
            <td><?= $v['produto'] ?></td>
            <td><?= $v['quantidade'] ?></td>
            <td><?= $v['vendedor'] ?></td>
            <td><?= $v['data_venda'] ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>


<h2 class="registrar">Registrar Nova Venda</h2>
    <form method="POST" action="Venda.php">
        <label for="vendedor_id">Vendedor:</label>
        <select name="vendedor_id" required>
            <?php
            $vendedor = new Vendedor();
            $vendedores = $vendedor->listarTodos();
            foreach ($vendedores as $vend) {
                echo "<option value='" . $vend['id'] . "'>" . $vend['nome'] . "</option>";
            }
            ?>
        </select>

        <label for="cliente_id">Cliente:</label>
        <select name="cliente_id" required>
            <?php
            $cliente = new Cliente();
            $clientes = $cliente->listarTodos();
            foreach ($clientes as $cli) {
                echo "<option value='" . $cli['id'] . "'>" . $cli['nome'] . "</option>";
            }
            ?>
        </select>

        <label for="produto_id">Produto:</label>
        <select name="produto_id" required>
            <?php
            $produto = new Produto();
            $produtos = $produto->listarTodos();
            foreach ($produtos as $prod) {
                echo "<option value='" . $prod['id'] . "'>" . $prod['nome'] . "</option>";
            }
            ?>
        </select>

        <label for="quantidade">Quantidade:</label>
        <input type="number" name="quantidade" required>

        <button type="submit">Registrar Venda</button>
    </form>
</body>
</html>

