<?php
include ("controlador/crcif.php");
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

/*
SELECT nocie, fecinicie, fecfincie, descgasto, basecie, gasto, totalcie, efeccie, (basecie+totalcie-gasto) AS Tcie, (efeccie-(basecie+totalcie-gasto)) AS Tdif FROM cierre
*/
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
$html .= "<td colspan='2' align='center'><strong>CIERRE</strong></td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha Inicial:</td>";
$html .= "<td class='txtbold' align='left'>".$datcfi."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Fecha Final: </td>";
$html .= "<td class='txtbold' align='left'>".$datcff."</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";

$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td class='txtbold' align='center'><strong>Inicial</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>+</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>T Facturas</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>-</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>Gastos</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>=</strong></td>";
$html .= "<td class='txtbold' align='center'><strong>Total</strong></td></tr>";
for($e=0;$e<count($data1);$e++){
	$html .= "<tr><td class='txtbold' colspan='7'><small>".$data1[$e]['fecinicie']."</small></td></tr>";
	$html .= "<tr>";
	$html .= "<td class='txtbold' align='right'>$".number_format($data1[$e]['basecie'], 0, ',', '.')."</td>";
	$html .= "<td class='txtbold' align='left'>&nbsp;+&nbsp;</td>";
	$html .= "<td class='txtbold' align='right'>$".number_format($data1[$e]['totalcie'], 0, ',', '.')."</td>";
	$html .= "<td class='txtbold' align='left'>&nbsp;-&nbsp;</td>";
	$html .= "<td class='txtbold' align='right'>$".number_format($data1[$e]['gasto'], 0, ',', '.')."</td>";
	$html .= "<td class='txtbold' align='left'>&nbsp;=&nbsp;</td>";
	$html .= "<td class='txtbold' align='right'>$".number_format($data1[$e]['Tcie'], 0, ',', '.')."</td>";
	$html .= "</tr>";
}

$html .= "<tr>";
$html .= "<td class='txtbold' colspan='7' align='right'><strong>____________________________________________</strong></td>";
$html .= "</tr>";

$html .= "<tr>";
$html .= "<td class='txtbold' align='right'><strong>$".number_format($dataT[0]['Base'], 0, ',', '.')."</strong></td>";
$html .= "<td class='txtbold' align='left'><strong>&nbsp;+&nbsp;</td>";
$html .= "<td class='txtbold' align='right'><strong>$".number_format($dataT[0]['tdin'], 0, ',', '.')."</strong></td>";
$html .= "<td class='txtbold' align='left'><strong>&nbsp;-&nbsp;</td>";
$html .= "<td class='txtbold' align='right'><strong>$".number_format($dataT[0]['Gast'], 0, ',', '.')."</strong></td>";
$html .= "<td class='txtbold' align='left'><strong>&nbsp;=&nbsp;</td>";
$html .= "<td class='txtbold' align='right'><strong>$".number_format($dataT[0]['Tcie'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";

$html .= "<tr><td class='txtbold' colspan='7' align='right'>&nbsp;</td></tr>";
$html .= "<tr><td class='txtbold' colspan='7' align='right'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>VALOR INICIAL:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>$".number_format($dataT[0]['Base'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>TOTAL FACTURAS:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;+&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>$".number_format($dataT[0]['tdin'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>GASTOS:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;-&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>$".number_format($dataT[0]['Gast'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='7' align='right'><strong>____________________________________________</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>TOTAL:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>$".number_format($dataT[0]['Tcie'], 0, ',', '.')."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>Efectivo:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;-&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'>$".number_format($dataT[0]['Efct'], 0, ',', '.')."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='7' align='right'><strong>____________________________________________</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' colspan='3'><strong>Diferencia:</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'><strong>&nbsp;&nbsp;</strong></td>";
$html .= "<td class='txtbold' colspan='2' align='right'>$".number_format($dataT[0]['Tdif'], 0, ',', '.')."</td>";
$html .= "</tr>";

$html .= "<tr><td class='txtbold' colspan='7' align='right'>&nbsp;</td></tr>";
$html .= "<tr><td class='txtbold' colspan='7' align='right'>&nbsp;</td></tr>";
$html .= "<tr><td class='txtbold' colspan='7' align='center'><strong>DESCRIPCI&Oacute;N DEL GASTO</strong></td></tr>";
for($e=0;$e<count($data1);$e++){
	$descgasto = isset($data1[$e]['descgasto']) ? $data1[$e]['descgasto']:NULL;
	if($descgasto){
		$html .= "<tr>";
		$html .= "<td class='txtbold' colspan='2'>".$data1[$e]['fecinicie']."</td>";
		$html .= "<td class='txtbold' colspan='5'>".$descgasto."</td>";
		$html .= "</tr>";
	}
}

$html .= "<tr><td colspan='7'>&nbsp;</td></tr>";
$html .="</table>";


$html .="</div>";
$html .="</body>";

//echo $html;
if($pdf=="ok"){
	//echo $html;
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new DOMPDF($options);
	$paper_size = array(0,0,225,500);
	$dompdf->setPaper($paper_size);
	$dompdf->loadHtml($html); 
	$dompdf->render();
	$fec = substr($data1[$e-1]['fecfincie'], 0, 10);
	$dompdf->stream("Cierres_".$fec.".pdf");
}else{
	echo $html;
	echo "<script type='text/javascript'>window.print();</script>";
}
?>