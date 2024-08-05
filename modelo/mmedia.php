<?php include("conexion.php");

class mmedia{
	private $parametro;
	private $tipo;

	function setParametro($parametro){
		$this->parametro=$parametro;
	}
	function setTipo($tipo){
		$this->tipo=$tipo;
	}
	function getParametro(){
		return $this->parametro;
	}
	function getTipo(){
		return $this->tipo;
	}
	function selProducto(){
		$sql = "SELECT * FROM producto";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}


	function catexprod(){
		$sql = "SELECT * FROM producto WHERE codcat=:tipo";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$tipo=$this->getTipo();
		$result->bindParam(":tipo",$tipo);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function delcatexprod(){
		$sql = "DELETE FROM menudia WHERE codcat=:parametro";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$parametro=$this->getParametro();
		$result->bindParam(":parametro",$parametro);
		$result->execute();
	}

	function categoria(){
		$sql = "SELECT * FROM categoria";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}

	function inserMenu($sql){
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
	}

	function menudia(){
		$sql = "SELECT * FROM menudia";
		$modelo = new conexion();
		$conexion = $modelo->get_conexion();
		$result = $conexion->prepare($sql);
		$result->execute();
		$res = NULL;
		while($f=$result->fetch())
			$res[]=$f;
		return $res;
	}






}
?>