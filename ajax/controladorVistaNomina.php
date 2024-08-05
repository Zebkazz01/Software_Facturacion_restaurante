<?php include('../modelo/conexion.php');

     $idem1 = $_REQUEST["idem1"];
     $sql2 = "SELECT asist FROM asistencia where idem='".$idem1."'";
     $instancia = new conexion();
     $instancia->conectarBD();
     $jeiner = $instancia->ejeCon($sql2,0);

     $html="";
     $html.="<input type='number' name='diasNoAsistidos' disabled='disabled' value='".$jeiner[0]["asist"]."' id='diasNoAsistidos' class='form-control'/>";
 	 echo $html;



 ?>