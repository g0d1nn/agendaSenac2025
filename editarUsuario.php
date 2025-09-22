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
    <h1 class="text-center my-4">Editar Usuário</h1>
   <form method="POST" action="editarUsuarioSubmit.php" class="container mt-4 p-4 shadow rounded bg-white" style="max-width: 600px;">
       <input type="hidden" name="id" value="<?php echo $info['id_usuario']; ?>">

       <div class="mb-3">
           <label for="nome" class="form-label">Nome</label>
           <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $info['nome']; ?>" required>
       </div>

       <div class="mb-3">
           <label for="email" class="form-label">E-mail</label>
           <input type="email" id="email" name="email" class="form-control" value="<?php echo $info['email']; ?>" required>
       </div>

       <div class="mb-3">
           <label for="senha" class="form-label">Senha</label>
           <input type="password" id="senha" name="senha" class="form-control" placeholder="Digite uma nova senha se quiser alterar">
       </div>

       <div class="mb-3">
           <label class="form-label d-block">Permissões</label>

           <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="permissoes[]" value="add" id="add"
               <?php if( in_array('add', $permissoes)) echo 'checked'; ?>>
               <label class="form-check-label" for="add">Adicionar</label>
           </div>

           <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="permissoes[]" value="edit" id="edit"
               <?php if( in_array('edit', $permissoes)) echo 'checked'; ?>>
               <label class="form-check-label" for="edit">Editar</label>
           </div>

           <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="permissoes[]" value="del" id="del"
               <?php if( in_array('del', $permissoes)) echo 'checked'; ?>>
               <label class="form-check-label" for="del">Deletar</label>
           </div>

           <div class="form-check form-check-inline">
               <input class="form-check-input" type="checkbox" name="permissoes[]" value="super" id="super"
               <?php if( in_array('super', $permissoes)) echo 'checked'; ?>>
               <label class="form-check-label" for="super">Super</label>
           </div>
       </div>
        <input type="submit" class="btn btn-primary" value="Editar Usuário" />
   </form>
</main>
<?php require 'inc/footer.php'; ?>