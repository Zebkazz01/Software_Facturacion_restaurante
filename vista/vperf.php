

<?php  include("controlador/cperf.php"); ?>

<div class="container" id="contprin">
  <div class="panel panel-default" >
    <div class="panel-heading" id="Cabe_cont">
      <h2 align="center">PERFIL</h2>
    <a href="videos.php?pg=<?=$pg;?>&nom=Perfil" class="ico_video" title="videos de ayuda"><i class="fa-solid fa-video videcon"></i></a>
  </div>
    <div class="panel-body">

    <form name="frm1" action="home.php?pg=<?php echo $pg; ?>&nomper=<?php echo $nomper; ?>" method="post">
        <div class="form-group">
          <label for="cofi">Nombre:</label>
          <input type="text" class="form-control" name="nomper" value="<?php if($edit) echo $data1[0]["nomper"]; ?>" <?php if($edit) echo "redonly" ?> maxlength="35" onkeypress="return sololet(event);" required  />
          <?php if($edit) echo "<input type='hidden' name='act' value='".$edit."'>"; ?>
        </div>
        <div class="form-group">
        <input type="submit" class="btn btn-warning pull-right" value="<?php if($edit) echo "Actualizar"; else echo "Guardar"; ?>" />
        </div>
        <br/>
        <br/>
    </form>
    </div>
  </div>
</div> 

<div class="container">
  <div class="panel panel-default">
    <div class="panel-body">
    <table border=0  cellpadding="5px" align="center" class="table table-hover"> 
      <thead>    
        <th id="esquina1">Nombre</th>
        <th id="esquina2" style="text-align:center;">Opciones</th>
      </thead>  
      <?php if($data){
      for($i=0;$i<count($data);$i++){ ?>
        <tr> 
          <td><?php echo utf8_encode($data[$i]["nomper"]); ?></td>       
          <td style="text-align:center;">
            <a style="margin-right:15px;" href="home.php?pg=<?php  echo $pg; ?>&idper<?php echo $data[$i]["idper"];?>#"  data-toggle="modal" data-target="#myModal<?php echo $data[$i]["idper"];?>">
              <i class="fa-duotone fa-eye fa_taa"></i>
            </a>
            <div class="modal fade" id="myModal<?php echo $data[$i]["idper"];?>" role="dialog">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal">&times;</button>  
                    <h1 class="modal-title">Paginas</h1>
                    <h3><?php echo $data[$i]["nomper"]; ?></h3>
                  </div>
                  <form name="perper" action="home.php?pg=<?php echo $pg; ?>" method="POST">
                    <div class="modal-body">
                      <table class=".table-striped" border=0>
                        <tr><td>
                          <input name="npa" type="hidden" value="<?php echo count($paginas); ?>">
                          <input name="idper" type="hidden" value="<?php echo $data[$i]["idper"]; ?>">
                        </td></tr>
                        <?php if($pr){ echo $data[$i]["idper"]; } ?>
                        <?php $obj->setIdper($data[$i]["idper"]); 
                        $datpepa= $obj->selpp(); 
             
                     ?>
                        <?php if($paginas){
                        for($m=0;$m<count($paginas);$m++) { ?>
                          <tr>
                            <td width="300px" class="txt"><?php  echo utf8_encode($paginas[$m]["nompag"]); ?></td>
                            <td> 
                            <input name="check<?php echo $m; ?>" type="checkbox"
                            <?php if($datpepa){
                            for($t=0;$t<count($datpepa);$t++) {
          
                             if($datpepa[$t]['idpag']==$paginas[$m]["idpag"]) echo " checked "; } } ?> value="<?php echo $paginas[$m]["idpag"]; ?>" />
                            </td>
                          </tr>
                        <?php }} ?>
                      </table>
                    </div>
                    <div class="modal-footer">
                      <input name="guper" type="submit" class="btn btn-default" value="Agregar">
                      <button class="btn btn-default" data-dismiss="modal">Cerrar</button>
                    </div>
                  </form>
                </div>      
              </div>                             
            </div>
            <a style="margin-right:15px;" href="home.php?pg=<?php echo $pg; ?>&edit=<?php echo $data[$i]["idper"]?>" id="Editar">
            <i class='fa-duotone fa-pen-to-square fa_taa'></i>
            </a>
            <a style="margin-right:15px;" href="home.php?pg=<?php echo $pg; ?>&dele=<?php echo $data[$i]["idper"] ?> "onclick="return confirm('Desea eliminar el registro seleccionado?');" id="Eliminar">
            <i class='fa-duotone fa-trash fa_tae'></i>
            </a>
          </td> 
        </tr> 
      <?php }} ?>
      <tfoot>    
        <th id="esquina3">Nombre</th>
        <th id="esquina4" style="text-align:center;">Opciones</th>
      </tfoot> 
    </table>

    </div>
  </div>
</div>