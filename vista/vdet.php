<script type="text/javascript">
    prod = new Array();
    pnco = new Array();
    function registra(v,n){
        prod.push(v);
        pnco.push(n);
        mostrar();
    }
    function mostrar(){
        var tb;
        //var arv = prod.toString();
        var micapa = document.getElementById('id_fact');
        var controles='<input type="hidden" value="'+prod.length+'" name="cant" /><br>';
        for(i=0;i<prod.length;i++){
            tb = document.getElementById("titbtn"+pnco[i]).innerHTML;
            controles = controles+'<div class="txtdiv"><div class="txtf1"><button style="border:none" onclick="eliarr('+prod[i]+');"><i class="fa-duotone fa-circle-xmark fa_tae"></i></button><input type="hidden" value="'+prod[i]+'" name="option'+i+'" />'+tb+'</div><div class="txtf2"><input type="button" value="-" onclick="aucr('+i+');"><input type="number" class="txtf3" value="'+1+'" id="cnt'+i+'" name="cnt'+i+'" min="1" max="99" /><input type="button" value="+"  onclick="aucs('+i+');"></div></div>';
        }
        micapa.innerHTML = controles;
        //alert(arv);
    }

    function eliarr(n){
        var t = n.toString();
        var index = prod.indexOf(t);
        //alert(n+" - "+t+" - "+index);
        if (index > -1) {
            prod.splice(index, 1);
            pnco.splice(index, 1);
        }
        mostrar();
    }
    function aucs(n){
        va = document.getElementById("cnt"+n).value;
        if (parseInt(va) > -1 && parseInt(va) < 99){
            document.getElementById("cnt"+n).value = parseInt(va)+parseInt(1);
        }else{
            document.getElementById("cnt"+n).value = 99;
        }
    }
    function aucr(n){
        va = document.getElementById("cnt"+n).value;
        if (parseInt(va) > 0 && parseInt(va) < 100){
            document.getElementById("cnt"+n).value = parseInt(va)-parseInt(1);
        }else{
            document.getElementById("cnt"+n).value = 0;
        }
    }
    function setFocus(){
        //document.getElementById("nloc").focus();
    }
</script>

<?php include ("controlador/cfac.php"); ?>
<body onload="setFocus()">
<div class="cenfact">
    <?php 
    $nbto = 0;
    if($datctg){
    for($ctg=0;$ctg<count($datctg);$ctg++){
        echo "<h2>".$datctg[$ctg]["nomcat"]."</h2><hr width='98%'><br>";
        $obj->setCodcat($datctg[$ctg]["codcat"]);
        $datpro = $obj->produ();
        if($datpro){
        for($prd=0;$prd<count($datpro);$prd++){
            $nfcp= $data1[0]["nofact"]; 
            $cpcp=$datpro[$prd]["codprod"];
        ?>
            <!--
            <button type="submit" class="btnfac" onclick="window.location='home.php?pg=1032&datfac=<?php echo $nfcp; ?>&codprod=<?php echo $cpcp; ?>';">
            -->
            <button type="submit" class="btnfac" onclick='registra(this.value,<?php echo $nbto; ?>);' value="<?php echo $cpcp; ?>">
                <p id="titbtn<?php echo $nbto; ?>"><?php echo $datpro[$prd]["nomprd"]; ?></p>
                <?php echo "$ ".number_format($datpro[$prd]["vlrprd"], 0, ',', '.'); ?>
            </button>
    <?php
        $nbto++; 
        } }
    } }?>

</div>
<div class="derfact">
<br>
<!--
<form name="frmfa" action="home.php?pg=1031&imfac=<?php echo $nfcp; ?>" method="post">
-->
<form name="frmfa" action="home.php?pg=1032&datfac=<?php echo $nfcp; ?>" method="post">
<table class="tabla_det" align="right" border="0">
    <tr>
        <td colspan="3"><h2 align="center">FACTURA No. <?php echo $data1[0]["nofact"]; ?><br><br /></h2></td>
    </tr>
    <tr>
        <td class="txtbold" colspan="2" align="right">Fecha: <?php echo $data1[0]["fecfac"]; ?></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td class="txtbold" colspan="3">Pago:&nbsp;&nbsp;
            <select name="fpago"  style="width: 40px;">
                <option selected="selected">DB</option>
                <option>CR</option>
            </select>
            &nbsp;&nbsp;No. Vo:&nbsp;&nbsp;&nbsp;<input class="colinp" type="text" name="nvoucher" maxlength=12 style="width: 100px; border:none; border-radius:5px;">
        </td>
    </tr>
    <tr>
        <td colspan="2" class="txtbold">No. Mesa:</td>
        <td colspan="2"><?php echo $data1[0]["nmesa"]; ?>
<!--
            <input type="text" id="nloc" name="nloc" maxlength=3 style="width: 40px;">--></td>
    </tr>
    <tr><td colspan="3" class="txtbold">&nbsp;</td></tr>
    <tr><td colspan="3" class="txtbold"><u>Detalle</u></td></tr>

    <?php 
        if($dadft){
    for($we=0;$we<count($dadft);$we++){ ?>
        <tr>
            <td class="txt" width="20px"><?php echo $dadft[$we]["candeft"]; ?></td>
            <td class="txt" width="160px"><?php echo $dadft[$we]["nomprd"]; ?></td>
            <td class="txt" align="right" width="120px"><?php echo "$".number_format($dadft[$we]["topr"], 0, ',', '.'); ?></td>
            <td><a href="home.php?pg=1031&datfac=<?php echo $data1[0]["nofact"]; ?>&nodetf=<?php echo $dadft[$we]["nodetf"]; ?>"><i class="fa-duotone fa-circle-xmark fa_tae" style="font-size:1.7rem; padding-left:5px;"></i></A></td>
        </tr>
    <?php } }?>
    <tr>
        <td colspan="2" class="txtbold">TOTAL</td>
        <td class="txtbold" align="right"><big><?php echo "$".number_format($datdftot[0]["total"], 0, ',', '.'); ?></big></td>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="3"><div id="id_fact"></div></td>
    </tr>
    <tr><td align="right" colspan="2">
            <input type="hidden" name="datfac" value="<?php echo $datfac; ?>">
            <big><strong>
                <input type="submit" name="btnest" class="btnfact" value="Solicitar">
            </strong></big>
        </td><td colspan="2" align="right">
            <small><small>
                <a href="home.php?pg=1031&imfac=<?php echo $nfcp; ?>&btnest=Imprimir"><input class="btnfact" type="button" name="btnest" value="Imprimir"></a>
            </small></small>
        </td></tr>
    <tr><td colspan="3">&nbsp;</td></tr>
    <tr>
        <td colspan="3" class="txtbold"><u>Datos del Cliente</u></td>
    </tr>
    <tr>
        <td class="txtbold">C&eacute;dula</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["nodoccli"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">Nombre</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["nomcli"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">Direcci&oacute;n</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["dircli"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">Ciudad</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["nomubi"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">Tel&eacute;fono</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["telcli"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">E-mail</td>
        <td colspan="2" class="txt"><?php echo $data1[0]["emacli"]; ?></td>
    </tr>
    <tr>
        <td class="txtbold">Cajero:</td>
        <td colspan="2" class="txt"><small><?php echo $data1[0]["nomemp"]; ?></small></td>
    </tr>
    <tr><td colspan="3">&nbsp;</td></tr>
</table>
</form>
</div>
<br /><br />
</body>