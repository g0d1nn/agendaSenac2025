<?php 
require 'inc/header.php'; 
include 'classes/contatos.php';
$contato = new Contato();

if(!empty($_GET['id_contatos'])){
    $id = $_GET['id_contatos'];
    $info = $contato->buscar($id);
    if(empty($info['email'])){
        header("Location: /agendaSenac2025");
        exit;
    }
}else{
    header("Location: /agendaSenac2025");
    exit;
}

?>
<main>
    <h1>EDITAR CONTATO</h1>
    <form method="POST" action="editarContatoSubmit.php" class="container mt-4 p-4 shadow rounded bg-white">
        <input type="hidden" name="id" value="<?php echo $info['id_contatos']; ?>">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" value="<?php echo $info['nome']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="endereco" class="form-label">Endereço</label>
                <input type="text" name="endereco" class="form-control" value="<?php echo $info['endereco']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="email" name="email" class="form-control" value="<?php echo $info['email']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input type="tel" name="telefone" class="form-control" value="<?php echo $info['telefone']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <label for="redesocial" class="form-label">Rede Social</label>
                <input type="text" name="redesocial" class="form-control" value="<?php echo $info['redesocial']; ?>">
            </div>
            <div class="col-md-6 mb-3">
                <label for="profissao" class="form-label">Profissão</label>
                <input type="text" name="profissao" class="form-control" value="<?php echo $info['profissao']; ?>">
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label for="datanasc" class="form-label">Data de Nascimento</label>
                <input type="date" name="datanasc" class="form-control" value="<?php echo $info['datanasc']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="text" name="foto" class="form-control" value="<?php echo $info['foto']; ?>">
            </div>
            <div class="col-md-4 mb-3">
                <label for="ativo" class="form-label">Ativo</label>
                <select id="ativo" name="ativo" class="form-select">
                    <option value="1" <?php echo ($info['ativo'] == 1 ? 'selected' : ''); ?>>Sim</option>
                    <option value="0" <?php echo ($info['ativo'] == 0 ? 'selected' : ''); ?>>Não</option>
                </select>
            </div>
        </div>

        <input type="submit" class="btn btn-primary" value="Editar Contato"/>

    </form>
</main>
<?php require 'inc/footer.php'; ?>