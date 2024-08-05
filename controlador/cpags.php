
<?php 
include("modelo/mpags.php");
include("modelo/mpagina.php");
$obj = new mpags();
$pg=1013;
$idpag = isset($_POST["idpag"]) ? $_POST["idpag"]:NULL;
$nompag = isset($_POST["nompag"]) ? $_POST["nompag"]:NULL;
$nomarc = isset($_POST["nomarc"]) ? $_POST["nomarc"]:NULL;
$mos = isset($_POST["mos"]) ? $_POST["mos"]:NULL;
$ord = isset($_POST["ord"]) ? $_POST["ord"]:NULL;
$ico = isset($_POST["ico"]) ? $_POST["ico"]:NULL;
$dat1 = isset($_POST["dat1"]) ? $_POST["dat1"]:NULL;
$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
$filtro = isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;

//echo $idpag."-".$nompag."-".$nomarc."-".$mos."-".$ord."-".$act;

//insertar
if($idpag && $nompag && $nomarc && $ord && !$act && $ord){
	
$obj->setIdpag($idpag);
$obj->setNompag($nompag);
$obj->setNomarc($nomarc);
$obj->setMos($mos);
$obj->setOrd($ord);
$obj->setIco($ico);
$obj->inspag();

}
//eliminar
if($del){
	$obj->setIdpag($del);
	$obj->delpag();
}
//actualizar
if($idpag && $nompag && $nomarc && $ord && $act && $ord){
$obj->setIdpag($idpag);
$obj->setNompag($nompag);
$obj->setNomarc($nomarc);
$obj->setMos($mos);
$obj->setOrd($ord);
$obj->setIco($ico);
$obj->actpag();
}
if($edi){
	$obj->setIdpag($edi);
	$datact=$obj->selp();
}
$bo="";
$nreg = 10; 
$pa = new mpagina($nreg);
$conp = $obj->sqlcount($filtro);
$data = $obj-> selpag();


?>