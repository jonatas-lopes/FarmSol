<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servidor = '200.200.200.131:3306';
$database = 'farmsol';
$usuario = 'gsis';
$senha = 'Cheatreveal95&';




global $con;

$con = mysqli_connect($servidor, $usuario, $senha ) or die (mysqli_error());

mysqli_select_db($con, $database) or die (mysqli_error($con));


mysqli_set_charset($con, 'utf8');
