<?php 
include 'classes/contatos.php';
$contato = new Contato();

if(!empty($_GET['id_contatos'])){
    $id = $_GET['id_contatos'];
    $contato->deletar($id);
    header("Location: /agendaSenac2025");
}else{
    echo'<script type="text/javascript"> alert("Erro ao excluir contato!");</script>';
    header("Location: /agendaSenac2025");
}
