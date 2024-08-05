<?php include("controlador/cpags.php"); ?>
<!-- modal --><div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title" id="myModalLabel">Esta seguro de eliminar el registro seleccionado?</h4>
      </div>
      <div class="modal-body">
        <p>Al eliminar el registro ya no podra reestablecerlo</p>
        <p>Esta seguro?</p>
        <!-- <p class="debug-url"></p> -->
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-danger btn-ok">Eliminar</a>
      </div>
    </div>
  </div>
</div>
<!-- fin modal -->
<div class="container" id="contprin">
  <div class="panel panel-default" >
    <div class="panel-heading" id="Cabe_cont"><h2 align="center">PAGINAS</h2>
    <a href="videos.php?pg=<?=$pg;?>&nom=Empleados" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
    </div>
      <div class="panel-body">
        <form name="frm1" action="home.php?pg=<?php echo $pg; ?>" method="post">
	         <div class="form-controls">
		          <label for="nopag">Numero de Página</label>
		          <input id="nopag" type="text" class="form-control" onkeypress="return solonum(event);" maxlength="11" name="idpag" required <?php if($edi){ echo "value='".$datact[0]["idpag"]."' readonly ";} ?> >
              <?php if($edi){ echo "<input type='hidden' name='act' value='act'>";} ?>
	         </div>
	         <div class="form-controls">
		          <label for="npag">Nombre Página</label>
		          <input id="npag" type="text" onkeypress="return sololet(event);" class="form-control" maxlength="40" name="nompag" required <?php if($edi){ echo "value='".$datact[0]["nompag"]."' ";} ?> >
	         </div>
        	<div class="form-controls ">
        		<label for="nomarc">Nombre Archivo</label>
        		<input id="nomarc" type="text" class="form-control" maxlength="100" name="nomarc" required <?php if($edi){ echo "value='".$datact[0]["nomarc"]."'";} ?> >
        	</div>
          <div class="form-controls ">
		        <label for="tip">Muestra menu</label>
            <select class="form-control" id="tip" name="mos">
              <option value="1" <?php if($edi AND 1==$datact[0]["mos"]) echo "selected"; ?> >Si</option>";
              <option value="0" <?php if($edi AND 0==$datact[0]["mos"]) echo "selected"; ?> >No</option>";
            </select>
	         </div>
           <div class="form-controls ">
            <label for="ord">Orden</label>
            <select class="form-control" id="tip" name="ord">
              <?php for($u=count($data);$u>=0;$u--){ ?>
              <option value="<?php echo ($u+1); ?>" <?php if($edi AND ($u+1)==$datact[0]["ord"]) echo "selected"; ?> ><?php echo ($u+1); ?></option>";
              <?php } ?>
            </select>
           </div>
           <div class="form-controls">
		          <label for="ico">Icono de Página</label>
		          <input id="ico" type="text" onkeypress="return sololet(event);" class="form-control" maxlength="40" name="ico" required <?php if($edi){ echo "value='".$datact[0]["ico"]."' ";} ?> >
	         </div>
          <br/>
	       <button class="btn btn-warning pull-right"><?php echo ($edi)? 'Modificar': 'Guardar'; ?></button>
        </form>
      </div>
  </div> 
</div> 
<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
      <div align="center">
        <table width="100%" >
          <tr>
            <td>
              <form id="formfil" name="frmfil" method="GET" action="home.php" class="txtbold">
                <div class="seacrheta">
                  <i class="fa-duotone fa-magnifying-glass busc" title="Buscar"></i>
                  <input name="pg" type="hidden" value="<?php echo $pg; ?>" />
                  <input class="form-control colinp" type="text" name="filtro" value="<?php echo $filtro;?>" placeholder="Nombre de página" onChange="this.form.submit();">
                </div>
              </form>
            </td>
            <td align="right" valign="bottom">
            <?php
            $bo = "<input type='hidden' name='filtro' value='".$filtro."' />";
            $pa->spag($conp,$nreg,$pg,$bo); 
            $data = $obj->seltippara($filtro, $pa->rvalini(), $pa->rvalfin());
            ?>
            </td>
          </tr>
        </table><br><br>
      </div>
      <table class="table table-striped table-hover" cellspacing="0" width="100%">
	     <thead>
    	   <tr>
	    	    <th  id="esquina1">Nombre Página</th>
        	  <th>Mostrar Menu</th>
            <th>Orden</th>
            <th id="esquina2">Opciones</th>
     	  </tr>        
	     </thead>
        <?php
        if($data){
          foreach($data as $obj){
          echo "<tr><td><strong>Nombre: </strong>".$obj["nompag"]."<br>";
          echo "<strong>Ruta: </strong>".$obj["nomarc"]."<br>";
          echo "<strong>Numero pagina: </strong>".$obj["idpag"]."</td>";
          if($obj["mos"]==1)
            echo "<td>Si</td>";
          else
            echo "<td>No</td>";
          
          echo "<td>".$obj["ord"]."</td>";
          echo "<td>";
          echo "<a title='Eliminar' href='' data-href='home.php?pg=".$pg."&del=".$obj["idpag"]."' data-toggle='modal' data-target='#confirm-delete'><i class='fa-duotone fa-trash fa_tae'></i></a>";
          echo "&nbsp;&nbsp;<a title='Actualizar' href='home.php?pg=".$pg."&edi=".$obj["idpag"]."'><i class='fa-duotone fa-pen-to-square fa_taa'></i></a></td></tr>";
          } }else{
          echo "<h4>No se encontraron registros relacionados con la busqueda, intente buscar con otras palabras o numeros.</h4>";   
         }?>
        <tfoot>
    	   <tr>
	    	    <th id="esquina3">Nombre Página</th>
        	  <th>Mostrar Menu</th>
            <th>Orden</th>
            <th id="esquina4">Opciones</th>
     	  </tr>        
	     </tfoot>
      </table>
      <script>
      $('#confirm-delete').on('show.bs.modal', function(e) {
      $(this).find('.btn-ok').attr('href', $(e.relatedTarget).data('href'));
      $('.debug-url').html('Delete URL: <strong>' + $(this).find('.btn-ok').attr('href') + '</strong>');
      });
      </script>
    </div>
  </div>
</div>