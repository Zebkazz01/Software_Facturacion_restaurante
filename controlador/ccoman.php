<?php 
include("modelo/mcoman.php");

$obj =new mcoman();
$pg= 1090;

$paginas = isset($_POST["paginas"]) ? $_POST["paginas"]:NULL;
$npa = isset($_POST["npa"]) ? $_POST["npa"]:NULL;
$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
$tipe = isset($_GET["tipe"]) ? $_GET["tipe"]:NULL;
$nofac = isset($_POST["nofac"]) ? $_POST["nofac"]:NULL;
if(!$nofac)
	$nofac = isset($_GET["nofac"]) ? $_GET["nofac"]:NULL;
if($tipe) $obj->setCodcat($tipe);
$datfac = $obj->selfac();

if($nofac){
	$obj->setEstado(3);
	$obj->setNofact($nofac);
	$obj->updest();
	if($tipe){
		echo "<script type='text/javascript'>window.location='index.php?pg=1090&tipe=".$tipe."';</script>";
	}else{
		echo "<script type='text/javascript'>window.location='index.php?pg=1090';</script>";
	}
}

/*if($imfac){
	$obj->updcie(2);
	$obj->updest($imfac, 4);
}*/

?>