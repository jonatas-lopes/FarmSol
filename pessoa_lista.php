<?php
    
include 'cabecalho.php';
include 'pessoa_processa.php';
include 'saida_processa.php';


$pessoas = $pessoas_processa->pesquisar($_GET['busca']);

$saidas = $saidas_processa->pesquisar($_GET['idpessoa']);




?>
<div class="container" style="max-width: 1200px">
    <br><br>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 style="margin: 6px 0;">Clientes</h3><br>
    </div>
    <div class="panel-body">
        <div class="panel-buttons">
            <div class="pull-left">
                <a href="pessoa_form.php" class="btn btn-primary">Novo</a>
                <a href="index.php" class="btn btn-default">Voltar</a>
            </div><br>
            <div class="pull-right">
                <form method="get">
                    
                    <div class="pull-left">
                        <input type="text" class="form-control inline" name="busca" autofocus="true" value="<?php echo $_GET['busca'] ?>" placeholder="Pesquisar...">
                    </div>
                    <div class="pull-right" style="margin-left: 5px;"><br>
                        <button type="submit" class="btn btn-primary">Buscar</button><br>
                    </div>
                </form><br>
            </div>
        </div>

        <table width="80%" class="table">
            <thead>
                <tr>
                    <th>Identificação</th>
                    <th>Nome</th>
                    <th>CPF</th>
                    <th>Telefone</th>
                    <th>Endereço</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($pessoa = mysqli_fetch_assoc($pessoas)) : ?>
                    
                        <tr>
                        <td><a href="saida_lista.php?busca=<?php echo $pessoa['idpessoa']; ?>" class=""><?php echo $pessoa['idpessoa']; ?></a></td>
                        <td><?php echo $pessoa['nome']; ?></td> 
                        <td><?php echo $pessoa['cpf']; ?></td>
                        <td><?php echo $pessoa['telefone']; ?></td>
                        <td><?php echo $pessoa['endereco']; ?></td>
                        <td class="text-right">
                            
                            
                            <a href="pessoa_form.php?idpessoa=<?php echo $pessoa['idpessoa']; ?>" class="btn btn-primary">Editar</a>
                            <a href="pessoa_processa.php?acao=excluir&idpessoa=<?php echo $pessoa['idpessoa']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
    
    
</div>