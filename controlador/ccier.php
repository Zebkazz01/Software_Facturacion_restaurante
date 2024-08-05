<?php
include("modelo/mcier.php"); 
$obj = new mcier();
$pg = 1028;
$nmesa = isset($_POST["nmesa"]) ? $_POST["nmesa"]:NULL;
$noidecli = isset($_POST["noidecli"]) ? $_POST["noidecli"]:NULL;
$numeroFactura = isset($_POST["numeroFactura"]) ? $_POST["numeroFactura"]:NULL;
//echo "numeroFactura".$numeroFactura;
$codfactPost = isset($_POST["codfactPost"]) ? $_POST["codfactPost"]:NULL;
$codfact = isset($_GET["codfact"]) ? $_GET["codfact"]:NULL;
$im = isset($_GET["im"]) ? $_GET["im"]:NULL;
$nofact = isset($_GET["nofact"]) ? $_GET["nofact"]:NULL;
$datosFactura = $obj->selFactura();
$obj->setNumeroFactura($numeroFactura);				               
$productoFacturas = $obj->productoFactura();
if($nofact){
    $obj->setNofact($nofact);
    $datosFacturaImpri = $obj->datosFacturaImp();
    $datosEstablecimiento = $obj->datosEstablecimiento();
}
$cliente = $obj->selCliente();

?>
