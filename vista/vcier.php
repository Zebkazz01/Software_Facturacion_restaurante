<?php include("controlador/ccier.php");?>

<script type="text/javascript">

	function sacarNumFact(numeroFactura){
		alert(numeroFactura);
		document.getElementById("numeroFactura").value = numeroFactura;
	}

	function abrirVentana(url) {
    	window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
	}

</script>


<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading" align="center" id="Cabe_cont">
			<h3>FACTURACION</h3>
			<a href="videos.php?pg=<?=$pg;?>&nom=Facturacion" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
		</div>
			<div class="panel-body">
				<table border="0" class="table table-hover">
					<thead>
						<th>No Mesa</th>
						<th>Mesero</th>
						<th>Abierta/Cerrada</th>
						<th>Imprimir</th>
					</thead>	
				<?php for($i=0;$i<count($datosFactura);$i++){ ?>
					<tr>
						<td>
							<span><?php echo $datosFactura[$i]["nmesa"]?></span>
						</td>
						<td>
							<span><?php echo $datosFactura[$i]["idem"]?></span>
						</td>
						<td>
						<a href="home.php?pg=<?php echo $pg; ?>&cerrar=<?php echo $datosFactuar[$i]["nofact"] ?>#" data-toggle="modal" data-target="#myModal1<?php echo $datosFactura[$i]["nofact"]?>" onclick="sacarNumFact(<?php echo $datosFactura[$i]["nofact"] ?>)">
							<img src="image/candado.png" id="imagenCandado">
						</a>
						</td>
						<td>
							<a href="home.php?pg=<?php echo $pg; ?>&im=19&nofact=<?php echo $datosFactura[$i]["nofact"]; ?>">
							<i class="fa-solid fa-trash fa_tae"></i>
							</a>
						</td>
					</tr>
				<?php } ?>
				</table>
			</div>
	</div>
</div>

<?php

	if($im){
		 echo "<script type='text/javascript'>abrirVentana('impFact.php?nofact=".$nofact."');</script>";
	}
 ?>				