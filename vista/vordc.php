<script type="text/javascript">

function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
</script>

<?php include("controlador/cordc.php") ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">ORDEN DE COMPRA</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Orden de compra" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <div class="form-group">  
        <label class="txtbold">Fecha</label>
        <input type="datetime" class="form-control" name="fecord" value="<?php echo $fecnocie; ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Proveedor</label>
        <select name="noidepro" class="form-control">
            <?php for($q=0;$q<count($data4);$q++){ ?>
                <option value="<?php echo $data4[$q]["noidepro"]; ?>"><?php echo $data4[$q]["nonitpro"]." - ".$data4[$q]["razsocpro"]; ?></option>
            <?php } ?>
        </select>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="Crear" />
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
                        <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="AAAA-MM-DD Fecha Inicio sin hora" onChange="this.form.submit();">
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
    <table border="0" cellpadding="5px" align="center" class="table table-hover">
        <tr>
            <th id="esquina1">Proveedor</th>
            <th id="esquina2">Opciones</th>
        </tr>
        <?php 
        if($data){
        for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td><strong>Fecha orden: </strong><?php echo $data[$x]['fecord']; ?><br>
                <strong>Proveedor: </strong><?php echo $data[$x]['razsocpro']; ?><br>
                <?php
                    $dtf = $obj->seldfTot($data[$x]['noord']);
                ?>
            <strong>Total: </strong><?php echo "$".number_format($dtf[0]['total'], 0, ',', '.'); ?></td>
            <td>
                <a title="Descargar factura proveedor" href="home.php?pg=1050&imord=<?php echo $data[$x]['noord']; ?>&pdf=ok">
                <i class="fa-duotone fa-print fa_tap"></i></a>&nbsp;&nbsp;&nbsp;
                <a title="Imprimir factura proveedor" href="home.php?pg=1050&imord=<?php echo $data[$x]['noord']; ?>">
                <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>&nbsp;&nbsp;&nbsp;
                <a title="Actualizar proveedor" href="home.php?datord=<?php echo $data[$x]['noord']; ?>&pg=1051"><i class='fa-duotone fa-pen-to-square fa_taa'></i></a>&nbsp;&nbsp;
                <a title="Eliminar proveedor" href="home.php?del=<?php echo $data[$x]['noord']; ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class='fa-duotone fa-trash fa_tae'></i></a>
            </td>
        </tr>
        <?php } } else{
            echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
           }?>
        <tr>
            <th id="esquina3">Proveedor</th>
            <th id="esquina4">Opciones</th>
        </tr>
    </table>

        </div>
    </div>
</div>

<?php
    if($imord && !$pdf){
        echo "<script type='text/javascript'>abrirVentana('vpdfordim.php?datord=".$imord."');</script>";
        
    }else if($imord && $pdf=="ok"){
        echo "<script type='text/javascript'>window.location='vpdfordim.php?datord=".$imord."&pdf=ok';</script>";
    }
?>