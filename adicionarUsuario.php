<?php
 require 'inc/header.php'; 


?>
<main>
   <h1 class="text-center my-4">Adicionar Usuário</h1>

    <form method="POST" action="adicionarUsuarioSubmit.php" class="container mt-4 p-4 shadow rounded bg-white" style="max-width: 600px;">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" id="nome" name="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" id="email" name="email" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" id="senha" name="senha" class="form-control" required>
        </div>
        <div class="mb-3">
            <label class="form-label d-block">Permissões</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissoes[]" value="ADD" id="add">
                <label class="form-check-label" for="add">Adicionar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissoes[]" value="EDIT" id="edit">
                <label class="form-check-label" for="edit">Editar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissoes[]" value="DEL" id="del">
                <label class="form-check-label" for="del">Deletar</label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" name="permissoes[]" value="SUPER" id="super">
                <label class="form-check-label" for="super">Super</label>
            </div>
        </div>
        <input type="submit" class="btn btn-primary" value="Adicionar Usuário" />
    </form>


</main>
<?php require 'inc/footer.php'; ?>