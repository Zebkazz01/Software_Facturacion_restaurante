<?php 
include("modelo/mfic.php");
include("modelo/mpagina.php");
$obj = new mfic();
$pg=1007;

$filtro = isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;

$nofic = isset($_POST["nofic"]) ? $_POST["nofic"]:NULL;
$nomfic = isset($_POST["nomfic"]) ? $_POST["nomfic"]:NULL;
$jorna = isset($_POST["jorna"]) ? $_POST["jorna"]:NULL;
$sede = isset($_POST["sede"]) ? $_POST["sede"]:NULL;

$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
//Insertar
if($nofic && $nomfic && $jorna && $sede && !$act){
	$obj->insfic($nofic, $nomfic, $jorna, $sede);
}

//Actualizar
if($nofic && $nomfic && $jorna && $sede && $act){
	$obj->updfic($nofic, $nomfic, $jorna, $sede);
}

//Eliminar
if($del){
	$obj->delfic($del);
}

if($edi){
	$data1 = $obj->selfic1($edi,'1');
}



$datjor = $obj->selval('1');
$datsed = $obj->selval('2');


//paginar
$bo="";
$nreg = 10; //Numero d e registros  a mostrar
$pa = new mpagina($nreg);
$conp = $obj->sqlcount($filtro);

?>