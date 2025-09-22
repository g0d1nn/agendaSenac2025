<?php include 'inc/header.php'; 
include 'classes/usuarios.php';

$usuario = new Usuario();

?>
<main>
    <h1>Usuários</h1>
    <a href="adicionarUsuario.php" class="btn">ADICIONAR</a>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>EMAIL</th>
                    <th>PERMISSÕES</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
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
                        <a href="#" onclick="avisoExcluirUsuario(<?php echo $item['id_usuario']; ?>)"> EXCLUIR</a>
                    </td>
                </tr>
            </tbody>
            <?php 
                endforeach;
            ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>