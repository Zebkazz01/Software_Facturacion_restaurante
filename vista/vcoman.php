<?php include("controlador/ccoman.php"); ?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
<?php 
echo $html=" ";
if($tipe){ 
		$html.='<script type="text/javascript">';
		$html.='setTimeout("location.reload(true)",10000);';
			$html.='function recar(n){';
				$html.="window.location='index.php?pg=1090&tipe=".$tipe."&nofac='+n;";
			$html.='}';
		$html.='</script>';
	}else{ 
		$html.='<script type="text/javascript">';
		$html.='setTimeout("location.reload(true)",10000);';
			$html.='function recar(n){';
				$html.="window.location='index.php?pg=1090&nofac='+n;";
			$html.='}';
		$html.='</script>';
	} 
	echo $html;
?>
	
<div class="container" style="width: 100%;">
	<div class="panel panel-default">
		<div class="panel-heading" id="panel_color">
			<h2 class="tit_comanda" >
				<?php if(!$tipe){
						echo "<i class='fa-solid fa-house-flag'></i>&nbsp;&nbsp;COMANDA GENERAL<style>#panel_color{background-color:#8f171f;}</style>";
					}else if($tipe==1){
						echo "<i class='fa-solid fa-plate-wheat'></i>&nbsp;&nbsp;COMANDA DE PLATOS<style>#panel_color{background-color:rgb(56, 197, 103);}</style>";
					}else if($tipe==5){
						echo "<i class='fa-solid fa-wine-glass'></i>&nbsp;&nbsp;COMANDA DE BEBIDAS<style>#panel_color{background-color:rgb(214, 113, 30);}</style>";} ?>  </h2><div class="cierre_com"><a href="index.php"><i class="fa-solid fa-circle-xmark" style="font-size:2.5rem; Color:#fff;"></i></a>
					</div>
				</div>
		<div class="panel-body">
			<!--
			<form name="frm1" action="index.php?pg=<?php echo $pg; ?>" method="post">
			-->

<?php if($datfac){
	for($i=0;$i<count($datfac);$i++){

		echo "<div class='pedi'>";

		echo "<button class='btnpe' name='nofac' value='".$datfac[$i]["nofact"]."'"; 
		if(!$tipe or $tipe==1) echo " onclick='recar(".$datfac[$i]["nofact"].");'";
		echo "><center>";

		echo "<table><tr><td>&nbsp;</td></tr><tr>";
		echo "<td class='titped'>Mesa: ".$datfac[$i]["nmesa"]."</td>";
		echo "<td class='titp2'>Fact: ".$datfac[$i]["nofact"]."</td></tr>";
		echo "<tr><td>&nbsp;Plato</td></tr>";
		$obj->setNofact($datfac[$i]["nofact"]);
		
		$dtfac = $obj->seldft();
		if($dtfac){
			for($j=0;$j<count($dtfac);$j++){
				//d.nodetf, d.candeft, d.nofact, d.codprod, p.nomprd, p.vlrprd
				echo "<tr>";
				//echo "<td>".$dtfac[$j]["codprod"]."</td>";
				echo "<td class='conped'>".$dtfac[$j]["nomprd"]."</td>";
				echo "<td class='conped' align='center'>".$dtfac[$j]["candeft"]."</td>";
				echo "</tr>";
			}
		}else{
			echo "<tr>";
				//echo "<td>".$dtfac[$j]["codprod"]."</td>";
				
				echo "<td class='conped' align='center'>Solo bebidas</td>";
				echo "</tr>";
		}
		echo "<tr><td>&nbsp;</td></tr>";
		echo "<tr>";
		echo "<td colspan='2' align='right'><small>Fecha: ".$datfac[$i]["fecfac"]."</small></td>";
		echo "</tr><tr><td>&nbsp;</td></tr></table>";

		echo "</center></button>";

		echo "</div>";
	}}

?>
<!--
			</form>
-->
		</div>
	</div>
</div>


				
	