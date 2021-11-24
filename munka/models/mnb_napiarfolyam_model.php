<?php

class Mnb_Napiarfolyam_Model
{
    public function GetData()
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        try {
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
            $mnb = (array)simplexml_load_string($client->GetInfo()->GetInfoResult);

            //Az utolsó dátum meghatározása
            $retData['LastDate'] = $mnb['LastDate'];

            //Az első dátum meghatározása
            $retData['FirstDate'] = $mnb['FirstDate'];

            //Mai nap meghatározása
            $retData['Today'] = date("Y-m-d");
            
            //Devizapárok meghatározása
            $devizak = $mnb['Currencies']->Curr;

            for($i = 0;$i< count($devizak);$i++) {
                for($j = 0;$j < count($devizak); $j++) {
                    if($devizak[$i] != $devizak[$j]){
                        $currencies[] = $devizak[$i].'-'.$devizak[$j];
                    }
                }
            }

            $retData['devizak'] = $currencies;

            if(isset($_POST['nap']) && isset($_POST['deviza'])) {

                $nap = $_POST['nap'];
                $deviza = $_POST['deviza'];

                $devizak = str_replace("-",",",$deviza);

                $exdeviza = explode("-",$deviza);

                $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
                $param = array('startDate' => date($nap), 'endDate' => date($nap), 'currencyNames' => $devizak);
                $result = $client->__soapCall('GetExchangeRates', array('parameters' => $param));
                $resarr = (array)simplexml_load_string($result->GetExchangeRatesResult);
                $res = $resarr['Day']->Rate;
                $ertek = array();

                if($exdeviza[0] == "HUF")
                {
                    $res = str_replace(',','.',$res);
                    $ertek[] = round(1/(float)$res,4);

                }
                elseif($exdeviza[1] == "HUF")
                {
                    $res = str_replace(',','.',$res);
                    $ertek[]   = round((float)$res,4);
                }
                else{
                    $val1 = (float)$res[0];
                    $val2 = (float)$res[1];

                    $ertek[] = round($val1 / $val2,4);
                }

                $retData['devizak2'] = $ertek;
            }
        } catch (SoapFault $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "SOAP hiba: " . $e->getMessage() . "!";
        }
        return $retData;
    }
}

?>