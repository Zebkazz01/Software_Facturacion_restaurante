<?php include("controlador/cadm.php"); ?>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading"><h3><?php if ($edi){ echo "Actualizar"; }else{ echo "Ingresar"; } ?> Administradores</h3></div>
		<div class="panel-body">
			<form name="frm1" action="home.php?pg=<?php echo $pg; ?>" method="post">
				<?php if($edi){ ?>
					<div class="form-group">
						<label for="cofi">C&oacute;digo</label>
						<input type="text" class="form-control" id="cofi" name="idadm" value="<?php if($edi) echo $data1[0]["idadm"] ?>" <?php if($edi) echo "readonly"; ?> />
						<input type="hidden" name="act" value="act">
					</div>
				<?php } ?>
					<div class="form-group">
						<label for="cofi">No. Documento</label>
						<input type="text" class="form-control" name="docadm" value="<?php if($edi) echo $data1[0]["docadm"] ?>" required />
					</div>
					<div class="form-group">
						<label for="cofi">Nombre</label>
						<input type="text" class="form-control" name="nomadm" value="<?php if($edi) echo utf8_encode($data1[0]["nomadm"]); ?>" required />
					</div>
					<div class="form-group">
						<label for="cofi">Contrase&ntilde;a</label>
						<input type="password" class="form-control" name="passadm" value="<?php if($edi) echo $data1[0]["passadm"] ?>" required />
					</div>
					<div class="form-group">
							<input type="submit" class="btn btn-warning pull-right" value="<?php if($edi) echo "Actualizar"; else echo "Guardar"; ?>" />
					</div>
					<br/>
					<br/>
			</form>
		</div>
	</div>
</div>


<table border=0 cellpadding="5px" align="center" class="table table-hover">
	<tr>
		<th>C&oacute;digo</th>
		<th>No. Documento</th>
		<th>Nombre</th>
		<th>&nbsp;</th>
		<th>&nbsp;</th>
	</tr>
<?php for($i=0;$i<count($data);$i++){ ?>
	<tr>
		<td><?php echo $data[$i]["idadm"]; ?></td>
		<td><?php echo $data[$i]["docadm"]; ?></td>
		<td><?php echo utf8_encode($data[$i]["nomadm"]); ?></td>
		<td><a href="home.php?pg=<?php echo $pg; ?>&del=<?php echo $data[$i]["idadm"]; ?>" onclick="return confirm('Desea eliminar el registro seleccionado?');"><b style="font-size:1.5em;color:#FFA95A" class="fa fa-trash"></b></a></td>
		<td><a href="home.php?pg=<?php echo $pg; ?>&edi=<?php echo $data[$i]["idadm"]; ?>"><b style="font-size:1.5em;color:#FFA95A" class="fa fa-pencil"></b></a></td>
	</tr>
<?php } ?>
</table>