
<?php 
include("modelo/mperf.php");


$obj = new mperf();
$pg=1021;
//variables principales
$idper = isset($_POST["idper"]) ? $_POST["idper"]:NULL;
$nomper = isset($_POST["nomper"]) ? $_POST["nomper"]:NULL;
$nompag  = isset($_POST["nompag"]) ? $_POST["nompag"]:NULL;
$idpag = isset($_POST["idpag"]) ? $_POST["idpag"]:NULL;
//variables peraciones
$paginas = isset($_POST["paginas"]) ? $_POST["paginas"]:NULL;
$pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
//variables ddl
$npa = isset($_POST["npa"]) ? $_POST["npa"]:NULL;
$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$guper = isset($_POST["guper"]) ? $_POST["guper"]:NULL;
$edit = isset($_GET["edit"]) ? $_GET["edit"]:NULL;
$dele = isset($_GET["dele"]) ? $_GET["dele"]:NULL;

if($idper AND $guper){
	$obj->setIdper($idper);
	$obj->delpp();
	for ($m=0;$m<$npa;$m++) { 
		$check = isset($_POST["check".$m]) ? $_POST["check".$m]:NULL;
		if($idper AND $check AND $guper){
			//echo "Para insertar <br>";
			$obj->setIdper($idper);
			$obj->setIdpag($check);
			//echo $idper." - ".$check."<br>";
			$obj->inspp();
		}
	}
}

//insertpagina

//insertar
if($nomper && !$act){
	$obj->setNomper($nomper);
	$obj->insper();
}

//actualizar
if ($nomper && $act) {
	$obj->setNomper($nomper);
	$obj->setIdper($act);
	$obj->updper();
}

//eliminar
if ($dele) {
	$obj->setIdper($dele);
	$obj->deleper();
}

if($edit){
 	$obj->setIdper($edit);
	$data1 = $obj->selperf();
}

$data = $obj->selper();
$paginas = $obj->selpag();
if($idper AND !$guper){
	$obj->setIdper($idper);
	$datadele = $obj->deleper();
}
?>