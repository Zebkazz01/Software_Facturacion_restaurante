<?php include("modelo/mmedia.php");

$obj = new mmedia();
$pg = 1025;

$nofact = isset($_POST["nofact"])? $_POST["nofact"]:NULL;
$fecfac = isset($_POST["fecfac"])? $_POST["fecfac"]:NULL;
$abiertafac = isset($_POST["abiertafac"])? $_POST["abiertafac"]:NULL;
$noidecli = isset($_POST["noidecli"])? $_POST["noidecli"]:NULL;
$nomcli = isset($_POST["nomcli"])? $_POST["nomcli"]:NULL;
$nocie = isset($_POST["nocie"])? $_POST["nocie"]:NULL;
$fpago = isset($_POST["fpago"])? $_POST["fpago"]:NULL;
$nvoucher = isset($_POST["nvoucher"])? $_POST["nvoucher"]:NULL;
$nloc = isset($_POST["nloc"])? $_POST["nloc"]:NULL;
$idem = isset($_POST["idem"])? $_POST["idem"]:NULL;
$tipo = isset($_GET["tipo"])? $_GET["tipo"]:NULL;
$parametro = isset($_POST["parametro"])? $_POST["parametro"]:NULL;
$numProdxCate = isset($_POST["numProdxCate"])? $_POST["numProdxCate"]:NULL;
$obj->setRipo($tipo);
$catexprod = $obj -> catexprod();
$categoria = $obj -> categoria();
$datosProducto = $obj -> selProducto();
$menusdia = $obj-> menudia();




if($parametro){
	$cambio=false;
	$obj -> setParametro($parametro);
	$obj -> delcatexprod();
	$sql = "INSERT INTO menudia(codprod,codcat) values ";
	for ($i=0; $i < $numProdxCate; $i++){ 
		$check = isset($_POST["check".$i])? $_POST["check".$i]:NULL;
		if($check && $parametro){
			$sql .= "('".$check."','".$parametro."')";
			$cambio = true;
				$sql .= ",";
		}
	}
	if($cambio==true){
		$sql = substr($sql, 0,strlen($sql)-1).";";
		echo $check." - ".$parametro."<br>";
		echo $sql;
		$obj->inserMenu($sql);
	}
		
}




?>