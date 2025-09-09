<?php
 require 'inc/header.php'; 


?>

<h1>ADICIONAR USUARIO</h1>
<form method="POST" action="adicionarUsuarioSubmit.php">
    Nome: <br>
    <input type="text" name="nome"/> <br><br>
    Email: <br>
    <input type="mail" name="email"/> <br><br>
    Senha: <br>
    <input type="text" name="senha"/> <br><br>
    Permissões: <br>
    <input type="checkbox" name="permissoes[]" value="add"> Adicionar<br>
    <input type="checkbox" name="permissoes[]" value="edit"> Editar<br>
    <input type="checkbox" name="permissoes[]" value="del"> deletar<br><br>
    <input type="checkbox" name="permissoes[]" value="super"> Super<br><br>

    <input type="submit" value="Adicionar Usuario"/>

</form>

<?php require 'inc/footer.php'; ?>