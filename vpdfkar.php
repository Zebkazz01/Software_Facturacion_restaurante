<?php
include ("controlador/cinv.php");
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
$html .= "<td colspan='2' align='center'><img src='".$dtconf[0]["logocon"]."' width='210px'><br>Nit: ".$dtconf[0]["nit"]."<br>Regimen Simplificado<br>";
if($pdf=="ok"){
	$html .= utf8_decode($dtconf[0]["dircon"]);
}else{
	$html .= $dtconf[0]["dircon"];
}
$html .= "<br>Telefono: ";
if($dtconf[0]["mostel"]==1)
	$html .= $dtconf[0]["telcon"]." ";
if($dtconf[0]["moscel"]==1)
	$html .= $dtconf[0]["celcon"];
$html .= "</td>";
$html .= "</tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .= "<tr>";
$html .= "<td colspan='2' align='center'><strong>Kardex No. ".$data1[0]['idkardex']."</strong></td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left' colspan='2'>Fecha Inicial: ".$data1[0]['fecini']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left' colspan='2'>Fecha Final: ".$data1[0]['fecfin']."</td>";
$html .= "</tr>";
$html .= "<tr>";
$html .= "<td class='txtbold' align='left'>Cant. Ent: ".number_format($datTe[0]['tot'], 0, ',', '.')."</td>";
$html .= "<td class='txtbold' align='left'>Cant. Sal: ".number_format($datTs[0]['tot'], 0, ',', '.')."</td></tr>";
$html .= "<tr>";
$html .= "<td>&nbsp;</td>";
$html .= "<td class='txtbold' align='left'><strong>Cant. Exi: ".number_format($datTe[0]['tot']-$datTs[0]['tot'], 0, ',', '.')."</strong></td></tr>";
$html .= "<tr><td colspan='2'>&nbsp;</td></tr>";
$html .="</table>";


$html .= "<table width='220px' border='0' cellpadding='0' cellspacing='0'>";
$html .= "<tr><td colspan='5' class='txtbold' align='center'><strong>Detalle</strong></td></tr>";
$html .= "<tr><td class='txtbold' align='center'><u>Id</u></td><td class='txtbold' align='center'><u>Materia</u></td><td class='txtbold' align='center'><u>Ent</u></td><td class='txtbold' align='center'><u>Sal</u></td><td class='txtbold' align='center'><u>Exis.</u></td></tr>";
//d.nodeto, d.noord, d.idmat, d.candeto
if($dadft){for($we=0;$we<count($dadft);$we++){
	$html .= "<tr>";
	$html .= "<td class='txt' width='15px'>".$dadft[$we]['idmat']."</td>";
	$html .= "<td class='txt' width='85px'>".$dadft[$we]['nommatp']."</td>";
	$obj->setIdmat($dadft[$we]['idmat']);
	$obj->setIdkardex($data1[0]["idkardex"]);
	$obj->setTipo('E');
$cent = $obj->seltcan();
$obj->setTipo('S');
$csal = $obj->seltcan();
$cexi = $cent-$csal;

	$html .= "<td class='txt' align='center' width='40px'>".number_format($cent[0]['cant'], 0, ',', '.')."</td>";
	$html .= "<td class='txt' align='center' width='40px'>".number_format($csal[0]['cant'], 0, ',', '.')."</td>";
	$html .= "<td class='txt' align='center' width='40px'><strong>".number_format($cexi, 0, ',', '.')."</strong></td>";
	$html .= "</tr>";
	$com = $obj->selcomen($dadft[$we]['idmat'], $data1[0]["idkardex"],2);
	$html .= "<tr><td colspan='5'>";
	$html .= $com;
	$html .= "</td></tr>";
} }
$html .= "<tr><td colspan='5' align='center'>&nbsp;</td></tr>";
$html .= "<tr><td colspan='5' align='center'>GRACIAS POR PREFERIRNOS!</td></tr>";
$html .="</table>";


$html .="</div>";
$html .="</body>";

if($pdf=="ok"){
	/*echo $html;*/
	$options = new Options();
	$options->set('isRemoteEnabled', TRUE);
	$dompdf = new DOMPDF($options); 
	$paper_size = array(0,0,225,500);
	$dompdf->set_paper($paper_size);
	$dompdf->load_html($html); 
	$dompdf->render(); 
	$dompdf->stream("Kardex".$data1[0]['idkardex'].".pdf");
}else{
	echo $html;
	echo "<script type='text/javascript'>window.print();</script>";
}
?>