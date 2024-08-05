<?php 
include("modelo/mcan.php");
include ("modelo/mpagina.php");

$obj = new mcan();
$pg=1011;

$filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
$fotos = isset($_FILES["fotos"]['name']) ? $_FILES["fotos"]['name']:NULL;
$idcan = isset($_POST["idcan"]) ? $_POST["idcan"]:NULL;
if(!$idcan) $idcan = isset($_GET["idcan"]) ? $_GET["idcan"]:NULL;
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
$pass = isset($_POST["pass"]) ? $_POST["pass"]:NULL;
$act = isset($_POST["act"]) ? $_POST["act"]:NULL;
$del = isset($_GET["del"]) ? $_GET["del"]:NULL;
$edi = isset($_GET["edi"]) ? $_GET["edi"]:NULL;
$fot = isset($_POST["fot"]) ? $_POST["fot"]:NULL;
$acv = isset($_GET["acv"]) ? $_GET["acv"]:NULL;

//Insertar
if($doccan && $nomcan && $apecan && $nofic && $fotos && $emailsen && $emailper && $pass && !$act){
    $tamano = $_FILES["fotos"]['size']; 
    $tipo = $_FILES["fotos"]['type']; 
    $target_path = "image/fotos/";
    //echo $tamano." - ".$tipo;
    if ($tamano<='1048576' and $tipo=="image/jpeg"){
        $target_path = $target_path.$doccan.".jpg";
        if(move_uploaded_file($_FILES['fotos']['tmp_name'], $target_path)){
            $obj->inscan($doccan, $nomcan, $apecan, $nofic, $ntarj, $target_path, $tipopro, $emailsen, $emailper, $telfij, $telcel, $pass);
            $datid = $obj->selidc($doccan, $nomcan, $apecan, $nofic);
            $idcan= $datid[0]["idcan"];
             echo "<script type='text/javascript'>window.location='home.php?pg=1011&pr=".$idcan."';</script>";
        }else{
            echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
        }
    }else{
        echo "<script type='text/javascript'>alert('Solo se permite imagenes jpg y no pueden exceder su peso de 1MB o 1024Kb.  Los datos de su archivo seleccionado son: Tamaño= ".round($tamano/1024,0)."Kb y Tipo de archivo: ".$tipo."');</script>";
    }
}

//Actualizar
if($idcan && $doccan && $nomcan && $apecan && $nofic && ($fotos OR $fot) && $pass && $act){
    $tamano = $_FILES["fotos"]['size']; 
    $tipo = $_FILES["fotos"]['type']; 
    $target_path = "image/fotos/";
    echo "<br><br>".$idcan." - ".$doccan." - ".$nomcan." - ".$apecan." - ".$nofic." - ".$fotos." - ".$fot." - ".$emailsen." - ".$emailper." - ".$pass." - ".$act."<br><br>";
    echo $tamano." - ".$tipo;
    if ($tamano<='1048576' and $tipo=="image/jpeg"){
        $target_path = $target_path.$doccan.".jpg";
        if(move_uploaded_file($_FILES['fotos']['tmp_name'], $target_path)){
            $obj->updcan($idcan, $doccan, $nomcan, $apecan, $nofic, $ntarj, $target_path, $tipopro, $emailsen, $emailper, $telfij, $telcel, $pass);
            echo "Lo hizo con la imagen cargada";
             echo "<script type='text/javascript'>window.location='home.php?pg=1011&pr=".$idcan."';</script>";
        }else{
            echo "Ha ocurrido un error al cargar el archivo, trate de nuevo!";
        }
    }else if($tamano==0){
        $obj->updcan($idcan, $doccan, $nomcan, $apecan, $nofic, $ntarj, $fot, $tipopro, $emailsen, $emailper, $telfij, $telcel, $pass);
            echo "Lo hizo con la imagen cde BD";
             echo "<script type='text/javascript'>window.location='home.php?pg=1011&pr=".$idcan."';</script>";
    }else{
        echo "<script type='text/javascript'>alert('Solo se permite imagenes jpg y no pueden exceder su peso de 1MB o 1024Kb.  Los datos de su archivo seleccionado son: Tamaño= ".round($tamano/1024,0)."Kb y Tipo de archivo: ".$tipo."');</script>";
    }
}

if($idcan && $acv){
    $obj->updact($idcan, $acv);
}


//Eliminar
if($del){
    $obj->delcan($del);
}

if($edi){
    $data1 = $obj->selcan1($edi);
}

$datfic = $obj->selfic();
$dattpro = $obj->selval(3);

//$datcan = $obj->selpro(3);

//Paginar
    $bo = "";
    $nreg = 10;//numero de registros a mostrar
    $pa = new mpagina($nreg);
    $conp = $obj->sqlcount($filtro);

?>