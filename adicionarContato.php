<?php require 'inc/header.php'; ?>
<main>
    <h1>ADICIONAR CONTATO</h1>

    <form method="POST" action="adicionarContatoSubmit.php">
        Nome: <br>
        <input type="text" name="nome"/> <br><br>
        Endereço: <br>
        <input type="text" name="endereco" /> <br><br>
        Email: <br>
        <input type="mail" name="email"/> <br><br>
        Telefone: <br>
        <input type="text" name="telefone"/> <br><br>
        Rede Social: <br>
        <input type="text" name="redesocial"/> <br><br>
        Profissão: <br>
        <input type="text" name="profissao"/> <br><br>
        Data de Nascimento: <br>
        <input type="date" name="datanasc"/> <br><br>
        Foto: <br>
        <input type="text" name="foto"/> <br><br>
        Ativo: <br>
        <input type="text" name="ativo"/> <br><br>

        <input type="submit" value="Adicionar Contato"/>

    </form>
</main>

<?php require 'inc/footer.php'; ?>