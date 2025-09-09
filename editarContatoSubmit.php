<?php
include 'classes/contatos.php';
$contato = new Contato();

if(!empty ($_POST['id'])) {
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $redesocial = $_POST['redesocial'];
    $profissao = $_POST['profissao'];
    $datanasc = $_POST['datanasc'];
    $foto = $_POST['foto'];
    $ativo = $_POST['ativo'];
    $id = $_POST['id'];

    if(!empty($email)) {
    $contato->editar($nome, $endereco, $email, $telefone, $redesocial, $profissao, $datanasc, $foto, $ativo, $id);
    }

    header("Location: /agendaSenac2025");
}