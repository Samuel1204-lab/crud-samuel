
<?php
require_once "Produto.php";


$produto = new Produto();
if (isset($_GET['id'])) {
    $produtoAtual = $produto->obterPorId($_GET['id']);
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produto->atualizar($_POST['id'], $_POST['nome'], $_POST['preco'], $_POST['descricao']);
    header("Location: ListarProdutos.php");
}
?>




<!DOCTYPE html>
<html>
<head>
    <title>Editar Produto</title>
    <link rel="stylesheet" href="editar.css">
</head>
<body>
    <h1>Editar Produto</h1>
    <form method="post" action="editar.php">
        <input type="hidden" name="id" value="<?php echo $produtoAtual['id']; ?>">
        <label>Nome:</label>
        <input type="text" name="nome" value="<?php echo $produtoAtual['nome']; ?>" required><br>
        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" value="<?php echo $produtoAtual['preco']; ?>" required><br>
        <label>Descrição:</label>
        <textarea name="descricao" required><?php echo $produtoAtual['descricao']; ?></textarea><br>
        <button type="submit">Atualizar</button>
    </form>
    <a href="ListarProdutos.php">Voltar</a>
</body>
</html>


