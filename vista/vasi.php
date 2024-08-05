<?php include("controlador/casi.php"); ?>


<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
	<div class="panel-heading" align="center">
		<h3>REGISTRO DE INASISTENCIA</h3>
		<a href="videos.php?pg=<?=$pg;?>&nom=Registro de Inasistencia" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
	</div>
		<div class="panel-body">
			<form id="formAsis" name="formAsis" action="home.php?pg=<?php echo $pg ?>" method="POST">
				<table border="0" class="table table-hover">
					<tr>
						<td>
							<span>Empleado</span>
							<select name="empleadoAsistencia" id="empleadoAsistencia" required="required" class="form-control">
								<option id="null">Seleccionar Empleado</option>
									<?php for($i=0;$i<count($datosEmpleado);$i++){ ?>
										<option value="<?php echo $datosEmpleado[$i]["idem"]?>"><?php echo $datosEmpleado[$i]["nomemp"]?></option>
									<?php } ?>
							</select>
						</td>
					</tr>
					<tr>
						<td>
							<span>Fecha de la inasistencia</span>
							<input type="date" class="form-control" name="fecha" required="required" id="fecha" placeholder="Introdu‌​ce una fecha" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?> />
						</td>
					</tr>
					<tr>
						<td>
							<span>Observacion</span>
							<textarea class="form-control" name="observacion" placeholder="Observacion de la inasistencia" id="observacion"></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<input type="submit" value="Agregar Inasistencia" class="btn btn-ttc">
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
