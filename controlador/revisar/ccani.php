<?php
	include("modelo/mcani.php");
   
     $obj = new mcani();
     $pg =1004;

	$nopro = isset($_POST["nopro"]) ? $_POST["nopro"]:NULL;
	$idcan = isset($_POST["idcan"]) ? $_POST["idcan"]:NULL;
	$texpro = isset($_POST["texpro"]) ? $_POST["texpro"]:NULL;

    $pr = isset($_GET["pr"]) ? $_GET["pr"]:NULL;
	$del = isset($_GET["del"]) ? $_GET["del"]:NULL;

	$imin = isset($_GET["imin"]) ? $_GET["imin"]:NULL;
	$pdf = isset($_GET["pdf"]) ? $_GET["pdf"]:NULL;

    //insertar
	if( $texpro && $idcan){
	  $obj->inspror($idcan, $texpro);
	}
	//eliminar
	if($del){
	  $obj->delpror($del);
	}

	$datcan = $obj->selcan($pr);
	$data = $obj->selpror($pr);
	$datcen =$obj->selcon();
	$datpro = $obj->selval(5);
	$datman = $obj->selval(6);
	$datcon = $obj->selval(4);

?>
