<script type="text/javascript">

function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
</script>

<?php include ("controlador/ccie.php"); ?>


<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center"><?php if(!$data3){ ?>APERTURA DE TURNO<?php }else{ ?>CIERRE DE TURNO<?php } ?></h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=<?php if(!$data3){ ?>APERTURA DE TURNO<?php }else{ ?>CIERRE DE TURNO<?php } ?>" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">

<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <?php if(!$data3){ ?>
        <div class="form-group">
            <label class="txtbold">Fecha Inicio</label>
            <input type="datetime" name="fecinicie" class="form-control" value="<?php if($pr) echo $data1[0]["fecinicie"]; else echo $fecact; ?>" required />
            <?php
                if ($pr)
                    echo "<input name='actu' type='hidden' value='actu' />";
            ?>
        </div>
        <div class="form-group">
            <label class="txtbold">Valor inicial</label>
            <input type="number" class="form-control" name="basecie" value="<?php if($pr) echo $data1[0]["basecie"]; else echo "0"; ?>" <?php if($pr) echo "readonly"; ?> required />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
            <input type="reset" class="btn btn-warning pull-right" value="<?php if($pr) echo "Cancelar"; else echo "Limpiar"; ?>" <?php if($pr) echo "onclick='window.history.back();';"; ?> />
        </div>
     <?php }else{ ?>
        <div class="form-group" style="width: 33%;float: left;" class="txtbold">
            <label class="txtbold">No. cierre</label>
            <?php
                echo $data3[0]["nocie"];
                echo "<input name='nocie' type='hidden' value='".$data3[0]["nocie"]."' />";
                echo "<input name='actu' type='hidden' value='actu' />";
            ?>
        </div>
        <div class="form-group" style="width: 33%;float: left;">
            <label class="txtbold">Usuario</label>
            <?php echo $data3[0]["idem"]." - ".$data3[0]["nomemp"]; ?>
        </div>
        <div class="form-group" style="width: 33%;float: left;">
            <label class="txtbold">Fecha Inicio</label>
            <?php echo $data3[0]["fecinicie"]; ?>
        </div>
        <div class="form-group">
            <label class="txtbold">Fecha Fin</label>
            <input type="datetime" name="fecfincie" class="form-control" value="<?php echo $fecact; ?>" required />
        </div>
        <div class="form-group">
            <label class="txtbold">Valor inicial</label>
            <?php echo "$ ".$data3[0]["basecie"]; echo "<input name='basecie' type='hidden' value='".$data3[0]["basecie"]."' />"; ?>
        </div>
        <div class="form-group">
            <label class="txtbold">Efectivo</label>
            <input type="text" name="efeccie" class="form-control" value="" required />
        </div>
        <div class="form-group">
            <label class="txtbold">Gasto</label>
            <input type="text" name="gasto" class="form-control" value="" required />
        </div>
        <div class="form-group">
            <label class="txtbold">Descripción del gasto</label>
            <textarea name="descgasto" class="form-control" placeholder="Ingrese las descripci&oacute;n del gasto."></textarea>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
            <input type="reset" class="btn btn-warning pull-right" value="<?php if($pr) echo "Cancelar"; else echo "Limpiar"; ?>" <?php if($pr) echo "onclick='window.history.back();';"; ?> />
        </div>
    <?php } ?>
    <br /><br />
</form>
        </div>
    </div>
</div>


<div class="container">
    <div class="panel panel-default">
        <div class="panel-body">

    <div align="center"> 
        <table width="98%"> 
            <tr>
                <td>
                    <form id="formfil" name="formfil" method="GET" action="home.php" class="txtbold">
                        <div class="seacrheta">
                            <i class="fa-duotone fa-magnifying-glass busc" title="Buscar"></i>
                            <input name="pg" type="hidden" value="<?php echo $pg; ?>" title="Escribe para buscar" />
                            <input type="text" name="filtro" value="<?php echo $filtro;?>" class="form-control colinp" placeholder="AAAA-MM-DD Fecha Inicio sin hora" onChange="this.form.submit();">
                        </div>
                    </form>
                </td>
                <td align="right" valign="bottom">
                    <?php
                        $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
                           $pa->spag($conp,$nreg,$pg,$bo); 
                           
                        $data = $obj->buscar($filtro,$pa->rvalini(),$pa->rvalfin());
                    ?>
                </td>
            </tr>
        </table>
    </div>
