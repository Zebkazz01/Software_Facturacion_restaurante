<?php 
include("modelo/mconf.php");
include("modelo/mpagina.php");
$obj = new mconf();
$pg=1014;

$id = isset($_POST["id"]) ? $_POST["id"]:NULL;
$nomcen = isset($_POST["nomcen"]) ? $_POST["nomcen"]:NULL;
$nomreg = isset($_POST["nomreg"]) ? $_POST["nomreg"]:NULL;
$dircen = isset($_POST["dircen"]) ? $_POST["dircen"]:NULL;
$inicioRegCan = isset($_POST["inicioRegCan"]) ? $_POST["inicioRegCan"]:NULL;
$finRegCan = isset($_POST["finRegCan"]) ? $_POST["finRegCan"]:NULL;
$inicioPropu = isset($_POST["inicioPropu"]) ? $_POST["inicioPropu"]:NULL;
$finPropu = isset($_POST["finPropu"]) ? $_POST["finPropu"]:NULL;
$inicioVotacion = isset($_POST["inicioVotacion"]) ? $_POST["inicioVotacion"]:NULL;
$finVotacion = isset($_POST["finVotacion"]) ? $_POST["finVotacion"]:NULL;
$nomrespon = isset($_POST["nomrespon"]) ? $_POST["nomrespon"]:NULL;
$cargo = isset($_POST["cargo"]) ? $_POST["cargo"]:NULL;

$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = 1;
//Insertar
if($id && $nomcen && $nomreg && $dircen && $inicioRegCan && $finRegCan && $inicioPropu && $finPropu && $inicioVotacion && $finVotacion && $nomrespon && $cargo && !$act){
	$obj->insfic($id, $nomcen, $nomreg, $dircen, $inicioRegCan, $finRegCan, $inicioPropu, $finPropu, $inicioVotacion, $finVotacion, $nomrespon, $cargo);
}

//Actualizar
if($id && $nomcen && $nomreg && $dircen && $inicioRegCan && $finRegCan && $inicioPropu && $finPropu && $inicioVotacion && $finVotacion && $nomrespon && $cargo && $act){
	$obj->updfic($id, $nomcen, $nomreg, $dircen, $inicioRegCan, $finRegCan, $inicioPropu, $finPropu, $inicioVotacion, $finVotacion, $nomrespon, $cargo);
}

//Eliminar
if($del){
	$obj->delfic($del);
}

if($edi){
	$data1 = $obj->selfic1($edi);
}

$data = $obj->selfic();
?>