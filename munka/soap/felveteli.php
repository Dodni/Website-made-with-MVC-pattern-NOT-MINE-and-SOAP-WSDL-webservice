<?php
class Felveteli {
  
  /**
    *  @return Jelentkezesek
    */
  public function getFelveteli(){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "jelentkezesek" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=web2-beadando1','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $sql = "SELECT jelentkezo.nev as 'jelentkezonev', kepzes.nev as 'kepzesnev', jelentkezes.sorrend, jelentkezes.szerzett, kepzes.minimum FROM jelentkezes JOIN jelentkezo ON jelentkezo.id = jelentkezes.jelentkezoid JOIN kepzes ON kepzes.id = jelentkezes.kepzesid ORDER BY jelentkezo.nev, jelentkezes.sorrend";
	  $sql2="SELECT `naptar`.`datum` AS `datum`, `lakig`.`igeny` AS `igeny`, `lakig`.`mennyiseg` AS `mennyiseg`, `szolgaltatas`.`tipus` AS `tipus`, `szolgaltatas`.`jelentes` AS `jelentes`
FROM `naptar`
	, `lakig`
	, `szolgaltatas`;";
	  $sth = $dbh->prepare($sql2);
	  $sth->execute(array());
	  $eredmeny['jelentkezesek'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }
}
class Jelentkezes {
  /**
   * @var string
   */
   public $jelentkezonev;
  /**
   * @var string
   */
   public $kepzesnev;
  /**
   * @var integer
   */
   public $sorrend;
  /**
   * @var integer
   */
   public $szerzett;
  /**
   * @var integer
   */
   public $minimum;
}


class Jelentkezesek {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;  

  /**
   * @var Jelentkezes[]
   */
  public $jelentkezesek;  
}
?>