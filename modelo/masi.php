<?php include("conexion.php"); 

class masi{
	private $empleadoAsistencia;
	private $fecha;

	function setEmpleadoAsistencia($empleadoAsistencia){
		$this->empleadoAsistencia=$empleadoAsistencia;
	}
	function setFecha($fecha){
		$this->fecha=$fecha;
	}
	function getEmpleadoAsistencia(){
		return $this->empleadoAsistencia;
	}
	function getFecha(){
		return $this->fecha;
	}

	public function selEmpleado(){
 		$sql = "SELECT idem, nodocemp, nomemp, idper, pass, diremp, telemp, actemp FROM empleado";
 		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
		$result=$conexion->prepare($sql);
		$result->execute();
 		$res=null;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
 	}

 	public function insertarAsistencia(){
		$fecha=$this->getFecha();
 		$sql = "INSERT INTO asistencia(asist,idem,fecha) values(1,:empleadoAsistencia,'".$fecha."')";
 		$modelo=new conexion();
		$conexion=$modelo->get_conexion();
		$result=$conexion->prepare($sql);
		$empleadoAsistencia=$this->getEmpleadoAsistencia();
		$result->bindParam(":empleadoAsistencia",$empleadoAsistencia);
		$result->execute();
 	}
}


?>