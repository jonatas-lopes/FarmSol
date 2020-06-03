<?php
    include 'pessoa_processa.php';
    include 'cabecalho.php';

    // Usuário
    $pessoa = array();
    
    // Recurso para editar cliente
    if (isset($_GET['idpessoa'])) {
        $pessoas = $pessoas_processa->pesquisar_por_id($_GET['idpessoa']);
        $pessoa = mysqli_fetch_assoc($pessoas);
    }
?>


<!DOCTYPE html>
<html lang="pt-br">
    
    <body>
        <br><br> 
        <div class="container" style="max-width: 1000px">
           <div class="panel panel-default">
    <div class="panel-heading">
        <h3 style="margin: 6px 0;">Cadastro de Clientes</h3>
    </div>
    <div class="panel-body">
        <form action="pessoa_processa.php" method="post">
            <input type="hidden" name="acao" value="salvar">
            <input type="hidden" name="idpessoa" value="<?php echo $pessoa['idpessoa']; ?>">
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="nome">Nome</label>
                    <input type="text" required name=nome class="form-control" name="nome" id="nome" value="<?php echo $pessoa['nome']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="cpf">CPF</label>
                    <input type="text" required name=cpf class="form-control" name="cpf" id="cpf" maxlength="11" value="<?php echo $pessoa['cpf']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="telefone">Telefone</label>
                    <input type="text" class="form-control" name="telefone" id="phone" value="<?php echo $pessoa['telefone']; ?>">
                </div>
            </div>          
            <div class="row" style="margin-top: 10px">
                <div class="col-sm-12">
                    <label for="email">Endereço</label>
                    <input type="text" class="form-control" name="endereco" id="adress" value="<?php echo $pessoa['endereco']; ?>">
                </div>
            </div>
            <div class="row" style="margin-top: 15px">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                    <a href="pessoa_lista.php" class="btn btn-link">Voltar</a>
                </div>
            </div>
        </form>
    </div>
</div> 
                        
            
            
        </div>
       
    </body>
    
    </html>

