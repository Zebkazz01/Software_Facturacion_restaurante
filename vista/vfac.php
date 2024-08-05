<script type="text/javascript">

function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
</script>

<?php include ("controlador/cfac.php"); ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">FACTURAS</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Facturas" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <div class="form-group">  
        <label class="txtbold">Fecha</label>
        <input type="datetime" class="form-control" name="fecfac" value="<?php echo $fecnocie; ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Cliente</label>
        <select name="noidecli" class="form-control">            
            <?php 
            if($data4){
                for($q=0;$q<count($data4);$q++){ ?>
                    <option value="<?php echo $data4[$q]["noidecli"]; ?>"><?php echo $data4[$q]["nodoccli"]." - ".$data4[$q]["nomcli"]; ?></option>
            <?php } }?>
        </select>
    </div>
    <label class="txtbold">Mesas</label>
    <div class="form-group">
        <?php for($r=0;$r<=$mesas;$r++){ ?>
            <div class="form-group">
                <input type="submit" name="nmesa" class="btn btn-warning pull-left" style="margin-right: 5px;width: 42px;" value="<?php echo $r; ?>" />
            </div>
        <?php } ?>
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
                        $data = $obj->buscar($data3[0]["nocie"], $filtro, $pa->rvalini(), $pa->rvalfin());
                    ?>
                </td>
            </tr>
        </table>
    </div>
<br>
    <table border="0" cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th id="esquina1">Datos</th>
                <th>Total</th>
                <th>Estado</th>
                <th id="esquina2">Opciones</th>
            </tr>
        </thead>
        <?php 
            if($data){
            for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td>No. mesa: <?php echo $data[$x]['nmesa']; ?><br>
            Nombre mesero: <?php echo $data[$x]['nomemp']; ?></td>
        <?php
            $obj->setNofact($data[$x]['nofact']);
            $dtf = $obj->seldfTot();
        ?>
            <td><?php echo "$".number_format($dtf[0]['total'], 0, ',', '.'); ?></td>
            <td>
                <?php if($data[$x]['estado']==1){
                    echo "<i class='fa-duotone fa-message-plus fa_taa' title='Nuevo Pedido'><i/>";
                }else if($data[$x]['estado']==2){
                    echo "<i class='fa-duotone fa-calendar-clock fa_tae' title='Solicitado' ></i>";
                }else if($data[$x]['estado']==3){
                    echo "<i class='fa-duotone fa-plate-utensils fa_tae' title='Entregado' style='color:#008000;'></i>";
                }else if($data[$x]['estado']==4){
                    echo "<i class='fa-duotone fa-sack-dollar fa_tae' style='color:#008000;' title='Pagado'></i>";
                } ?>
            </td>
            <td>
                <a style="padding-right:10px; padding-left:10px;" href="home.php?datfac=<?php echo $data[$x]['nofact']; ?>&pg=1032"><i class='fa-duotone fa-pen-to-square fa_taa' title="Editar"></i></a>
                    <?php
                    $ipd = isset($_SESSION["idper"]) ? $_SESSION["idper"]:NULL;
                    if ($ipd==1){?>
                        <a href="home.php?del=<?php echo $data[$x]['nofact']; ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class='fa-duotone fa-trash fa_tae' title="Eliminar"></i></a>
                    <?php } ?>
                <a style="padding-right:10px;" title="Imprimir en pantalla" href="home.php?pg=1031&imfac=<?php echo $data[$x]['nofact']; ?>&pdf=ok">
                <i class="fa-duotone fa-print fa_tap"></i></a>
                <a title="Imprimir en nueva pestaña" href="home.php?pg=1031&imfac=<?php echo $data[$x]['nofact']; ?>">
                <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>
            </td>
        </tr>
        <?php } }else{
            echo "<h3>No se encuentran resultados referentes a la busqueda.</h3>";
        }?>
          <tfoot>
            <tr>
                <th id="esquina3">Datos</th>
                <th>Total</th>
                <th>Estado</th>
                <th id="esquina4">Opciones</th>
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>

<?php
    if($imfac && !$pdf){
        //echo "<script type='text/javascript'>window.location='vpdffac.php?datfac=".$imfac."';</script>";
        echo "<script type='text/javascript'>abrirVentana('vpdffacim.php?datfac=".$imfac."');</script>";
        
    }else if($imfac && $pdf=="ok"){
        //echo "<script type='text/javascript'>window.location='vpdffac.php?datfac=".$imfac."';</script>";
        echo "<script type='text/javascript'>window.location='vpdffacim.php?datfac=".$imfac."&pdf=ok';</script>";
    }
?>