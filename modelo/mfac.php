<?php
include ("conexion.php");

class mfac{

    private $con;
    private $fecfac;
    private $abiertafac;
    private $noidecli;
    private $nocie;
    private $idem;
    private $nmesa;
    private $estado;
    private $codprod;
    private $idmat; 
    private $idkardex; 
    private $cantid;
    private $descrip; 
    private $nodetf;
    private $nofact;
    private $candeft;
    private $codcat;
    private $fpago;
    private $nvoucher;
    private $nloc;
    private $nmesau;

    function getNmesau(){
        return $this->nmesau;
    }
    function getNloc(){
        return $this->nloc;
    }
    function getNvoucher(){
        return $this->nvoucher;
    }
    function getFpago(){
        return $this->fpago;
    }
    function getCon(){
        return $this->con;
    }
    function getFecfac(){
        return $this->fecfac;
    }
    function getAbiertafac(){
        return $this->abiertafac;
    }
    function getNoidecli(){
        return $this->noidecli;
    }
    function getNocie(){
        return $this->nocie;
    }
    function getIdem(){
        return $this->idem;
    }
    function getNmesa(){
        return $this->nmesa;
    }
    function getEstado(){
        return $this->estado;
    }
    function getCodprod(){
        return $this->codprod;
    }
    function getIdmat(){
        return $this->idmat;
    }
    function getIdkardex(){
        return $this->idkardex;
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
    function getNofact(){
        return $this->nofact;
    }
    function getCandeft(){
        return $this->candeft;
    }
    function getCodcat(){
        return $this->codcat;
    }

//Métodos Set guardan datos
    function setNmesau($nmesau){
        $this->nmesau = $nmesau;
    }
    function setNloc($nloc){
        $this->nloc = $nloc;
    }
    function setNvoucher($nvoucher){
        $this->nvoucher = $nvoucher;
    }
    function setFpago($fpago){
        $this->fpago = $fpago;
    }
    function setCon($con){
        $this->con = $con;
    }
    function setFecfac($fecfac){
        $this->fecfac = $fecfac;
    }
    function setAbiertafac($abiertafac){
        $this->abiertafac = $abiertafac;
    }
    function setNoidecli($noidecli){
        $this->noidecli = $noidecli;
    }
    function setNocie($nocie){
        $this->nocie = $nocie;
    }
    function setIdem($idem){
        $this->idem = $idem;
    }
    function setNmesa($nmesa){
        $this->nmesa = $nmesa;
    }
    function setEstado($estado){
        $this->estado = $estado;
    }
    function setCodprod($codprod){
        $this->codprod = $codprod;
    }
    function setIdmat($idmat){
        $this->idmat = $idmat;
    }
    function setIdkardex($idkardex){
        $this->idkardex = $idkardex;
    }
    function setCantid($cantid){
        $this->cantid = $cantid;
    }
    function setDescrip($descrip){
        $this->descrip = $descrip;
    }
    function setNodetf($nodetf){
        $this->nodetf = $nodetf;
    }
    function setNofact($nofact){
        $this->nofact = $nofact;
    }
    function setCandeft($candeft){
        $this->candeft = $candeft;
    }
    function setCodcat($codcat){
        $this->codcat= $codcat;
    }
    
    function insubi(){
        $sql= "INSERT INTO factura (fecfac, abiertafac, noidecli, nocie, idem, nmesa, estado) VALUES (:fecfac, :abiertafac, :noidecli, :nocie, :idem, :nmesa, :estado);";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $fecfac=$this->getFecfac();
        $result->bindParam(':fecfac',$fecfac);
        $abiertafac=$this->getAbiertafac();
        $result->bindParam(':abiertafac',$abiertafac);
        $noidecli=$this->getNoidecli();
        $result->bindParam(':noidecli',$noidecli);
        $nocie=$this->getNocie();
        $result->bindParam(':nocie',$nocie);
        $idem=$this->getIdem();
        $result->bindParam(':idem',$idem);
        $nmesa=$this->getNmesau();
        $result->bindParam(':nmesa',$nmesa);
        $estado=$this->getEstado();
        $result->bindParam(':estado',$estado);
        $result->execute();
    }
    function selfac(){
        $sql= "SELECT nofact FROM factura WHERE fecfac=:fecfac AND abiertafac=:abiertafac AND noidecli=:noidecli AND nocie=:nocie AND idem=:idem";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $fecfac=$this->getFecfac();
        $result->bindParam(':fecfac',$fecfac);
        $abiertafac=$this->getAbiertafac();
        $result->bindParam(':abiertafac',$abiertafac);
        $noidecli=$this->getNoidecli();
        $result->bindParam(':noidecli',$noidecli);
        $nocie=$this->getNocie();
        $result->bindParam(':nocie',$nocie);
        $idem=$this->getIdem();
        $result->bindParam(':idem',$idem);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
        //echo $sql;
    }

    function selmpr(){
        $sql= "SELECT idmatxpro, idmat, codprod, cantmatxpro FROM matxpro WHERE codprod=:codprod";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $codprod=$this->getCodprod();
        $result->bindParam(':codprod',$codprod);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

//KARDEX
    function insdkarS(){
        $sql= "INSERT INTO detkar(idmat, idkardex, tipo, cantid, descrip, nodetf) VALUES (:idmat, :idkardex, 'S', :cantid, :descrip, :nodetf);";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $idmat=$this->getIdmat();
        $result->bindParam(':idmat',$idmat);
        $idkardex=$this->getIdkardex();
        $result->bindParam(':idkardex',$idkardex);
        $cantid=$this->getCantid();
        $result->bindParam(':cantid',$cantid);
        $descrip=$this->getDescrip();
        $result->bindParam(':descrip',$descrip);
        $nodetf=$this->getNodetf();
        $result->bindParam(':nodetf',$nodetf);
        $result->execute();
    }

    function deldkar(){
        $sql= "DELETE FROM detkar WHERE nodetf=:nodetf";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nodetf=$this->getNodetf();
        $result->bindParam(':nodetf',$nodetf);
        $result->execute();
    }

    function selnodetf(){
        $sql= "SELECT max(nodetf) AS ndf FROM detfac WHERE nofact=:nofact and codprod=:codprod";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $codprod=$this->getCodprod();
        $result->bindParam(':codprod',$codprod);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }


    function insdfa(){
        $sql= "INSERT INTO detfac(candeft, nofact, codprod) VALUES (:candeft, :nofact, :codprod)";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $candeft=$this->getCandeft();
        $result->bindParam(':candeft',$candeft);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $codprod=$this->getCodprod();
        $result->bindParam(':codprod',$codprod);
        $result->execute();
    }
    
    function cieabi(){
        $sql= "SELECT c.nocie, c.fecinicie, c.fecfincie, c.basecie, c.efeccie, c.totalcie, c.idem, e.nomemp, c.act FROM cierre AS c INNER JOIN empleado AS e ON c.idem=e.idem WHERE act=1";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function seldft(){
        $sql= "SELECT d.nodetf, d.candeft, d.nofact, d.codprod, p.nomprd, p.vlrprd, (d.candeft*p.vlrprd) AS topr FROM detfac AS d INNER JOIN producto AS p ON d.codprod=p.codprod WHERE d.nofact=:nofact ORDER BY p.nomprd";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function selkar(){
        $sql= "SELECT idkardex, fecini, fecfin, act FROM kardex WHERE act='1'";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function deldet(){
        $sql= "DELETE FROM detfac WHERE nodetf=:nodetf";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nodetf=$this->getNodetf();
        $result->bindParam(':nodetf',$nodetf);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function seldfTot(){
        $sql= "SELECT sum(d.candeft*p.vlrprd) AS total FROM detfac AS d INNER JOIN producto AS p ON d.codprod=p.codprod WHERE d.nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function clie(){
        $sql= "SELECT noidecli, nodoccli, nomcli FROM cliente";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function produ(){
        $sql= "SELECT codprod, nomprd, vlrprd FROM producto WHERE codcat=:codcat";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $codcat=$this->getCodcat();
        $result->bindParam(':codcat',$codcat);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function categ(){
        $sql= "SELECT codcat, nomcat FROM categoria";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function updcie(){
        $sql= "UPDATE factura SET abiertafac=:abiertafac";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $abiertafac=$this->getAbiertafac();
        $result->bindParam(':abiertafac',$abiertafac);
        $result->execute();
    }

    function updfac(){
        $sql= "UPDATE factura SET fpago=:fpago,nvoucher=:nvoucher,nloc=:nloc, estado=:estado WHERE nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $fpago=$this->getFpago();
        $result->bindParam(':fpago',$fpago);
        $nvoucher=$this->getNvoucher();
        $result->bindParam(':nvoucher',$nvoucher);
        $nloc=$this->getNloc();
        $result->bindParam(':nloc',$nloc);
        $estado=$this->getEstado();
        $result->bindParam(':estado',$estado);
        $result->execute();
    }

    function updest(){
        $sql= "UPDATE factura SET estado=:estado WHERE nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $estado=$this->getEstado();
        $result->bindParam(':estado',$estado);
        $result->execute();
    }

    function delfac(){
        $sql= "DELETE FROM detfac WHERE nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $result->execute();
        $sql= "DELETE FROM factura WHERE nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $result->execute();
    }

//SELECT nofnocie, fecfac, abiertafac, noidecli, nocie, idem FROM factura WHERE 1
//
    function selubi1(){
        $sql= "SELECT f.nofact, f.fecfac, f.abiertafac, f.noidecli, f.nocie, e.idem, e.nomemp, c.nodoccli, c.nomcli, c.dircli, c.telcli, c.emacli, c.codubi, u.nomubi, f.fpago, f.nvoucher, f.nloc, f.nmesa FROM empleado AS e INNER JOIN factura AS f ON e.idem=f.idem INNER JOIN cliente AS c ON f.noidecli=c.noidecli INNER JOIN ubicacion AS u ON c.codubi=u.codubi WHERE f.nofact=:nofact";
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $nofact=$this->getNofact();
        $result->bindParam(':nofact',$nofact);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }

    function buscar($nc, $filtro,$rvalini,$rvalfin){
        $sql = "SELECT f.nofact, f.fecfac, f.abiertafac, f.noidecli, f.nocie, e.idem, e.nomemp, c.nodoccli, c.nomcli, c.dircli, c.telcli, c.emacli, c.codubi, u.nomubi, f.fpago, f.nvoucher, f.estado, f.nloc, f.nmesa FROM empleado AS e INNER JOIN factura AS f ON e.idem=f.idem INNER JOIN cliente AS c ON f.noidecli=c.noidecli INNER JOIN ubicacion AS u ON c.codubi=u.codubi WHERE f.nocie='".$nc."'";
        if($filtro)
            $sql.= " AND f.fecfac BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
        $sql .= "  ORDER BY f.fecfac DESC LIMIT ".$rvalini.", ".$rvalfin;
        $modelo = new conexion();
        $conexion = $modelo->get_conexion();
        $result = $conexion->prepare($sql);
        $result->execute();
        $res = NULL;
        while($f=$result->fetch())
            $res[]=$f;
        return $res;
    }
    
    function sqlcount($nc, $filtro){
        $conp ="SELECT count(f.nofact) as Npe FROM empleado AS e INNER JOIN factura AS f ON e.idem=f.idem INNER JOIN cliente AS c ON f.noidecli=c.noidecli INNER JOIN ubicacion AS u ON c.codubi=u.codubi WHERE f.nocie='".$nc."'";
        if($filtro)
            $conp.= " AND f.fecfac BETWEEN '".$filtro." 00:00:00' AND '".$filtro." 23:59:59'";
        return $conp;
    }

    function selconf(){
        $sql="SELECT idconf, nummesas, tiemact, nit, nomrest, dircon, mosdir, telcon, mostel, celcon, moscel, emacon, mosema, logocon FROM configuracion;";
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