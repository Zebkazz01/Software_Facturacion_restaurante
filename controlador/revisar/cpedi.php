<?php
include("modelo/mpedi.php"); 
$obj = new mpedi();
$pg = 1026;
$nmesas = isset($_POST["nmesas"])? $_POST["nmesas"]:NULL;
$nota = isset($_POST["nota"])? $_POST["nota"]:NULL;
$elim = isset($_GET["elim"])? $_GET["elim"]:NULL;
$up = isset($_POST["up"])? $_POST["up"]:NULL;
$idem =  $_SESSION["idem"];
$idper = 	$_SESSION["idper"];
//echo $nmesas;
//echo $up." - ".$nota."<br>";
if($up && $nota){
	//echo "Le entra";
	$obj->anularFactura($up,$nota);
}
if($elim){
	//MODIFICAR ESTA PARTE YA QUE FALTA UN ESTADO EN EL PROCESO DE HACER EL PEDIDO, ESTADO 2 VENDRIA SIENDO CUANDO EL CHEF COMIENZA HACER LOS PRODUCTOS.... 
	//El proceso de pedido tiene 4 estados: 
	/*
	estado 1: toma de pedido.
	estado 2: El chef comienza hacer el producto.
	estado 3: el chef termino el proceso de coccion de los alimentos.
	estado 4: facturado. 
	*/
	$obj->cancelarFactura($elim);

}

$datosAjus = $obj->datosAjus();
 if($nmesas!="" && $nmesas!="null"){
	//echo "entro";
	//echo $nmesas;
	$obj->insertFactura($nmesas,$idem);
}
$ultimaFactura = $obj->hacerPedido();
$facturasAbiertas = $obj->facturasAbiertas($idem,$idper);


?>