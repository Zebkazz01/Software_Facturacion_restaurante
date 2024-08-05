<?php
include ("modelo/mcarma.php");

	$usr=$_SESSION["user"];
	$idu=$_SESSION["idUser"];
	$per=$_SESSION["per"];
	$aute=$_SESSION["autentificado"];

$ins = new mcarma;
$action = isset($_POST["action"]) ? $_POST["action"]:NULL;
$actionS = isset($_SESSION["action"]) ? $_SESSION["action"]:NULL;
$np = isset($_SESSION["np"]) ? $_SESSION["np"]:1;
$archises = isset($_SESSION["archivo"]) ? $_SESSION["archivo"]:NULL;
if (($action == "upload" || $actionS == "upload")) { 
	$upfil = isset ($_FILES['archivo']['name']) ? $_FILES['archivo']['name']:NULL;
	if ($upfil){
		$tamano = $_FILES["archivo"]['size']; 
		$tipo = $_FILES["archivo"]['type']; 
		$target_path = "carga/";
		$target_path = $target_path.basename($upfil);
		if(move_uploaded_file($_FILES['archivo']['tmp_name'], $target_path)){
			echo "<script type='text/javascript'>alert('El archivo se ha cargado correctamente. Vamos a iniciar el proceso de carga a la base de datos.');</script>";
		}else{
			echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
		}
	}
	if($action){
		$archivo = "carga/".$upfil;
	}else if($actionS){
		$archivo = "carga/".$archises;
	}

	if($archivo!="carga/"){
		$txm = "<div class='col-md-6 col-md-offset-3'>";
		$txm .= "<div class='panel panel-default'>";
		$txm .= "<div class='panel-heading'><h3>Carga Masiva de Fichas</h3></div>";
		$txm .= "<div class='panel-body'><center><br /><br />";
		$txm .= "<img src='image/precarga.gif' width='64' height='64' />";
		echo $txm;
		$filas=file($archivo);
		// iniciamos contador y la fila a cero
		$numero_fila=0;
		$nfilas= count($filas);
		// mientras exista una fila	
		echo "<br /><br /><br />";
		if($nfilas<50){
			$cantin=1;
		}else{
			$cantin=50;
		}
		$npag=round($nfilas/$cantin);
		if ($npag==0) $npag=1;
		$faltante=$nfilas-$cantin*$npag;
		if($faltante>0){
			$npag=$npag+1;
		}

		if($action){
			$np=1;
			$i=1;
		}else{
			$i=$cantin*($np-1);
		}
		if ($np==$npag){
			$fin=$cantin*($np-1)+$faltante;
		}else if ($np<$npag){
			$fin=($cantin*$np);
		}else if($npag==1 || $np>$npag || $i>$nfilas){
			$fin = $nfilas;
		}
		
		//if ($i>$nfilas) break();
		
		echo round($fin*100/$nfilas)."% - ".$fin." de ".$nfilas." Registros insertados aproximadamente.<br><br></center>";
		echo "</div></div></div>";
		if ($i==0) $i=1;
		while($i<$fin){
			$row = $filas[$i];
			$datos = explode(";",$row);
			$i++;
			$numero_fila++;
			//Ficha
			$data6 = $ins->selfic($datos[4]);
			//echo $data6[0]["num"];
			if($data6[0]["num"]==0){
				$data4 = $ins->selvaln($datos[32]);
				if($data4) $sd=$data4[0]['idval']; else $sd=6;
				$ins->insfic($datos[4],$datos[26],$datos[9],$sd);
			}
		}
		$np=$np+1;
		if($action){
			$_SESSION['action'] = $action;
			$_SESSION['archivo'] = $upfil;
		}else if($actionS){
			$_SESSION['action']=$_SESSION["action"];
			$_SESSION['archivo']=$_SESSION["archivo"];
			if (($np-1)==$npag){
				
				session_destroy();
				session_start();
				$_SESSION["user"] = $usr;
				$_SESSION["idUser"] = $idu;
				$_SESSION["per"] = $per;
				$_SESSION["autentificado"]= $aute;
			}
		}
		$_SESSION['np']=$np;
		echo "<script language='Javascript'>location.href='home.php?pg=1009';</script>";
	}
}
?>