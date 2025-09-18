<?php include 'inc/header.php'; 
include 'classes/usuarios.php';

$usuario = new Usuario();

?>
<main>
    <h1>Usuarios</h1>
    <a href="adicionarUsuario.php" class="btn">ADICIONAR</a>

    <table border="2" width="100%">
        <tr>
            <th>ID</th>
            <th>NOME</th>
            <th>EMAIL</th>
            <th>PERMISSOES</th>
            <th>AÇÕES</th>
        </tr>
        <?php
        $lista = $usuario->listar();
        foreach($lista as $item):
        ?>
        <tbody>
            <tr>
                <td><?php echo $item['id_usuario']; ?></td>
                <td><?php echo $item['nome']; ?></td>
                <td><?php echo $item['email']; ?></td>
                <td><?php echo $item['permissoes']; ?></td>
                <td>
                    <a href="editarUsuario.php?id_usuario=<?php echo $item['id_usuario'] ?>"> EDITAR</a>
                    <a href="excluirUsuario.php?id_usuario=<?php echo $item['id_usuario'] ?>" onclick="return confirm('tem certeza que quer excluir?')">| EXCLUIR</a>
                </td>
            </tr>
        </tbody>
        <?php 
            endforeach;
        ?>
    </table>
</main>
<?php include 'inc/footer.php'; ?>