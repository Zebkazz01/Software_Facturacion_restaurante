 <?php
	include ("modelo/memp.php");
	include ("modelo/mpagina.php");
	$obj = new memp();
	//Variables
	$pg=1020;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
	
	$idem = isset($_POST['idem']) ? $_POST['idem']:NULL;
	if(!$idem) $idem = isset($_GET['idem']) ? $_GET['idem']:NULL;
	$nodocemp = isset($_POST['nodocemp']) ? $_POST['nodocemp']:NULL;
	$nomemp = isset($_POST['nomemp']) ? $_POST['nomemp']:NULL;
	$diremp = isset($_POST['diremp']) ? $_POST['diremp']:NULL;
	$telemp = isset($_POST['telemp']) ? $_POST['telemp']:NULL;
	$pass = isset($_POST['pass']) ? $_POST['pass']:NULL;
	$actemp = isset($_POST['actemp']) ? $_POST['actemp']:NULL;
	$idper = isset($_POST['idper']) ? $_POST['idper']:NULL;
	$hab = isset($_GET['hab']) ? $_GET['hab']:NULL;
	
	if($idem && $hab){
		$obj->setIdem($idem);
		$obj->setActemp($hab);
		$obj->updhab();
	}
	
	$del = isset($_GET['del']) ? $_GET['del']:NULL;
	$pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
	$actu = isset($_POST['actu']) ? $_POST['actu']:NULL;
	//Insertar
	if($nodocemp && $nomemp && $pass && $actemp && $idper && !$actu){
		$pp = sha1(md5($pass));
		$obj->setNodocemp($nodocemp);
		$obj->setNomemp($nomemp);
		$obj->setDiremp($diremp);
		$obj->setTelemp($telemp);
		$obj->setPass($pp);
		$obj->setIdper($idper);
		$obj->setActemp($actemp);
		$obj->insubi();
	}
	//Eliminar
	if($del){
		$obj->setIdem($del);
		$obj->delubi();
	}

if($nodocemp && $nomemp && $idper && $actu){
		$obj->setIdem($idem);
		$obj->setNodocemp($nodocemp);
		$obj->setNomemp($nomemp);
		$obj->setDiremp($diremp);
		$obj->setTelemp($telemp);
		$obj->setIdper($idper);
		$obj->setActemp($actemp);
	//Actualizar con password
	if($pass){
		$pp = sha1(md5($pass));
		$obj->setPass($pp);
		$obj->updubi();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}else{
		//Actualizar sin password
		$obj->updubis();
		echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
	}
}

	//Selecciones
	if($pr){
		$obj->setIdem($pr);
		$data1 = $obj->selubi1();
	}
	$depto = $obj->selper();
   //Paginar
	$bo = "";
	$nreg = 10;//numero de registros a mostrar
	$pa = new mpagina($nreg);
	$conp = $obj->sqlcount($filtro);
  //$data = $obj->selubi();

?>