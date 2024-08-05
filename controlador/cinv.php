 <?php
	include ("modelo/minv.php");
	include ("modelo/mpagina.php");
	$obj = new mcie();
	date_default_timezone_set('America/Bogota');
	$fecact = date('Y/m/d G:i:s'); //date('d/m/Y G:i');
	//echo $fecact;
	//Variables
	$pg=1040;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$idkardex = isset($_POST['idkardex']) ? $_POST['idkardex']:NULL;
	if(!$idkardex) $idkardex = isset($_GET['idkardex']) ? $_GET['idkardex']:NULL;
	$fecini = isset($_POST['fecini']) ? $_POST['fecini']:NULL;

	$fecfin = isset($_POST['fecfin']) ? $_POST['fecfin']:NULL;

	$idmat = isset($_POST['idmat']) ? $_POST['idmat']:NULL;
	$tipo = isset($_POST['tipo']) ? $_POST['tipo']:NULL;
	$cantid = isset($_POST['cantid']) ? $_POST['cantid']:NULL;
	$descrip = isset($_POST['descrip']) ? $_POST['descrip']:NULL;

	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;

	$pdf = isset($_GET['pdf']) ? $_GET['pdf']:NULL;
	$imkar = isset($_GET['imkar']) ? $_GET['imkar']:NULL;
	$datkar = isset($_GET['datkar']) ? $_GET['datkar']:NULL;

	//Insertar
	//echo $fecini." - ".$basecie." - ".$idus." - ".$actu;
	if($fecini && !$actu){
		$dkaract = $obj->selkarant();
		$obj->setAct(2);
		$obj->updcie();
		$obj->setAct(1);
		$obj->setFecini($fecini);
		$obj->insubi();
		$dtidka = $obj->selkar1();
		$obj->setIdkardex($dkaract[0]['maxfec']);
		$dadft = $obj->selkard();
		if($dadft){
			for($x=0;$x<count($dadft);$x++){
				$obj->setIdmat($dadft[$x]['idmat']);
				$obj->setIdkardex($dkaract);
				$obj->setTipo('E');
				$cent = $obj->seltcan();
				$obj->setTipo('S');
				$csal = $obj->seltcan();
				$cexi = $cent-$csal;
				$obj->setIdkardex($dtidka);
				$obj->setTipo('E');
				$obj->setCantid($cexi);
				$obj->setDescrip('');
				$obj->insdkar();
			}
		}
		/*echo "<script type='text/javascript'>window.location='home.php?pg=1041&idkardex=".$datfac[0]["nofact"]."';</script>";*/
	}
	//Insertar Ajuste
	if($idmat AND $idkardex AND $tipo AND $cantid AND $descrip){
		$obj->setIdmat($idmat);
		$obj->setIdkardex($idkardex);
		$obj->setTipo($tipo);
		$obj->setCantid($cantid);
		$obj->setDescrip($descrip);
		$obj->insdkar();
	}

	//Eliminar
	if($del){
		$obj->setIdkardex($del);
		$obj->delubi();
	}
	//Actualizar
	if($idkardex && $fecfin && $actu){
		//$tofc = $obj->setott($idkardex,);
		$obj->setFecfin($fecfin);
		$obj->setIdkardex($idkardex);
		$obj->setAct(2);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($datkar){
		$obj->setIdkardex($datkar);
		$data1 = $obj->selubi1();
		$obj->setTipo('E');
		$datTe = $obj->setott();
		$obj->setTipo('S');
        $datTs = $obj->setott();
        $dadft = $obj->selkard();
	}

	if($pr){
		$obj->setIdkardex($pr);
		$data1 = $obj->selubi1();
		$obj->setTipo('E');
		$datTe = $obj->setott();
		$obj->setTipo('S');
        $datTs = $obj->setott();
        $dadft = $obj->selkard();
	}

	$datmtp = $obj->selmtp();
	$data3 = $obj->cieabi();

	if($data3){
		$obj->setIdkardex($data3[0]["idkardex"]);
		$obj->setTipo('E');
		$tofc = $obj->setott();
		//echo $tofc[0]["tot"];
		//$obj->updcievalor($data3[0]["idkardex"], $tofc[0]["tot"]);
		//echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}

   //paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
?>