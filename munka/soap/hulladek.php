<?php
class Hulladek {
  
  /**
    *  @return Hulladekok
    */
  public function getHulladek(){
  
	$eredmeny = array("hibakod" => 0,
					  "uzenet" => "",
					  "hulladekok" => Array());
	
	try {
	  $dbh = new PDO('mysql:host=localhost;dbname=web2-beadando1','root', '',
					array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
	  $dbh->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
  
	  $sql2="SELECT `naptar`.`datum` AS `datum`, `lakig`.`igeny` AS `igeny`, `lakig`.`mennyiseg` AS `mennyiseg`, `szolgaltatas`.`tipus` AS `tipus`, `szolgaltatas`.`jelentes` AS `jelentes`
FROM `naptar`
	, `lakig`
	, `szolgaltatas`;";
	  $sth = $dbh->prepare($sql2);
	  $sth->execute(array());
	  $eredmeny['hulladekok'] = $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	catch (PDOException $e) {
	  $eredmeny["hibakod"] = 1;
	  $eredmeny["uzenet"] = $e->getMessage();
	}
	
	return $eredmeny;
  }
}
class Datumok {
  /**
   * @var string
   */
   public $datum;
  /**
   * @var string
   */
   public $igeny;
  /**
   * @var integer
   */
   public $mennyiseg;
  /**
   * @var string
   */
   public $tipus;
  /**
   * @var string
   */
   public $jelentes;
}


class Hulladekok {
  /**
   * @var integer
   */
  public $hibakod;

  /**
   * @var string
   */
  public $uzenet;  

  /**
   * @var Hulladekok[]
   */
  public $hulladekok;  
}
?>