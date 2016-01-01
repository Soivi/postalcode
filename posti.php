<?php
class Posti {
	private static $virhekoodilista = array (
			- 1 => "Virhe",
			0 => "",
			11 => "Postinumero ei saa olla tyhjä",
			12 => "Postinumeron pitää olla viisi numeroa",
			
			21 => "Kaupunki ei saa olla tyhjä",
			22 => "Kaupunki on liian lyhyt",
			23 => "Kaupunki on liian pitkä",
			24 => "Kaupunki pitää olla vain kirjaimia",
			
			31 => "Kaupunginosa ei saa olla tyhjä",
			32 => "Kaupunginosa on liian lyhyt",
			33 => "Kaupunginosa on liian pitkä",
			34 => "Kaupunginosassa saa olla vain kirjaimia ja väliviiva tai väli",
			
			41 => "Väkiluku ei saa olla tyhjä",
			42 => "Väkiluku pitää olla vain numeroita",
			43 => "Väkiluku on liian pieni",
			44 => "Väkiluku on liian suuri",
			
			51 => "Päivämäärä ei saa olla tyhjä",
			52 => "Päivämäärän pitää olla muotoa dd.mm.yyyy",
			53 => "Päivämäärää ei ole olemassa",
			54 => "Päivämäärä ei voi olla tulevaisuudessa",
			55 => "Päivämäärä on liian aikaisin",
			
			61 => "Lisätietoa ei saa olla tyhjä",
			62 => "Lisätietoa on liian lyhyt",
			63 => "Lisätietoa on liian pitkä",
			64 => "Lisätiedon pitää alkaa sanalla Suomi",
	);
	
	
	private $id;
	private $postinumero;
	private $kaupunki;
	private $kaupunginosa;
	private $vakiluku;
	private $pvm;
	private $lisatietoa;
	
	function __construct($postinumero = "", $kaupunki = "", $kaupunginosa = "", $vakiluku = "", $pvm = "", $lisatietoa = "", $uusiId = 0) {
		$this->postinumero = trim($postinumero);
		$this->setKaupunki($kaupunki);
		$this->setKaupunginosa($kaupunginosa);
		$this->vakiluku = trim($vakiluku);
		$this->pvm = trim($pvm);
		$this->lisatietoa = trim($lisatietoa);
		$this->id = $uusiId;
	}
	
	public function setId($uusiId) {
		$this->id = $uusiId;
	}
	
	public function getId() {
		return $this->id;
	}
	
	public function setPostinumero($postinumero) {
		$this->postinumero = $postinumero;
	}
	
	public function getPostinumero() {
		return $this->postinumero;
	}
	
	// Postinumero saa olla vain 5 numeroa
	public function checkPostinumero($tyhjä = false) {
		if ($tyhjä == true && strlen($this->postinumero) == 0)
			return 0;
		
		if ($tyhjä == false && strlen($this->postinumero) == 0)
			return 11;
		
		if (!preg_match("/^\d{5}$/", $this->postinumero))
			return 12;
		
		return 0;
	}
	
	public function setKaupunki($kaupunki) {
		$kaupunki = trim ( $kaupunki );
		$kaupunki = mb_convert_case ( $kaupunki, MB_CASE_LOWER, "UTF-8" );
		$kaupunki = mb_convert_case ( $kaupunki, MB_CASE_TITLE, "UTF-8" );		
		$this->kaupunki = $kaupunki;
	}
	
	public function getKaupunki() {
		return $this->kaupunki;
	}
	
	// Kristiinankaupunki on pisin Suomen kaupungin nimi siksi 20 merkkiä
	public function checkKaupunki($tyhjä = false, $min = 2 ,$max = 20) {
		if ($tyhjä == true && strlen($this->kaupunki) == 0)
			return 0;
	
		if ($tyhjä == false && strlen($this->kaupunki) == 0)
			return 21;
	
		if ($min > strlen($this->kaupunki))
			return 22;
	
		if ($max < strlen($this->kaupunki))
			return 23;
		
		if (!preg_match("/^[A-ZÄÖÅ][a-zäöå]+$/", $this->kaupunki))
			return 24;
	
		return 0;
	}
	
	public function setKaupunginosa($kaupunginosa) {
		$kaupunginosa = trim ( $kaupunginosa );
		$kaupunginosa = mb_convert_case ( $kaupunginosa, MB_CASE_LOWER, "UTF-8" );
		$kaupunginosa = mb_convert_case ( $kaupunginosa, MB_CASE_TITLE, "UTF-8" );		
		$this->kaupunginosa = $kaupunginosa;
	}
	
