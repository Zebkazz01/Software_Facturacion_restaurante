<?php include("controlador/cajus.php") ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">CONFIGURACI&Oacute;N</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Facturas" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
	<div class="form-group">
    	<label class="txtbold">C&oacute;digo</label>
        <input type="number" class="form-control" name="idconf" value="<?php echo $data[0]["idconf"]; ?>" readonly required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Nombre Restaurante</label>
        <input type="text" class="form-control" name="nomrest" value="<?php echo $data[0]["nomrest"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">N&uacute;mero de mesas</label>
        <input type="text" class="form-control" name="nummesas" value="<?php echo $data[0]["nummesas"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Tiempo Actualizaci&oacute;n</label>
        <input type="text" class="form-control" name="tiemact" value="<?php echo $data[0]["tiemact"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Nit</label>
        <input type="text" class="form-control" name="nit" value="<?php echo $data[0]["nit"] ?>" required />
    </div>
    <div class="form-group">
    	<table width="100%"><tr><td width="90%">
	        <label class="txtbold">Direcci&oacute;n</label>
	        <input type="text" class="form-control" name="dircon" value="<?php echo $data[0]["dircon"] ?>" />
	      </td><td width="10%" align="center">
	        <label class="txtbold">Mostrar</label>
	        <input type="checkbox" class="form-control" name="mosdir" <?php if($data[0]["mosdir"]==1) echo "checked"; ?> />
	    </td></tr></table>
    </div>
    <div class="form-group">
    	<table width="100%"><tr><td width="90%">
	        <label class="txtbold">N&uacute;mero Tel&eacute;fono</label>
	        <input type="text" class="form-control" name="telcon" value="<?php echo $data[0]["telcon"] ?>" />
	      </td><td width="10%" align="center">
	        <label class="txtbold">Mostrar</label>
	        <input type="checkbox" class="form-control" name="mostel" <?php if($data[0]["mostel"]==1) echo "checked"; ?> />
	    </td></tr></table>
    </div>
    <div class="form-group">
    	<table width="100%"><tr><td width="90%">
	        <label class="txtbold">N&uacute;mero Celular</label>
	        <input type="text" class="form-control" name="celcon" value="<?php echo $data[0]["celcon"] ?>" />
	      </td><td width="10%" align="center">
	        <label class="txtbold">Mostrar</label>
	        <input type="checkbox" class="form-control" name="moscel" <?php if($data[0]["moscel"]==1) echo "checked"; ?> value="1" />
	    </td></tr></table>
    </div>
    <div class="form-group">
    	<table width="100%"><tr><td width="90%">
	        <label class="txtbold">E-mail</label>
	        <input type="email" class="form-control" name="emacon" value="<?php echo $data[0]["emacon"] ?>" />
	      </td><td width="10%" align="center">
	        <label class="txtbold">Mostrar</label>
	        <input type="checkbox" class="form-control" name="mosema" <?php if($data[0]["mosema"]==1) echo "checked"; ?> />
	    </td></tr></table>
    </div>
	<div class="form-group">  
        <label class="txtbold">Logo del Restaurante (Imagen: 626px x 150px)</label>
        <input type="text" class="form-control" name="logocon" value="<?php echo $data[0]["logocon"] ?>" required />
        <p align="center"><img src="image/logo.png" width="280px"></p>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
    </div>
    <br /><br />
</form>
        </div>
    </div>
</div>