 <?php
    include ("modelo/mfac.php");
    include ("modelo/mpagina.php");
    $obj = new mfac();
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

$data3 = $obj->cieabi();
if (!$data3){
    echo "<script type='text/javascript'>alert('No exite un turno abierto. Por favor cree un nuevo turno y vuelva a crear factura.');</script>";
    echo "<script type='text/javascript'>window.location='home.php?pg=1030';</script>";
}


    //Variables
    $pg=1031;
    $filtro=isset($_GET["filtro"]) ? $_GET["filtro"]:NULL;
    
    $nocie = isset($_POST['nocie']) ? $_POST['nocie']:NULL;
    if(!$nocie) $nocie = isset($_GET['nocie']) ? $_GET['nocie']:NULL;
    $noidecli = isset($_POST['noidecli']) ? $_POST['noidecli']:NULL;
    $fecfac = isset($_POST['fecfac']) ? $_POST['fecfac']:NULL;
    $datfac = isset($_GET['datfac']) ? $_GET['datfac']:NULL;
    if (!$datfac){
        $datfac = isset($_POST['datfac']) ? $_POST['datfac']:NULL;
    }
    $descrip = isset($_POST['descrip']) ? $_POST['descrip']:NULL;
    $codprod = isset($_GET['codprod']) ? $_GET['codprod']:NULL;
    $nodetf = isset($_GET['nodetf']) ? $_GET['nodetf']:NULL;
    $btnest = isset($_POST['btnest']) ? $_POST['btnest']:NULL;
    if(!$btnest)
        $btnest = isset($_GET['btnest']) ? $_GET['btnest']:NULL;

    $cant = isset($_POST['cant']) ? $_POST['cant']:NULL;

    $pdf = isset($_GET['pdf']) ? $_GET['pdf']:NULL;

    $fpago= isset($_POST['fpago']) ? $_POST['fpago']:NULL;
    $nvoucher= isset($_POST['nvoucher']) ? $_POST['nvoucher']:NULL;
    $nloc= isset($_POST['nloc']) ? $_POST['nloc']:NULL;
    $nmesa= isset($_POST['nmesa']) ? $_POST['nmesa']:NULL;

    $imfac = isset($_GET['imfac']) ? $_GET['imfac']:NULL;

    if($imfac){
        $obj->setAbiertafac(2);
        $obj->updcie();
        $obj->setNofact($imfac);
        $obj->setEstado(4);
        $obj->updest();
    }

    $del = isset($_GET['del']) ? $_GET['del']:NULL;
    $pr = isset($_GET['pr']) ? $_GET['pr']:NULL;
    $nocieu = isset($_POST['nocieu']) ? $_POST['nocieu']:NULL;
    //Insertar
      
    if($fecfac && $noidecli && $data3[0]["nocie"] &&  $_SESSION["idem"]){
        $obj->setAbiertafac(2);
        $obj->updcie();
        $obj->setFecfac($fecfac);
        $obj->setNoidecli($noidecli);
        $obj->setAbiertafac(1);
        $obj->setNocie($data3[0]["nocie"]);
        $obj->setIdem($_SESSION["idem"]);
        $obj->setNmesau($nmesa);
        $obj->setEstado(1);
        $obj->insubi();
        $datfac = $obj->selfac();
        echo "<script type='text/javascript'>window.location='home.php?pg=1032&datfac=".$datfac[0]["nofact"]."';</script>";
    }
    //Insertar detalle factura
    if($datfac && $cant){
        for($t=0;$t<$cant;$t++){
            $option = isset($_POST['option'.$t]) ? $_POST['option'.$t]:NULL;
            $cnt = isset($_POST['cnt'.$t]) ? $_POST['cnt'.$t]:NULL;
            //echo $option."-".$cnt."-".$datfac."<br>";
            if($option AND $cnt){
                $obj->setCandeft($cnt);
                $obj->setNofact($datfac);
                $obj->setCodprod($option);
                $obj->insdfa();
                $obj->setCodprod($codprod);
                $dnodeft = $obj->selnodetf();
                $dmpr = $obj->selmpr();
                if($dmpr){
                    for($i=0;$i<count($dmpr);$i++){
                        $obj->setIdmat($dmpr[$i]['idmat']);
                        $obj->setIdkardex($idkardex);
                        $obj->setCantid(1);
                        $obj->setDescrip($descrip);
                        $obj->setNodetf($dnodeft[0]['ndf']);
                        $obj->insdkarS();
                    }
                }
            }
        }
        //echo "<script type='text/javascript'>window.location='home.php?pg=1031&imfac=".$datfac."';</script>";
        echo "<script type='text/javascript'>window.location='home.php?pg=1031';</script>";
    }

    /*if($datfac && $codprod){
        $obj->insdfa($datfac, $codprod);
        $dnodeft = $obj->selnodetf($datfac, $codprod);
        $dmpr = $obj->selmpr($codprod);
        for($i=0;$i<count($dmpr);$i++){
            $obj->insdkarS($dmpr[$i]['idmat'], $idkardex, 1, $descrip, $dnodeft);
        }
    }*/

//echo $datfac." - ".$fpago." - ".$nvoucher." - ".$nloc;
    //Actualiza factura
    if($datfac && $fpago && $btnest){
        if($btnest=="Imprimir") $est=4;
        else{
            $est=2;
            $imfac = "";
        }
        $obj->setNofact($datfac);
        $obj->setFpago($fpago);
        $obj->setNvoucher($nvoucher);
        $obj->setNloc($nloc);
        $obj->setEstado($est);
        $obj->updfac();
    }

    //Eliminar
    if($del){
        $obj->setNofact($del);
        $obj->delfac();
    }

    if($nodetf){
        $obj->setNodetf($nodetf);
        $obj->deldet();
        $obj->deldkar();
    }
    //actualizar
    if($nocie && $fecfincie && $efeccie && $nocieu){
        //$obj->updubi($nocie, $fecfac, $abiertafac);
        //$obj->updubi($nocie, $fecfincie, $efeccie, ($efeccie+$abiertafac), 2);
        echo "<script type='text/javascript'>alert('Se ha actualizado satisfactoriamente.');</script>";
    }
    //Selecciones
    if($datfac){
        $obj->setNofact($datfac);
        $data1 = $obj->selubi1();
        $datctg = $obj->categ();
        $dadft = $obj->seldft();
        $datdftot = $obj->seldfTot();
    }

    $data4 = $obj->clie();
    $dmen = $obj->selconf();
    $mesas = $dmen[0]["nummesas"];

   //Paginar
    $bo = "";
    $nreg = 10;//numero de registros a mostrar
    $pa = new mpagina($nreg);
    $conp = $obj->sqlcount($data3[0]["nocie"], $filtro);
  //$data = $obj->selubi();

?>