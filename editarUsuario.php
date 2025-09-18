<?php 
require 'inc/header.php'; 
include 'classes/usuarios.php';
$usuario = new Usuario();

if(!empty($_GET['id_usuario'])){
    $id = $_GET['id_usuario'];
    $info = $usuario->buscar($id);
    $permissoes = isset($info['permissoes']) ? explode(',', $info['permissoes']) : '';
    if(empty($info['email'])){
        header("Location: gestaoUsuario.php");
        exit;
    }
}else{
    header("Location: gestaoUsuario.php");
    exit;
}

?>
<main>
    <h1>EDITAR USUARIO</h1>
    <form method="POST" action="editarUsuarioSubmit.php">
        <input type="hidden" name="id" value="<?php echo $info['id_usuario']; ?>">
        Nome: <br>
        <input type="text" name="nome" value="<?php echo $info['nome']; ?>" /> <br><br>
        Email: <br>
        <input type="email" name="email" value="<?php echo $info['email']; ?>" /> <br><br>
        Senha: <br>
        <input type="text" name="senha" placeholder="Digite uma nova senha se quiser alterar"/> <br><br>
        Permissoes: <br>
        <input type="checkbox" name="permissoes[]" value="add" <?php if( in_array('add', $permissoes)) echo 'checked'; ?>> Adicionar<br>
        <input type="checkbox" name="permissoes[]" value="edit" <?php if( in_array('edit', $permissoes)) echo 'checked'; ?>> Editar<br>
        <input type="checkbox" name="permissoes[]" value="del" <?php if( in_array('del', $permissoes)) echo 'checked'; ?>> deletar<br><br>
        <input type="checkbox" name="permissoes[]" value="super" <?php if( in_array('super', $permissoes)) echo 'checked'; ?>> Super<br><br>
        
        <input type="submit" value="Editar Usuario"/>

    </form>
</main>
<?php require 'inc/footer.php'; ?>