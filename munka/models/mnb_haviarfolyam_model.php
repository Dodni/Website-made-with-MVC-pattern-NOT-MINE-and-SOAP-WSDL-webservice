<?php

class Mnb_Haviarfolyam_Model
{
    public function GetData()
    {
        $retData['eredmeny'] = "";
        $retData['uzenet'] = "";
        try {
            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
            $mnb = (array)simplexml_load_string($client->GetInfo()->GetInfoResult);

            //Az utolsó dátum meghatározása
            $retData['LastMonth'] = $mnb['LastDate'];
            $retData['LastMonth'] = substr($retData['LastMonth'],0,-3);

            //Az első hónap meghatározása
            $retData['FirstMonth'] = $mnb['FirstDate'];
            $retData['FirstMonth'] = substr($retData['FirstMonth'],0,-3);

            
            //Devizapárok meghatározása
            $devizak = $mnb['Currencies']->Curr;

            for($i = 0;$i< count($devizak);$i++) {
                for($j = 0;$j < count($devizak); $j++) {
                    if($devizak[$i] != $devizak[$j]){
                        $currencies[] = $devizak[$i].'-'.$devizak[$j];
                    }
                }
            }

            $deviza_list ="";
            foreach($currencies as $cur) {
                $deviza_list .= '<option value="'.$cur.'">'.$cur.'</option>';
            }

            $retData['devizak'] = $deviza_list;

            $retData['eredmény'] = "OK";
        } catch (SoapFault $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "SOAP hiba: " . $e->getMessage() . "!";
        }

        if(isset($_POST['honap']) && isset($_POST['deviza']))
        {
            //findExchanges
            $honap = $_POST['honap'];
            $deviza = $_POST['deviza'];

            $ev = explode('-',$honap)[0];
            $honap = explode('-',$honap)[1];

            $dcount = cal_days_in_month(CAL_GREGORIAN, $honap, $ev);

            $firstDay = $ev.'-'.$honap.'-01';
            $lastDay = $ev.'-'.$honap.'-'.$dcount;

            $devizak = str_replace("-",",",$deviza);
            $exdeviza = explode("-",$deviza);

            $client = new SoapClient("http://www.mnb.hu/arfolyamok.asmx?WSDL");
            $param = array('startDate' => date($firstDay), 'endDate' => date($lastDay), 'currencyNames' => $devizak);
            $result = $client->__soapCall('GetExchangeRates', array('parameters' => $param));
            $resarr = (array)simplexml_load_string($result->GetExchangeRatesResult);


            
            $arfolyamok = "";
            $max = count($resarr['Day']);
            $arak_tbl = array();
            if($exdeviza[0] == "HUF")
            {
                for($i = $max - 1 ; $i >= 0 ; $i-- ) {
                    $arfolyamok .= "'".round(1/(float)str_replace(',','.',$resarr['Day'][$i]->Rate),4)."'";
                    if($i > 0) {
                        $arfolyamok .= ",";
                    }

                    $arak_tbl[] = round(1/(float)str_replace(',','.',$resarr['Day'][$i]->Rate),4);
                }
            }
            elseif($exdeviza[1] == "HUF")
            {
                for($i = $max - 1 ; $i >= 0 ; $i-- ) {
                    $arfolyamok .= "'".round((float)str_replace(',','.',$resarr['Day'][$i]->Rate),4)."'";
                    if($i > 0) {
                        $arfolyamok .= ",";
                    }

                    $arak_tbl[] = round((float)str_replace(',','.',$resarr['Day'][$i]->Rate),4);
                }
            }
            else{
                for($i = $max - 1 ; $i >= 0 ; $i-- ) {
                    $arfolyamok .= "'".round(((float)str_replace(',','.',$resarr['Day'][$i]->Rate[0]))/((float)str_replace(',','.',$resarr['Day'][$i]->Rate[1])),4)."'";
                    if($i > 0) {
                        $arfolyamok .= ",";
                    }

                    $arak_tbl[] = round(((float)str_replace(',','.',$resarr['Day'][$i]->Rate[0]))/((float)str_replace(',','.',$resarr['Day'][$i]->Rate[1])),4);
                }
            }
            $retData['arfolyamok'] = $arfolyamok;

            //findDates
            $datelist = "";
            $napok_tbl = array();
            for($i = $max - 1; $i >= 0; $i--)
            {
                $datelist .= "'".$resarr['Day'][$i]['date']."'";
                if($i > 0) {
                    $datelist .= ",";
                }

                $napok_tbl[] = $resarr['Day'][$i]['date'];
            }
            $retData['datelist'] = $datelist;

            $retData['napok_tbl'] = $napok_tbl;
            $retData['arak_tbl'] = $arak_tbl;
        }


        return $retData;
    }
}

?>