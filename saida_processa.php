<?php

require_once 'conexao.php';
require_once 'sessao.php';


class SaidaProcessa {
    
        public function __construct(){
        if ($_POST['acao'] == 'salvar') {
            if (empty($_POST['idsaida'])) {
                $this->inserir($_POST);
                header('location: saida_lista.php');
            } else {
                $this->alterar($_POST);
                header('location: saida_lista.php');
            }
        } elseif ($_GET['acao'] == 'excluir') {
            $this->excluir($_GET['idsaida']);
            header('location: saida_lista.php');
        }
    }
  
    public function pesquisar($buscar){
        
        global $con;
        return mysqli_query($con,"SELECT * FROM saidas WHERE produto LIKE '%{$buscar}%' OR data LIKE '%{$buscar}%' OR cliente LIKE '%{$buscar}%' ");
                    
        
    }
    
    public function pesquisar_por_id($id){
        global $con;
        return mysqli_query($con, 'SELECT * FROM saidas WHERE idsaida = ' . addslashes($id) );
    }
    
    
    
    public function inserir($saida){  
        
        global $con;
        
        $produto = mysqli_real_escape_string($con, $saida['produto']);
        $quantidade = mysqli_real_escape_string($con, $saida['quantidade']);
        $data = mysqli_real_escape_string($con, $saida['data']);
        $cliente = mysqli_real_escape_string($con, $saida['cliente']);
        
        
                return mysqli_query($con,""
                . "INSERT INTO saidas (produto,quantidade,data,cliente)"
                . "VALUES('{$produto}','{$quantidade}','{$data}','{$cliente}')" );
    }
    
    public function alterar($saida){
        
        global $con;
        $id = mysqli_real_escape_string($con, $saida['idsaida']);
        $produto = mysqli_real_escape_string($con, $saida['produto']);
        $quantidade = mysqli_real_escape_string($con, $saida['quantidade']);
        $data = mysqli_real_escape_string($con, $saida['data']);
        $cliente = mysqli_real_escape_string($con, $saida['cliente']);
        
        return mysqli_query($con, "UPDATE saidas SET produto ='{$produto}', quantidade ='{$quantidade}',  data = '{$data}', cliente = '{$cliente}' WHERE idsaida = '{$id}'");
                
     
        
    }
    
        public function excluir($id){
        global $con;
        
        $id = mysqli_real_escape_string($con, $id);
        
        return mysqli_query($con, 
            "DELETE FROM saidas WHERE idsaida = {$id}"
        );
    }
    
    
    
           
}





$saidas_processa = new SaidaProcessa();  
