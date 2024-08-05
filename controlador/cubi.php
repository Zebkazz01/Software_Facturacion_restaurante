 <?php
	include ("modelo/mubi.php");
	include ("modelo/mpagina.php");
	$obj = new mubi();
	//Variables
	$pg=1012;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	$codubi = isset($_POST['codubi']) ? $_POST['codubi']:NULL;
	if(!$codubi)
		$codubi = isset($_GET['codubi']) ? $_GET['codubi']:NULL;
	$nomubi = isset($_POST['nomubi']) ? $_POST['nomubi']:NULL;
	$depubi = isset($_POST['depubi']) ? $_POST['depubi']:NULL;
	$estubi = isset($_POST['estubi']) ? $_POST['estubi']:NULL;
	$op = isset($_GET['op']) ? $_GET['op']:NULL;
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	if($codubi && $nomubi && $estubi && !$actu){
	$obj->insubi($codubi, $nomubi, $depubi, $estubi);
	}
	//Eliminar
	if($del){
		$obj->delubi($del);
	}
	//Actualizar
	if($codubi && $nomubi && $estubi && $actu){
		$obj->updubi($codubi, $nomubi, $depubi, $estubi);
	}
	if($codubi && $op){
		$obj->updest($codubi, $op);
	}
	//Selecciones
	if($pr){
		$data1 = $obj->selubi1($pr);
	}
	$depto = $obj->seldepto();
	$data = $obj->selubi();
   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
	$data = $obj->selubi();

?>