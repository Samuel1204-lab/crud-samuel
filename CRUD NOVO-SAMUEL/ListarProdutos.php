<?php
require_once "Produto.php";
require_once "Database.php";
     
$produto = new Produto();
$produtos = $produto->listarTodos();

?>


<html>
<head>
    <title>Lista de Produtos</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Produtos</h1>
    <a href="cadastro-produto.php">Cadastrar Novo Produto</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Preço</th>
            <th>Descrição</th>
            <th>Ações</th>
        </tr>
        
        <?php
            
        foreach ($produtos as $p) { ?>
            <tr>
                <td><?php echo $p['id']; ?></td>
                <td><?php echo $p['nome']; ?></td>
                <td><?php echo $p['preco']; ?></td>
                <td><?php echo $p['descricao']; ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $p['id']; ?>">Editar</a> |
                    <a href="deletar.php?id=<?php echo $p['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</body>
</html>