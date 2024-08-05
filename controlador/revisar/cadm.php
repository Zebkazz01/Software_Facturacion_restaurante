<?php 
include("modelo/madm.php");
$obj = new madm();
$pg=1012;

$idadm = isset($_POST["idadm"]) ? $_POST["idadm"]:NULL;
$docadm = isset($_POST["docadm"]) ? $_POST["docadm"]:NULL;
$nomadm = isset($_POST["nomadm"]) ? $_POST["nomadm"]:NULL;
$passadm = isset($_POST["passadm"]) ? $_POST["passadm"]:NULL;
$act = isset($_POST["act"]) ? $_POST["act"]:NULL;

$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
//Insertar
if($docadm && $nomadm && $passadm && !$act){
	$obj->insadm($docadm, $nomadm, $passadm);
}

//Actualizar
if($idadm && $docadm && $nomadm && $passadm && $act){
	$obj->updadm($idadm, $docadm, $nomadm, $passadm);
}

//Eliminar
if($del){
	$obj->deladm($del);
}

if($edi){
	$data1 = $obj->seladm1($edi);
}


$data = $obj->seladm();


?>