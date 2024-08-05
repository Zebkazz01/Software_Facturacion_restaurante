<?php include("controlador/cdom.php"); ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">DOMINIOS</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Dominio" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">

<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
	<?php if($pr){ ?>
		<div class="form-group">
	    	<label class="txtbold">C&oacute;digo</label>
	        <input type="number" class="form-control" name="iddom" value="<?php if($pr) echo $data1[0]["iddom"]; ?>" <?php if($pr) echo "readonly"; ?> required />
	        <?php
				if ($pr)
					echo "<input name='actu' type='hidden' value='actu' />";
			?>
	    </div>
	<?php } ?>
    <div class="form-group">  
        <label class="txtbold">Dominio</label>
        <input type="text" class="form-control" name="nomdom" value="<?php if($pr) echo $data1[0]["nomdom"] ?>" required />
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
    </div>
    <br /><br />
</form>
        </div>
    </div>
</div>
<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

<br>
    <table border=0 cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th id="esquina1">C&oacute;digo</th>
                <th >Nombre</th>
                <th id="esquina2">Opciones</th>
            </tr>
        </thead>
        <?php for($x=0;$x<count($data);$x++){ ?>
        <tr>
        	<td><?php echo $data[$x]['iddom'] ?></td>
            <td><?php echo $data[$x]['nomdom'] ?></td>
            <td><a title='Actualizar' href="home.php?pr=<?php echo $data[$x]['iddom']; ?>&pg=<?php echo $pg; ?>"><i class='fa-duotone fa-pen-to-square fa_taa'></i></td>
           <!-- <td align="center"><a href="home.php?del=<?php echo $data[$x]['iddom'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class="menu-icon-e fa fa-trash-o"></i></a></td> -->
        </tr>
        <?php } ?>
        <tfoot>
            <tr>
                <th id="esquina3">C&oacute;digo</th>
                <th >Nombre</th>
                <th id="esquina4">Opciones</th>
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>






<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">VALORES</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Valores" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
	<?php if($pr2){ ?>
	<div class="form-group">
    	<label class="txtbold">C&oacute;digo</label>
        <input type="number" class="form-control" name="codval" value="<?php if($pr2) echo $data3[0]["codval"]; ?>" <?php if($pr2) echo "readonly"; ?> required />
        <?php
			if ($pr2)
				echo "<input name='act2' type='hidden' value='act2' />";
		?>
    </div>
    <?php } ?>
    <div class="form-group">  
        <label class="txtbold">Valor</label>
        <input type="text" class="form-control" name="nom_val" value="<?php if($pr2) echo $data3[0]["nom_val"]; ?>" required />
    </div>
    <div class="form-group">
    	<label class="txtbold">Dominio</label>
        <select name="nomdomv" class="form-control">
		<?php for($n=0;$n<count($data);$n++){ ?>
			<option  value="<?php echo $data[$n]["iddom"]; ?>">
			<?php echo $data[$n]["nomdom"]; ?>
			</option>
		<?php } ?>
		</select>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
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
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Valor o dominio" onChange="this.form.submit();">
                    </div>
                    </form>
                </td>
                <td align="right" valign="bottom">
                    <?php
                        $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
                           $pa->spag($conp,$nreg,$pg,$bo); 
                        $data2 = $obj->buscar($filtro, $pa->rvalini(), $pa->rvalfin());
                    ?>
                </td>
            </tr>
        </table>
    </div>
<br>
    <table border=0 cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th id="esquina1">C&oacute;digo</th>
                <th>Nombre</th>
                <th>Dominio</th>
                <th id="esquina2">Opciones</th>
            </tr>
        <thead>
        <?php if($data2){
            for($x=0;$x<count($data2);$x++){ ?>
            <tr>
                <td> <?php echo $data2[$x]["codval"]; ?></td>
                <td> <?php echo $data2[$x]["nom_val"]; ?></td>
                <td> <?php echo $data2[$x]["nomdom"]; ?></td>
                <td>
                    &nbsp;&nbsp;&nbsp;
                    <a title='Eliminar' href="home.php?pg=<?php echo $pg; ?>&deld2=<?php echo $data2[$x]["codval"]; ?>" onclick="return confirm('Desea eliminar el dominio seleccionado');">
                    <i class='fa-duotone fa-trash fa_tae'></i></span></a>
                    &nbsp;&nbsp;&nbsp;
                    <a title='Actualizar' href="home.php?pg=<?php echo $pg; ?>&pr2=<?php echo $data2[$x]["codval"]; ?>";><i class='fa-duotone fa-pen-to-square fa_taa'></i></span></a>
                </td>
                
            </tr>
            <?php } }else{
         echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";  }?>
        <tfoot>
            <tr>
                <th id="esquina3">C&oacute;digo</th>
                <th>Nombre</th>
                <th>Dominio</th>
                <th id="esquina4">Opciones</th>
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>