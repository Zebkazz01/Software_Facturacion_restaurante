<?php include ("controlador/cinv.php"); ?>


<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">KARDEX No. <?php if($pr) echo $data1[0]["idkardex"]; ?></h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Cliente" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<table class="table">
    <tr><td>
        <label class="txtbold">Fecha Inicio: </label>
    </td><td>
        <?php if($pr) echo $data1[0]["fecini"]; ?>
    </td><td>
        <label class="txtbold">Fecha Fin: </label>
    </td><td>
        <?php if($pr) echo $data1[0]["fecfin"]; ?>
    </td></tr>
    <tr><td>
        <label class="txtbold">Total Entradas: </label>
    </td><td>
        <?php if($pr) echo number_format($datTe[0]['tot'], 0, ',', '.'); ?>
    </td><td>
        <label class="txtbold">Total Salida: </label>
    </td><td>
        <?php if($pr) echo number_format($datTs[0]['tot'], 0, ',', '.'); ?>
    </td></tr>
    <tr><td>
        &nbsp;
    </td><td>
        &nbsp;
    </td><td>
        <label class="txtbold">Existencias: </label>
    </td><td>
        <?php if($pr) echo number_format($datTe[0]['tot']-$datTs[0]['tot'], 0, ',', '.'); ?>
    </td></tr>
</table>
        </div>
    </div>
</div>

<div class="container">
    <div class="panel panel-default">
        <div class="panel-heading">
            <h2 align="center">AJUSTES</h2>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=1041&pr=<?php echo $data1[0]["idkardex"]; ?>" method="post">
    <div class="form-group">  
        <label class="txtbold">Materia Prima</label>
        <select name="idmat" class="form-control" required>
            <?php for($cc=0;$cc<count($datmtp);$cc++){ ?>
            <option value="<?php echo $datmtp[$cc]["idmat"]; ?>"><?php echo $datmtp[$cc]["nommatp"]." - $ ".$datmtp[$cc]["vlrmatp"]; ?></option>
            <?php } ?>
        </select>
        <input name='idkardex' type='hidden' value='<?php if($pr) echo $data1[0]["idkardex"]; ?>' />
    </div>
    <div class="form-group">  
        <label class="txtbold">Cantidad</label>
        <input type="number" class="form-control" name="cantid" value="" min="1" max="10000" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Tipo</label>
        <select name="tipo" class="form-control" required>
            <option value="S">S - Salida</option>
            <option value="E">E - Entrada</option>
        </select>
    </div>
    <div class="form-group">  
        <label class="txtbold">Motivo del ajuste</label>
        <textarea name="descrip" class="form-control" required placeholder="Ingrese la información necesaria donde indique porque se debe realizar este ajuste."></textarea>
    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="Guardar" />
        <input type="reset" class="btn btn-warning pull-right" value="Limpiar" />
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
            <th style="text-align: center;">Id</th>
            <th style="text-align: center;">Materia Prima</th>
            <th style="text-align: center;">Entradas</th>
            <th style="text-align: center;">Salidas</th>
            <th style="text-align: center;">Existencias (Ent - Sal)</th>
            <th>&nbsp;</th>
        </tr>
        <?php 
        if($dadft){
        for($x=0;$x<count($dadft);$x++){ ?>
        <tr>
            <td style="text-align: center;"><?php echo $dadft[$x]['idmat']; ?></td>
            <td><?php echo $dadft[$x]['nommatp']; ?></td>
            <?php
                $cent = $obj->seltcan($dadft[$x]['idmat'], $data1[0]["idkardex"], 'E');
                $csal = $obj->seltcan($dadft[$x]['idmat'], $data1[0]["idkardex"], 'S');
                $cexi = $cent-$csal;
            ?>
            <td style="text-align: center;"><?php echo $cent; ?></td>
            <td style="text-align: center;"><?php echo $csal; ?></td>
            <td style="text-align: center;"><?php echo $cexi; ?></td>
            <td style="text-align: center;">
                <?php 
                    $desco = $obj->selcomen($dadft[$x]['idmat'],$data1[0]["idkardex"],1);
                if($desco!=""){ ?>
                    <img src="image/comen.png" width="25px"
                title="<?php echo $desco; ?>">
                <?php } ?>
            </td>
<!--            <td align="center"><a href="home.php?delord=<?php //echo $dadft[$x]['nodeto'] ?>&datord=<?php //echo $data1[0]["noord"]; ?>&pg=1051" onClick="return confirm('¿Desea eliminar?');"><img src="image/arma.png"></a>
            </td>   -->
        </tr>
        <?php } }?>
    </table>

        </div>
    </div>
</div>