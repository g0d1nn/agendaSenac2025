<?php include 'inc/header.php'; 
include 'classes/contatos.php';

$contato = new Contato();

?>
<main>
    <h1>Contatos</h1>
    <a href="adicionarContato.php" class="btn">ADICIONAR</a>
    <div class="table-container">
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>ENDEREÇO</th>
                    <th>EMAIL</th>
                    <th>TELEFONE</th>
                    <th>REDE SOCIAL</th>
                    <th>PROFISSÃO</th>
                    <th>DATA NASCIMENTO</th>
                    <th>FOTO</th>
                    <th>ATIVO</th>
                    <th>AÇÕES</th>
                </tr>
            </thead>
            <?php
            $lista = $contato->listar();
            foreach($lista as $item):
            ?>
            <tbody>
                <tr>
                    <td><?php echo $item['id_contatos']; ?></td>
                    <td><?php echo $item['nome']; ?></td>
                    <td><?php echo $item['endereco']; ?></td>
                    <td><?php echo $item['email']; ?></td>
                    <td><?php echo $item['telefone']; ?></td>
                    <td><?php echo $item['redesocial']; ?></td>
                    <td><?php echo $item['profissao']; ?></td>
                    <td><?php echo date('d/m/Y', strtotime($item['datanasc'])); ?></td>
                    <td><?php echo $item['foto']; ?></td>
                    <td><?php echo ($item['ativo'] == 1) ? 'Sim' : 'Não'; ?></td>
                    <td>
                        <a href="editarContato.php?id_contatos=<?php echo $item['id_contatos'] ?>"> EDITAR</a>
                        <a href="#" onclick="avisoExcluirContato(<?php echo $item['id_contatos']; ?>)"> EXCLUIR</a>
                    </td>
                </tr>
            </tbody>
            <?php 
                endforeach;
            ?>
        </table>
    </div>
</main>
<?php include 'inc/footer.php'; ?>