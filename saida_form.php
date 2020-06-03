<?php
    include 'saida_processa.php';
    include 'cabecalho.php';
   

    // Usuário
    $saida = array();
    
    // Recurso para editar cliente
    if (isset($_GET['idsaida'])) {
        $saidas = $saidas_processa->pesquisar_por_id($_GET['idsaida']);
        $saida = mysqli_fetch_assoc($saidas);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    
    <body>
        <br><br> 
        <div class="container" style="max-width: 1000px">
           <div class="panel panel-default">
    <div class="panel-heading">
        <h3 style="margin: 6px 0;">Requisição de Saídas</h3>
    </div>
    <div class="panel-body">
        <form action="saida_processa.php" method="post">
            <input type="hidden" name="acao" value="salvar">
            <input type="hidden" name="idsaida" value="<?php echo $saida['idsaida']; ?>">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="produto">Produto</label>
                    <input type="text" required name=produto class="form-control" name="produto" id="produto" value="<?php echo $saida['produto']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" required name=quantidade class="form-control" name="quantidade" id="quantidade" value="<?php echo $saida['quantidade']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="data">Data</label>
                    <input type="date" class="form-control" name="data" id="date" value="<?php echo $saida['data']; ?>">
                </div>
            </div>          
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    
                    <label for="cliente">Cliente</label>
                    <input type="text" class="form-control" name="cliente" id="cliente" value="<?php echo $saida['cliente']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 15px">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="saida_lista.php" class="btn btn-link">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div> 
                        
            
            
        </div>
       
    </body>
    
    </html>