<br>
<form name="form2" action="" method="get">
	<table border=0 cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th align="center" id="esquina1">No.</th>
                <th align="center" class="normal__table">Fechas</th>
                <th align="center" class="normal__table">Gastos</th>
                <th align="center" class="normal__table">Total Cierre</th>
                <th align="center" id="esquina2">Opciones</th>
            </tr>
        </thead>
        <tbody>
        <?php if($data){
        for($x=0;$x<count($data);$x++){ ?>
        <tr class="normal__table">
        	<td><?php echo $data[$x]['nocie']; ?></td>
            <td>
                <strong>Fecha incio:</strong><?php echo $data[$x]['fecinicie']; ?><br>
                <strong>Fecha fin: </strong><?php echo $data[$x]['fecfincie']; ?>
            </td>
            <td><strong>Valor base: </strong><?php echo "$ ".number_format($data[$x]['basecie'], 0, ',', '.'); ?><br>
                <strong>Gastos totales: </strong><?php echo "$ ".number_format($data[$x]['gasto'], 0, ',', '.'); ?><br>
                <strong>Total Factura: </strong><?php echo "$ ".number_format($data[$x]['totalcie'], 0, ',', '.'); ?><br>
            </td>
            <td><strong>Efetivo en caja: </strong><?php echo "$ ".number_format($data[$x]['efeccie'], 0, ',', '.'); ?><br>
                <strong>Total Cierre: </strong><?php echo "$ ".number_format($data[$x]['tefec'], 0, ',', '.'); ?><br>
                <strong>Diferencia: </strong><?php echo "$ ".number_format($data[$x]['difer'], 0, ',', '.'); ?></td>
            <td>
            <?php if($data[$x]['act']==1){ ?>
	            <i class="fa-duotone fa-circle-check fa_tap" style="color:#008000;" Title="Activo"></i>
            <?php }else if($data[$x]['act']==2){ ?>
            	<i class="fa-solid fa-circle-xmark fa_tae" style="color:#FF0000;"  Title="Desactivo"></i>
            <?php } ?>
            <?php if($data[$x]['act']==2){ ?>
                <a title="Imprimir en pantalla" href="home.php?pg=<?php echo $pg; ?>&imcie=<?php echo $data[$x]['nocie']; ?>&pdf=ok">
                <i class="fa-duotone fa-print fa_tap"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a title="Imprimir en nueva pestaña" href="home.php?pg=<?php echo $pg; ?>&imcie=<?php echo $data[$x]['nocie']; ?>">
                <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>
            </td>
            <?php } ?>
            <!-- <td align="center"><a href="home.php?pr=<?php //echo $data[$x]['nocie'] ?>&pg=<?php //echo $pg; ?>"><img src="image/pencil.png" height="19px"></a></td>
            <td align="center"><a href="home.php?del=<?php //echo $data[$x]['nocie'] ?>&pg=<?php //echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><img src="image/trash.png" height="19px"></a></td> -->
        </tr>
        <tr class="responsive_tas">
            <td>
                <strong>No. Fact: </strong><?php echo $data[$x]['nocie']; ?><br>
                <strong>Fecha incio:</strong><?php echo $data[$x]['fecinicie']; ?><br>
                <strong>Fecha fin: </strong><?php echo $data[$x]['fecfincie']; ?><br>
                <strong>Valor base: </strong><?php echo "$ ".number_format($data[$x]['basecie'], 0, ',', '.'); ?><br>
                <strong>Gastos totales: </strong><?php echo "$ ".number_format($data[$x]['gasto'], 0, ',', '.'); ?><br>
                <strong>Total Factura: </strong><?php echo "$ ".number_format($data[$x]['totalcie'], 0, ',', '.'); ?><br>
                <strong>Efetivo en caja: </strong><?php echo "$ ".number_format($data[$x]['efeccie'], 0, ',', '.'); ?><br>
                <strong>Total Cierre: </strong><?php echo "$ ".number_format($data[$x]['tefec'], 0, ',', '.'); ?><br>
                <strong>Diferencia: </strong><?php echo "$ ".number_format($data[$x]['difer'], 0, ',', '.'); ?>
            </td>
            <td>
                <?php if($data[$x]['act']==1){ ?>
                    <i class="fa-duotone fa-circle-check fa_tap" style="color:#008000;"></i>
                <?php }else if($data[$x]['act']==2){ ?>
                    &nbsp;<i class="fa-solid fa-circle-xmark fa_tae" style="color:#FF0000;"></i>
                <?php } ?>
                <?php if($data[$x]['act']==2){ ?>
                    <a title="Imprimir en pantalla" href="home.php?pg=<?php echo $pg; ?>&imcie=<?php echo $data[$x]['nocie']; ?>&pdf=ok">
                    <i class="fa-duotone fa-print fa_tap"></i></a>
                    &nbsp;&nbsp;&nbsp;
                    <a title="Imprimir en nueva pestaña" href="home.php?pg=<?php echo $pg; ?>&imcie=<?php echo $data[$x]['nocie']; ?>">
                    <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>
            </td>
            <?php } ?>
        </tr>
        <?php } }else{
         echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
        }?>
        </tbody>
        <tfoot>
        <tr>
                <th align="center" id="esquina3"> No.</th>
                <th align="center" class="normal__table">Fechas</th>
                <th align="center" class="normal__table">Gastos</th>
                <th align="center" class="normal__table">Total Cierre</th>
                <th align="center" id="esquina4"> Opciones</th>
            </tr>
        </tfoot>
    </table>
        </div>
    </div>
</div>
</form>

<?php
    if($imcie && !$pdf){
        //echo "<script type='text/javascript'>alert('Hola bb1');</script>";
        echo "<script type='text/javascript'>abrirVentana('vpdfrep.php?datcie=".$imcie."');</script>";
    }else if($imcie && $pdf=="ok"){
        /*echo "<script type='text/javascript'>alert('Hola bb2');</script>";*/
        echo "<script type='text/javascript'>window.location='vpdfrep.php?datcie=".$imcie."&pdf=ok';</script>";
    }
?>