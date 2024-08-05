<?php
include ("controlador/ccie.php");
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

$html .= "<td colspan='2' align='center'><img src='".$url.$dtconf[0]["logocon"]."' style='width: 210px;'><br>Nit: 19303729-0<br>Regimen Simplificado<br>".$dtconf[0]["dircon"]."<br>Telefono: ";
if($dtconf[0]["mostel"]==1)
	$html .= $dtconf[0]["telcon"]." ";
if($dtconf[0]["moscel"]==1)
	$html .= $dtconf[0]["celcon"];
$html .= "</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><strong>CIERRE No. ".$data1[0]['nocie']."</strong></td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Empleado: </td>";
$html .= "<td class='txtbold' align='left'>".$data1[0]['nomemp']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha Inicial:</td>";
$html .= "<td class='txtbold' align='left'>".$data1[0]['fecinicie']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha Final: </td>";
$html .= "<td class='txtbold' align='left'>".$data1[0]['fecfincie']."</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";
$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Valor Inicial: </td>";
$html .= "<td class='txtbold' align='right'>$</td>";
$html .= "<td class='txtbold' align='right'>".number_format($data1[0]['basecie'], 0, ',', '.')."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Gastos Cierre: </td>";
$html .= "<td class='txtbold' align='right'>$</td>";
$html .= "<td class='txtbold' align='right'>".number_format($data1[0]['gasto'], 0, ',', '.')."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Total Facturas: </td>";
$html .= "<td class='txtbold' align='right'>$</td>";
$html .= "<td class='txtbold' align='right'>".number_format($data1[0]['totalcie'], 0, ',', '.')."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'><strong>TOTAL CIERRE:</strong></td>";
$html .= "<td class='txtbold' align='right'><strong>$</strong></td>";
$html .= "<td class='txtbold' align='right'><strong>".number_format($data1[0]['tefec'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Efectivo en Caja: </td>";
$html .= "<td class='txtbold' align='right'>$</td>";
$html .= "<td class='txtbold' align='right'>".number_format($data1[0]['efeccie'], 0, ',', '.')."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'><strong>Diferencia:</strong></td>";
$html .= "<td class='txtbold' align='right'><strong>$</strong></td>";
$html .= "<td class='txtbold' align='right'><strong>".number_format($data1[0]['difer'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr><td colspan='3'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left' colspan='3'>Descripci&oacute;n Gasto: </td></tr>";
$html .= "<tr><td class='txtbold' align='left' colspan='3'>".$data1[0]['descgasto']."</td>";
$html .= "</tr>";

$html .= "<tr><td colspan='3'>&nbsp;</td></tr>";
$html .="</table>";
$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td colspan='2' class='txtbold' align='center'><strong><u>Facturas del Cierre</u></strong></td></tr>";
$html .= "<tr><td colspan='2' align='center'>&nbsp;</td></tr>";
if($datf1){
	for($we=0;$we<count($datf1);$we++){
		$html .= "<tr>";
		$html .= "<td class='txt' width='140px'>".$datf1[$we]['nofact']." - ".$datf1[$we]['fecfac']."</td>";
		$html .= "<td class='txt' align='right' width='80px'> $".number_format($datf1[$we]['total'], 0, ',', '.')."</td>";
		$html .= "</tr>";
	}
}
$html .= "<tr><td colspan='2' align='center'>-------------------------------------------------------------------------</td></tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'><strong>Total Facturas:</strong></td>";
$html .= "<td class='txtbold' align='right'><strong>$ ".number_format($data1[0]['totalcie'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2' align='center'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='2' align='center'>GRACIAS POR PREFERIRNOS!</td></tr>";

$html .="</table>";
$html .="</div>";
$html .="</body>";

//echo $html;
if($pdf=="ok"){
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new DOMPDF($options);
	$paper_size = array(0,0,225,500);

	$dompdf->loadHtml($html);
	$dompdf->setPaper($paper_size);
	$dompdf->render();
	$dompdf->stream("Cierre_".$data1[0]['nocie'].".pdf");
}else{
	echo $html;
	echo "<script type='text/javascript'>window.print();</script>";
}
?>