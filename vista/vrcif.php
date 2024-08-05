<script type="text/javascript">

function abrirVentana(url) {
    window.open(url, "nuevo", "directories=no, location=no, menubar=no, scrollbars=yes, statusbar=no, tittlebar=no, width=800, height=600");
}
</script>

<?php include ("controlador/crcif.php"); ?>


<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 align="center">REPORTE POR FECHAS</h2>
        </div>
        <div class="panel-body">

<div align="center">
<table width="100%" >
<tr>
    <td>
        <form id="formfil" name="formfil" method="GET" nocieion="home.php" class="txtbold">
            <input name="pg" type="hidden" value="<?php echo $pg; ?>" />

        <table width="100%" >
        <tr>
            <td style="padding-right:15px;">
            <select name="filtro" onChange="this.form.submit();"  class="form-control" style="font-size: 12px;">
                <option value="0">Seleccione Fecha inicial</option>
                <?php for($e=0;$e<count($data3);$e++){ ?>
                <option value="<?php echo $data3[$e]["fecinicie"]; ?>" <?php if($filtro==$data3[$e]["fecinicie"]) echo "SELECTED"; ?>><?php echo $data3[$e]["nocie"]." - ".$data3[$e]["fecinicie"]; ?></option>
                <?php } ?>
            </select>
            </td><td>
            <select name="filtro1" onChange="this.form.submit();"  class="form-control" style="font-size: 12px;">
                <option value="0">Seleccione Fecha final</option>
                <?php for($e=0;$e<count($data3);$e++){ ?>
                <option value="<?php echo $data3[$e]["fecfincie"]; ?>" <?php if($filtro1==$data3[$e]["fecfincie"]) echo "SELECTED"; ?>><?php echo $data3[$e]["nocie"]." - ".$data3[$e]["fecfincie"]; ?></option>
                <?php } ?>
            </select>
            </td>
        </tr>
        </table>
        </form>
    </td>
    <td align="right" valign="bottom">
        <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' /><input type='hidden' name='filtro1' value='".$filtro1."' />";
               $pa->spag($conp,$nreg,$pg,$bo); 
            //$data = $obj->buscar($data3[0]["nocie"], $filtro, $pa->rvalini(), $pa->rvalfin());
               $data = $obj->buscar($filtro, $filtro1, $pa->rvalini(), $pa->rvalfin());
               $dataT = $obj->buscart($filtro, $filtro1);
        ?>
    </td>
</tr>
<tr>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
</tr>
<tr>
    <td align="center">&nbsp;</td>
    <td align="right">&nbsp;</td>
</tr>
<tr>
    <td align="center">&nbsp;</td>
    <td align="right">
        <a href="home.php?pg=1014&filtro=<?php echo $filtro; ?>&filtro1=<?php echo $filtro1; ?>&pdf=ok">
        <i class="fa-duotone fa-print fa_tap"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="home.php?pg=1014&filtro=<?php echo $filtro; ?>&filtro1=<?php echo $filtro1; ?>">
        <i class="fa-duotone fa-file-powerpoint fa_tae"></i></a>
    </td>
</tr>
</table>
</div>
<br>
<form name="form2" nocieion="" method="get">
    <div align="center" id="tabint">
	<table border=0 cellpadding="5px" align="center" class="table table-hover">
        <thead>
            <tr>
                <th align="center" id="esquina1">Fecha</th>
                <th align="center">Gastos</th>
                <th align="center" id="esquina2">Total Facturas</th>
            </tr>
        </thead>
        <?php for($x=0;$x<count($data);$x++){ ?>
        <tr>
        	<td><strong>No. factura:</strong> <?php echo $data[$x]['nocie']; ?><br>
                <strong> Fecha Inicio: </strong><?php echo $data[$x]['fecinicie']; ?><br>
                <strong> Fecha Fin: </strong><?php echo $data[$x]['fecfincie']; ?></td>
            <td><strong> Valor base: </strong><?php echo "$".number_format($data[$x]['basecie'], 0, ',', '.'); ?><br>
                <strong> Gastos totales: </strong><?php echo "$".number_format($data[$x]['gasto'], 0, ',', '.'); ?></td>
            <td><strong> Total facturas: </strong><?php echo "$".number_format($data[$x]['totalcie'], 0, ',', '.'); ?><br>
                <strong> Efectivo caja: </strong><?php echo "$".number_format($data[$x]['efeccie'], 0, ',', '.'); ?><br>
                <strong> Total cierre: </strong><?php echo "$".number_format($data[$x]['Tcie'], 0, ',', '.'); ?><br>
                <strong> Diferencia: </strong><?php echo "$".number_format($data[$x]['Tdif'], 0, ',', '.'); ?></td>
        </tr>
        <?php } ?>
        <tr style="background-color:#c17575;">
            <td><H1>Total Reporte</H1></td>
            <td><strong>Base total: </strong><?php echo "$".number_format($dataT[0]['Base'], 0, ',', '.'); ?><br>
                <strong>Gatos totales: </strong><?php echo "$".number_format($dataT[0]['Gast'], 0, ',', '.'); ?></td>
            <td><strong>Total facturas: </strong><?php echo "$".number_format($dataT[0]['Efct'], 0, ',', '.'); ?><br>
                <strong>Total Efectivo caja: </strong><?php echo "$".number_format($dataT[0]['tdin'], 0, ',', '.'); ?><br>
                <strong>Total cierres: </strong><?php echo "$".number_format($dataT[0]['Tcie'], 0, ',', '.'); ?><br>
                <strong>Total diferencias: </strong><?php echo "$".number_format($dataT[0]['Tdif'], 0, ',', '.'); ?></td>
        </tr>
        <tfoot>
            <tr>
                <!-- <th align="center" id="esquina3">No. Cierre</th> -->
                <th align="center" id="esquina3">Fecha</th>
                <th align="center">Gastos</th>
                <th align="center" id="esquina4">Total Facturas</th>
            </tr>
        </tfoot>
    </table>
        </div>

</form>

        </div>
    </div>
</div>
<?php
    if($filtro && $filtro1 && !$pdf){
        //echo "<script type='text/javascript'>alert('Hola bb1');</script>";
        echo "<script type='text/javascript'>abrirVentana('vpdfrcie.php?datcfi=".$filtro."&datcff=".$filtro1."');</script>";
    }else if($filtro && $filtro1 && $pdf=="ok"){
        //echo "<script type='text/javascript'>alert('Hola bb2');</script>";
        echo "<script type='text/javascript'>window.location='vpdfrcie.php?datcfi=".$filtro."&datcff=".$filtro1."&pdf=ok';</script>";
    }
?>