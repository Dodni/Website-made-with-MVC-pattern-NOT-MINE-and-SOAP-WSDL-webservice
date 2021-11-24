<?php

class Hirek_Model
{
	public function get_data()
    {
        $retData['eredmeny'] = "";
        try {
            $connection = Database::getConnection();
            $sql = "SELECT hirek.id, felhasznalok.bejelentkezes, hirek.cim, hirek.ido, hirek.tartalom
				FROM hirek
				JOIN felhasznalok on felhasznalok.id = hirek.felhasznaloid";
            $stmt = $connection->query($sql);
            $hirek = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $retData['hirek'] = $hirek;
			$retData['eredmeny'] = "OK";
        } catch (PDOException $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }
        return $retData;
    }
	
	public function mutat($id)
    {
        $connection = Database::getConnection();
        $sql = "SELECT hirek.id, felhasznalok.bejelentkezes, hirek.cim, hirek.ido, hirek.tartalom
				FROM hirek
				JOIN felhasznalok on felhasznalok.id = hirek.felhasznaloid
				WHERE hirek.id = ?";
        $stmt = $connection->prepare($sql);
        $stmt ->execute(array($id));
        $hir = $stmt->fetch(PDO::FETCH_ASSOC);
        $retData['hir'] = $hir;

        $sql = "SELECT hozzaszolasok.id, hozzaszolasok.hirid, hozzaszolasok.felhasznaloid, hozzaszolasok.tartalom, felhasznalok.bejelentkezes, hozzaszolasok.ido
			FROM hozzaszolasok
			JOIN felhasznalok on felhasznalok.id = hozzaszolasok.felhasznaloid
			WHERE hozzaszolasok.hirid = ?";
        $stmt = $connection->prepare($sql);
        $stmt ->execute(array($id));
        $hozzaszolasok = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $retData['hozzaszolasok'] = $hozzaszolasok;

        return $retData;
    }
}

?>