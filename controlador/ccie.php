 <?php
	include ("modelo/mcie.php");
	include ("modelo/mpagina.php");
	$obj = new mcie();
	date_default_timezone_set('America/Bogota');
	$fecact = date('Y/m/d H:i:s'); //date('d/m/Y G:i');
	//echo $fecact;
	//Variables
	$pg=1030;
	//Se capturan los datos 
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$nocie = isset($_REQUEST['nocie']) ? $_REQUEST['nocie']:NULL;

	$fecinicie = isset($_POST['fecinicie']) ? $_POST['fecinicie']:NULL;
	$basecie = isset($_POST['basecie']) ? $_POST['basecie']:NULL;

	$fecfincie = isset($_POST['fecfincie']) ? $_POST['fecfincie']:NULL;
	$gasto = isset($_POST['gasto']) ? $_POST['gasto']:NULL;
	$efeccie = isset($_POST['efeccie']) ? $_POST['efeccie']:NULL;
	$descgasto = isset($_POST['descgasto']) ? $_POST['descgasto']:NULL;
	

	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;

	$pdf = isset($_GET['pdf']) ? $_GET['pdf']:NULL;
	$imcie = isset($_GET['imcie']) ? $_GET['imcie']:NULL;
	$datcie = isset($_GET['datcie']) ? $_GET['datcie']:NULL;

	//Insertar
	//echo $fecinicie." - ".$basecie." - ".$idus." - ".$actu;
	//Esta es la parte de apertura de turno, se envian por metodo set
	if($fecinicie && $idus && !$actu){
		$obj->setAct(2);
		$obj->updcie();
		$obj->setFecinicie($fecinicie);
		$obj->setBasecie($basecie);
		$obj->setIdem($idus);
		$obj->setAct(1);
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setNocie($del);
		$obj->delubi();
	}
	//Actualizar este es el cierre de turno, se envia el mismo nocie(numero de cierre-id) y se actualiza el estado 
	if($nocie && $fecfincie && $efeccie && $actu){
		//$obj->updubi($nocie, $fecinicie, $basecie);
		$obj->setNocie($nocie);
		$tofc = $obj->setott($nocie);
		$obj->setFecfincie($fecfincie);
		$obj->setGasto($gasto);
		$obj->setEfeccie($efeccie);
		$obj->setTotalcie($tofc[0]["tot"]);
		$obj->setAct(2);
		$obj->setDescgasto($descgasto);
		//$obj->updubi($nocie, $fecfincie, $efeccie, ($efeccie+$basecie), 2);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones solo  se reemplaza las consultas de envio directo a set y listo
	if($datcie){
		$obj->setNocie($datcie);
		$data1 = $obj->selubi1();
		$datf1 = $obj->sellis();
	}

	if($pr){
		$obj->setNocie($pr);
		$data1 = $obj->selubi1();
	}

	$data3 = $obj->cieabi();

	if($data3 && $data3[0]["nocie"]){
		$obj->setNocie($data3[0]["nocie"]);
		$tofc = $obj->setott();
		
		$obj -> setEfec($tofc[0]["tot"]);
		//echo "<br><br><br><br>".$tofc[0]["tot"]."<br><br><br><br>";
		$obj->updcievalor();
		//echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}

   //pginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
  //$data = $obj->selubi();

?>