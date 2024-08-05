 <?php
	include ("modelo/mcat.php");
	include ("modelo/mpagina.php");
	$obj = new mcat();
	//Variables
	$pg=1054;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$codcat = isset($_POST['codcat']) ? $_POST['codcat']:NULL;
	$nomcat = isset($_POST['nomcat']) ? $_POST['nomcat']:NULL;
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	if($nomcat && !$actu){
		$obj->setNomcat($nomcat);	
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setCodcat($del);
		$obj->delubi();
	}
	//Actualizar
	if($codcat && $nomcat && $actu){
		$obj->setNomcat($nomcat);	
		$obj->setCodcat($codcat);	
		$obj->updubi();
	}
	//Selecciones
	if($pr){
		$obj->setCodcat($pr);
		$data1 = $obj->selubi1();
	}
   //pginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
	$data = $obj->selubi();

?>