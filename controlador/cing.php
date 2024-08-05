<?php 
include("modelo/ming.php");
$obj = new ming();
$user = isset ($_POST["nomusuario"])? $_POST["nomusuario"]:NULL;
$pass = isset ($_POST["conusuario"])? $_POST["conusuario"]:NULL;
$tipou = isset ($_POST["tipou"])? $_POST["tipou"]:NULL;

$datPerf = $obj -> perfil();



