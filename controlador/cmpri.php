 <?php
	include ("modelo/mmpri.php");
	include ("modelo/mpagina.php");
	$obj = new mmpri();
	//Variables
	$pg=1052;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$idmat = isset($_POST['idmat']) ? $_POST['idmat']:NULL;
	if(!$idmat) $idmat = isset($_GET['idmat']) ? $_GET['idmat']:NULL;
	$nommatp = isset($_POST['nommatp']) ? $_POST['nommatp']:NULL;
	$vlrmatp = isset($_POST['vlrmatp']) ? $_POST['vlrmatp']:NULL;
	
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	if($nommatp && $vlrmatp && !$actu){
		$obj->setNommatp($nommatp);
		$obj->setVlrmatp($vlrmatp);
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setIdmat($del);
		$obj->delubi();
	}
	//Actualizar
	if($idmat && $nommatp && $vlrmatp && $actu){
		$obj->setNommatp($nommatp);
		$obj->setVlrmatp($vlrmatp);
		$obj->setIdmat($idmat);
		$obj->updubi($idmat, $nommatp, $vlrmatp);
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($pr){
		$obj->setIdmat($pr);
		$data1 = $obj->selubi1();
	}
   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
  //$data = $obj->selubi();

?>