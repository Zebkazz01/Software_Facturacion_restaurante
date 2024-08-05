<?php 
include("modelo/mdom.php"); 
include ("modelo/mpagina.php");
$obj=new mdom();
$pg=1011;

    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$iddom = isset($_POST["iddom"]) ? $_POST["iddom"]:NULL;
	$nomdom = isset($_POST["nomdom"]) ? $_POST["nomdom"]:NULL;
	$actu = isset($_POST["actu"]) ? $_POST["actu"]:NULL;
	$nomdomv= isset($_POST["nomdomv"]) ? $_POST["nomdomv"]:NULL;

	$deld = isset($_GET["deld"]) ? $_GET["deld"]:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	/*$edid = isset($_GET["edid"]) ? $_GET["edid"]:NULL;*/

	//valor
	$codval = isset($_POST["codval"]) ? $_POST["codval"]:NULL;
	if(!$codval) $codval = isset($_GET["codval"]) ? $_GET["codval"]:NULL;
	$nom_val = isset($_POST["nom_val"]) ? $_POST["nom_val"]:NULL;
	$deld2 = isset($_GET["deld2"]) ? $_GET["deld2"]:NULL;
	$pr2 = isset($_GET["pr2"]) ? $_GET["pr2"]:NULL;
	$act2 = isset($_POST["act2"]) ? $_POST["act2"]:NULL;
	$acv = isset($_GET["acv"]) ? $_GET["acv"]:NULL;

//insertar
	if($nomdom && !$actu ){
		$obj->setNomdom($nomdom);
		$obj->insdom();
	}

//actualizar
	if($iddom && $actu ){
		$obj->setNomdom($nomdom);
		$obj->setIddom($iddom);
		$obj->upddom();
	}

	//if($codval && $acv){
	//	$obj->setNomdom($nomdom);
	//	$obj->setIddom($iddom);
	//	$obj->updacv($codval, $acv);
	//}

//eliminar
		if($deld){
		$obj->setIddom($deld);
		$obj->deldom();
	}

if($pr){
		$obj->setIddom($pr);
		$data1 = $obj->seldom1();
	}

 //eliminar valor
	//insertar

	if($nom_val	 && $nomdomv && !$act2){
		$obj->setNomval($nom_val);
		$obj->setIddom($nomdomv);
		$obj->insval();
	}


	if($deld2){
		$obj->setIdval($deld2);
		$obj->delval();
	}

//actualizar
	if($codval && $act2){
		$obj->setNomval($nom_val);
		$obj->setIddom($nomdomv);
		$obj->setIdval($codval);
		$obj->updval();
	}

	if($pr2){
		$obj->setIdval($pr2);
		$data3 = $obj->selval1($pr2);
	}

	$data = $obj->seldom();

    //Paginar
    $bo = "";
    $nreg = 10;//numero de registros a mostrar
    $pa = new mpagina($nreg);

    $conp = $obj->sqlcount($filtro);


	

?>
