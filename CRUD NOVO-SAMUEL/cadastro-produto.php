<?php

require_once "Produto.php";


  
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    if (isset($_POST['nome']) && isset($_POST['preco']) && isset($_POST['descricao'])) {
   
        $nome = $_POST['nome'];
        $preco = $_POST['preco'];
        $descricao = $_POST['descricao'];

        $produto = new Produto();

        $produto->criar($nome,$preco,$descricao);


    }
}


?>

<html>
<head>
    <title>Cadastrar Produto</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Cadastrar Novo Produto</h1>
    <form action="../../models/Produto.php" method="POST">
        <label for="nome">Nome do Produto</label>
        <input type="text" id="nome" name="nome" required><br>

        <label for="preco">Preço</label>
        <input type="text" id="preco" name="preco" required><br>

        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" required><br>

        <button type="submit">Cadastrar</button>
    </form>

    <a href="ListarProdutos.php">Voltar para a lista de produtos</a>


</body>

</html>
