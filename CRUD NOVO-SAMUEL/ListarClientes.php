<?php
require_once "Cliente.php";


$cliente = new Cliente();

if (isset($_POST['acao']) && $_POST['acao'] == 'adicionar') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cliente->adicionar($nome, $email, $telefone);
}

if (isset($_POST['acao']) && $_POST['acao'] == 'editar') {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cliente->atualizar($id, $nome, $email, $telefone);
}

if (isset($_GET['excluir'])) {
    $id = $_GET['excluir'];
    $cliente->deletar($id);
}

$clientes = $cliente->listarTodos();
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Clientes</title>
    <link rel="stylesheet" href="listar-cliente.css">
</head>
<body>
    <h1>Gerenciar Clientes</h1>

    <form method="POST">
        <input type="hidden" name="acao" value="adicionar">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Telefone:</label>
        <input type="text" name="telefone" required>
        <button type="submit">Adicionar</button>
    </form>

    <h2>Lista de Clientes</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Telefone</th>
            <th>Ações</th>
        </tr>
        <?php foreach ($clientes as $c): ?>
        <tr>
            <td><?= $c['id'] ?></td>
            <td><?= $c['nome'] ?></td>
            <td><?= $c['email'] ?></td>
            <td><?= $c['telefone'] ?></td>
            <td>
            <a class="editar" href="Cliente.php?atualizar=<?= $c['id'] ?>">Editar</a>
                <a class="deletar" href="Cliente.php?deletar=<?= $c['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>

    <?php if (isset($_GET["editar"])): 
        $clienteEditar = $cliente->obterPorId($_GET["editar"]);
    ?>
        <h2>Editar Cliente</h2>
        <form method="POST">
            <input type="hidden" name="acao" value="editar">
            <input type="hidden" name="id" value="<?= $clienteEditar['id'] ?>">
            <label>Nome:</label>
            <input type="text" name="nome" value="<?= $clienteEditar['nome'] ?>" required>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $clienteEditar['email'] ?>" required>
            <label>Telefone:</label>
            <input type="text" name="telefone" value="<?= $clienteEditar['telefone'] ?>" required>
            <button type="submit">Atualizar</button>
        </form>
    <?php endif; ?>
</body>
</html>
