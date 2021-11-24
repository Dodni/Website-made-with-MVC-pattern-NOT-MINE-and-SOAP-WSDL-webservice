<?php


class Szallitasok_Datumok_Model
{
	public function get_data($vars)
	{
		$retData['eredmeny'] = "";
		$retData['uzenet'] = "";
		try {
			$client = new SoapClient('http://localhost/munka/soap/felveteli.wsdl');
			$jelentkezesek = $client->getFelveteli();

            $retData['eredmény'] = "OK";
            $retData['jelentkezesek'] = $jelentkezesek;
		}
		catch (PDOException $e) {
					$retData['eredmény'] = "ERROR";
					$retData['uzenet'] = "Adatbázis hiba: ".$e->getMessage()."!";
		}
		return $retData;
	}
}

?>