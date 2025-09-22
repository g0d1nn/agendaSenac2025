<?php require 'inc/header.php'; ?>
<main>
    <h1>Adicionar Contato</h1>

    <form method="POST" action="adicionarContatoSubmit.php" class="container mt-4 p-4 shadow rounded bg-white">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" required>
            </div>
            <div class="col-md-6 mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="redesocial" class="form-label">Rede Social</label>
                <input type="text" name="redesocial" class="form-control">
            </div>
            <div class="col-md-6 mb-3">
                <label for="profissao" class="form-label">Profissão</label>
                <input type="text" name="profissao" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="datanasc" class="form-label">Data de Nascimento</label>
                <input type="date" name="datanasc" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" name="foto" class="form-control">
            </div>
            <div class="col-md-4 mb-3">
                <label for="ativo" class="form-label">Ativo</label>
                <select id="ativo" name="ativo" class="form-select">
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select>
            </div>
        </div>

        <input class="btn btn-primary" type="submit"  value="Adicionar Contato"/>

    </form>
</main>

<?php require 'inc/footer.php'; ?>