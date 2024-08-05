<?php include("modelo/masi.php"); 
$objeto = new masi();
$datosEmpleado = $objeto->selEmpleado();
$empleadoAsistencia = isset($_POST["empleadoAsistencia"])? $_POST["empleadoAsistencia"]:NULL;
$fecha = isset($_POST["fecha"])? $_POST["fecha"]:NULL;
$pg = 1016;
if($empleadoAsistencia && $fecha){
	$objeto->setEmpleadoAsistencia($empleadoAsistencia);
	$objeto->setFecha($fecha);
	$objeto->insertarAsistencia();
}
?>