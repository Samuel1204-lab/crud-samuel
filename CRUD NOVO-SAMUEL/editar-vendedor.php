<?php
require_once "Vendedor.php";

$vendedor = new Vendedor();
$dados = ["id" => "", "nome" => "", "email" => "", "telefone" => ""];

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $lista = $vendedor->listarTodos();
    foreach ($lista as $v) {
        if ($v['id'] == $id) {
            $dados = $v;
            break;
        }
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    if ($vendedor->editar($id, $nome, $email, $telefone)) {
        echo "<script>alert('Vendedor atualizado com sucesso!'); window.location.href='listar-vendedores.php';</script>";
    } else {
        echo "<script>alert('Erro ao atualizar vendedor.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="editar-vendedor.css">
    <title>Editar Vendedor</title>
</head>
<body>
    <h2>Editar Vendedor</h2>
    <form action="editar-vendedor.php" method="post">
        <input type="hidden" name="id" value="<?= $dados['id'] ?>">
        
        <label for="nome">Nome:</label>
        <input type="text" name="nome" value="<?= $dados['nome'] ?>" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" value="<?= $dados['email'] ?>" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" value="<?= $dados['telefone'] ?>" required><br>

        <button type="submit">Atualizar</button>
    </form>
    <a href="listar-vendedores.php">Voltar à lista</a>
</body>
</html>
