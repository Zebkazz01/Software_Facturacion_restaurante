<?php include ("controlador/cemp.php"); ?>

<script type="text/javascript">
    function validarc(){
        pas = document.getElementById("pass").value;
        pas1 = document.getElementById("pass1").value;
        if(pas!=pas1){
            alert("Las contraseñas no coinciden."); 
            document.getElementById("pass1").value='';
            return false;
        }else{
            return true;
        }
    }
</script>

<div class="container" id="contprin">
    <div class="panel panel-default">
        <div class="panel-heading" id="Cabe_cont">
            <h2 align="center">EMPLEADOS</h2>
            <a href="videos.php?pg=<?=$pg;?>&nom=Empleados" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
        </div>
        <div class="panel-body">
<form name="form1" action="home.php?pg=<?php echo $pg; ?>" method="post"  onsubmit="return validarc();">
    <?php if($pr){ ?>
    <div class="form-group">
        <label class="txtbold">No. Empleado</label>
        <input type="number" class="form-control" name="idem" value="<?php if($pr) echo $data1[0]["idem"]; ?>" <?php if($pr) echo "readonly"; ?> required />
        <?php
            if ($pr)
                echo "<input name='actu' type='hidden' value='actu' />";
        ?>
    </div>
    <?php } ?>
    <div class="form-group">  
        <label class="txtbold">No. Documento</label>
        <input type="number" class="form-control" name="nodocemp" value="<?php if($pr) echo $data1[0]["nodocemp"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Empleado</label>
        <input type="text" class="form-control" name="nomemp" value="<?php if($pr) echo $data1[0]["nomemp"] ?>" required />
    </div>
    <div class="form-group">  
        <label class="txtbold">Direcci&oacute;n</label>
        <input type="text" class="form-control" name="diremp" value="<?php if($pr) echo $data1[0]["diremp"] ?>" />
    </div>
    <div class="form-group">  
        <label class="txtbold">Tel&eacute;fono</label>
        <input type="number" class="form-control" name="telemp" value="<?php if($pr) echo $data1[0]["telemp"] ?>" />
    </div>
    <div class="form-group">  
        <label class="txtbold">Activo</label>
        <select name="actemp" class="form-control">
            <option value="1" <?php if($pr && $data1[0]['actemp']==1) echo "selected"; ?>>Desabilitado</option>
            <option value="2" <?php if($pr && $data1[0]['actemp']==2) echo "selected"; ?>>Habilitado</option>
        </select>
    </div>
    <div class="form-group">  
        <label class="txtbold">Perfil</label>
        <select name="idper" class="form-control">
            <?php for ($x=0;$x<count($depto);$x++){ ?>
                <option <?php if($pr && $data1[0]['idper']==$depto[$x]["idper"]) echo "selected"; ?> value="<?php echo $depto[$x]["idper"]; ?>"><?php echo $depto[$x]["nomper"]; ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group">
        <label for="pass">Contrase&ntilde;a:</label>
        <input type="password" class="form-control" maxlength="50"  name="pass" id="pass" value="" <?php if(!$pr) echo "required"; ?> />
    </div>
    <div class="form-group">
        <label for="pass1">Confirme su contrase&ntilde;a:</label>
        <input type="password" class="form-control" maxlength="50" name="pass1" id="pass1" value="" />
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
                            <input type="text" class="form-control colinp" name="filtro" value="<?php echo $filtro;?>" placeholder="Nombre empleado" onChange="this.form.submit();">
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
                <th id="esquina1">Empleado</th>
                <th>Estado</th>
                <th id="esquina2">Opciones</th>
            </tr>
        </thead>
        <?php for($x=0;$x<count($data);$x++){ ?>
        <tr>
            <td>
                <strong>No. Empleado: </strong><?php echo $data[$x]['nodocemp']; ?><br>
                <strong>Nombre del empleado: </strong><?php echo $data[$x]['nomemp']; ?><br>
                <strong>Direccion: </strong><?php echo $data[$x]['diremp']; ?><br>
                <strong>Telefono: </strong><?php echo $data[$x]['telemp']; ?><br>
                <strong>Pefil: </strong><?php echo $data[$x]['nomper']; ?>
            </td>
            <td>
                <?php if($data[$x]['actemp']==1)
                        echo "&nbsp;&nbsp;&nbsp;<a href='home.php?pg=".$pg."&hab=2&idem=".$data[$x]['idem']."'><i class='fa-solid fa-circle-xmark fa_tae' style='color:#FF0000;'></i></a>";
                    elseif($data[$x]['actemp']==2)
                        echo "<a href='home.php?pg=".$pg."&hab=1&idem=".$data[$x]['idem']."'><i class='fa-duotone fa-circle-check fa_tap' style='color:#008000;'></i></a>";
                 ?>
            </td>
            <td>
                <a title="Eliminar registro" href="home.php?del=<?php echo $data[$x]['idem'] ?>&pg=<?php echo $pg; ?>" onClick="return confirm('¿Desea eliminar?');"><i class='fa-duotone fa-trash fa_tae'></i></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a title="Actualizar registro" href="home.php?pr=<?php echo $data[$x]['idem'] ?>&pg=<?php echo $pg; ?>"><i class='fa-duotone fa-pen-to-square fa_taa'></i></a>
            </td>
        </tr>
        <?php } ?>
        <tfoot>
            <tr>
                <th id="esquina3">Empleado</th>
                <th>Estado</th>
                <th id="esquina4">Opciones</th>
            </tr>
        </tfoot>
    </table>

        </div>
    </div>
</div>