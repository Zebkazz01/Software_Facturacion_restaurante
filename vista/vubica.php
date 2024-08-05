<?php include ("controlador/cubi.php"); ?>
<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">UBICACI&Oacute;N</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Ubicacion" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
	<div class="form-group">
    	<label class="txtbold">C&oacute;digo</label>
        <input type="number" class="form-control" name="codubi" value="<?php if($pr) echo $data1[0]["codubi"]; ?>" <?php if($pr) echo "readonly"; ?> required />
        <?php
			if ($pr)
				echo "<input name='actu' type='hidden' value='actu' />";
		?>
    </div>  
    <div class="form-group">  
        <label class="txtbold">Ubicaci&oacute;n</label>
        <input type="text" class="form-control" name="nomubi" value="<?php if($pr) echo $data1[0]["nomubi"] ?>" required />
    </div>
    <div class="form-group">
    	<label class="txtbold">Depende</label>
        <select name="depubi" class="form-control">
        <?php for ($x=0;$x<count($depto);$x++){ ?>
        	<option <?php if($pr && $data1[0]['depubi']==$depto[$x]["codubi"]) echo "selected"; ?> value="<?php echo $depto[$x]["codubi"]; ?>"><?php echo $depto[$x]["nomubi"]; ?></option>
        <?php } ?>
        	<option <?php if($pr && $data1[0]['depubi']==0) echo "selected"; ?> value="0">Departamento</option>
        </select>
    </div>
    <div class="form-group">
        <label class="txtbold">Estado</label>
        <select name="estubi" class="form-control">
            <option <?php if($pr && $data1[0]['depubi']==1) echo "selected"; ?> value="1">Activo</option>
            <option <?php if($pr && $data1[0]['depubi']==2) echo "selected"; ?> value="2">Desactivo</option>
        </select>
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
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Nombre Ubicacion" onChange="this.form.submit();">
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
        	<th id="esquina1">C&oacute;digo</th>
            <th >Estado</th>
            <th id="esquina2">Opciones</th>
        </tr>
        <?php 
        if($data){
        for($x=0;$x<count($data);$x++){ ?>
        <tr>
        	<td><strong>Codigo: </strong><?php echo $data[$x]['codubi'] ?><br>
                <strong>Ubicacion: </strong><?php echo $data[$x]['nomubi'] ?><br>
                <strong>Departamento: </strong><?php echo $data[$x]['depto'] ?></td>
            <td>
                <?php if($data[$x]['estubi']==1){ ?>
                    <a  title="Activo"href="home.php?codubi=<?php echo $data[$x]['codubi']; ?>&pg=<?php echo $pg; ?>&op=2">
                    <i class="fa-duotone fa-circle-check fa_tap" style="color:#008000;"></i>
                    </a>
                <?php }else if($data[$x]['estubi']==2){ ?>
                    &nbsp;&nbsp;<a title="Desactivo" href="home.php?codubi=<?php echo $data[$x]['codubi']; ?>&pg=<?php echo $pg; ?>&op=1">
                    <i class="fa-solid fa-circle-xmark fa_tae" style="color:#FF0000;"></i>
                    </a>
                <?php } ?>
            </td>
            <td><a title="Editar ubicaci&oacute;n" href="home.php?pr=<?php echo $data[$x]['codubi']; ?>&pg=<?php echo $pg; ?>"><i class='fa-duotone fa-pen-to-square fa_taa'></i></a></td>
           <!-- <td align="center"><a href="home.php?del=<?php echo $data[$x]['codubi'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class="menu-icon-e fa fa-trash-o"></i></a></td> -->
        </tr>
        <?php } }else{
         echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
        } ?>
        <tr>
        	<th id="esquina3">C&oacute;digo</th>
            <th >Estado</th>
            <th id="esquina4">Opciones</th>
        </tr>
    </table>

        </div>
    </div>
</div>