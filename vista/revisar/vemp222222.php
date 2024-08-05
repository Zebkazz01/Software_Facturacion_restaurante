vemp.php
Detalles
Actividad
HOY

laksmi esmeralda mantilla anayaha creado y compartido un elemento en
10:39
Carpeta de Google Drive
vista
PHP
vemp.php

Puede editar
Daniel Achury
E
Puede editar
EDWIN ACOSTA
E
Puede editar
EDWIN MANUEL ACOSTA SALAZAR
Mostrar todos...
No hay actividad registrada antes del 15 de junio de 2016


<div class="modal fade" id="ventana2"><div class="modal-dialog"><div class="modal-content"><div  class="alert alert-success ">
<center><strong>¡Tus datos se han actualizado correctamente.!</strong></center></div><div class="modal-footer"><div class="form-group">
<button type="button" class="btn btn-default btn-block " data-dismiss="modal">Salir</button></div></div></div></div></div>
<a id="actualizado" style="display:none" href="#ventana2" class="btn btn-success pull-right" data-toggle="modal"></a>

<script type="text/javascript">
  function actualizado(){
    var aaa=document.getElementById("actualizado");
    aaa.click();
  }
</script>
<?php include("controlador/cemp.php");?>

<script type="text/javascript">

        function guardar(f){
			document.getElementById("errorpass").style.display = f.pass0.value==f.pass1.value?"none":"block";	
	 		if (f.pass0.value!=f.pass1.value)
	 			return false;	 		
	 		document.getElementById("errorpass1").style.display = f.pass0.value.length<6 || f.pass0.value.length>25?"block":"none";
	 		if (f.pass0.value.length<6 || f.pass0.value.length>25)
	 			return false;	 		
		}

</script>

