<?php
include 'classes/usuarios.php';
$usuario = new Usuario();

if(!empty ($_POST['id'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $permissoes = isset($_POST['permissoes']) ? implode(',', $_POST['permissoes']) : '';
    $id = $_POST['id'];

    if(!empty($email)) {
    $usuario->editar($nome, $email, $senha, $permissoes, $id);
    }

   header("Location: gestaoUsuario.php");
}