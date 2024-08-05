<?php include("controlador/cacan.php"); ?>

<script type="text/javascript">

$(document).ready(function(){
	var pass1 = $('[name=pass1]');
  	var pass2 = $('[name=pass2]');
	var si = "Las contraseñas si coinciden";
	var no = "No coinciden las contraseñas";
	var span = $('<center><span></span></center>').insertAfter(pass2);
	var b = document.getElementById("boton");

    span.hide();
    function coincidePassword() {
	    var valor1 = pass1.val();
	    var valor2 = pass2.val();
	    span.show().removeClass();
	    if (valor1 != valor2) {
	      span.text(no).addClass('no');
	      
	      b.disabled = true;
	    }
	    if (valor1.length != 0 && valor1 == valor2) {
	      span.text(si).removeClass("no").addClass('si');
	       b.disabled = false;
	    }
  	}
	pass2.keyup(function() {
    coincidePassword();
	});
});


function updfoto(formulario){
	formulario.submit();
}
</script>
<div class="col-md-6 col-md-offset-3">
	<div class="panel panel-default">
		<div class="panel-heading"><h3>Actualiza tus datos</h3></div>
		<div class="panel-body">
		<form name="frmfoto" action="home.php" METHOD="post" enctype="multipart/form-data">
			<div class="form-group" >					
				<div align="center"><img src="<?php echo $data1[0]["foto"]; ?>" width="100px" height="120px" alt="preview" /></div>
				<label for="foto">Cambiar foto</label><br/>	
				<input id="input-file" type="file" class="form-control" onchange="updfoto(this.form)" name="foto" accept=".jpg">	
				<input type="hidden" name="doccan" value="<?php echo $data1[0]["doccan"];?>">		
			</div>
		</form>
		<form name="frmMod" action="home.php" METHOD="post">
			<div class="form-group">
				<label for="doccan">No. Documento</label>
				<input type="text" id="doccan" class="form-control" maxlength="12" onkeypress="return solonum(event);" name="doccan" value="<?php echo $data1[0]["doccan"];?>" required/>
			</div>
			<div class="form-group">
				<label for="nomcan">Nombre</label>
				<input type="text" class="form-control" id="nomcan" name="nomcan" maxlength="35" onkeypress="return sololet(event);" value="<?php echo utf8_encode($data1[0]["nomcan"]);?>" required/>
			</div>
			<div class="form-group">
				<label for="apecan">Apellido</label>
				<input type="text" class="form-control" id="apecan" name="apecan" maxlength="35" onkeypress="return sololet(event);" value="<?php echo utf8_encode($data1[0]["apecan"]);?>" required/>
			</div>
			<div class="form-group">
				<label for="ntarj">No. Tarjeton</label>
				<input type="text" class="form-control" id="ntarj" name="ntarj" maxlength="3" onkeypress="return solonum(event);" value="<?php echo $data1[0]["ntarj"];?>"/>
			</div>
			<div class="form-group">
				<label for="cofi">No. ficha</label>
				<select name="nofic" class="form-control" required>
				<?php for($i=0;$i<count($datfic);$i++){ ?>
					<option <?php if($data1[0]['nofic']==$datfic[$i]["nofic"]) echo "selected"; ?> value="<?php echo $datfic[$i]["nofic"]; ?>"><?php echo $datfic[$i]["nofic"]." - ".utf8_encode($datfic[$i]["nomfic"]); ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="cofi">Tipo Programa</label>
				<select name="tipopro" class="form-control" required>
				<?php for($i=0;$i<count($dattpro);$i++){ ?>
					<option <?php if($data1[0]['tipopro']==$dattpro[$i]["idval"]) echo "selected"; ?> value="<?php echo $dattpro[$i]["idval"]; ?>"><?php echo utf8_encode($dattpro[$i]["nomval"]); ?></option>
				<?php } ?>
				</select>
			</div>
			<div class="form-group">
				<label for="emailsen">E-mail Sena</label>
				<input type="email" class="form-control" maxlength="70" id="emailsen" name="emailsen" value="<?php echo utf8_encode($data1[0]["emailsen"]);?>"/>
			</div>
			<div class="form-group">
				<label for="emailper">E-mail Personal</label>
				<input type="email" class="form-control"  maxlength="70" id="emailper" name="emailper" required value="<?php echo utf8_encode($data1[0]["emailper"]);?>"/>
			</div>
			<div class="form-group">
				<label for="telfij">Tel&eacute;fono Fijo</label>
				<input type="text" class="form-control" id="telfij" name="telfij" maxlength="10" onkeypress="return solonum(event);" value="<?php echo $data1[0]["telfij"];?>"/>
			</div>
			<div class="form-group">
				<label for="telcel">Tel&eacute;fono Celular</label>
				<input type="text" class="form-control" id="telcel" name="telcel" maxlength="10" onkeypress="return solonum(event);" value="<?php echo $data1[0]["telcel"];?>"/>
			</div>
			<div class="form-group">
				<label for="pas1">Contraseña</label>
				<input type="password" class="form-control" id="pas1" name="pass1" value="<?php echo $data1[0]["pass"];?>" required maxlength="70" />
			</div>
			<div class="form-group">
				<label for="pas2">Verifique su contraseña</label>
				<input type="password" class="form-control" id="pas2" name="pass2" value="<?php echo $data1[0]["pass"];?>" required maxlength="70" />
			</div>
			<div class="form-group">
				<input  style="margin-left: 20%;" type="submit" class="btn btn-warning pull-left" id="boton" value="Actualizar"/>
				<a style="margin-right: 20%;" class="btn btn-warning pull-right" href="home.php?pg=1016">Continuar</a>
			</div>
			<br/>
			<br/>
		</FORM>
		</div>
	</div>
</div>