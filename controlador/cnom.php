<?php
include("modelo/mnom.php");
$obj = new mnom();
$pg = 1013;

$nomemp = isset($_POST["nomemp"])? $_POST["nomemp"]:NULL;
$idem = isset($_POST["idem1"])? $_POST["idem1"]:NULL;
$salario = isset($_POST["salario"])? $_POST["salario"]:NULL;
$asist = isset($_POST["asist"])? $_POST["asist"]:NULL;
$adelan = isset($_POST["adelan"])? $_POST["adelan"]:NULL;
$total = isset($_POST["total"])? $_POST["total"]:NULL;
$act = isset($_POST["act"])? $_POST["act"]:NULL;
$eliminar = isset($_POST["eliminar"])? $_POST["eliminar"]:NULL;
$editar = isset($_GET["editar"])? $_GET["editar"]:NULL;
$idnomi = isset($_GET["idnomi"])? $_GET["idnomi"]:NULL;
$elim = isset($_GET["elim"])? $_GET["elim"]:NULL;
//$datosNomina = $obj->selNomina();
$datosEmpleado = $obj->selEmpleado();
//$datosNomedi = $obj->selNomedi($editar);

/*
if($idem && $salario && $adelan){
	$dat = $obj->selNomedi($act);
}
*/

if($salario){
	echo "<script>alert('ivan no')</script>";
	$obj->insertNomina($idem,$salario,$adelan);
}
if($elim){
	$obj->elimNomina($elim);
}


$datosSalario = $obj->diasNoAsistidos($idem);

?>