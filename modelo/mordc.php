<?php
include ("conexion.php");

class mordc{

    //ordcom, detkar, detord

    //Ordcom
    private $noord;
    private $noidepro;
    private $fecord;

    //set

    function setNoord($noord){
        $this->noord=$noord;
    }
    
    function setNoidepro($noidepro){
        $this->noidepro=$noidepro;
    }
    
    function setFecord($fecord){
        $this->fecord=$fecord;
    }

    //GET

    function getNoord(){
        return $this->noord;
    }
    
    function getNoidepro(){
        return $this->noidepro;
    }
    
    function getFecord(){
        return $this->fecord;
    }
///////////////////////////////////////////////////////////////////

//DETKAR

private $iddet;
private $idmat;
private $idkardex;
private $tipo;
private $cantid;
private $descrip;
private $nodetf;
private $nodeto;
private $candeto;

function setIddet($iddet){
    $this->iddet=$iddet;
}

function setIdmat($idmat){
    $this->idmat=$idmat;
}

function setIdkardex($idkardex){
    $this->idkardex=$idkardex;
}
function setTipo($tipo){
    $this->tipo=$tipo;
}

function setCantid($cantid){
    $this->cantid=$cantid;
}

function setDescrip($descrip){
    $this->descrip=$descrip;
}
function setNodetf($nodetf){
    $this->nodetf=$nodetf;
}

function setNodeto($nodeto){
    $this->nodeto=$nodeto;
}

function setCandeto($candeto){
    $this->candeto=$candeto;
}

function getIddet(){
    return $this->iddet;
}

function getIdmat(){
    return $this->idmat;
}

function getIdkardex(){
    return $this->idkardex;
}

function getTipo(){
    return $this->tipo;
}

function getCantid(){
    return $this->cantid;
}

function getDescrip(){
    return $this->descrip;
}

function getNodetf(){
    return $this->nodetf;
}

function getNodeto(){
    return $this->nodeto;
}

function getCandeto(){
     return $this->candeto;
}




//Orden de compra
    function insord(){
        $sql= "INSERT INTO ordcom (noidepro, fecord) VALUES (:noidepro,:fecord);";
        //echo $sql;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noidepro = $this->getNoidepro();
        $fecord = $this->getFecord();
        $result->bindParam(":noidepro",$noidepro);
        $result->bindParam(":fecord",$fecord);
        $result->execute();
    }

    function selord(){
        $sql= "SELECT noord FROM ordcom WHERE noidepro=:noidepro AND fecord=:fecord";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noidepro = $this->getNoidepro();
        $result->bindParam(":noidepro",$noidepro);
        $fecord = $this->getFecord();
        $result->bindParam(":fecord",$fecord);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
//KARDEX
    function insdkarE(){
        $sql= "INSERT INTO detkar(idmat, idkardex, tipo, cantid, descrip, nodeto) VALUES (:idmat, :idkardex, 'E', :cantid, :descrip, :nodeto);";
        //echo $sql;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idmat= $this->getIdmat();
        $idkardex= $this->getIdkardex();
        $cantid= $this->getCantid();
        $descrip= $this->getDescrip();
        $nodeto= $this->getNodeto();
        $result->bindParam(":idmat",$idmat);
        $result->bindParam(":idkardex",$idkardex);
        $result->bindParam(":cantid",$cantid);
        $result->bindParam(":descrip",$descrip);
        $result->bindParam(":nodeto",$nodeto);
        $result->execute();
    }
//DETALLE
    function insdord(){
        $sql= "INSERT INTO detord(noord, idmat, candeto) VALUES (:noord, :idmat, :candeto)";
        //echo $sql;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord= $this->getNoord();
        $idmat= $this->getIdmat();
        $candeto= $this->getCandeto();
        $result->bindParam(":noord",$noord);
        $result->bindParam(":idmat",$idmat);
        $result->bindParam(":candeto",$candeto);
        $result->execute();
    }

    function deldkar(){
        $sql= "DELETE FROM detkar WHERE nodeto=:nodeto";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nodeto = $this->getNodeto();
        $result->bindParam(":nodeto",$nodeto);
        $result->execute();
    }

    function selnodeto(){
        $sql= "SELECT max(nodeto) as ndt FROM detord WHERE noord=:noord and idmat=:idmat and candeto=:candeto";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord= $this->getNoord();
        $idmat= $this->getIdmat();
        $candeto= $this->getCandeto();
        $result->bindParam(":noord",$noord);
        $result->bindParam(":idmat",$idmat);
        $result->bindParam(":candeto",$candeto);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
    
    function seldord(){
        $sql= "SELECT d.nodeto, d.noord, d.idmat, d.candeto, m.nommatp, m.vlrmatp FROM detord AS d INNER JOIN materiap AS m ON d.idmat=m.idmat WHERE d.noord=:noord ORDER BY m.nommatp";
        //echo $sql."<br>";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord= $this->getNoord();
        $result->bindParam(":noord",$noord);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function deldord(){
        $sql= "DELETE FROM detord WHERE nodeto=:nodeto";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nodeto = $this->getNodeto();
        $result->bindParam(":nodeto",$nodeto);
        $result->execute();
    }

    function delord(){
        $sql= "DELETE FROM detord WHERE noord=:noord;";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord = $this->getNoord();
        $result->bindParam(":noord",$noord);
        $result->execute();
    }

//Informativas
    function prov(){
        $sql= "SELECT noidepro, nonitpro, razsocpro, dirpro, telpro, emailpro, contpro, codubi FROM proveedor";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function matp(){
        $sql= "SELECT idmat, nommatp, vlrmatp FROM materiap";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function seldfTot(){
        $sql= "SELECT sum(m.vlrmatp*d.candeto) AS total FROM detord AS d INNER JOIN materiap AS m ON d.idmat=m.idmat WHERE d.noord=:noord";
        //echo $sql."<br>";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord= $this->getNoord();
        $result->bindParam(":noord",$noord);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function selkar(){
        $sql= "SELECT idkardex, fecini, fecfin, act FROM kardex WHERE act=1 ";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function selubi1(){
        $sql= "SELECT o.noord, o.noidepro, o.fecord, p.nonitpro, p.razsocpro, p.dirpro, p.telpro, p.emailpro, p.contpro, p.codubi, u.nomubi FROM ordcom AS o INNER JOIN proveedor AS p ON o.noidepro=p.noidepro INNER JOIN ubicacion AS u ON p.codubi=u.codubi WHERE o.noord=:noord;";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $noord= $this->getNoord();
        $result->bindParam(":noord",$noord);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function buscar($filtro,$rvalini,$rvalfin){
        $sql = "SELECT o.noord, o.noidepro, o.fecord, p.nonitpro, p.razsocpro, p.dirpro, p.telpro, p.emailpro, p.contpro, p.codubi, u.nomubi FROM ordcom AS o INNER JOIN proveedor AS p ON o.noidepro=p.noidepro INNER JOIN ubicacion AS u ON p.codubi=u.codubi";
        if($filtro)
            $sql.= " WHERE o.fecord BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
        $sql .= "  ORDER BY o.fecord DESC LIMIT ".$rvalini.", ".$rvalfin;
        //echo $sql;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
    
    function sqlcount($filtro){
        $conp ="SELECT count(o.noord) as Npe FROM ordcom AS o INNER JOIN proveedor AS p ON o.noidepro=p.noidepro INNER JOIN ubicacion AS u ON p.codubi=u.codubi";
        if($filtro)
            $conp.= " WHERE o.fecord BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
        return $conp;
    }

    function selconf(){
        $sql="SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion;";
        //echo $sql."<br>";
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