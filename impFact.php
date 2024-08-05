<?php
header('Content-Type: text/html; charset=UTF-8');
include ("controlador/ccier.php");
ini_set('memory_limit', '512M');
require_once("dompdf/dompdf_config.inc.php");
	date_default_timezone_set('America/Bogota');
	$ano = date('Y');

$html = "<head>";
$html .="<meta charset='UTF-8'>";
$html .="<style type='text/css'>";

$html .=".titu{";
$html .="font-weight: bold;";
$html .="font-family: Arial, Helvetica, sans-serif;";
$html .="font-size: 13px;";
$html .="color: #000;";
$html .="}";
$html .=".txt{";
$html .="font-size: 12px;";
$html .="font-family: Arial, Helvetica, sans-serif;";
$html .="color: #000;";
$html .="}";
$html .=".txtbold{";
$html .="font-weight: bold;";
$html .="font-size: 12px;";
$html .="font-family: Arial, Helvetica, sans-serif;";
$html .="color: #000;";
$html .="}";

$html .="</style>";


$html .="</head>";
$html .="<body>";
$html .="<div align='center' style='float: left;'><center>";

$html .="<table align='center' width='400px' cellpadding='5px' cellspacing='0px' border='0'>";

$html .="<thead>";
$html .="<tr>";
$html .="<td>";
$html .="<image src='image/logofinal.png' height='100px;'>";
$html .="</td>";
$html .="<td  style='padding-left:20px;padding-top:50px' colspan='3'>";
$html .="<strong><h1 style='color:#8A0808'>FACTURA</h1></strong>";
$html .="</td>";
$html .="</tr>";
$html .="<tr>";
$html .="<td width='30%'>";
$html .="<strong><span>".$datosEstablecimiento[0]["nomrest"]."</strong></span>";
$html .="<strong><br><span>Direccion:</strong>&nbsp;Cra 2 # 12-31</span>";
$html .="<strong><span><br>Ciudad:</strong>&nbsp;Zipaquira</span>";
$html .="<strong><span><br>Telefono:</strong>&nbsp;3217183135</span>";
$html .="<strong><span><br>Nit:</strong>&nbsp;&nbsp;".$datosEstablecimiento[0]["nit"]."</span>";
$html .="</td>";
$html .="<td align='center' colspan='3'>";
$html .="<strong><span>Fecha:</strong>&nbsp;20/09/2016</span>";
$html .="<strong><span><br>Factura #:</strong>&nbsp;7655</span>";
$html .="</td>";
$html .="</tr>";
$html .="</thead>";
$html .="<tr>";
$html .="<td class='txtbold'>Descripcion</td>";
$html .="<td align='center' class='txtbold'>Cantidad</td>";
$html .="<td class='txtbold' align='center'>Precio Unitario</td>";
$html .="<td class='txtbold' align='center'>Total</td>";
$html .="</tr>";

	$subTotal = 0;
	for($i=0;$i<count($datosFacturaImpri);$i++){
		$subTotal += $datosFacturaImpri[$i]["valor"];
		$html .="<tr>";
		$html .="<td  width='50%'>".$datosFacturaImpri[$i]["nomprd"]."</td>";
		$html .="<td align='center'>".$datosFacturaImpri[$i]["candeft"]."</td>"; 
		$html .="<td align='center' width='20%'>$".$datosFacturaImpri[$i]["valor_unitario"]."</td>";
		$html .="<td align='center' width='20%'>$".$datosFacturaImpri[$i]["valor"]."</td>";
		$html .="</tr>";
	}
	$html .="<tr>";
	$html .="<td colspan='4'>";
	$html .="<strong>subTotal:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$subTotal</strong>";
	$html .="</td>";
	$html .="</tr>";
	$html .="<tr>";
	$html .="<td><textarea></textarea></td>";
	$html .="</tr>";
$html .="</table>";



$html .="</center></div>";
$html .="</body>";

echo $html;
echo "<script type='text/javascript'>window.print();</script>";

?>