<?php
session_start();
include 'inc/header.php'; 
include 'classes/contatos.php';
include 'classes/usuarios.php';

if(!isset($_SESSION['logado'])){
    header("location: login.php");
    exit;
}
$usuario = new Usuario();
$usuario->setUsuario($_SESSION['logado']);
$contato = new Contato();

// print_r($_SESSION);
?>
<main>
    <h1>Contatos</h1>
    <?php if($usuario->temPermissao("ADD")): ?>
    <a href="adicionarContato.php" class="btn">ADICIONAR</a>
    <?php endif; ?>
    <?php if($usuario->temPermissao("SUPER")): ?>
        <a href="gestaoUsuario.php">Usuários</a>
    <?php endif; ?>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>ENDEREÇO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>REDE SOCIAL</th>
                    <th>PROFISSÃO</th>
                    <th>DATA NASCIMENTO</th>
                    <th>FOTO</th>
                    <th>ATIVO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <?php
            $lista = $contato->getFoto();
            foreach($lista as $item):
            ?>
            <tbody>
                <tr>
                    <td><?php echo $item['id_contatos']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['endereco']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['telefone']; ?></td>
                    <td><?php echo $item['redesocial']; ?></td>
                    <td><?php echo $item['profissao']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($item['datanasc'])); ?></td>
                    <td>
                        <?php if(!empty($item['url'])): ?>
                            <img src="img/contatos/<?php echo $item['url'];?>" height="50px" border="0">
                        <?php else: ?>
                                <img src="img/contatos/default.png" height="50px" border="0">
                        <?php endif; ?>
                    </td>
                    <td><?php echo ($item['ativo'] == 1) ? 'Sim' : 'Não'; ?></td>
                    <td>
                        <?php if($usuario->temPermissao("EDIT")): ?>
                        <a href="editarContato.php?id_contatos=<?php echo $item['id_contatos'] ?>"> EDITAR</a>
                        <?php endif; ?>
                        <?php if($usuario->temPermissao("DEL")): ?>
                        <a href="#" onclick="avisoExcluirContato(<?php echo $item['id_contatos']; ?>)"> EXCLUIR</a>
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