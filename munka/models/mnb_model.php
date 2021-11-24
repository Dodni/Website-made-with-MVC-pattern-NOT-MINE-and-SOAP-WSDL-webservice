<?php

class Mnb_Model
{
    public function index()
    {
        $retData['eredmeny'] = "";
        try {
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
            // Egy adott devizapár (pl. Eur-Huf, Eur-Usd, …) adott napján mennyi volt az árfolyam?
            $mnb = (array)simplexml_load_string($client->GetCurrentExchangeRates()->GetCurrentExchangeRatesResult);
            $rates = $mnb['Day']->Rate;

            //Nap összegyűjtése
            $day = $mnb['Day']['date'];
            $retData['nap'] = $day;

            //Pénznemek összegyűjtése
            $penzlabel = "";
            $i = 0;
            foreach($rates as $penznem) {
                $penzlabel .= "'".$penznem->attributes()->curr."'";
                if($i < count($rates) - 1) {
                    $penzlabel .= ",";
                }
                $i++;
            }
            $retData['penznemek'] = $penzlabel;

            //Összegek összegyűjtése
            $osszegek = "";
            $i = 0;
            $max = count($rates);
            foreach($rates as $record){
                $osszegek .= "'".str_replace(',','.',$record)."'";
                if($i < count($rates) - 1) {
                    $osszegek .= ",";
                }
                $i++;
            }
            $retData['osszegek'] = $osszegek;


        } catch (SoapFault $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "SOAP hiba: " . $e->getMessage() . "!";
        }
        return $retData;
    }
}

?>