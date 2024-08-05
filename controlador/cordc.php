<?php
    include ("modelo/mordc.php");
    include ("modelo/mpagina.php");
    $obj = new mordc();
    date_default_timezone_set('America/Bogota');
    $fecnocie = date('Y/m/d G:i:s'); //date('d/m/Y G:i');
    //echo $fecnocie;

    $kar = $obj->selkar();
    if($kar){
        $idkardex = $kar[0]['idkardex'];
    }else{
        echo "<script type='text/javascript'>alert('No exite un inventario disponible. Por favor cree un nuevo inventario y vuelva a crear una orden de compra.');</script>";
        echo "<script type='text/javascript'>window.location='home.php?pg=1040';</script>";
    }

    //Variables
    $pg=1050;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    
    $noidepro = isset($_POST['noidepro']) ? $_POST['noidepro']:NULL;
    $fecord = isset($_POST['fecord']) ? $_POST['fecord']:NULL;
    $datord = isset($_GET['datord']) ? $_GET['datord']:NULL;
    if (!$datord){
        $datord = isset($_POST['datord']) ? $_POST['datord']:NULL;
    }
    
    $idmat = isset($_POST['idmat']) ? $_POST['idmat']:NULL;
    $candeto = isset($_POST['candeto']) ? $_POST['candeto']:NULL;
    $descrip = isset($_POST['descrip']) ? $_POST['descrip']:NULL;

    $pdf = isset($_GET['pdf']) ? $_GET['pdf']:NULL;
    $imord = isset($_GET['imord']) ? $_GET['imord']:NULL;

    $del = isset($_GET['del']) ? $_GET['del']:NULL;
    $deldord = isset($_GET['delord']) ? $_GET['delord']:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;

    //Insertar
    if($fecord && $noidepro){
        $obj->setNoidepro($noidepro);
        $obj->setFecord($fecord);
        $obj->insord();
        $datord = $obj->selord();///AYUDAADAAAA
        echo "<script type='text/javascript'>window.location='home.php?pg=1051&datord=".$datord[0]["noord"]."';</script>";
    }
    //Insertar detalle ordcom
    //echo $datord." - ".$idmat." - ".$candeto."<br>";
    if($datord && $idmat && $candeto){
    
        $obj->setIdmat($idmat);
        $obj->setCandeto($candeto);
        $obj->setNoord($datord);
        $obj->setIdkardex($idkardex);
        $obj->setDescrip($descrip);
        $obj->setCantid($candeto);
        $obj->insdord();
        $dnodeto = $obj->selnodeto();
        $obj->setNodeto($dnodeto[0]['ndt']);
        $obj->insdkarE();
    }

    //Eliminar

    if($deldord){
        $obj->setNodeto($deldord);
        $obj->setNoord($deldord);
        $obj->deldord();
        $obj->deldkar();
    }

    //Selecciones
    if($datord){
        $obj->setNoord($datord);
        $data1 = $obj->selubi1();
        $dadft = $obj->seldord();
        $datdftot = $obj->seldfTot();
        $datcat = $obj->matp();
    }

    $data4 = $obj->prov();
    $dmen = $obj->selconf();

   //Paginar
    $bo = "";
    $nreg = 10;//numero de registros a mostrar
    $pa = new mpagina($nreg);
    $conp = $obj->sqlcount($filtro);
?>