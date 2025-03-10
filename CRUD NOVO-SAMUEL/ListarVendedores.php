<?php
require_once "Database.php";
require_once "Vendedor.php";

$vendedor = new Vendedor();
$vendedores = $vendedor->listarTodos();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vendedores</title>
    <link rel="stylesheet" href="listar-vendedores.css">
</head>
<body>
    <h2>Lista de Vendedores</h2>
    <a href="../adicionar-vendedor.php">Adicionar Novo Vendedor</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($vendedores as $v): ?>
        <tr>
            <td><?= $v['id'] ?></td>
            <td><?= $v['nome'] ?></td>
            <td><?= $v['email'] ?></td>
            <td><?= $v['telefone'] ?></td>
            <td>
                <a href="editar-vendedor.php?id=<?= $v['id'] ?>"> Editar</a>
                <a href="deletar-vendedor.php?id=<?= $v['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')"> Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
