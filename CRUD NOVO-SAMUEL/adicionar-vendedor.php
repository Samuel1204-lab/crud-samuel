<?php
require_once "Vendedor.php";
require_once "Database.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $telefone = $_POST["telefone"];

    $vendedor = new Vendedor();
    if ($vendedor->adicionar($nome, $email, $telefone)) {
        echo "<script>alert('Vendedor adicionado com sucesso!'); window.location.href='adicionar-vendedores.php';</script>";
    } else {
        echo "<script>alert('Erro ao adicionar vendedor.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="adicionar-vendedor.css">
    <title>Adicionar Vendedor</title>
</head>
<body>
    <h2>Adicionar Novo Vendedor</h2>
    <form action="adicionar-vendedor.php" method="post">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" required><br>

        <label for="email">Email:</label>
        <input type="email" name="email" required><br>

        <label for="telefone">Telefone:</label>
        <input type="text" name="telefone" required><br>

        <button type="submit">Adicionar</button>
    </form>
    <a href="ListarVendedores.php">Voltar à lista</a>
</body>
</html>
