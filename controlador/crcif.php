 <?php
	include ("modelo/mrcif.php");
	include ("modelo/mpagina.php");
	$obj = new mrcif();
	date_default_timezone_set('America/Bogota');
	$fecnocie = date('Y/m/d G:i:s'); //date('d/m/Y G:i');

$data3 = $obj->cieabi();
if (!$data3){
echo "<script type='text/javascript'>alert('No existe un turno abierto. Por favor cree un nuevo turno y vuelva a crear factura.');</script>";
	echo "<script type='text/javascript'>window.location='home.php?pag=1030';</script>";
}

	//Variables
	$pg=1014;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    $filtro1=isset($_GET["filtro1"]) ? $_GET["filtro1"]:NULL;
	
	$nocie = isset($_POST['nocie']) ? $_POST['nocie']:NULL;
	if(!$nocie) $nocie = isset($_GET['nocie']) ? $_GET['nocie']:NULL;
	$noidecli = isset($_POST['noidecli']) ? $_POST['noidecli']:NULL;
	$fecfac = isset($_POST['fecfac']) ? $_POST['fecfac']:NULL;
	$datfac = isset($_GET['datfac']) ? $_GET['datfac']:NULL;
	if (!$datfac){
		$datfac = isset($_POST['datfac']) ? $_POST['datfac']:NULL;
	}
	$codprd = isset($_GET['codprd']) ? $_GET['codprd']:NULL;
	$nodetf = isset($_GET['nodetf']) ? $_GET['nodetf']:NULL;

	$fpago= isset($_POST['fpago']) ? $_POST['fpago']:NULL;
	$nvoucher= isset($_POST['nvoucher']) ? $_POST['nvoucher']:NULL;
	$nloc= isset($_POST['nloc']) ? $_POST['nloc']:NULL;

	$nodetf = isset($_GET['nodetf']) ? $_GET['nodetf']:NULL;

$datcfi = isset($_GET['datcfi']) ? $_GET['datcfi']:NULL;
$datcff = isset($_GET['datcff']) ? $_GET['datcff']:NULL;
$pdf = isset($_GET['pdf']) ? $_GET['pdf']:NULL;

	$imrcif = isset($_GET['imrcif']) ? $_GET['imrcif']:NULL;

	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$nocieu = isset($_POST['nocieu']) ? $_POST['nocieu']:NULL;
	//Insertar
	//echo $fecfac." - ".$abiertafac." - ".$idus." - ".$nocieu;
	if($fecfac && $noidecli && $data3[0]["nocie"] &&  $_SESSION["idUser"]){
		$obj->updcie(2);
		$obj->setFecfac($fecfac);
		$obj->setAbiertafac(1);
		$obj->setNoidecli($noidecli);
		$obj->setNocie($data3[0]["nocie"]);
		$obj->setDocemp($_SESSION["idUser"]);
		$obj->insubi($fecfac, 1, $noidecli, $data3[0]["nocie"], $_SESSION["idUser"]);
		$datfac = $obj->selfac();
		echo "<script type='text/javascript'>window.location='home.php?pag=10021&datfac=".$datfac[0]["nofact"]."';</script>";
	}
	//Insertar detalle factura
	if($datfac && $codprd){
		$obj->insdfa($datfac, $codprd);
	}

//echo $datfac." - ".$fpago." - ".$nvoucher." - ".$nloc;
	//Actualiza factura
	if($datfac && $fpago && $nvoucher && $nloc){
		$obj->updfac($datfac, $fpago, $nvoucher, $nloc);
	}

	//Eliminar
	if($del){
		$obj->delubi($del);
	}

	if($nodetf){
		$obj->deldet($nodetf);
	}
	//actualizar
	if($nocie && $fecfincie && $efeccie && $nocieu){
		$obj->updubi($nocie, $fecfincie, $efeccie, ($efeccie+$abiertafac), 2);
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($datfac){
		$obj->setNofact($datfac);
		$data1 = $obj->selubi1();
		$datctg = $obj->categ();
		$dadft = $obj->seldft();
		$datdftot = $obj->seldfTot();
	}

   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro,$filtro1);

	$dicieT = $obj->infcieT($filtro);
	$difpg = $obj->difpag($filtro);

	if($datcfi && $datcff){
		$data1 = $obj->buscarp($datcfi, $datcff);
        $dataT = $obj->buscart($datcfi, $datcff);
	}

?>