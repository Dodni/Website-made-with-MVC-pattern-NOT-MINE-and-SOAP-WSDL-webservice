<?php

class Ujhozzaszolas_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		try {
			$connection = Database::getConnection();
			$sql = "INSERT INTO hozzaszolasok(hirid, felhasznaloid, tartalom) VALUES (".$vars['hirid'].",".$_SESSION['userid'].",'".$vars['tartalom']."')";
			$stmt = $connection->query($sql);
            $retData['uzenet'] = "Köszönjük!";
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>