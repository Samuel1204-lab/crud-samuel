
<?php 

require_once "Cliente.php";
if (isset($_GET["editar"])): 
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
