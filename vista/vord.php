<?php include ("controlador/cordc.php"); ?>


<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">ORDEN DE COMPRA No. <?php if($datord) echo $data1[0]["noord"]; ?></h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Orden de compra" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<table class="table">
    <tr><td>
        <label class="txtbold">Fecha: </label>
    </td><td colspan="3">
        <?php if($datord) echo $data1[0]["fecord"] ?>
    </td></tr>
    <tr><td>
        <label class="txtbold">Nit: </label>
    </td><td>
        <?php if($datord) echo $data1[0]["nonitpro"] ?>
    </td><td>
        <label class="txtbold">Raz&oacute;n Social: </label>
    </td><td>
        <?php if($datord) echo $data1[0]["razsocpro"] ?>
    </td></tr>
    <tr><td>
        <label class="txtbold">Direcci&oacute;n: </label>
    </td><td>
        <?php if($datord) echo $data1[0]["dirpro"]." ".$data1[0]["nomubi"]; ?>
    </td><td>
        <label class="txtbold">Tel&eacute;fono: </label>
    </td><td>
        <?php if($datord) echo $data1[0]["telpro"] ?>
    </td></tr>
    <tr><td>
        <label class="txtbold">E-mail: </label>
    </td><td colspan="3">
        <?php if($datord) echo $data1[0]["emailpro"] ?>
    </td></tr>
</table>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 align="center">AGREGAR MATERIA PRIMA</h2>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=1051" method="post">
    <div class="form-group">  
        <label class="txtbold">Materia Prima</label>
        <select name="idmat" class="form-control" required>
            <?php for($cc=0;$cc<count($datcat);$cc++){ ?>
            <option value="<?php echo $datcat[$cc]["idmat"]; ?>"><?php echo $datcat[$cc]["nommatp"]." - $ ".$datcat[$cc]["vlrmatp"]; ?></option>
            <?php } ?>
        </select>
        <input name='datord' type='hidden' value='<?php if($datord) echo $data1[0]["noord"]; ?>' />
    </div>
    <div class="form-group">  
        <label class="txtbold">Cantidad</label>
        <input type="number" class="form-control" name="candeto" value="<?php if($pr) echo $data1[0]["candeto"] ?>" min="1" max="10000" required />
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

    <table border="0" cellpadding="5px" align="center" class="table table-hover">
        <tr>
            <th style="text-align: center;">Nombre Producto</th>
            <th style="text-align: center;"><span class="txtbold">Cantidad</span></th>
            <th style="text-align: center;">Valor Unitario</th>
            <th style="text-align: center;">Valor Total</th>
            <th>&nbsp;</th>
        </tr>
        <?php 
        if($dadft){
        for($x=0;$x<count($dadft);$x++){ ?>
        <tr>
            <td><?php echo $dadft[$x]['nommatp']; ?></td>
            <td style="text-align: center;"><?php echo $dadft[$x]['candeto']; ?></td>
            <td align="right"><?php echo "$".number_format($dadft[$x]['vlrmatp'], 0, ',', '.'); ?></td>
            <td align="right"><?php echo "$".number_format(($dadft[$x]['vlrmatp']*$dadft[$x]['candeto']), 0, ',', '.'); ?></td>
            <td align="center"><a href="home.php?delord=<?php echo $dadft[$x]['nodeto'] ?>&datord=<?php echo $data1[0]["noord"]; ?>&pg=1051" onClick="return confirm('¿Desea eliminar?');"><img src="image/arma.png"></a>
            </td>
        </tr>
        <?php } }?>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td class="txtbold" style="text-align: right;"><big>TOTAL A PAGAR</big></td>
            <td class="txtbold" style="text-align: right;"><big>
                <?php echo "$".number_format($datdftot[0]['total'], 0, ',', '.'); ?></big>
            </td>
            <td></td>
        </tr>
    </table>

        </div>
    </div>
</div>