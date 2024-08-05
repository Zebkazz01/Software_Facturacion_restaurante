<?php
include ("controlador/cordc.php");
include ("modelo/configuracion.php");
ini_set('memory_limit', '512M');
require_once 'dompdf/autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$dtconf = $obj->selconf();

$html = "<head>";
$html .="<style type='text/css'>";
$html .="html {";
$html .="margin: 0;";
$html .="}";
$html .="body {";
$html .="font-family: 'Arial', 'Verdana';";
$html .="margin: 8mm 8mm 2mm 8mm;";
$html .="}";
$html .="td {";
$html .="font-family: 'Arial', 'Verdana';";
$html .="font-size: 9px;";
$html .="}";
$html .="</style>";


$html .="</head>";
$html .="<body>";
$html .="<div align='center' style='float: left;'>";

$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><img src='".$url.$dtconf[0]["logocon"]."' width='210px'><br>Nit: ".$dtconf[0]["nit"]."<br>Regimen Simplificado<br>".$dtconf[0]["dircon"]."<br>Telefono: ";
if($dtconf[0]["mostel"]==1)
	$html .= $dtconf[0]["telcon"]." ";
if($dtconf[0]["moscel"]==1)
	$html .= $dtconf[0]["celcon"];
$html .= "</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><strong>Orden de Compra No. ".$data1[0]['noord']."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left' colspan='2'>Fecha: ".$data1[0]['fecord']."</td>";
$html .= "<td align='right'><strong><big>&nbsp;</big></strong></td></tr>";

//p.dirpro, p.telpro, p.emailpro, p.contpro, p.codubi, u.nomubi

$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' class='txtbold'><u>Datos del Proveedor</u></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' width='80px'>Nit</td>";
$html .= "<td class='txt' width='140px'>".$data1[0]['nonitpro']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Razon Social</td>";
$html .= "<td class='txt'>".$data1[0]['razsocpro']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Direcci&oacute;n</td>";
$html .= "<td class='txt'>".$data1[0]['dirpro']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Ciudad</td>";
$html .= "<td class='txt'>".$data1[0]['nomubi']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Tel&eacute;fono</td>";
$html .= "<td class='txt'>".$data1[0]['telpro']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>E-mail</td>";
$html .= "<td class='txt'>".$data1[0]['emailpro']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";

$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td colspan='4' class='txtbold' align='center'><strong>Detalle</strong></td></tr>";
$html .= "<tr><td class='txtbold' align='center'><u>Materia</u></td><td class='txtbold' align='center'><u>VlrU.</u></td><td class='txtbold' align='center'><u>Cant.</u></td><td class='txtbold' align='center'><u>Total</u></td></tr>";
//d.nodeto, d.noord, d.idmat, d.candeto
for($we=0;$we<count($dadft);$we++){
	$html .= "<tr>";
	$html .= "<td class='txt' width='73px'>".$dadft[$we]['nommatp']."</td>";
	$html .= "<td class='txt' align='right' width='45px'> $".number_format($dadft[$we]['vlrmatp'], 0, ',', '.')."</td>";
	$html .= "<td class='txt' align='right' width='45px'> $".$dadft[$we]['candeto']."</td>";
	$html .= "<td class='txt' align='right' width='57px'> $".number_format($dadft[$we]['vlrmatp']*$dadft[$we]['candeto'], 0, ',', '.')."</td>";
	$html .= "</tr>";
}
    $html .= "<tr>";
        $html .= "<td class='txtbold'>&nbsp;</td>";
        $html .= "<td class='txtbold'>&nbsp;</td>";
        $html .= "<td class='txtbold'><strong>TOTAL</strong></td>";
        $html .= "<td class='txtbold' align='right'><strong><big>$".number_format($datdftot[0]['total'], 0, ',', '.')."</big></strong></td>";
    $html .= "</tr>";
$html .= "<tr><td colspan='4' align='center'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='4' align='center'>GRACIAS POR PREFERIRNOS!</td></tr>";
$html .="</table>";


$html .="</div>";
$html .="</body>";

if($pdf=="ok"){
	/*echo $html;*/
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new DOMPDF($options);
	$paper_size = array(0,0,225,500);
	$dompdf->setPaper($paper_size);
	$dompdf->loadHtml($html); 
	$dompdf->render(); 
	$dompdf->stream("OrdenCompra".$data1[0]['noord'].".pdf");
}else{
	echo $html;
	echo "<script type='text/javascript'>window.print();</script>";
}
?>