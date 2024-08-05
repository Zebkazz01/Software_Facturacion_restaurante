 <?php
	include ("modelo/mcli.php");
	include ("modelo/mpagina.php");
	$obj = new mcli();
	//Variables
	$pg=1034;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$noidecli = isset($_POST['noidecli']) ? $_POST['noidecli']:NULL;
	if(!$noidecli) $noidecli = isset($_GET['noidecli']) ? $_GET['noidecli']:NULL;
	$nodoccli = isset($_POST['nodoccli']) ? $_POST['nodoccli']:NULL;
	$nomcli = isset($_POST['nomcli']) ? $_POST['nomcli']:NULL;
	$telcli = isset($_POST['telcli']) ? $_POST['telcli']:NULL;
	$dircli = isset($_POST['dircli']) ? $_POST['dircli']:NULL;
	$emacli = isset($_POST['emacli']) ? $_POST['emacli']:NULL;
	$codubi = isset($_POST['codubi']) ? $_POST['codubi']:NULL;
	
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	//echo $noidecli." - ".$nodoccli." - ".$nomcli." - ".$telcli." - ".$dircli." - ".$emacli." - ".$codubi." - ".$actu;
	if($nodoccli && $nomcli && $dircli && $emacli && $codubi && !$actu){
		$obj->setNodoccli($nodoccli);
		$obj->setNomcli($nomcli);
		$obj->setTelcli($telcli);
		$obj->setDircli($dircli);
		$obj->setCodubi($codubi);
		$obj->setEmacli($emacli);
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setNoidecli($del);
		$obj->delubi();
	}
	//Actualizar
	if($noidecli && $nodoccli && $nomcli && $dircli && $codubi && $actu){
		$obj->setNoidecli($noidecli);
		$obj->setNodoccli($nodoccli);
		$obj->setNomcli($nomcli);
		$obj->setTelcli($telcli);
		$obj->setDircli($dircli);
		$obj->setCodubi($codubi);
		$obj->setEmacli($emacli);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
	//Selecciones
	if($pr){
		$obj->setNoidecli($pr);
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