<?php include("modelo/mmenu.php"); 
  $obj = new mmenu();
  $idper = isset($_SESSION["idper"]) ? $_SESSION["idper"]:NULL;
  $dtconf = $obj->selconf();
?>
