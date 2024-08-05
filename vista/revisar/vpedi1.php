<?php include("controlador/cpedi1.php");?>

<script type="text/javascript">

	function button(codprod){
		alert(codprod);
		document.getElementById('formfact').submit();
	}	

	/*
	function menos(codprod,vlrprd,codprodBD){
		var cantidad1 = document.getElementById('cantidad'+codprod).innerHTML;
		var cantidad = parseInt(cantidad1)-1;
		document.getElementById('cantidad'+codprod).innerHTML=cantidad;
		document.getElementById("cantidadPost"+codprod).value=cantidad;
		var valor = vlrprd*cantidad;
		document.getElementById("valor"+codprod).innerHTML = "$"+valor;
	}	

	function mas(codprod,vlrprd,codprodBD){
		//alert("d");
		var cantidad1 = document.getElementById('cantidad'+codprod).innerHTML;
		var cantidad = parseInt(cantidad1)+1;
		document.getElementById('cantidad'+codprod).innerHTML=cantidad;
		document.getElementById("cantidadPost"+codprod).value=cantidad;
		var valor = vlrprd*cantidad;
		document.getElementById("valor"+codprod).innerHTML = "$"+valor;
	}
	*/	

	function enviarForm(){
		document.getElementById('formfact').submit();
	}

	function iniciarPagina(){
		//document.getElementById("mas").click();
		mas();
	}
</script>


<div class="col-md-6 col-md-offset-3" style="width: 60%;">
	<div class="panel panel-default"><?php
			date_default_timezone_set('America/Bogota');
			$ano = date('D d/m/y/');
			print_r($ano);
			/*
			$hoy = getdate();
			print_r($hoy);*/
			 ?>
		<div class="panel-heading" align="center"><h3>MENU MESERO</h3></div>
			<div class="panel-body">
			<form action="home.php?pg=<?php echo $pg; ?>&codfact=<?php echo $codfact ?>&mod=<?php echo $codfact ?>" method="POST" id="formfact" nam="formfact">
				<?php for($i=0;$i<count($selDetFact);$i++){ ?>
					<input type="hidden" name="cantidadPost<?php echo $i ?>" id="cantidadPost<?php echo $i ?>">
				<?php } ?>
				<?php if($codfact){ echo "<input type='hidden' name='codfactPost' value='".$codfact."'>";} ?>
				<?php if($codprod){ echo "<input type='hidden' name='codprodPost' value='".$codprod."'>";} ?>
					<table class="table table-hover" border="0">
					<?php if($_SESSION["idper"] == 1){ ?>
					<tr>
						<td>
							<span>Cliente</span>
							<select class="form-control" name="clienteFact" id="clienteFact">
								<?php for($m=0;$m<count($clienteFactura);$m++){ ?>
								<option value="<?php echo $clienteFactura[$m]["noidecli"] ?>"><?php echo $clienteFactura[$m]["nomcli"] ?></option>
								<?php } ?>
							</select>
						</td>
					</tr>
					<?php } ?>
					<?php for($i=0;$i<count($categoria);$i++){ ?>	
						<tr>
							<td>
								<center>
									<span aling="center"><strong><?php echo $categoria[$i]["nombre"]?></strong></span>
								</center>
									<?php for($j=0;$j<count($datosProducto);$j++){ 
										if($datosProducto[$j]["codcat"]==$categoria[$i]["codcat"]){
									?>
										<td>
											<a href="home.php?pg=<?php echo $pg; ?>&codfact=<?php echo $codfact ?>&codprod=<?php echo $datosProducto[$j]["codprod"] ?>&mod=<?php echo $datosProducto[$j]["codprod"] ?>">
											<input type="button" style="background-color: #E18216;margin:0px;margin-bottom: 10px;width: 100%;color:white;" value="<?php echo $datosProducto[$j]["nomprd"]?>">
											</input>
											</a>
										</td>
									<?php } }?>
							</td>
						</tr>
					<?php } ?>
				  </table>
			  </form>
			</div>
	</div>
</div>		
<div class="col-md-6 col-md-offset-3" style="width: 30%;">
	<div class="panel panel-default" >
		<div class="panel-heading" style="background-color: black;color:white;" align="center"><h3>Tu Orden:</h3>
		<!--<a href="home.php?pg=<?php echo $pg ?>&codfact="<?php echo $codfact ?>"&eliminar="w" ">-->
		<img src="image/trash.png"></a></div>
		<div class="panel-body" style="background-color: gray;">
				<strong><p >Total a:</p></strong>
				<?php for($i=0;$i<count($selDetFact);$i++){ ?>
				<div id="pedido" style="background-color: white;margin:0px;margin-bottom: 10px;"  name="pedido">
						<table border="0" width="100%">
						<tr>
							<td width="35%">
								<p id="pedi" style="font-size: 11px;"><?php echo $selDetFact[$i]["nomprd"] ?></p>
							</td>
							<td>
							<form action="home.php?pg=<?php echo $pg; ?>&codfact=<?php echo $codfact ?>&mod=<?php echo $codfact; ?>"" method="post">
								<input type="hidden" name="codfactura" id="codfactura" value="<?php echo $selDetFact[$i]["nofact"] ?>">
								<input type="hidden" name="codProdHidden" id="codProdHidden" value="<?php echo $selDetFact[$i]["codprod"] ?>">
								<input type="hidden" name="menos" id="menos" value="1">
								<input type="submit" value="-"/>
							</form>
							</td>
							<td>
							<?php if($mod){ ?>
								<strong><span id="cantidad<?php echo $i ?>" name="cantidad<?php echo $i ?>"><?php echo $selDetFact[$i]["candeft"] ?></span></strong>&nbsp;&nbsp;
								<?php }else{ ?>
								<strong><span id="cantidad<?php echo $i ?>" name="cantidad<?php echo $i ?>">1</span></strong>&nbsp;&nbsp;
								<?php } ?>
							</td>
							<td>
								<form action="home.php?pg=<?php echo $pg; ?>&codfact=<?php echo $codfact ?>&mod=<?php echo $codfact; ?>" method="post">
								<input type="hidden" name="codfactura" id="codfactura" value="<?php echo $selDetFact[$i]["nofact"] ?>">
								<input type="hidden" name="codProdHidden" id="codProdHidden" value="<?php echo $selDetFact[$i]["codprod"] ?>">
								<input type="hidden" name="mas" id="mas" value="1">
								<input type="submit" value="+">
								</form>
							</td>
							<td width="15%">
								<a href="home.php?pg=<?php echo $pg ?>&codfact=<?php echo $codfact ?>&elim=<?php echo $selDetFact[$i]["codprod"] ?>&mod=<?php echo $codfact ?>" style="margin-right: 0px"><img src="image/trash.png"></a>
							</td>
						</tr>
						</table>
				</div>
				<?php } ?>
				<div>
					<center>
						<input type="button" onclick="enviarForm()" Style="background-color:blue;width:100px;height:40px;color:white" value="Solicitar">
					</center>
				</div>
		</div>
	</div>
</div>		
