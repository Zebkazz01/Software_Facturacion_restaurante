<?php include ("controlador/ccat.php"); ?>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">CATEGOR&Iacute;A</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Cataegoria" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <?php if ($pr){ ?>
    <div class="form-group">
        <label class="txtbold">C&oacute;digo</label>
        <input type="number" class="form-control" name="codcat" value="<?php if($pr) echo $data1[0]["codcat"]; ?>" <?php if($pr) echo "readonly"; ?> required />
        <?php
            if ($pr)
                echo "<input name='actu' type='hidden' value='actu' />";
        ?>
    </div>
    <?php } ?>
    <div class="form-group">  
        <label class="txtbold">Categor&iacute;a</label>
        <input type="text" class="form-control" name="nomcat" value="<?php if($pr) echo $data1[0]["nomcat"] ?>" required />
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
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Nombre Categor&iacute;a" onChange="this.form.submit();">
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
        <thead>
            <tr>
                <th align="center" id="esquina1">C&oacute;digo</th>
                <th align="center">Categor&iacute;a</th>
                <th align="center" id="esquina2">Opciones</th>
            </tr>
        </thead>
        
        <?php if($data){
             for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td><?php echo $data[$x]['codcat'] ?></td>
            <td><?php echo $data[$x]['nomcat'] ?></td>
            <td align="center">
                <a href="home.php?del=<?php echo $data[$x]['codcat'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');">
                <i class="fa-duotone fa-trash fa_tae"></i></a>
                &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="home.php?pr=<?php echo $data[$x]['codcat']; ?>&pg=<?php echo $pg; ?>">
                <i class="fa-duotone fa-pen-to-square fa_taa"></i></a>
            </td>
        </tr>
        <?php } } else {
          echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
         }?>
        <tfoot>
            <tr>
                <th align="center" id="esquina3">C&oacute;digo</th>
                <th align="center">Categor&iacute;a</th>
                <th align="center" id="esquina4">Opciones</th>  
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>