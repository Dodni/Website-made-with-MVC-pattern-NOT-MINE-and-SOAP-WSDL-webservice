<?php

class Regisztral_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        try {
            $connection = Database::getConnection();
            $sql = "select id, csaladi_nev, utonev, jogosultsag from felhasznalok where bejelentkezes='" . $vars['login'] . "' ";
            $stmt = $connection->query($sql);
            $felhasznalo = $stmt->fetchAll(PDO::FETCH_ASSOC);
            switch (count($felhasznalo)) {
                case 0: // Mehet a rgisztráció
                    $sql = "INSERT INTO felhasznalok (csaladi_nev, utonev, bejelentkezes, jelszo, jogosultsag) "
                        . "VALUES (?, ?, ?, sha1(?), '_1_');";
                    $stmt = $connection->prepare($sql);
                    $stmt->execute(array($vars['lastname'], $vars['firstname'], $vars['login'], $vars['password']));
					$retData['eredmeny'] = "OK";
					$retData['uzenet'] = "Sikeres regisztráció!";
					break;
                case 1:
                    $retData['eredmény'] = "ERROR";
                    $retData['uzenet'] = "Ezen a néven már létezik felhasználó!";
                    // Menu::setMenu();
                    break;
                default:
                    $retData['eredmény'] = "ERROR";
                    $retData['uzenet'] = "Több felhasználót találtunk a megadott felhasználói névvel!";
            }
        } catch (PDOException $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }
        return $retData;
    }
}

?>