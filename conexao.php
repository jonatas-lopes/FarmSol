<?php

error_reporting(E_ERROR | E_WARNING | E_PARSE);

$servidor = 'localhost';
$database = 'farmsol';
$usuario = 'root';




global $con;

$con = mysqli_connect($servidor, $usuario ) or die (mysqli_error());

mysqli_select_db($con, $database) or die (mysqli_error($con));


mysqli_set_charset($con, 'utf8');
