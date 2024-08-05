<?php 
include("modelo/mapr.php");
$obj = new mapr();
$pg=1008;
$idapr = isset($_POST["idapr"]) ? $_POST["idapr"]:NULL;
$docapr = isset($_POST["docapr"]) ? $_POST["docapr"]:NULL;
$nomapr = isset($_POST["nomapr"]) ? $_POST["nomapr"]:NULL;
$nofic = isset($_POST["nofic"]) ? $_POST["nofic"]:NULL;
$pin = isset($_POST["pin"]) ? $_POST["pin"]:NULL;
$voto = isset($_POST["voto"]) ? $_POST["voto"]:NULL;

$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
//Insertar
if($docapr && $nomapr && $nofic && $pin && !$act){
	$obj->insapr($docapr, $nomapr, $nofic, $pin);
}

//Actualizar
if($idapr && $docapr && $nomapr && $nofic && $pin && $act){
	$obj->updapr($idapr, $docapr, $nomapr, $nofic, $pin);
}

//Eliminar
if($del){
	$obj->delapr($del);
}

if($edi){
	$data1 = $obj->selapr1($edi);
}


$data = $obj->selapr();
$datafic = $obj-> selfic();

?>