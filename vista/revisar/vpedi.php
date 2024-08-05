<?php include("controlador/cpedi.php");?>

<div class="col-md-6 col-md-offset-3" style="width: 70%;">
	<div class="panel panel-default">
			<div class="panel-heading" align="center">
				<h3>Seleccionar Mesa</h3>
			</div>
			<div class="panel-body">
				<?php if(!$nmesas || $nmesas=="null"){ ?>
				<form id="formfactura" name="formfactura" action="home.php?pg=1026" method="POST">
					<table border="0" class="table table-hover">
						<?php  if($nmesas=="null"){ echo "<h5><span Style='color:red'>Para poder hacer un pedido por favor seleccionar el numero de mesa correspondiente al pedido</span></h5>"; } ?>
						<input type="hidden" name="nofact" id="nofact">
							<div class="form-group">
								<tr>
									<td>
										<span>Numero De Mesa</span>
										<select name="nmesas" id="nmesas" class="form-control">
												<option value="null">Seleccione Una Mesa</option>
											<?php for($i=1;$i<=$datosAjus[0]["nummesas"];$i++){ ?>
												<option value="<?php echo $i ?>"><?php echo $i ?></option>
											<?php } ?>
										</select>
									</td>
								</tr>
							</div>
							<tr>
								<td colspan="2">
									<center>
										<input type="submit" value="Seleccionar Mesa"/>
									</center>	
								</td>
							</tr>
					</table>
			    </form>
			    <?php } ?>
			    <?php if($nmesas && $nmesas!="null"){ ?>
					<h2 style="text-align: center"><a href="home.php?pg=1036&codfact=<?php echo $ultimaFactura[0]["nofact"] ?>">Hacer Pedido</a></h2>
				<?php } ?>
			<table border="0" class="table table-hover">
				<tr>
					<th style="text-align: center" colspan="<?php if($_SESSION["idper"]!=3) echo 5 ?>">Pedidos En Proceso A Cargo De <?php echo $_SESSION["nomemp"] ?>  </th>
				</tr>
				<tr>
					<th>Estado</th>
					<th>Numero De Mesa</th>
					<?php if($_SESSION["idper"]!=3){ 
					echo "<th>Mesero Encargado</th>";
					}?>
					<th>Modificar</th>
					<th>Cancelar</th>
				</tr>
				<?php for($m=0;$m<count($facturasAbiertas);$m++){ ?>
						<tr>
							<?php if(($facturasAbiertas[$m]["estado"])==1){ 
							echo "<td>Pedido</td>";
							}else if(($facturasAbiertas[$m]["estado"])==2){
							echo "<td>En Proceso</td>";
							}else{
							echo "<td>Entregado</td>";
							}?>
							<td><?php echo $facturasAbiertas[$m]["nmesa"] ?></td>
							<?php if($_SESSION["idper"]!=3){ ?>
								<td><?php echo $facturasAbiertas[$m]['nomemp']?></td>
							<?php }?>
							<td><a href="home.php?pg=1036&codfact=<?php echo $facturasAbiertas[$m]["nofact"]?>&mod=<?php echo $facturasAbiertas[$m]["nofact"]?>">Modificar Pedido</a></td>
							<td>
							<?php if(($facturasAbiertas[$m]["estado"])!=1){ ?>
							<a href="home.php?pg=1026&elim=<?php echo $facturasAbiertas[$m]["nofact"] ?>#" data-toggle="modal" data-target="#myModal1<?php echo $facturasAbiertas[$m]["nofact"]?>">Cancelar Pedido</a>
							<div class="modal fade" id="myModal1<?php echo $facturasAbiertas[$m]["nofact"];?>" role="dialog">
				              <div class="modal-dialog">
				                	<div class="modal-content">
						                  <div class="modal-header"> 
							                    <div class="modal-body">
							                    <script type="text/javascript">
							                    	function verificarCampo(formulario){
							                    		if(formulario.nota.value == ""){
							                    			alert("Por favor Ingresar Nota credito para Cancelar la factura.");
							                    			return false;
							                    		}else{
							                    			formulario.submit();
							                    			return true;
							                    		}
							                    	}
							                    </script>
							                    <form id="formularioNota" name="formularioNota" action="home.php?pg=1026" method="post" onsubmit="return verificarCampo(this.form);">
							                    	<div class="modal-footer">
							                    	<table border="0">
							                    		<h3>AGREGAR NOTA CREDITO</h3>
							                    		<tr>
							                    			<td align="center">Nota Credito Para la factura</td>
							                    		</tr>
							                    		<tr>
							                    			<td align="center"><textarea id="nota" name="nota" required="required" class="form-control" placeholder="Nota Credito"></textarea>
							                    			<input type="hidden" name="up" value="<?php echo $facturasAbiertas[$m]["nofact"] ?>">
							                    			</td>
							                    		</tr>
							                    	</table>
							                    	   <input type="submit" value="Ingresar Nota">
							                    	</div>
							                    </form>
                    							</div>
						                  </div>
						                  <div class="modal-footer">
				                      <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
				                    </div>
				                    </div>
				                </div>      
			             </div>
			             <?php }else{ ?>
			             <a href="home.php?pg=1026&elim=<?php echo $facturasAbiertas[$m]["nofact"] ?>">Cancelar Pedido</a>
						 <?php } ?>
			             </td>
						</tr>
				<?php } ?>
			</table>
			</div>
	</div>
</div>			