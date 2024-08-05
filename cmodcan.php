
<?php 
include("modelo/mverd.php");
$obj = new mverd();

  	$foto = isset($_FILES["foto"]['name']) ? $_FILES["foto"]['name']:NULL;
  	$foto1 = isset($_POST["foto"]) ? $_POST["foto"]:NULL;
    $idcan = isset($_POST["idcan"]) ? $_POST["idcan"]:NULL;
    $doccan = isset($_POST["doccan"]) ? $_POST["doccan"]:NULL;
    $nomcan = isset($_POST["nomcan"]) ? $_POST["nomcan"]:NULL;
    $apecan = isset($_POST["apecan"]) ? $_POST["apecan"]:NULL;
    $nofic = isset($_POST["nofic"]) ? $_POST["nofic"]:NULL; 
    $ntarj = isset($_POST["ntarj"]) ? $_POST["ntarj"]:NULL;
    $tipopro = isset($_POST["tipopro"]) ? $_POST["tipopro"]:NULL;
    $emailsen = isset($_POST["emailsen"]) ? $_POST["emailsen"]:NULL;
    $emailper = isset($_POST["emailper"]) ? $_POST["emailper"]:NULL;
    $telfij = isset($_POST["telfij"]) ? $_POST["telfij"]:NULL;
    $telcel = isset($_POST["telcel"]) ? $_POST["telcel"]:NULL;

if($foto1 && $doccan && $nomcan && $apecan && $nofic  && $tipopro && $emailper && $ntarj && $emailsen && $telfij && $telcel){
		 $obj->updCan($doccan, $nomcan, $apecan, $nofic, $ntarj, $foto1, $tipopro, $emailsen, $emailper, $telfij, $telcel,$idcan);
		 echo "<script type='text/javascript'>alert('Los Datos del candidato han sido Modificado.');</script>";

 }else  if ($doccan && $nomcan && $apecan && $nofic && $foto && $tipopro && $emailper && $ntarj && $emailsen && $telfij && $telcel){
    	$tamano = $_FILES["foto"]['size']; 
        $tipo = $_FILES["foto"]['type']; 
        $target_path = "image/fotos/";
        //echo $tamano." - ".$tipo;
        if ($tamano<='1048576' and $tipo=="image/jpeg"){
            $target_path = $target_path.$doccan.".jpg";
            if(move_uploaded_file($_FILES['foto']['tmp_name'], $target_path)){
                $obj->updCan($doccan, $nomcan, $apecan, $nofic, $ntarj, 
                    $target_path, $tipopro, $emailsen, $emailper, $telfij,$telcel,$foto,$idcan);
                echo "<script type='text/javascript'>alert('Los Datos del candidato han sido Modificado.');</script>";
                echo "<script type='text/javascript'>window.location='home.php';</script>";
            }else{
                echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
            }
        }else{
            echo "<script type='text/javascript'>alert('Solo se permite imagenes jpg y no pueden exceder su peso de 1MB o 1024Kb.  Los datos de su archivo seleccionado son: Tamaño= ".round($tamano/1024,0)."Kb y Tipo de archivo: ".$tipo."');</script>";
        }

    
    }

//update



//validacion de credenciales
$data1 = $obj->selcan();
  $datfic = $obj->selfic();
  $dattpro = $obj->selval(3);



?>