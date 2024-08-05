<script type="text/javascript">

function RecargarCuidades(value){
		//alert ("Si llega acá "+value);
		var parametros = {
			"valor" : value
		};
		$.ajax({
			data:  parametros,
			url:   'miscript.php',
			type:  'post',
			success:  function (response) {
				$("#reloadMunicipio").html(response);
			}
		});
	}
</script>

<?php include ("controlador/cpro.php"); ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">PROVEEDOR</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Proveedor" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <?php if($pr){ ?>
    <div class="form-group">
        <label class="txtbold">No. Proveedor</label>
        <input type="number" class="form-control" name="noidepro" value="<?php if($pr) echo $data1[0]["noidepro"]; ?>" <?php if($pr) echo "readonly"; ?> required />
        <?php
            if ($pr)
                echo "<input name='actu' type='hidden' value='actu' />";
        ?>
    </div>
    <?php } ?>
    <div class="form-group">  
        <label class="txtbold">Nit</label>
        <input type="number" class="form-control" name="nonitpro" value="<?php if($pr) echo $data1[0]["nonitpro"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Raz&oacute;n Social</label>
        <input type="text" class="form-control" name="razsocpro" value="<?php if($pr) echo $data1[0]["razsocpro"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Contacto</label>
        <input type="text" class="form-control" name="contpro" value="<?php if($pr) echo $data1[0]["contpro"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Direcci&oacute;n</label>
        <input type="text" class="form-control" name="dirpro" value="<?php if($pr) echo $data1[0]["dirpro"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Tel&eacute;fono</label>
        <input type="number" class="form-control" name="telpro" value="<?php if($pr) echo $data1[0]["telpro"] ?>" />
    </div>
    <div class="form-group">  
        <label class="txtbold">E-mail</label>
        <input type="email" class="form-control" name="emailpro" value="<?php if($pr) echo $data1[0]["emailpro"] ?>" />
    </div>
    <div class="form-group">  
        <label class="txtbold">Departamento </label>
        <select name="codubi" class="form-control" onChange="javascript:RecargarCuidades(this.value);">
            <option selected value="0">Seleccione Departamento</option>
                <?php if($depto){
         for($x=0;$x<count($depto);$x++){ ?>
                <option <?php if($pr && $data1[0]['codubi']==$depto[$x]["codubi"]) echo "selected"; ?> value="<?php echo $depto[$x]["codubi"]; ?>"><?php echo $depto[$x]["nomubi"]; ?></option>
            <?php } } ?>
        </select>
    </div>
    <div class="form-group">  
        <label class="txtbold">Ciudad</label>
        <div id="reloadMunicipio">
            <select class="form-control" name="codubi" id="id_estado">
                <option value="0"> Seleccione Municipio</option>
                <?php if($pr){ ?>
                <option value="<?php echo $data1[0]['codubi']; ?>" selected="selected"><?php echo $data1[0]['codubi']." - ".$data1[0]['nomubi']; ?></option>
                <?php } ?>

            </select>
        </div>
    </div>

    <div class="form-group">
   <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
        <input type="reset" class="btn btn-warning pull-right" value="<?php if($pr) echo "Cancelar"; else echo "Limpiar"; ?>" <?php if($pr) echo "onclick='window.history.back();';"; ?> /> 
    </div>

    <br /><br />
</form>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

    <div align="center"> 
        <table width="100%"> 
            <tr>
                <td>
                    <form id="formfil" name="formfil" method="GET" action="home.php" class="txtbold">
                    <div class="seacrheta">
                        <i class="fa-duotone fa-magnifying-glass busc" title="Buscar"></i>
                            <input name="pg" type="hidden" value="<?php echo $pg; ?>" />
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Raz&oacute;n Social" onChange="this.form.submit();">
                    </div>
                    </form>
                </td>
                <td align="right" valign="bottom">
                    <?php
                        $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
                           $pa->spag($conp,$nreg,$pg,$bo); 
                        $data = $obj->buscar($filtro, $pa->rvalini(), $pa->rvalfin());
                    ?>
                </td>
            </tr>
        </table>
    </div>
<br>
    <table border=0 cellpadding="5px" align="center" class="table table-hover">
        <tr>
            <th id="esquina1" >Proveedor </th>
            <th id="esquina2" >Opciones  </th>
        </tr>
        <?php if($data){
        for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td><strong>No. Proveedor: </strong><?php echo $data[$x]['noidepro']; ?><br>
                <strong>No. NIT: </strong><?php echo $data[$x]['nonitpro']; ?><br>
                <strong>Contacto: </strong><?php echo $data[$x]['contpro']; ?><br>
                <strong>Razon social: </strong><?php echo $data[$x]['razsocpro']; ?><br>
                <strong>Telefono: </strong><?php echo $data[$x]['telpro']; ?><br>
                <strong>Ciudad: </strong><?php echo $data[$x]['nomubi'] ?><br>
                <strong>Direccion: </strong><?php echo $data[$x]['dirpro']; ?><br>
                <strong>E-mail: </strong><?php echo $data[$x]['emailpro'] ?></td>
            <td align="center">
                <a title="Eliminar proveedor" href="home.php?del=<?php echo $data[$x]['noidepro'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class='fa-duotone fa-trash fa_tae'></i></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a title="Actualizar proveedor" href="home.php?pr=<?php echo $data[$x]['noidepro'] ?>&pg=<?php echo $pg; ?>"><i class='fa-duotone fa-pen-to-square fa_taa'></i>
            </td>
        </tr>
        <?php } }else{
         echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
        } ?>
           <tr>
            <th id="esquina3" >Proveedor </th>
            <th id="esquina4" >Opciones  </th>
        </tr>
    </table>

        </div>
    </div>
</div>