<div class="container">
<div class="panel panel-default">
 <div class="panel-heading"><h2 align="center">Empleado</div>
    <div class="panel-body">

   <form name="frm1" action="home.php?pg=<?php echo $pg; ?>" method="POST" onsubmit="return guardar(this)">
       <?php if($edit){ echo "<input type='hidden' name='act' id='act' value='".$edit."'/>"; } ?>
            <div class="form-group"> 
              <label for="nombre">Nombre:</label>
              <input type="text" maxlength="30" name="nombre" id="nombre" class="form-control solo-let" value="<?php if($edit) echo $datosempleado1[0]["nombre"] ?>" required onkeypress="return sololet(event)" />          
            </div>
            <div class="form-group">          
              <label for="tipoducum">Tipo de Documento:</label>
              <select class="form-control" name="tipodocum" id="tipodocum" class"selectpicker" required>
                  <?php for ($i=0; $i<count($dataTD); $i++){
                    echo "<option value='".$dataTD[$i]["idval"]."'";
                    if($edit AND $datosempleado1[0]["tipodocum"]==$dataTD[$i]["idval"]) echo " SELECTED ";
                    echo ">".$dataTD[$i]["nomval"]."</option>";
                  } ?>
              </select>
              </div>

            <div class="form-group">          
              <label>No. documento:</label>
              <input class="form-control solo-num" maxlength="10" type="text" name="numdocum" id="numdocum" value=" <?php if($edit) echo $datosempleado1[0]["numdocum"]?>" required onkeypress="return solonum(event)"/>         
            </div>
       
            <div class="form-group">                 
                <label>Perfil:</label>
                <select id="idperf" name="idperf" class="form-control" value="<?php if($edit) echo $datosempleado1[0]["idperf"] ?>"required>                    
                      <option value="3">Empleado</option>
                      <option value="5">Administrador</option>                 
                 </select>      
            </div>

             <div class="form-group">
				<label for="ips">IPS Trabaja:</label><br/>
				<select class="form-control" name="ips" id="ips" class="selectpicker" required>	
                  <?php for ($i=0; $i<count($dataips); $i++){
                    echo "<option value='".$dataips[$i]["idips"]."'";
                    if($edit AND $datosempleado1[0]["idips"]==$dataips[$i]["idips"]) echo " SELECTED ";
                    echo ">".$dataips[$i]["ips"]."</option>";
                  } ?>	
		    	</select>
			</div>

			<div class="form-group">          
              <label>Telefono:</label>
              <input class="form-control solo-num" maxlength="10" type="text" name="tel" id="tel" value=" <?php if($edit) echo $datosempleado1[0]["tel"]?>" required onkeypress="return solonum(event)"/>         
            </div>

            <div cclass="form-group">         
                   <label>Email:</label>
                  <input class="form-control" maxlength="70" type="text" value="<?php if($edit) echo $datosempleado1[0]["email"] ?>" name="email" id="email"/>         
             </div>

            <?php if(!$edit){ ?>
			    <div class="form-group">
					<label for="pass0">Contrase&ntilde;a:</label>
					<input type="password" class="form-control" maxlength="100" value="<?php if($edit) echo $data1[0]["pass"]; ?>" name="pass0" id="pass0" value="" />
				
					</div>
					<div class="form-group">
						<label for="pass1">Confirme su contrase&ntilde;a:</label>
						<input type="password" class="form-control" maxlength="100" value="<?php if($edit) echo $data1[0]["pass"]; ?>" name="pass1" id="pass1" value="" />
					</div>	
					<div class="alert alert-danger " style="text-align: center; display: none" id="errorpass">Las Contraseñas No Coinciden</div>
					<div class="alert alert-danger " style="text-align: center; display: none" id="errorpass1">La contraseña debería contener entre 6 y 25 caracteres.</div>
					<?php } ?>
                        

         <div class="form-group">  
            <?php if($edit){ ?>     
              <input type="submit" value="Actualizar" name="editar"  id="edit" class="btn btn-danger pull-right"/> 
            <?php }else{ ?>
              <input type="submit" value="Guardar" name=""  id="" class="btn btn-danger pull-right"/> 
            <?php } ?>


        </div>
       </form>
        </div>
        </div>
        </div>
    <div class="container">
    <div class="panel panel-default">
    <div class="panel-body">
          <div align="center"> 
          <table border=0 align="center" cellpadding="5px" class="table table-hover">
          <div class="panel-heading">
               <thead>
                 <th>Nombre</th>
                <th>Tipo de documento</th>
                 <th>No. Documento</th>
                 <th>Perfil</th>
                  <th>IPS Trabaja</th>
                 <th>Telefono</th>
                 <th>Email</th>
                 <th>Editar</th>
                 <th>Eliminar</th>
               </thead>
          </div>
          <?php for($i=0;$i<count($datoemp);$i++){ ?>
               <tr>
                 <td><?php echo $datoemp[$i]['nombre'] ?></td>
                  <td><?php echo $datoemp[$i]['tipodocum'] ?></td>
                 <td><?php echo $datoemp[$i]['numdocum'] ?></td>
                 <td><?php echo $datoemp[$i]['rol'] ?></td>
                  <td><?php echo $datoemp[$i]['nomips'] ?></td>
                 <td><?php echo $datoemp[$i]['tel'] ?></td>
                 <td><?php echo $datoemp[$i]['email'] ?></td>
                 <td><a href="home.php?pg=<?php echo $pg; ?>&edit=<?php echo $datoemp[$i]['idemp'] ?>"><img src="image/pen.png"></a></td>
                 <td><a href="home.php?pg=<?php echo $pg; ?>&del=<?php echo $datoemp[$i]['idemp'] ?>" onclick="return confirm('Desea eliminar el registro seleccionado?');"><img src="image/circle.png"></a></td>
               </tr>
               <?php } ?>
          </table>
          </div>
  </div>
  </div>
  </div>
<script type="text/javascript">
 <?php if($edit){ ?>
  document.getElementById("idperf").value='<?php echo $datosempleado1[0]["idperf"]; ?>';
<?php } ?>
</script>











