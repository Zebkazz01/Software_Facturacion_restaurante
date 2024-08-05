<?php include("modelo/majus.php");
$pg = 1010;
$obj = new majus();

$idconf = isset($_POST["idconf"])? $_POST["idconf"]:NULL;
$nummesas = isset($_POST["nummesas"])? $_POST["nummesas"]:NULL;
$tiemact = isset($_POST["tiemact"])? $_POST["tiemact"]:NULL;
$nit = isset($_POST["nit"])? $_POST["nit"]:NULL;
$nomrest = isset($_POST["nomrest"])? $_POST["nomrest"]:NULL;
$dircon = isset($_POST["dircon"])? $_POST["dircon"]:NULL;
$mosdir = isset($_POST["mosdir"])? $_POST["mosdir"]:NULL;
if($mosdir=="on") $mosdir=1;
$telcon = isset($_POST["telcon"])? $_POST["telcon"]:NULL;
$mostel = isset($_POST["mostel"])? $_POST["mostel"]:NULL;
if($mostel=="on") $mostel=1;
$celcon = isset($_POST["celcon"])? $_POST["celcon"]:NULL;
$moscel = isset($_POST["moscel"])? $_POST["moscel"]:NULL;
if($moscel=="on") $moscel=1;
$emacon = isset($_POST["emacon"])? $_POST["emacon"]:NULL;
$mosema = isset($_POST["mosema"])? $_POST["mosema"]:NULL;
if($mosema=="on") $mosema=1;
$logocon = isset($_POST["logocon"])? $_POST["logocon"]:NULL;

$elim =	  isset($_GET["elim"])? $_GET["elim"]:NULL;
$pr =	  isset($_GET["pr"])? $_GET["pr"]:NULL;

//Eliminar
if($elim){
	$obj->setIdconf($elim);
}

//Insertar
/*if($nummesas && $tiemact && $nit && $nomrest){
	$obj->insertConfig($nummesas, $tiemact, $nit, $nomrest, $dircon, $mosdir, $telcon, $mostel, $celcon, $moscel, $emacon, $mosema, $logocon);
}*/

//Actualizar
if($idconf && $nummesas && $tiemact && $nit && $nomrest){
	$obj->setIdconf($idconf);
	$obj->setNummesas($nummesas);
	$obj->setTiemact($tiemact);
	$obj->setNit($nit);
	$obj->setNomrest($nomrest);
	$obj->setDircon($dircon);
	$obj->setMosdir($mosdir);
	$obj->setTelcon($telcon);
	$obj->setMostel($mostel);
	$obj->setCelcon($celcon);
	$obj->setMoscel($moscel);
	$obj->setEmacon($emacon);
	$obj->setMosema($mosema);
	$obj->setLogocon($logocon);
	$obj->updateConfig();
}

$data = $obj->configura();
?>