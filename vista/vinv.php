<script type="text/javascript">

function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
</script>

<?php include ("controlador/cinv.php"); ?>


<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center"><?php if(!$data3){ ?>APERTURA DE KARDEX<?php }else{ ?>CIERRE DE KARDEX<?php } ?></h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=<?php if(!$data3){ ?>APERTURA DE KARDEX<?php }else{ ?>CIERRE DE KARDEX<?php } ?>" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">

<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <?php if(!$data3){ ?>
        <div class="form-group">
            <label class="txtbold">Fecha Inicio</label>
            <input type="datetime" name="fecini" class="form-control" value="<?php if($pr) echo $data1[0]["fecini"]; else echo $fecact; ?>" required />
            <?php
                if ($pr)
                    echo "<input name='actu' type='hidden' value='actu' />";
            ?>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-warning pull-right" value="<?php if($pr) echo "Actualizar"; else echo "Guardar"; ?>" />
            <input type="reset" class="btn btn-warning pull-right" value="<?php if($pr) echo "Cancelar"; else echo "Limpiar"; ?>" <?php if($pr) echo "onclick='window.history.back();';"; ?> />
        </div>
     <?php }else{ ?>
        <div class="form-group" style="width: 33%;float: left;" class="txtbold">
            <label class="txtbold">No. kardex</label>
            <?php
                echo $data3[0]["idkardex"];
                echo "<input name='idkardex' type='hidden' value='".$data3[0]["idkardex"]."' />";
                echo "<input name='actu' type='hidden' value='actu' />";
            ?>
        </div>
        <div class="form-group" style="width: 33%;float: left;">
            <label class="txtbold">Fecha Inicio</label>
            <?php echo $data3[0]["fecini"]; ?>
        </div>
        <div class="form-group">
            <label class="txtbold">Fecha Fin</label>
            <input type="datetime" name="fecfin" class="form-control" value="<?php echo $fecact; ?>" required />
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
        <table width="100%"> 
            <tr>
                <td>
                    <form id="formfil" name="formfil" method="GET" action="home.php" class="txtbold">
                        <div class="seacrheta">
                            <i class="fa-duotone fa-magnifying-glass busc" title="Buscar"></i>
                                <input name="pg" type="hidden" value="<?php echo $pg; ?>" />
                                <input type="text" name="filtro" value="<?php echo $filtro;?>" class="form-control colinp" placeholder="AAAA-MM-DD Fecha Inicio sin hora" onChange="this.form.submit();">
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
<form name="form2" action="" method="get">
	<table border=0 cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th id="esquina1">Fecha</th>
                <th>Can. Entradas</th>
                <th>Can. Salidas</th>
                <th id="esquina2">Opciones</th>
            </tr>
        </thead>
        <?php if($data){
            for($x=0;$x<count($data);$x++){
                $obj->setIdkardex($data[$x]['idkardex']);
                $obj->setTipo('E');
                $datTe = $obj->setott();
                $obj->setTipo('S');
                $datTs = $obj->setott();
        ?>
        <tr>
        	<td><strong>Numero de Kardex: </strong><?php echo $data[$x]['idkardex']; ?><br>
                <strong>Fecha inicio: </strong><?php echo $data[$x]['fecini']; ?><br>
                <strong>Fecha Final: </strong><?php echo $data[$x]['fecfin']; ?></br>
                <h5><strong>Existencias: </strong><?php echo number_format($datTe[0]['tot']-$datTs[0]['tot'], 0, ',', '.'); ?></td></h5>
            <td><?php echo number_format($datTe[0]['tot'], 0, ',', '.'); ?></td>
            <td><?php echo number_format($datTs[0]['tot'], 0, ',', '.'); ?></td>
            
            <td>
            <?php if($data[$x]['act']==1){ ?>
	            <i class="fa-duotone fa-circle-check fa_tap" style="color:#008000;"></i>
            <?php }else if($data[$x]['act']==2){ ?>
            	<i class="fa-solid fa-circle-xmark fa_tae" style="color:#FF0000;"></i>
            <?php } ?>
                <a title="Imprimir en pantalla" href="home.php?pg=<?php echo $pg; ?>&imkar=<?php echo $data[$x]['idkardex']; ?>&pdf=ok">
                <i class="fa-duotone fa-print fa_tap"></i></a>
                &nbsp;&nbsp;&nbsp;
                <a title="Imprimir en nueva pestaña" href="home.php?pg=<?php echo $pg; ?>&imkar=<?php echo $data[$x]['idkardex']; ?>">
                <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>
                &nbsp;&nbsp;&nbsp;
                <?php if($data[$x]['act']==1){ ?>
                <a href="home.php?pr=<?php echo $data[$x]['idkardex'] ?>&pg=1041"><i class='fa-duotone fa-pen-to-square fa_taa'></i></a>
                <?php } ?>
            </td>
<!--            <td align="center"><a href="home.php?del=<?php //echo $data[$x]['idkardex'] ?>&pg=<?php //echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><img src="image/trash.png" height="19px"></a></td>  -->
        </tr>
        <?php } } ?>
        <tfoot>
            <tr>
                <th id="esquina3">Fecha</th>
                <th>Can. Entradas</th>
                <th>Can. Salidas</th>
                <th id="esquina4">Opciones</th>
            </tr>
        </tfoot>
    </table>
        
        </div>
    </div>
</div>
</form>

<?php
    if($imkar && !$pdf){
        //echo "<script type='text/javascript'>alert('Hola bb1');</script>";
        echo "<script type='text/javascript'>abrirVentana('vpdfkar.php?datkar=".$imkar."');</script>";
    }else if($imkar && $pdf=="ok"){
        /*echo "<script type='text/javascript'>alert('Hola bb2');</script>";*/
        echo "<script type='text/javascript'>window.location='vpdfkar.php?datkar=".$imkar."&pdf=ok';</script>";
    }
?>