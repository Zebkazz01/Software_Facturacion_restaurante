

<?php include ("controlador/cprd.php"); ?>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">PRODUCTOS</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Productos" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post">
    <?php if($pr){ ?>
    <div class="form-group">
        <label class="txtbold">No. Producto</label>
        <input type="number" class="form-control" name="codprod" value="<?php if($pr) echo $data1[0]["codprod"]; ?>" <?php if($pr) echo "readonly"; ?> required />
        <?php
            if ($pr)
                echo "<input name='actu' type='hidden' value='actu' />";
        ?>
    </div>
    <?php } ?>
    <div class="form-group">  
        <label class="txtbold">Nombre Producto</label>
        <input type="text" class="form-control" name="nomprd" value="<?php if($pr) echo $data1[0]["nomprd"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Valor Unitario</label>
        <input type="text" class="form-control" name="vlrprd" value="<?php if($pr) echo $data1[0]["vlrprd"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Categor&iacute;a</label>
        <select name="codcat" class="form-control" required>
            <?php for($cc=0;$cc<count($datcat);$cc++){ ?>
            <option value="<?php echo $datcat[$cc]["codcat"]; ?>" <?php if($pr && $data1[0]["codcat"]==$datcat[$cc]["codcat"]) echo "SELECTED"; ?> ><?php echo $datcat[$cc]["nomcat"]; ?></option>
            <?php } ?>
        </select>
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
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Nombre Producto" onChange="this.form.submit();">
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
    <table class="table table-hover">
        <tr>
            <th id ="esquina1">Producto</th>
            <th id ="esquina2">Opciones</th>
        </tr>
        <?php if($data){
         for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td><strong>No.: </strong><?php echo $data[$x]['codprod']; ?><br>
                <strong>Nombre producto: </strong><?php echo $data[$x]['nomprd']; ?><br>
                <strong>Valor Unitario: </strong><?php echo "$".number_format($data[$x]['vlrprd'], 0, ',', '.'); ?><br>
                <strong>Categoria: </strong><?php echo $data[$x]['nomcat']; ?></td>
            <?php $obj->setCodprod($data[$x]['codprod']);
             $datmxp = $obj->selmxp(); ?>
            <td align="center"><i class="fa-duotone fa-utensils fa_tae" title="
            <?php if($datmxp){
            for($c=0;$c<count($datmxp);$c++){
                    echo $datmxp[$c]["nommatp"]." - ".$datmxp[$c]["cantmatxpro"]."&#10;";
                }} ?>
            "></i>&nbsp;&nbsp;&nbsp;&nbsp;

<a href="home.php?pr=<?php echo $data[$x]['codprod'] ?>&pg=<?php echo $pg; ?>#"  data-toggle="modal" data-target="#myModal<?php echo $data[$x]['codprod'];?>" title="Agregar Ingredientes &#13 y/o Materia Prima"><i class="fa-duotone fa-circle-plus fa_taa"></i>
            </a>
            <div class="modal fade" id="myModal<?php echo $data[$x]['codprod'];?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h1 class="modal-title">Ingredientes</h1>
                    <h3><?php echo $data[$x]['nomprd']; ?></h3>
                  </div>
                 <form name="perper" action="home.php?pg=<?php echo $pg; ?>" method="POST">
                    <div class="modal-body">
                      <table class=".table-striped" border="0">
                        <tr><td>
                          <input name="codprod" type="hidden" value="<?php echo $data[$x]['codprod']; ?>">
                        </td></tr>
                        <tr>
                            <td width="250px">
                            <select name="idmat" class="form-control">
                                <?php if($materia){
                                for ($m=0;$m<count($materia);$m++) { ?>
                                <option value="<?php echo $materia[$m]["idmat"]; ?>"><?php echo $materia[$m]["nommatp"]; ?></option>
                                <?php }} ?>
                            </select>
                            </td>
                            <td width="60px" style="padding-left: 10px;">
                                <input type="number" class="form-control" name="cantmatxpro" value="1"  min="1" max="1000" onkeypress="return solonum(event);" required />
                            </td>
                            <td width="100px" style="padding-left: 10px;">
                                <input name="guper" type="submit" class="btn btn-default" value="Agregar">
                            </td>
                        </tr>
                      </table>
                      <br>
                      <table border=0 cellpadding="5px" align="center" class="table table-hover">
                        <tr>
                            <th style="border-radius: 10px 0px 0px 10px">Materia Prima</th>
                            <th>Cantidad</th>
                            <th style="border-radius: 0px 10px 10px 0px">Opciones;</th>
                        </tr>
                      <?php if($datmxp){
                        for($o=0;$o<count($datmxp);$o++){
                            echo "<tr><td>".$datmxp[$o]['nommatp']."</td>";
                            echo "<td>".$datmxp[$o]['cantmatxpro']."</td>";
                            echo "<td><a href='home.php?pg=1053&delmxp=".$datmxp[$o]['idmatxpro']."'><img src='image/desactiva.png'></a></td></tr>";
                        }}
                      ?>
                      </table>
                    </div>
                    <div class="modal-footer">
                      
                      <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                  </form>
                </div>      
              </div>                             
            </div>
            &nbsp;&nbsp;
           <a title="Eliminar producto"href="home.php?del=<?php echo $data[$x]['codprod'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class='fa-duotone fa-trash fa_tae'></i></a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a title="Actualizar producto"href="home.php?pr=<?php echo $data[$x]['codprod'] ?>&pg=<?php echo $pg; ?>"><i class='fa-duotone fa-pen-to-square fa_taa'></i></a>
            </td>
        </tr>
        <?php } }else{
         echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
        } ?>
        <tr>
            <th id ="esquina3">Producto</th>
            <th id ="esquina4">Opciones</th>
        </tr>
    </table>

        </div>
    </div>
</div>