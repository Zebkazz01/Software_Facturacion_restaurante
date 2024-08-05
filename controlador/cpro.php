 <?php
	include ("modelo/mpro.php");
	include ("modelo/mpagina.php");
	$obj = new mpro();
	//Variables
	$pg=1055;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$noidepro = isset($_POST['noidepro']) ? $_POST['noidepro']:NULL;
	if(!$noidepro) $noidepro = isset($_GET['noidepro']) ? $_GET['noidepro']:NULL;
	$nonitpro = isset($_POST['nonitpro']) ? $_POST['nonitpro']:NULL;
	$razsocpro = isset($_POST['razsocpro']) ? $_POST['razsocpro']:NULL;
	$telpro = isset($_POST['telpro']) ? $_POST['telpro']:NULL;
	$dirpro = isset($_POST['dirpro']) ? $_POST['dirpro']:NULL;
	$emailpro = isset($_POST['emailpro']) ? $_POST['emailpro']:NULL;
	$codubi = isset($_POST['codubi']) ? $_POST['codubi']:NULL;
	$contpro = isset($_POST['contpro']) ? $_POST['contpro']:NULL;
	
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	//echo $noidepro." - ".$nonitpro." - ".$razsocpro." - ".$dirpro." - ".$telpro." - ".$emailpro." - ".$contpro." - ".$codubi." - ".$actu;
	if($nonitpro && $razsocpro && $dirpro && $emailpro && $codubi && $contpro && !$actu){
		$obj->setNonitpro($nonitpro);
		$obj->setRazsocpro($razsocpro);
		$obj->setTelpro($telpro);
		$obj->setDirpro($dirpro);
		$obj->setCodubi($codubi);
		$obj->setEmailpro($emailpro);
		$obj->setContpro($contpro);
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setNoidepro($del);
		$obj->delubi();
	}
	//Actualizar
//	$noidepro, $nonitpro, $razsocpro, $telpro, $dirpro, $codubi, $emailpro, $contpro
	if($noidepro && $nonitpro && $razsocpro && $dirpro && $emailpro && $codubi && $contpro && $actu){
		$obj->setNoidepro($noidepro);
		$obj->setNonitpro($nonitpro);
		$obj->setRazsocpro($razsocpro);
		$obj->setTelpro($telpro);
		$obj->setDirpro($dirpro);
		$obj->setCodubi($codubi);
		$obj->setEmailpro($emailpro);
		$obj->setContpro($contpro);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($pr){
		$obj->setNoidepro($pr);
		$data1 = $obj->selubi1();
	}
	 $depto = $obj->selper();
   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
//$data = $obj->selubi();

?>