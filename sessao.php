<?php

session_start();

if (! isset($_SESSION['email']) || empty($_SESSION['email']))
{
    header('Location: login.php');
    
}

if (isset($_GET['acao']) && ($_GET['acao'] == 'encerrar_sessao'))
{
    
    session_destroy();
    header('Location: login.php');
    
}