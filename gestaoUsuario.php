<?php include 'inc/header.php'; 
include 'classes/usuarios.php';

$usuario = new Usuario();

?>

<h1>Agenda Senac 2025 Gestao usuarios</h1>
<button><a href="adicionarUsuario.php">ADICIONAR</a></button>

<table border="2" width="100%">
    <tr>
        <th>ID</th>
        <th>NOME</th>
        <th>EMAIL</th>
        <th>SENHA</th>
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
            <td><?php echo $item['senha']; ?></td>
            <td><?php echo $item['permissoes']; ?></td>
            <td>
                <button><a href="editarUsuario.php?id_usuario=<?php echo $item['id_usuario'] ?>"> EDITAR</a></button>
                <button><a href="excluirUsuario.php?id_usuario=<?php echo $item['id_usuario'] ?>" onclick="return confirm('tem certeza que quer excluir?')">| EXCLUIR</a></button>
            </td>
        </tr>
    </tbody>
    <?php 
        endforeach;
     ?>
</table>

<?php include 'inc/footer.php'; ?>