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

if(!empty ($_POST['id'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redesocial = $_POST['redesocial'];
    $profissao = $_POST['profissao'];
    $datanasc = $_POST['datanasc'];
    if(isset($_FILES['foto'])){
        $foto = $_FILES['foto'];
    } else{
        $foto = array();
    }
    $ativo = $_POST['ativo'];
    $id = $_POST['id'];

    if(!empty($email)) {
    $contato->editar($nome, $endereco, $email, $telefone, $redesocial, $profissao, $datanasc, $foto, $ativo, $_GET['id']);
    }

    header("Location: /agendaSenac2025");
}
if(isset($_GET['id_contatos']) && !empty($_GET['id_contatos'])) {
    $info = $contato->getContato($_GET['id_contatos']);
}else{
    ?>
    <script type="text/javascript">window.location.href="index.php";</script>
    <?php
}

?>
<main>
    <h1>EDITAR CONTATO</h1>
    <form method="POST" enctype="multipart/form-data" class="container mt-4 p-4 shadow rounded bg-white">
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
                <input type="file" name="foto[]" class="form-control" multiple />
                <div class="grupo">
                    <div class="cabecalho">Foto contato</div>
                    <div class="corpo">
                        <?php foreach($info['foto'] as $fotos): ?>
                            <div class="foto_item">
                                <img src="img/contatos/<?php echo $fotos['url']; ?>" alt="">
                                <a href="excluir_foto.php?id=<?php $fotos['id']; ?>">Excluir</a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
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