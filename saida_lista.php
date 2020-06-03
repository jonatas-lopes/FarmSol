<?php
    
include 'cabecalho.php';
include 'saida_processa.php';
include 'pessoa_processa.php';



$saidas = $saidas_processa->pesquisar($_GET['busca']);
$pessoas = $pessoas_processa->pesquisar($_GET['busca']);

?>
<html>


    <div class="container" style="max-width: 1200px">
    <br><br>
    <div class="panel panel-default">
    <div class="panel-heading">
        <h3 style="margin: 6px 0;">Saídas</h3><br>
    </div>
    <div class="panel-body">
        <div class="panel-buttons">
            <div class="pull-left">
                <a href="saida_form.php" class="btn btn-primary">Novo</a>
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

        <table id="myTable" width="80%" class="table">
                        <thead>
                <tr>
                    <th>Identificação</th>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Data</th>
                    <th>Cliente</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($saida = mysqli_fetch_assoc($saidas)) : ?>
                    
                        <tr>
                        <td><?php echo $saida['idsaida']; ?></td>
                        <td><?php echo $saida['produto']; ?></td>
                        <td><?php echo $saida['quantidade']; ?></td>
                        <td><?php echo $saida['data']; ?></td>
                        <td><a href="pessoa_form.php?idpessoa=<?php echo $saida['cliente']; ?>"><?php echo $saida['cliente']; ?></td>
                       
                        <td class="text-right">
                            
                            
                            <a href="saida_form.php?idsaida=<?php echo $saida['idsaida']; ?>" class="btn btn-primary">Editar</a>
                            <a href="saida_processa.php?acao=excluir&idsaida=<?php echo $saida['idsaida']; ?>" class="btn btn-danger">Excluir</a>
                        </td>
        </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
    
    
</div>


</html>