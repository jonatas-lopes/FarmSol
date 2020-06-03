<?php

require_once 'conexao.php';
require_once 'sessao.php';



class PessoaProcessa {
    
    public function __construct(){
        if ($_POST['acao'] == 'salvar') {
            if (empty($_POST['idpessoa'])) {
                $this->inserir($_POST);
                header('location: pessoa_lista.php');
            } else {
                $this->alterar($_POST);
                header('location: pessoa_lista.php');
            }
        } elseif ($_GET['acao'] == 'excluir') {
            $this->excluir($_GET['idpessoa']);
            header('location: pessoa_lista.php');
        }
    }
    
        
    public function pesquisar($buscar){
        
        global $con;
        return mysqli_query($con,"SELECT * FROM pessoas WHERE cpf LIKE '%{$buscar}%' OR nome LIKE '%{$buscar}%'");
                    
        
    }
    
    public function pesquisar_por_id($id){
        global $con;
        return mysqli_query($con, 'SELECT * FROM pessoas WHERE idpessoa = ' . addslashes($id));
    }
    
    public function inserir($pessoa){  
        
        global $con;
        
        $cpf = mysqli_real_escape_string($con, $pessoa['cpf']);
        $nome = mysqli_real_escape_string($con, $pessoa['nome']);
        $telefone = mysqli_real_escape_string($con, $pessoa['telefone']);
        $endereco = mysqli_real_escape_string($con, $pessoa['endereco']);
        
        
                return mysqli_query($con,""
                . "INSERT INTO pessoas (cpf,nome,telefone,endereco)"
                . "VALUES('{$cpf}','{$nome}','{$telefone}','{$endereco}')" );
    }
    
    public function alterar($pessoa){
        
        global $con;
        $id = mysqli_real_escape_string($con, $pessoa['idpessoa']);
        $cpf = mysqli_real_escape_string($con, $pessoa['cpf']);
        $nome = mysqli_real_escape_string($con, $pessoa['nome']);
        $telefone = mysqli_real_escape_string($con, $pessoa['telefone']);
        $endereco = mysqli_real_escape_string($con, $pessoa['endereco']);
        
        return mysqli_query($con, "UPDATE pessoas SET cpf ='{$cpf}',nome ='{$nome}',  telefone = '{$telefone}', endereco = '{$endereco}' WHERE idpessoa = '{$id}'");
                
     
        
    }
    
        public function excluir($id){
        global $con;
        
        $id = mysqli_real_escape_string($con, $id);
        
        return mysqli_query($con, 
            "DELETE FROM pessoas WHERE idpessoa = {$id}"
        );
    }
    
    
            
}

$pessoas_processa = new PessoaProcessa();      
        
            
            
            
        
        
        
        
    
