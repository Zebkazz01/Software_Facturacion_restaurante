<?php 
include("modelo/mapr.php");
include("modelo/mpagina.php");
$obj = new mapr();
$pg=1008;
$idapr = isset($_POST["idapr"]) ? $_POST["idapr"]:NULL;
$docapr = isset($_POST["docapr"]) ? $_POST["docapr"]:NULL;
$nomapr = isset($_POST["nomapr"]) ? $_POST["nomapr"]:NULL;
$nofic = isset($_POST["nofic"]) ? $_POST["nofic"]:NULL;
$pin = isset($_POST["pin"]) ? $_POST["pin"]:NULL;
$voto = isset($_POST["voto"]) ? $_POST["voto"]:NULL;
$rep = isset($_POST["rep"]) ? $_POST["rep"]:NULL;
$imin = isset($_GET["imin"]) ? $_GET["imin"]:NULL;
$pdf = isset($_GET["pdf"]) ? $_GET["pdf"]:NULL;
$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
$hvo = isset($_GET["hvo"]) ? $_GET["hvo"]:NULL;
$dvo = isset($_GET["dvo"]) ? $_GET["dvo"]:NULL;
$npg = isset($_GET["npg"]) ? $_GET["npg"]:NULL;
$filtro = isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$igual = isset($_GET["igual"]) ? $_GET["igual"]:NULL;
$data = isset($_GET["data"]) ? $_GET["data"]:NULL;
$ale=rand(100000, 999999);
$datapdf = $obj->selapparpdf($filtro);
//Insertar
if($docapr && $nomapr && $nofic && $pin && !$act){
	$datapr=$obj->selapr2($docapr);
	if($datapr[0]['Nap']==0){
		$obj->insapr($docapr, $nomapr, $nofic, $pin);
	}else{
		echo "<script>alert('El numero de documento: ".$docapr." ya se encuentra registrado');</script>;";
		echo "<script>window.history.back();</script>;";
	}
}

//Habilitar voto
if($hvo){
	$obj->hab($hvo);
}else if($dvo){
	$obj->nhab($dvo);
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
//paginar
$bo="";
$nreg = 10; //Numero de registros  a mostrar
$pa = new mpagina($nreg);
$conp = $obj->sqlcount($filtro);
$datfic = $obj-> selfic();

?>