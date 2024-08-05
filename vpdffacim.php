<?php
include ("controlador/cfac.php");
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
$html .= "<tr>";
$html .= "<td colspan='2' align='center'>Cajero: ".$data1[0]['nomemp']."</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><strong>FACTURA No. ".$data1[0]['nofact']."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha: ".$data1[0]['fecfac']."</td>";
$html .= "<td align='right'><strong><big>No. Mesa: ".$data1[0]['nmesa']."</big></strong></td></tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' class='txtbold'><u>Datos del Cliente</u></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' width='80px'>C&eacute;dula</td>";
$html .= "<td class='txt' width='140px'>".$data1[0]['nodoccli']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Nombre</td>";
$html .= "<td class='txt'>".$data1[0]['nomcli']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Direcci&oacute;n</td>";
$html .= "<td class='txt'>".$data1[0]['dircli']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Ciudad</td>";
$html .= "<td class='txt'>".$data1[0]['nomubi']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Tel&eacute;fono</td>";
$html .= "<td class='txt'>".$data1[0]['telcli']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>E-mail</td>";
$html .= "<td class='txt'>".$data1[0]['emacli']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold'>Cajero:</td>";
$html .= "<td class='txt'><small>".$data1[0]['nomemp']."</small></td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";


$html .= "<tr><td>Pago: ".$data1[0]['fpago']."</td><td>";
if($data1[0]['fpago']=="CR")
	$html .= "No. ".$data1[0]['nvoucher'];
$html .= "</td></tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";

$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td colspan='2' class='txtbold'><u>Detalle</u></td></tr>";
if($dadft){
for($we=0;$we<count($dadft);$we++){
	$html .= "<tr>";
	$html .= "<td class='txt' width='20px'>".$dadft[$we]['candeft']."</td>";
	$html .= "<td class='txt' width='120px'>".$dadft[$we]['nomprd']."</td>";
	$html .= "<td class='txt' align='right' width='80px'> $".number_format($dadft[$we]['topr'], 0, ',', '.')."</td>";
	$html .= "</tr>";
}
}
    $html .= "<tr>";
        $html .= "<td colspan='2' class='txtbold'><strong>TOTAL</strong></td>";
        $html .= "<td class='txtbold' align='right'><strong><big>$".number_format($datdftot[0]['total'], 0, ',', '.')."</big></strong></td>";
    $html .= "</tr>";
$html .= "<tr><td colspan='3' align='center'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='3' align='center'>GRACIAS POR PREFERIRNOS!</td></tr>";
$html .="</table>";
/*
$html .="----------------------------------------";

$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><strong>FACTURA No. ".$data1[0]['nofact']."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha: ".$data1[0]['fecfac']."</td>";
$html .= "<td align='right'><strong><big>No. Localizador: ".$data1[0]['nloc']."</big></strong></td></tr>";
//$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";
$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td colspan='2' class='txtbold'><u>Detalle</u></td></tr>";
for($we=0;$we<count($dadft);$we++){
	$html .= "<tr>";
	$html .= "<td class='txt' width='140px'>".$dadft[$we]['nomprd']."</td>";
	$html .= "<td class='txt' align='right' width='80px'> $".number_format($dadft[$we]['vlrprd'], 0, ',', '.')."</td>";
	$html .= "</tr>";
}
    $html .= "<tr>";
        $html .= "<td class='txtbold'><strong>TOTAL</strong></td>";
        $html .= "<td class='txtbold' align='right'><strong><big>$".number_format($datdftot[0]['total'], 0, ',', '.')."</big></strong></td>";
    $html .= "</tr>";
$html .="</table>";
*/
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
	$dompdf->stream("Factura_".$data1[0]['nofact'].".pdf");
}else{
	echo $html;
	echo "<script type='text/javascript'>window.print();</script>";
}
?>