	public function getKaupunginosa() {
		return $this->kaupunginosa;
	}
	
	public function setVakiluku($vakiluku) {
		$this->vakiluku = $vakiluku;
	}
	
	// Kaupunginosa saa olla muotoa Eira tai Iso-Heikkilä. Erotus voi olla välillä tai viivalla.
	public function checkKaupunnginosa($tyhjä = false, $min = 2 ,$max = 30) {
		if ($tyhjä == true && strlen($this->kaupunginosa) == 0)
			return 0;
	
		if ($tyhjä == false && strlen($this->kaupunginosa) == 0)
			return 31;
	
		if ($min > strlen($this->kaupunginosa))
			return 32;
	
		if ($max < strlen($this->kaupunginosa))
			return 33;
		
		if ((!preg_match("/^[A-ZÄÖÅ][a-zäöå]*[\ \-][A-ZÄÖÅ][a-zäöå]*$/", $this->kaupunginosa)) 
				&& (!preg_match("/^[A-ZÄÖÅ][a-zäöå]+$/", $this->kaupunginosa)))
			return 34;
	
		return 0;
	}
	
	public function getVakiluku() {
		return $this->vakiluku;
	}
	
	// 5426674 oli Suomen väkiluku vuonna 2012
	public function checkVakiluku($tyhjä = false, $min = 1 ,$max = 5426674) {
		if ($tyhjä == true && strlen($this->vakiluku) == 0)
			return 0;
	
		if ($tyhjä == false && strlen($this->vakiluku) == 0)
			return 41;
		
		if (!preg_match("/^\d+$/", $this->vakiluku))
			return 42;
	
		if ($min > $this->vakiluku)
			return 43;
		
		if ($max < $this->vakiluku)
			return 44;
	
		return 0;
	}
	
	public function setPvm($pvm) {
		$this->pvm = $pvm;
	}
	
	public function getPvm() {
		return $this->pvm;
	}
	
	// 1973 vuonna tuli postinumerot käyttöön Suomessa
	public function checkPvm($tyhjä = false, $pNroOttoVuosi = "1973") {		
		if ($tyhjä == true && strlen($this->pvm) == 0)
			return 0;
	
		if ($tyhjä == false && strlen($this->pvm) == 0)
			return 51;
		
		if (!preg_match("/^\d{1,2}\.\d{1,2}\.\d{4}$/", $this->pvm))
			return 52;
		
		list($paiva, $kuukausi, $vuosi) = explode(".", $this->pvm);
		if (!checkdate($kuukausi, $paiva, $vuosi))
			return 53;
		
		// Tarkistetaan ensiksi vuosi jos se on tulevaisuudessa
		$vuosiNyt = date("Y", time());
		if(($vuosiNyt-$vuosi) < 0)
			return 54;
		
		// Jos vuosi ei ollut tulevaisuudessa tarkastetaan, että päivä ei ole tulevaisuudessa sekunteista
		// Syynä etten käytä pelkästään sekuntteja tarkastukseen, koska jos vuosi laitetaan liian isoksi esim. 2100 
		// sekunnit ylittävät int arvon ja se päästetään läpi, jota emme halua. Tästä syystä tarkistetaan onko vuosi tulevaisuudessa
		// ennen sekunttien vertaamista.
		if((strtotime($this->pvm)-time()) > 0)
			return 54;
		
		if(($vuosi-$pNroOttoVuosi) < 0)
			return 55;
	
		return 0;
	}
	
	public function setLisatietoa($lisatietoa) {
		$this->lisatietoa = trim ( $lisatietoa );
	}
	
	public function getLisatietoa() {
		return $this->lisatietoa;
	}
	
	public function checkLisatietoa($tyhjä = false, $min = 5 ,$max = 100) {
		if ($tyhjä == true && strlen($this->lisatietoa) == 0)
			return 0;
		
		if ($tyhjä == false && strlen($this->lisatietoa) == 0)
			return 61;
		
		if ($min > strlen($this->lisatietoa))
			return 62;
		
		if ($max < strlen($this->lisatietoa))
			return 63;
		
		if (!preg_match("/^Suomi/", $this->lisatietoa))
			return 64;
		
		return 0;
	}
	
	public static function haeVirheenSyy($virhenro) {
		if (isset ( self::$virhekoodilista [$virhenro] ))
			return self::$virhekoodilista [$virhenro];
	
		return self::$virhekoodilista [- 1];
	}
	
}

?>