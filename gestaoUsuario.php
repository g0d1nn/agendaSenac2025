<?php
session_start();
include 'inc/header.php'; 
include 'classes/usuarios.php';

if(!isset($_SESSION['logado'])){
    header("location: login.php");
    exit;
}

$usuario = new Usuario();
$usuario->setUsuario($_SESSION['logado']);

if(!$usuario->temPermissao("SUPER")) {
    echo "<p>Você não tem permissão para acessar esta página.</p>";
    exit;
}
?>
<main>
    <h1>Usuários</h1>
    <?php if($usuario->temPermissao("ADD")): ?>
        <a href="adicionarUsuario.php" class="btn">ADICIONAR</a>
    <?php endif; ?>
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
                        <?php if($usuario->temPermissao("EDIT")): ?>
                            <a href="editarUsuario.php?id_usuario=<?php echo $item['id_usuario'] ?>"> EDITAR</a>
                        <?php endif; ?>
                        <?php if($usuario->temPermissao("DEL")): ?>
                            <a href="#" onclick="avisoExcluirUsuario(<?php echo $item['id_usuario']; ?>)"> EXCLUIR</a>
                        <?php endif; ?>
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