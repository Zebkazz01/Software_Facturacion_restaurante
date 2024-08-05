<?php include("controlador/cmedia.php"); ?>

<script type="text/javascript">
	function button(codprod){
		if(document.getElementById("producto"+codprod).click()){
			alert("click"+codprod);
		}
	}	
</script>

<div class="col-md-6 col-md-offset-3">
<lr>
	<div class="panel panel-default">
		<div class="panel-heading" align="center" id="Cabe_cont"><h3>MENU DEL DIA</h3>
			<a href="videos.php?pg=<?=$pg;?>&nom=Menu del dia" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
		</div>
			<div class="panel-body">
			<form action="home.php?pg=<?php echo $pg; ?>" method="POST">
			<?php if($tipo){ echo "<input type='hidden' name='parametro' value='".$tipo."'>";} ?>
				<div class="centropunto" align="center">
					<?php
					 for($m=0;$m<count($categoria);$m++){ ?>
						<a href="home.php?pg=<?php echo $pg; ?>&tipo=<?php echo $categoria[$m]["codcat"] ?>"><input  type="button" name="tipoParametro" value="<?php echo $categoria[$m]["nombre"]; ?>"/></a>
					<?php } ?>
				</div>
				<br>
				<table class="table table-hover" border="0">
					<tr style="text-align: center;" >
						<td rowspan="1">
							<strong><span>Añadir Al Menu</span></strong>
						</td>
					</tr>
					<input type="hidden" name="numProdxCate" value="<?php echo count($catexprod) ?>"/>
					<?php for($j=0;$j<count($catexprod);$j++){?>
						<tr style="text-align: center;">
							<td>
								<input type="checkbox" name="check<?php echo $j ?>"  id="check<?php echo $j ?>" value="<?php echo $catexprod[$j]["codprod"]?>">
							</td>									
							<td>
								<?php echo $catexprod[$j]["nomprd"]?>
							</td>
						</tr>
						<?php } ?>
				</table>
				<input type="submit" value="Añadir Productos al Menu">
			</form>	
			</div>
	</div>
</div>	

<script type="text/javascript">

</script>			