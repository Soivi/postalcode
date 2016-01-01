<?php

require_once "posti.php";
require_once "config.php";

class postiPDO
{
	private $db;
	private $lkm;

	function __construct()
	{
		$this->db = new PDO(DSN,DB_USER,DB_PASSWORD);
  		$this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
		$lkm = 0;
    }
    
    function getLkm() {
    	return $this->lkm;
    }

    public function kaikkiPostinumerot()
    {
        $sql = "SELECT id, postinumero, kaupunki, kaupunginosa, vakiluku, pvm, lisatietoa FROM postinumero" ;

        if (! $stmt = $this->db->prepare($sql))
			throw new PDOException("prepare", 2);

        if (!$stmt->execute())
      		throw new PDOException("execute", 3);

        $tulos = array();
        
        while ($row = $stmt->fetchObject()) {
        	list($vuosi, $kuukausi, $paiva) = explode("-", $row->pvm);
        	$paivamaara = implode(".",array($paiva, $kuukausi, $vuosi));
        	$posti = new Posti(utf8_encode($row->postinumero), utf8_encode($row->kaupunki), utf8_encode($row->kaupunginosa), $row->vakiluku, $paivamaara , utf8_encode($row->lisatietoa),$row->id);
        	// fetchClass
        	$tulos[] = $posti;	
        }

	$this->lkm = $stmt->rowCount();
		
	return $tulos;
    }
	

    function lisaaPostinumero($posti) {
    	list($paiva, $kuukausi, $vuosi) = explode(".", $posti->getPvm());
    	$paivamaara = implode("-",array($vuosi, $kuukausi, $paiva));
    	
    	$sql = "INSERT INTO postinumero (postinumero, kaupunki, kaupunginosa, vakiluku, pvm, lisatietoa) VALUES (:postinumero, :kaupunki, :kaupunginosa, :vakiluku, :pvm, :lisatietoa)";
    		
    	$stmt = $this->db->prepare($sql);
    		
    	$stmt->bindValue(":postinumero", $posti->getPostinumero());
    	$stmt->bindValue(":kaupunki", utf8_decode($posti->getKaupunki()));
    	$stmt->bindValue(":kaupunginosa", utf8_decode($posti->getKaupunginosa()));
    	$stmt->bindValue(":vakiluku", $posti->getVakiluku());
    	$stmt->bindValue(":pvm", $paivamaara);
    	$stmt->bindValue(":lisatietoa", utf8_decode($posti->getLisatietoa()));
    	
    	$stmt->execute();
    	
    	$this->lkm = $stmt->rowCount();
    }
    
    function poistaPostinumero($id) {
    	$sql = "DELETE FROM postinumero WHERE id=:id;";
    	$stmt = $this->db->prepare($sql);
    	$stmt->bindValue(":id", $id);
    	$stmt->execute();
    	$this->lkm = $stmt->rowCount();
    }   

    public function haePostinumerot($hakuKaupunki)
    {
    	$sql = "SELECT id, postinumero, kaupunki, kaupunginosa, vakiluku, pvm, lisatietoa FROM postinumero WHERE kaupunki LIKE :hakuKaupunki" ;
    
    	if (! $stmt = $this->db->prepare($sql))
    		throw new PDOException("prepare", 2);
    
    	$stmt->bindValue(":hakuKaupunki", $hakuKaupunki);
    	
    	if (!$stmt->execute())
    		throw new PDOException("execute", 3);
    
    	$tulos = array();
    
    	while ($row = $stmt->fetchObject()) {
    		list($vuosi, $kuukausi, $paiva) = explode("-", $row->pvm);
    		$paivamaara = implode(".",array($paiva, $kuukausi, $vuosi));
    		$posti = new Posti(utf8_encode($row->postinumero), utf8_encode($row->kaupunki), utf8_encode($row->kaupunginosa), $row->vakiluku, $paivamaara , utf8_encode($row->lisatietoa),$row->id);
    		// fetchClass
    		$tulos[] = $posti;
    	}
    
    	$this->lkm = $stmt->rowCount();
    
    	return $tulos;
    }
}
?>
