 <?php
	include ("modelo/mprd.php");
	include ("modelo/mpagina.php");
	$obj = new mprd();
	//Variables
	$pg=1053;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$codprod = isset($_POST['codprod']) ? $_POST['codprod']:NULL;
	if(!$codprod) $codprod = isset($_GET['codprod']) ? $_GET['codprod']:NULL;
	$nomprd = isset($_POST['nomprd']) ? $_POST['nomprd']:NULL;
	$vlrprd = isset($_POST['vlrprd']) ? $_POST['vlrprd']:NULL;
	$codcat = isset($_POST['codcat']) ? $_POST['codcat']:NULL;

	$idmat = isset($_POST['idmat']) ? $_POST['idmat']:NULL;
	$cantmatxpro = isset($_POST['cantmatxpro']) ? $_POST['cantmatxpro']:NULL;
	
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$delmxp = isset($_GET['delmxp']) ? $_GET['delmxp']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	if($nomprd && $vlrprd && $codcat && !$actu){
		$obj->setNomprd($nomprd);
		$obj->setVlrprd($vlrprd);
		$obj->setCodcat($codcat);
		$obj->insubi();
	}
	//Insertar materia prima
	if($idmat && $codprod && $cantmatxpro){
		$obj->setIdmat($idmat);
		$obj->setCodprod($codprod);
		$obj->setCantmatxpro($cantmatxpro);
		$obj->insmxp();
	}
	
	//Eliminar
	if($del){
		$obj->setCodprod($del);
		$obj->delubi();
	}
	if($delmxp){
		$obj->setIdmatxpro($delmxp);
		$obj->delmxp();
	}
	//Actualizar
	if($codprod && $nomprd && $vlrprd && $codcat && $actu){
		$obj->setCodprod($codprod);
		$obj->setNomprd($nomprd);
		$obj->setVlrprd($vlrprd);
		$obj->setCodcat($codcat);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($pr){
		$obj->setCodprod($pr);
		$data1 = $obj->selubi1();
	}
	$materia = $obj->selmat();
   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
	$datcat = $obj->selcat();

?>