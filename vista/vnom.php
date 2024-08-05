<?php include("controlador/cnom.php");?>

	<script type="text/javascript">
		function totalaPagar(){
			//alert("entro");
			//parseInt(cantidad1)-1
			//alert(document.getElementById("adelanto").value);
			//alert(document.getElementById("descontarXfallas").value)
			var descuentoTotal = parseInt(document.getElementById("adelanto").value)+parseInt(document.getElementById("descontarXfallas").value);
			var totalPago = parseInt(document.getElementById("salario").value)-descuentoTotal;
			//alert(totalPago);
			document.getElementById("totalPagar").value = totalPago;



		}

		function descontarFallas(salario){
			var salarioDia = salario/30;
			//alert("salarioDia"+salarioDia);
			var diasNoAsistidos = document.getElementById("diasNoAsistidos").value;
			//alert("diasNoAsistidos"+diasNoAsistidos);
			var descontarXfallas = diasNoAsistidos*salarioDia;
			document.getElementById("descontarXfallas").value = descontarXfallas;
			//alert("descontarXfallas"+descontarXfallas);
			
		


		}

		function seleccionarEmpleado(campo){
			var parametros={
				"idem1" : campo
			};
             $.ajax({
             	data: parametros,
             	url: 'ajax/controladorVistaNomina.php',
             	type: 'POST',
             	success: function (response){
             		$("#cambiar").html(response);
             	}
             });

		}
        

	</script>

<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-deault">
		<div class="panel-heading" align="center" id="Cabe_cont"><h3>NOMINA</h3>
			<a href="videos.php?pg=<?=$pg;?>&nom=Nomina" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
		</div>
			<form name="formNomina" id="formNomina" action="home.php?pg=<?php echo $pg; ?>" method="POST">
				<?php if($editar){ echo "<input type='hidden' name='act' value='".$editar."'>";} ?>
				<table class="table table-hover" border="1">	
						<tr>
							<td>
								<span>Empleado</span>	
								<select id="idem1" name="idem1" class="form-control" onchange="seleccionarEmpleado(this.value)">
								<option id="null">Seleccionar un empleado</option>
									<?php for($i=0;$i<count($datosEmpleado);$i++){ ?>
										<option value="<?php echo $datosEmpleado[$i]["idem"]?>"><?php echo $datosEmpleado[$i]["nomemp"]?></option>
									<?php } ?>
								</select>
							</td>
							<td>
								<span>Salario base</span>
								<input type="number" name="salario" required="required" onblur="descontarFallas(this.value)" id="salario"  class="form-control"/>
							</td>
						</tr>	
						<tr>
							<td>
								<span>Dias No Asistidos</span>
								<div id="cambiar" name="cambiar">
									<input type="number" name="diasNoAsistidos" disabled="disabled" required="required" maxlength="2" id="diasNoAsistidos"  class="form-control"/>
								</div>
							</td>
							<td>
								<span>Total a descontar por fallas</span>
								<input type="number" disabled=”disabled” name="descontarXfallas" required="required" id="descontarXfallas" class="form-control"/>
							</td>
							
						</tr>
						<tr>
							<td>
								<span>Adelantos</span>
								<input type="number" name="adelanto" required="required" onchange="totalaPagar()" id="adelanto" class="form-control"/>
							</td>
							<td>
								<span>Total a Pagar</span>
								<input type="number" name="totalPagar" id="totalPagar" class="form-control" disabled="disabled">
							</td>
						</tr>
						<tr>
							<td colspan="2">
								<input type="submit" class="btn btn-warning" value="Guardar"  class="form-control"/>
							</td>
						</tr>
				</table>
				<table border="1" class="table table-hover">
				<tr>
					<th>Empleado</th>
					<th>Salario Base</th>
					<th>Dias no asistidos</th>
					<th>Adelantos</th>
					<th>Total a Pagar</th>
					<th>Editar</th>
					<th>Eliminar</th>
				</tr>
				<?php for($i=0;$i<count($datosNomina);$i++){ ?>
					<tr>
						<td>
							<span><?php echo $datosNomina[$i]["nomemp"]?></span>
						</td>
						<td>
							<span><?php echo $datosNomina[$i]["salario"]?></span>
						</td>
						<td>
							<span><?php echo $datosNomina[$i]["asist"]?></span>
						</td>
						<td>
							<span><?php echo $datosNomina[$i]["adelan"]?></span>
						</td>
						<td>
							<span><?php echo $datosNomina[$i]["total"]?></span>
						</td>
						<td>
							<a href="home.php?pg=<?php echo $pg;?>&editar=<?php echo $datosNomina[$i]["idnomi"]?>">
								<img src="image/pluma.png">
							</a>
						</td>
						<td>
							<a href="home.php?pg=<?php echo $pg;?>&elim=<?php echo $datosNomina[$i]["idnomi"]?>#" onclick="return confirm('¿Desea Eliminar Este Dato?')">
								<img src="image/eliminar.png">
							</a>
						</td>
					</tr>		
				<?php } ?>
				</table>
			</form>
		
	</div>
</div>