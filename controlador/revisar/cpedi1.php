<?php
include("modelo/mpedi1.php"); 
$obj = new mpedi1();
$pg = 1036;
$mod = isset($_GET["mod"])? $_GET["mod"]:NULL;
$nofact = isset($_POST["nofact"])? $_POST["nofact"]:NULL;
$fecfac = isset($_POST["fecfac"])? $_POST["fecfac"]:NULL;
$abiertafac = isset($_POST["abiertafac"])? $_POST["abiertafac"]:NULL;
$noidecli = isset($_POST["noidecli"])? $_POST["noidecli"]:NULL;
$nomcli = isset($_POST["nomcli"])? $_POST["nomcli"]:NULL;
$nocie = isset($_POST["nocie"])? $_POST["nocie"]:NULL;
$fpago = isset($_POST["fpago"])? $_POST["fpago"]:NULL;
$nvoucher = isset($_POST["nvoucher"])? $_POST["nvoucher"]:NULL;
$nloc = isset($_POST["nloc"])? $_POST["nloc"]:NULL; 
$clienteFact = isset($_POST["clienteFact"])? $_POST["clienteFact"]:NULL;
echo $clienteFact;
$idem = isset($_POST["idem"])? $_POST["idem"]:NULL;
$codprod = isset($_GET["codprod"])? $_GET["codprod"]:NULL;
$envi = isset($_GET["envi"])? $_GET["envi"]:NULL;
$elim = isset($_GET["elim"])? $_GET["elim"]:NULL;
$codprodPost = isset($_POST["codprodPost"])? $_POST["codprodPost"]:NULL;
$codfact = isset($_GET["codfact"]) ? $_GET["codfact"]:NULL;
$codfactPost = isset($_POST["codfactPost"]) ? $_POST["codfactPost"]:NULL;

$codfactura = isset($_POST["codfactura"]) ? $_POST["codfactura"]:NULL;
$codProdHidden = isset($_POST["codProdHidden"]) ? $_POST["codProdHidden"]:NULL;
$menos = isset($_POST["menos"]) ? $_POST["menos"]:NULL;
$mas = isset($_POST["mas"]) ? $_POST["mas"]:NULL;

//echo "mas".$mas."menos",$menos,$codProdHidden,$codfactura;


$verifExist = $obj -> verifExist($codfact,$codprod);
$clienteFactura =  $obj -> clienteFactura();

if($mod){
	$datosFacturaModificada = $obj -> datosFacturaModificada($mod);
}

if($mas && $codProdHidden && $codfactura){
	echo "mas".$mas;
	echo "codproductoHidden".$codProdHidden."<br>";
	$verifExiste = $obj -> verifExist($codfactura,$codProdHidden);
	$can = $verifExiste[0]["candeft"]+1;
	$obj->updDetFact($codfactura,$codProdHidden,$can);

}else if($menos && $codProdHidden && $codfactura){
	//echo "mas".$menos;
	//echo "codproductoHidden".$codProdHidden."<br>";
	$verifExiste = $obj -> verifExist($codfactura,$codProdHidden);
	$can = $verifExiste[0]["candeft"]-1;
	$obj->updDetFact($codfactura,$codProdHidden,$can);
}

if($codfact && $codprod && count($verifExist)==0){
	$obj->insertDetFact($codfact,$codprod,1);
	//echo "entro".$clienteFact;
}else{
	//echo "Le entra dos";
	$can = $verifExist[0]["candeft"]+1;
	$obj->updDetFact($codfact,$codprod,$can);
}

if($elim){
	$obj->deleteDetFact($elim);
}

$selDetFact = $obj -> selDetFact($codfact);

if($codfactPost){
	$obj->updateFact($codfact);
	/*
	for($i=0;$i<count($selDetFact);$i++){
		$cantidadPost = isset($_POST["cantidadPost".$i]) ? $_POST["cantidadPost".$i]:NULL;
		//echo $cantidadPost."cantidad".$codprod;
		$posicion=$selDetFact[$i]['codprod'];
		$obj ->updateDetFact($cantidadPost,$posicion,$codfact);
	}
	*/
	if($clienteFact){
		//echo "ENTRO";
		$obj->actualizarCliFactura($clienteFact,$codfact);
	}
	?>
		<script type="text/javascript">
			alert("pedido efectivo");
		</script>
	<?php
	header ("Location: home.php?pg=1026");
}
	



/*
if($envi){
	for($i=0;$i<count($selDetFact);$i++){
		$cantidad = isset($_POST["cantidad".$i]) ? $_POST["cantidad".$i]:NULL;	
		echo $cantidad."s";
	}
}
*/



$valprod = $obj -> valprod($codprod);
$catexprod = $obj -> catexprod();
$categoria = $obj -> categoria();
$datosProducto = $obj->selProducto();

?>
